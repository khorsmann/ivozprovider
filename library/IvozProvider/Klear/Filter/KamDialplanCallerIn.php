<?php

class IvozProvider_Klear_Filter_KamDialplanCallerIn implements KlearMatrix_Model_Interfaces_FilterList
{
    protected $_condition = array();

    public function setRouteDispatcher(KlearMatrix_Model_RouteDispatcher $routeDispatcher)
    {
        throw new \Exception('Not implemented yet');

        //Get Action
        $currentAction = $routeDispatcher->getActionName();

        //Get Controller
        $currentController = $routeDispatcher->getControllerName();

        //Get ModelName and your Controller
        $currentItemName = $routeDispatcher->getCurrentItemName();


        switch ($currentItemName) {
            case "transformationRulesetGroupsTrunksList_screen":
            case "kamTrunksDialplan_caller_inList_screen":
                if ($GLOBALS['sf']) {
                    $entity = 'Ivoz\\Domain\\Model\\TransformationRulesetGroupsTrunk\\TransformationRulesetGroupsTrunk';
                } else if (!$GLOBALS['sf']) {
                    $mapper = new \IvozProvider\Mapper\Sql\TransformationRulesetGroupsTrunks();
                }
                break;
//            case "transformationRulesetGroupsUsersList_screen":
//            case "kamUsersDialplan_caller_inList_screen":
//                $mapper = new \IvozProvider\Mapper\Sql\TransformationRulesetGroupsUsers();
//                break;
            default:
                throw new Klear_Exception_Default("List screen not valid");
                break;
        }

        if ($GLOBALS['sf']) {
            $pk = $routeDispatcher->getParam("pk");
            $dataGateway = \Zend_Registry::get('data_gateway');
            $transformationRulesetGroupModel = $dataGateway->find($entity, $pk);
        } else if (!$GLOBALS['sf']) {
            $transformationRulesetGroupModel = $mapper->find($routeDispatcher->getParam("pk"));
        }

        $filterValue = $transformationRulesetGroupModel->getCallerIn();
        $condition = "TrunksDialplan.dpid = ".$filterValue;
        if (is_null($filterValue)) {
            $condition = "TrunksDialplan.dpid is null";
        }

        $this->_condition[] = $condition;

        return true;
    }

    public function getCondition()
    {
        if (count($this->_condition) > 0) {
            return ['(' . implode(" AND ", $this->_condition) . ')'];
        }
        return null;
    }

}
