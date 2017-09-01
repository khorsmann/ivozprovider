<?php

namespace Ivoz\Domain\Service\Domain;

use Ast\Domain\Model\PsAor\PsAor;
use Ast\Domain\Model\PsEndpoint\PsEndpoint;
use Core\Domain\Service\EntityPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Company\Company;
use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\Domain\Domain;
use Ivoz\Domain\Model\Domain\DomainDTO;
use Ivoz\Domain\Model\Domain\DomainInterface;
use Ivoz\Domain\Model\Domain\DomainRepository;
use Ivoz\Domain\Model\Friend\Friend;
use Ivoz\Domain\Model\Terminal\Terminal;
use Ivoz\Domain\Service\Company\CompanyLifecycleEventHandlerInterface;

/**
 * Class UpdateByCompany
 * @package Ivoz\Domain\Service\Domain
 * @lifecycle post_persist
 * @todo this could be partially merged with UpdateByBrand
 */
class UpdateByCompany implements CompanyLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    /**
     * @var DomainRepository
     */
    protected $domainRepository;

    public function __construct(
        EntityPersisterInterface $entityPersister,
        DomainRepository $domainRepository
    ) {
        $this->entityPersister = $entityPersister;
        $this->domainRepository = $domainRepository;
    }

    public function execute(CompanyInterface $entity, $isNew)
    {
        $id = $entity->getId();

        /**
         * @var DomainInterface $domain
         */
        $domain = $this->domainRepository->findOneBy([
            'company' => $id,
            'PointsTo' => 'proxyusers'
        ]);

        // If domain field is filled, look for brand domains or create a new one
        if ($domain) {
            $this->updateTerminalsDomain($entity, $domain);
            $this->updateFriendsDomain($entity, $domain);
        }

        // If domain field is filled, look for brand domains or create a new one
        $domainDto = is_null($domain)
            ? Domain::createDTO()
            : $domain->toDto();

        $name = $entity->getDomainUsers();

        /**
         * @var DomainDTO $domainDto
         */
        $domainDto
            ->setDomain($name)
            ->setScope('brand')
            ->setPointsTo('proxyusers')
            ->setCompanyId($id)
            ->setDescription($entity->getName() . " proxyusers domain");

        $this->entityPersister->persist($domainDto, $domain);
    }

    private function updateTerminalsDomain(Company $company, Domain $domain)
    {
        $terminals = $company->getTerminals();

        /**
         * @var Terminal $terminal
         */
        foreach ($terminals as $terminal) {

            $terminal->setDomain($domain->getDomain());

            /**
             * @todo review that this is definned in getAstPsEndpoint
             */
            $endpoints = $terminal->getAstPsEndpoint();

            /**
             * @var PsAor $aor
             */
            $endpoint = current($endpoints);
            $aor = $endpoint->getAstPsAor();

            $aor->setContact(
                /**
                 * @todo ensure this method exists
                 */
                $terminal->getContact()
            );
        }
    }

    private function updateFriendsDomain(Company $company, Domain $domain)
    {
        $friends = $company->getFriends();

        /**
         * @var Friend $friend
         */
        foreach ($friends as $friend) {

            $friend->setDomain($domain->getDomain());

            /**
             * @todo ensure this method exists
             * @var PsEndpoint $endpoint
             */
            $endpoint = $friend->getAstPsEndpoint();

            /**
             * @var PsAor $aor
             */
            $aor = $endpoint->getAstPsAor();
            $aor->setContact(
                /**
                 * @todo ensure this method exists
                 */
                $friend->getContact()
            );
        }
    }
}