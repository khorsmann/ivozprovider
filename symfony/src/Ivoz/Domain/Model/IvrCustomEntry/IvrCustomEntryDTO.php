<?php

namespace Ivoz\Domain\Model\IvrCustomEntry;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class IvrCustomEntryDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $entry;

    /**
     * @var string
     */
    private $targetType;

    /**
     * @var string
     */
    private $targetNumberValue;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $IvrCustomId;

    /**
     * @var mixed
     */
    private $welcomeLocutionId;

    /**
     * @var mixed
     */
    private $targetExtensionId;

    /**
     * @var mixed
     */
    private $targetVoiceMailUserId;

    /**
     * @var mixed
     */
    private $IvrCustom;

    /**
     * @var mixed
     */
    private $welcomeLocution;

    /**
     * @var mixed
     */
    private $targetExtension;

    /**
     * @var mixed
     */
    private $targetVoiceMailUser;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'entry' => $this->getEntry(),
            'targetType' => $this->getTargetType(),
            'targetNumberValue' => $this->getTargetNumberValue(),
            'id' => $this->getId(),
            'ivrCustomId' => $this->getIvrCustomId(),
            'welcomeLocutionId' => $this->getWelcomeLocutionId(),
            'targetExtensionId' => $this->getTargetExtensionId(),
            'targetVoiceMailUserId' => $this->getTargetVoiceMailUserId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->ivrCustom = $transformer->transform('Ivoz\\Domain\\Model\\IvrCustom\\IvrCustom', $this->getIvrCustomId());
        $this->welcomeLocution = $transformer->transform('Ivoz\\Domain\\Model\\Locution\\Locution', $this->getWelcomeLocutionId());
        $this->targetExtension = $transformer->transform('Ivoz\\Domain\\Model\\Extension\\Extension', $this->getTargetExtensionId());
        $this->targetVoiceMailUser = $transformer->transform('Ivoz\\Domain\\Model\\User\\User', $this->getTargetVoiceMailUserId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $entry
     *
     * @return IvrCustomEntryDTO
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param string $targetType
     *
     * @return IvrCustomEntryDTO
     */
    public function setTargetType($targetType)
    {
        $this->targetType = $targetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * @param string $targetNumberValue
     *
     * @return IvrCustomEntryDTO
     */
    public function setTargetNumberValue($targetNumberValue = null)
    {
        $this->targetNumberValue = $targetNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetNumberValue()
    {
        return $this->targetNumberValue;
    }

    /**
     * @param integer $id
     *
     * @return IvrCustomEntryDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $ivrCustomId
     *
     * @return IvrCustomEntryDTO
     */
    public function setIvrCustomId($ivrCustomId)
    {
        $this->IvrCustomId = $ivrCustomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIvrCustomId()
    {
        return $this->IvrCustomId;
    }

    /**
     * @return \Ivoz\Domain\Model\IvrCustom\IvrCustom
     */
    public function getIvrCustom()
    {
        return $this->IvrCustom;
    }

    /**
     * @param integer $welcomeLocutionId
     *
     * @return IvrCustomEntryDTO
     */
    public function setWelcomeLocutionId($welcomeLocutionId)
    {
        $this->welcomeLocutionId = $welcomeLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWelcomeLocutionId()
    {
        return $this->welcomeLocutionId;
    }

    /**
     * @return \Ivoz\Domain\Model\Locution\Locution
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * @param integer $targetExtensionId
     *
     * @return IvrCustomEntryDTO
     */
    public function setTargetExtensionId($targetExtensionId)
    {
        $this->targetExtensionId = $targetExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTargetExtensionId()
    {
        return $this->targetExtensionId;
    }

    /**
     * @return \Ivoz\Domain\Model\Extension\Extension
     */
    public function getTargetExtension()
    {
        return $this->targetExtension;
    }

    /**
     * @param integer $targetVoiceMailUserId
     *
     * @return IvrCustomEntryDTO
     */
    public function setTargetVoiceMailUserId($targetVoiceMailUserId)
    {
        $this->targetVoiceMailUserId = $targetVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTargetVoiceMailUserId()
    {
        return $this->targetVoiceMailUserId;
    }

    /**
     * @return \Ivoz\Domain\Model\User\User
     */
    public function getTargetVoiceMailUser()
    {
        return $this->targetVoiceMailUser;
    }
}

