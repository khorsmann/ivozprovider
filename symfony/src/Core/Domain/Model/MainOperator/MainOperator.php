<?php

namespace Core\Domain\Model\MainOperator;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * MainOperator
 */
class MainOperator extends MainOperatorAbstract implements MainOperatorInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($username, $pass, $email, $active)
    {
        $this->setUsername($username);
        $this->setPass($pass);
        $this->setEmail($email);
        $this->setActive($active);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return MainOperatorDTO
     */
    public static function createDTO()
    {
        return new MainOperatorDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MainOperatorDTO
         */
        Assertion::isInstanceOf($dto, MainOperatorDTO::class);

        $self = new self(
            $dto->getUsername(),
            $dto->getPass(),
            $dto->getEmail(),
            $dto->getActive());

        return $self
            ->setName($dto->getName())
            ->setLastname($dto->getLastname())
            ->setTimezone($dto->getTimezone())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MainOperatorDTO
         */
        Assertion::isInstanceOf($dto, MainOperatorDTO::class);

        $this
            ->setUsername($dto->getUsername())
            ->setPass($dto->getPass())
            ->setEmail($dto->getEmail())
            ->setActive($dto->getActive())
            ->setName($dto->getName())
            ->setLastname($dto->getLastname())
            ->setTimezone($dto->getTimezone());


        return $this;
    }

    /**
     * @return MainOperatorDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setUsername($this->getUsername())
            ->setPass($this->getPass())
            ->setEmail($this->getEmail())
            ->setActive($this->getActive())
            ->setName($this->getName())
            ->setLastname($this->getLastname())
            ->setId($this->getId())
            ->setTimezoneId($this->getTimezone() ? $this->getTimezone()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'username' => $this->getUsername(),
            'pass' => $this->getPass(),
            'email' => $this->getEmail(),
            'active' => $this->getActive(),
            'name' => $this->getName(),
            'lastname' => $this->getLastname(),
            'id' => $this->getId(),
            'timezoneId' => $this->getTimezone() ? $this->getTimezone()->getId() : null
        ];
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set timezone
     *
     * @param \Core\Domain\Model\Timezone\TimezoneInterface $timezone
     *
     * @return self
     */
    protected function setTimezone(\Core\Domain\Model\Timezone\TimezoneInterface $timezone = null)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return \Core\Domain\Model\Timezone\TimezoneInterface
     */
    public function getTimezone()
    {
        return $this->timezone;
    }


}

