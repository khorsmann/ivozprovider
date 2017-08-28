<?php

namespace Ivoz\Domain\Model\IvrCustomEntry;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * IvrCustomEntryAbstract
 * @codeCoverageIgnore
 */
abstract class IvrCustomEntryAbstract
{
    /**
     * @var string
     */
    protected $entry;

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $targetType;

    /**
     * @var string
     */
    protected $targetNumberValue;

    /**
     * @var \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface
     */
    protected $IvrCustom;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $welcomeLocution;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $targetExtension;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $targetVoiceMailUser;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($entry, $targetType)
    {
        $this->setEntry($entry);
        $this->setTargetType($targetType);
        $this->initChangelog();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function initChangelog()
    {
        $this->_initialValues = $this->__toArray();
    }

    /**
     * @param string $fieldName
     * @return mixed
     * @throws \Exception
     */
    public function hasChanged($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }
        $getter = 'get' . ucfisrt($fieldName);

        return $this->$getter() != $this->_initialValues[$fieldName];
    }

    public function getInitialValue($fieldName)
    {
        if (array_key_exists($fieldName, $this->_initialValues)) {
            throw new \Exception($fieldName . ' field was not found');
        }

        return $this->_initialValues[$fieldName];
    }

    /**
     * @return IvrCustomEntryDTO
     */
    public static function createDTO()
    {
        return new IvrCustomEntryDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IvrCustomEntryDTO
         */
        Assertion::isInstanceOf($dto, IvrCustomEntryDTO::class);

        $self = new static(
            $dto->getEntry(),
            $dto->getTargetType());

        return $self
            ->setTargetNumberValue($dto->getTargetNumberValue())
            ->setIvrCustom($dto->getIvrCustom())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setTargetExtension($dto->getTargetExtension())
            ->setTargetVoiceMailUser($dto->getTargetVoiceMailUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IvrCustomEntryDTO
         */
        Assertion::isInstanceOf($dto, IvrCustomEntryDTO::class);

        $this
            ->setEntry($dto->getEntry())
            ->setTargetType($dto->getTargetType())
            ->setTargetNumberValue($dto->getTargetNumberValue())
            ->setIvrCustom($dto->getIvrCustom())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setTargetExtension($dto->getTargetExtension())
            ->setTargetVoiceMailUser($dto->getTargetVoiceMailUser());


        return $this;
    }

    /**
     * @return IvrCustomEntryDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setEntry($this->getEntry())
            ->setTargetType($this->getTargetType())
            ->setTargetNumberValue($this->getTargetNumberValue())
            ->setIvrCustomId($this->getIvrCustom() ? $this->getIvrCustom()->getId() : null)
            ->setWelcomeLocutionId($this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null)
            ->setTargetExtensionId($this->getTargetExtension() ? $this->getTargetExtension()->getId() : null)
            ->setTargetVoiceMailUserId($this->getTargetVoiceMailUser() ? $this->getTargetVoiceMailUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'entry' => $this->getEntry(),
            'targetType' => $this->getTargetType(),
            'targetNumberValue' => $this->getTargetNumberValue(),
            'ivrCustomId' => $this->getIvrCustom() ? $this->getIvrCustom()->getId() : null,
            'welcomeLocutionId' => $this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null,
            'targetExtensionId' => $this->getTargetExtension() ? $this->getTargetExtension()->getId() : null,
            'targetVoiceMailUserId' => $this->getTargetVoiceMailUser() ? $this->getTargetVoiceMailUser()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set entry
     *
     * @param string $entry
     *
     * @return self
     */
    public function setEntry($entry)
    {
        Assertion::notNull($entry);
        Assertion::maxLength($entry, 40);

        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return string
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Set targetType
     *
     * @param string $targetType
     *
     * @return self
     */
    public function setTargetType($targetType)
    {
        Assertion::notNull($targetType);
        Assertion::maxLength($targetType, 25);
        Assertion::choice($targetType, array (
          0 => 'number',
          1 => 'extension',
          2 => 'voicemail',
        ));

        $this->targetType = $targetType;

        return $this;
    }

    /**
     * Get targetType
     *
     * @return string
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * Set targetNumberValue
     *
     * @param string $targetNumberValue
     *
     * @return self
     */
    public function setTargetNumberValue($targetNumberValue = null)
    {
        if (!is_null($targetNumberValue)) {
            Assertion::maxLength($targetNumberValue, 25);
        }

        $this->targetNumberValue = $targetNumberValue;

        return $this;
    }

    /**
     * Get targetNumberValue
     *
     * @return string
     */
    public function getTargetNumberValue()
    {
        return $this->targetNumberValue;
    }

    /**
     * Set ivrCustom
     *
     * @param \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom
     *
     * @return self
     */
    public function setIvrCustom(\Ivoz\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom)
    {
        $this->IvrCustom = $ivrCustom;

        return $this;
    }

    /**
     * Get ivrCustom
     *
     * @return \Ivoz\Domain\Model\IvrCustom\IvrCustomInterface
     */
    public function getIvrCustom()
    {
        return $this->IvrCustom;
    }

    /**
     * Set welcomeLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return self
     */
    public function setWelcomeLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution = null)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * Get welcomeLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * Set targetExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $targetExtension
     *
     * @return self
     */
    public function setTargetExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $targetExtension = null)
    {
        $this->targetExtension = $targetExtension;

        return $this;
    }

    /**
     * Get targetExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTargetExtension()
    {
        return $this->targetExtension;
    }

    /**
     * Set targetVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $targetVoiceMailUser
     *
     * @return self
     */
    public function setTargetVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $targetVoiceMailUser = null)
    {
        $this->targetVoiceMailUser = $targetVoiceMailUser;

        return $this;
    }

    /**
     * Get targetVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTargetVoiceMailUser()
    {
        return $this->targetVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

