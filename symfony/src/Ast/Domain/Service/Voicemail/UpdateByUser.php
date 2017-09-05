<?php

namespace Ast\Domain\Service\Voicemail;

use Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Domain\Model\User\UserInterface;
use Ast\Domain\Model\Voicemail\VoicemailDTO;
use Ivoz\Domain\Service\User\UserLifecycleEventHandlerInterface;

class UpdateByUser implements UserLifecycleEventHandlerInterface
{
    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function __construct(
        EntityPersisterInterface $entityPersister
    ) {
        $this->entityPersister = $entityPersister;
    }

    public function execute(UserInterface $entity, $isNew)
    {
        $voicemail = $entity->getVoiceMail();
        $voicemailDTO = is_null($voicemail)
            ? new VoicemailDTO()
            : $entity->toDTO();

        if ($entity->getVoicemailSendMail()) {
            $voicemailDTO->setEmail(
                $entity->getEmail()
            );
        } else {
            $voicemailDTO->setEmail(null);
        }

        if ($entity->getVoicemailAttachSound()) {
            $voicemailDTO->setAttach('yes');
        } else {
            $voicemailDTO->setAttach('no');
        }

        // Update/Insert endpoint data
        $fullName = $entity->getName() . " " . $entity->getLastname();
        $voicemailDTO
            ->setUserId($entity->getId())
            ->setContext($entity->getVoiceMailContext())
            ->setMailbox($entity->getVoiceMailUser())
            ->setFullname($fullName)
            ->setTz($entity->getTimezone()->getTz());

        $this->entityPersister->persist(
            $voicemailDTO,
            $voicemail
        );
    }
}