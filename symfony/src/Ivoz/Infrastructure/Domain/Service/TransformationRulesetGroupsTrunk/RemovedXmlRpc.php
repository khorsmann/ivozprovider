<?php

namespace Ivoz\Infrastructure\TransformationRulesetGroupsTrunk\Service\TransformationRulesetGroupsTrunk;

use Core\Infrastructure\TransformationRulesetGroupsTrunk\Service\XmlRpc\RequestProxyTrunksLcrReloadTrait;
use Ivoz\TransformationRulesetGroupsTrunk\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface;

/**
 * Class RemovedSendXmlRcp
 * @package Ivoz\TransformationRulesetGroupsTrunk\Service\TransformationRulesetGroupsTrunk
 * @lifecycle post_remove
 */
class RemovedSendXmlRpc extends AbstractSendXmlRpc
{
    public function execute(TransformationRulesetGroupsTrunkInterface $entity, $isNew)
    {
        try {
            parent::execute($entity);
        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Transformation ruleset groups trunks may have been deleted.</p>';
            throw new \Exception($message);
        }
    }
}