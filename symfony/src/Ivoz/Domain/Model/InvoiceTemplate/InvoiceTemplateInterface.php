<?php

namespace Ivoz\Domain\Model\InvoiceTemplate;

use Core\Domain\Model\EntityInterface;

interface InvoiceTemplateInterface extends EntityInterface
{
    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set template
     *
     * @param string $template
     *
     * @return self
     */
    public function setTemplate($template);

    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate();

    /**
     * Set templateHeader
     *
     * @param string $templateHeader
     *
     * @return self
     */
    public function setTemplateHeader($templateHeader = null);

    /**
     * Get templateHeader
     *
     * @return string
     */
    public function getTemplateHeader();

    /**
     * Set templateFooter
     *
     * @param string $templateFooter
     *
     * @return self
     */
    public function setTemplateFooter($templateFooter = null);

    /**
     * Get templateFooter
     *
     * @return string
     */
    public function getTemplateFooter();

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand);

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

}

