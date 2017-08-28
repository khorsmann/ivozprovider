<?php

namespace Ivoz\Domain\Model\Language;

use Core\Domain\Model\EntityInterface;

interface LanguageInterface extends EntityInterface
{
    /**
     * Set iden
     *
     * @param string $iden
     *
     * @return self
     */
    public function setIden($iden);

    /**
     * Get iden
     *
     * @return string
     */
    public function getIden();

    /**
     * Set name
     *
     * @param Name $name
     *
     * @return self
     */
    public function setName(\Ivoz\Domain\Model\Language\Name $name);

    /**
     * Get name
     *
     * @return Name
     */
    public function getName();

}

