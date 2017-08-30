<?php

namespace spec\Ivoz\Domain\Service\CompanyAdmin;

use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\CompanyAdmin\CompanyAdmin;
use Ivoz\Domain\Model\CompanyAdmin\CompanyAdminInterface;
use Ivoz\Domain\Model\CompanyAdmin\CompanyAdminRepository;
use Ivoz\Domain\Service\CompanyAdmin\CheckValidity;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\SpecHelperTrait;

class CheckValiditySpec extends ObjectBehavior
{
    use SpecHelperTrait;

    protected $em;
    protected $companyAdminRepository;
    protected $entity;

    function let(
        EntityManagerInterface $em,
        CompanyAdminRepository $companyAdminRepository,
        CompanyAdminInterface $entity
    ) {
        $this->em = $em;
        $this->companyAdminRepository = $companyAdminRepository;
        $this->entity = $entity;

        $this->beConstructedWith($em, $companyAdminRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CheckValidity::class);
    }

    function it_returns_on_already_persisted_entity()
    {
        $this->emContainsWillReturn(true);

        $this
            ->entity
            ->getCompany()
            ->shouldNotBeCalled();

        $this->execute($this->entity)->shouldReturn(null);
    }

    function it_searches_for_duplicated_company_admins(
          CompanyInterface $company
    ) {
        $this->prepareQuery($company);

        $this
            ->companyAdminRepository
            ->findOneBy([
                'username' => 'testUsername',
                'company' => 1
            ])
            ->shouldBeCalled();

        $this->execute($this->entity)->shouldReturn(null);
    }

    function it_throws_an_Exception_on_duplicated_company_admin(
        CompanyInterface $company,
        CompanyAdminInterface $aCompanyAdmin
    ) {
        $this->prepareQuery($company);

        $this
            ->companyAdminRepository
            ->findOneBy([
                'username' => 'testUsername',
                'company' => 1
            ])
            ->shouldBeCalled()
            ->willReturn($aCompanyAdmin);

        $this
            ->shouldThrow('\Exception')
            ->during('execute', [$this->entity]);
    }

    /**
     * @param CompanyInterface $company
     */
    private function prepareQuery(CompanyInterface $company)
    {
        $this->emContainsWillReturn(false);

        $company
            ->getId()
            ->shouldBeCalled()
            ->willReturn(1);

        $this
            ->entity
            ->getUsername()
            ->shouldBeCalled()
            ->willReturn('testUsername');

        $this
            ->entity
            ->getCompany()
            ->shouldBeCalled()
            ->willReturn($company);
    }
}
