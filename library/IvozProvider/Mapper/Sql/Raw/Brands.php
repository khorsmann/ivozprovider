<?php

/**
 * Application Model Mapper
 *
 * @package IvozProvider\Mapper\Sql
 * @subpackage Raw
 * @author Luis Felipe Garcia
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for IvozProvider\Model\Brands
 *
 * @package IvozProvider\Mapper\Sql
 * @subpackage Raw
 * @author Luis Felipe Garcia
 */

namespace IvozProvider\Mapper\Sql\Raw;
class Brands extends MapperAbstract
{
    protected $_modelName = 'IvozProvider\\Model\\Brands';


    protected $_urlIdentifiers = array();

    /**
     * Returns an array, keys are the field names.
     *
     * @param IvozProvider\Model\Raw\Brands $model
     * @return array
     */
    public function toArray($model, $fields = array())
    {

        if (!$model instanceof \IvozProvider\Model\Raw\Brands) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \IvozProvider\Model\Raw\Brands object in toArray for " . get_class($this);
            } else {
                $message = "$model is not a \\IvozProvider\Model\\Brands object in toArray for " . get_class($this);
            }

            $this->_logger->log($message, \Zend_Log::ERR);
            throw new \Exception('Unable to create array: invalid model passed to mapper', 2000);
        }

        if (empty($fields)) {
            $result = array(
                'id' => $model->getId(),
                'name' => $model->getName(),
                'nif' => $model->getNif(),
                'extensionBlackListRegExp' => $model->getExtensionBlackListRegExp(),
                'domain' => $model->getDomain(),
                'defaultTimezoneId' => $model->getDefaultTimezoneId(),
                'logoFileSize' => $model->getLogoFileSize(),
                'logoMimeType' => $model->getLogoMimeType(),
                'logoBaseName' => $model->getLogoBaseName(),
                'postalAddress' => $model->getPostalAddress(),
                'postalCode' => $model->getPostalCode(),
                'town' => $model->getTown(),
                'province' => $model->getProvince(),
                'country' => $model->getCountry(),
                'registryData' => $model->getRegistryData(),
            );
        } else {
            $result = array();
            foreach ($fields as $fieldData) {
                $trimField = trim($fieldData);
                if (!empty($trimField)) {
                    if (strpos($trimField, ":") !== false) {
                        list($field,$params) = explode(":", $trimField, 2);
                    } else {
                        $field = $trimField;
                        $params = null;
                    }
                    $get = 'get' . ucfirst($field);
                    $value = $model->$get($params);

                    if (is_array($value) || is_object($value)) {
                        if (is_array($value) || $value instanceof Traversable) {
                            foreach ($value as $key => $item) {
                                if ($item instanceof \IvozProvider\Model\Raw\ModelAbstract) {
                                    $value[$key] = $item->toArray();
                                }
                            }
                        } else if ($value instanceof \IvozProvider\Model\Raw\ModelAbstract) {
                            $value = $value->toArray();
                        }
                    }
                    $result[lcfirst($field)] = $value;
                }
            }
        }

        return $result;

    }

    /**
     * Returns the DbTable class associated with this mapper
     *
     * @return IvozProvider\\Mapper\\Sql\\DbTable\\Brands
     */
    public function getDbTable()
    {
        if (is_null($this->_dbTable)) {
            $this->setDbTable('IvozProvider\\Mapper\\Sql\\DbTable\\Brands');
        }

        return $this->_dbTable;
    }

    /**
     * Deletes the current model
     *
     * @param IvozProvider\Model\Raw\Brands $model The model to delete
     * @see IvozProvider\Mapper\DbTable\TableAbstract::delete()
     * @return int
     */
    public function delete(\IvozProvider\Model\Raw\ModelAbstract $model)
    {
        if (!$model instanceof \IvozProvider\Model\Raw\Brands) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \\IvozProvider\\Model\\Brands object in delete for " . get_class($this);
            } else {
                $message = "$model is not a \\IvozProvider\\Model\\Brands object in delete for " . get_class($this);
            }

            $this->_logger->log($message, \Zend_Log::ERR);
            throw new \Exception('Unable to delete: invalid model passed to mapper', 2000);
        }

        $useTransaction = true;

        $dbTable = $this->getDbTable();
        $dbAdapter = $dbTable->getAdapter();

        try {

            $dbAdapter->beginTransaction();

        } catch (\Exception $e) {

            //Transaction already started
            $useTransaction = false;
        }

        try {

            //onDeleteCascades emulation
            if ($this->_simulateReferencialActions && count($deleteCascade = $model->getOnDeleteCascadeRelationships()) > 0) {

                $depList = $model->getDependentList();

                foreach ($deleteCascade as $fk) {

                    $capitalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'IvozProvider\\Mapper\\Sql\\DbTable\\' . $depList[$capitalizedFk]["table_name"];
                        $depMapperName = 'IvozProvider\\Mapper\\Sql\\' . $depList[$capitalizedFk]["table_name"];
                        $depModelName = 'IvozProvider\\Model\\' . $depList[$capitalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('IvozProvider\\Mapper\\Sql\\DbTable\\Brands', $capitalizedFk);

                            $targetColumn = array_shift($references["columns"]);
                            $where = $relDbAdapter->getAdapter()->quoteInto($targetColumn . ' = ?', $model->getPrimaryKey());

                            $depMapper = new $depMapperName;
                            $depObjects = $depMapper->fetchList($where);

                            if (count($depObjects) === 0) {

                                continue;
                            }

                            foreach ($depObjects as $item) {

                                $item->delete();
                            }
                        }
                    }
                }
            }

            //onDeleteSetNull emulation
            if ($this->_simulateReferencialActions && count($deleteSetNull = $model->getOnDeleteSetNullRelationships()) > 0) {

                $depList = $model->getDependentList();

                foreach ($deleteSetNull as $fk) {

                    $capitalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'IvozProvider\\Mapper\\Sql\\DbTable\\' . $depList[$capitalizedFk]["table_name"];
                        $depMapperName = 'IvozProvider\\Mapper\\Sql\\' . $depList[$capitalizedFk]["table_name"];
                        $depModelName = 'IvozProvider\\Model\\' . $depList[$capitalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('IvozProvider\\Mapper\\Sql\\DbTable\\Brands', $capitalizedFk);

                            $targetColumn = array_shift($references["columns"]);
                            $where = $relDbAdapter->getAdapter()->quoteInto($targetColumn . ' = ?', $model->getPrimaryKey());

                            $depMapper = new $depMapperName;
                            $depObjects = $depMapper->fetchList($where);

                            if (count($depObjects) === 0) {

                                continue;
                            }

                            foreach ($depObjects as $item) {

                                $setterName = 'set' . ucfirst($targetColumn);
                                $item->$setterName(null);
                                $item->save();
                            } //end foreach

                        } //end if
                    } //end else

                }//end foreach ($deleteSetNull as $fk)
            } //end if

            $where = $dbAdapter->quoteInto($dbAdapter->quoteIdentifier('id') . ' = ?', $model->getId());
            $result = $dbTable->delete($where);

            if ($this->_cache) {

                $this->_cache->remove(get_class($model) . "_" . $model->getPrimarykey());
            }

            $fileObjects = array();
            $availableObjects = $model->getFileObjects();

            foreach ($availableObjects as $fso) {

                $removeMethod = 'remove' . $fso;
                $model->$removeMethod();
            }


            if ($useTransaction) {
                $dbAdapter->commit();
            }
        } catch (\Exception $exception) {

            $message = 'Exception encountered while attempting to delete ' . get_class($this);
            if (!empty($where)) {
                $message .= ' Where: ';
                $message .= $where;
            } else {
                $message .= ' with an empty where';
            }

            $message .= ' Exception: ' . $exception->getMessage();
            $this->_logger->log($message, \Zend_Log::ERR);
            $this->_logger->log($exception->getTraceAsString(), \Zend_Log::DEBUG);

            if ($useTransaction) {

                $dbAdapter->rollback();
            }

            throw $exception;
        }


        return $result;

    }

    /**
     * Saves current row
     * @return integer primary key for autoincrement fields if the save action was successful
     */
    public function save(\IvozProvider\Model\Raw\Brands $model, $forceInsert = false)
    {
        return $this->_save($model, false, false, null, $forceInsert);
    }

    /**
     * Saves current and all dependent rows
     *
     * @param \IvozProvider\Model\Raw\Brands $model
     * @param boolean $useTransaction Flag to indicate if save should be done inside a database transaction
     * @return integer primary key for autoincrement fields if the save action was successful
     */
    public function saveRecursive(\IvozProvider\Model\Raw\Brands $model, $useTransaction = true,
            $transactionTag = null, $forceInsert = false)
    {
        return $this->_save($model, true, $useTransaction, $transactionTag, $forceInsert);
    }

    protected function _save(\IvozProvider\Model\Raw\Brands $model,
        $recursive = false, $useTransaction = true, $transactionTag = null, $forceInsert = false
    )
    {
        $this->_setCleanUrlIdentifiers($model);

        $fileObjects = array();

        $availableObjects = $model->getFileObjects();

        foreach ($availableObjects as $item) {

            $objectMethod = 'fetch' . $item;
            $fso = $model->$objectMethod(false);
            $specMethod = 'get' . $item . 'Specs';
            $fileSpects = $model->$specMethod();

            $fileSizeSetter = 'set' . $fileSpects['sizeName'];
            $baseNameSetter = 'set' . $fileSpects['baseNameName'];
            $mimeTypeSetter = 'set' . $fileSpects['mimeName'];

            if (!is_null($fso) && $fso->mustFlush()) {

                $fileObjects[$item] = $fso;

                $model->$fileSizeSetter($fso->getSize())
                      ->$baseNameSetter($fso->getBaseName())
                      ->$mimeTypeSetter($fso->getMimeType());
            }

            if (is_null($fso)) {
                $model->$fileSizeSetter(null)
                ->$baseNameSetter(null)
                ->$mimeTypeSetter(null);
            }
        }

        $data = $model->sanitize()->toArray();

        $primaryKey = $model->getId();
        $success = true;

        if ($useTransaction) {

            try {

                if ($recursive && is_null($transactionTag)) {

                    //$this->getDbTable()->getAdapter()->query('SET transaction_allow_batching = 1');
                }

                $this->getDbTable()->getAdapter()->beginTransaction();

            } catch (\Exception $e) {

                //transaction already started
            }


            $transactionTag = 't_' . rand(1, 999) . str_replace(array('.', ' '), '', microtime());
        }

        if (!$forceInsert) {
            unset($data['id']);
        }

        try {
            if (is_null($primaryKey) || empty($primaryKey) || $forceInsert) {
                if (is_null($primaryKey) || empty($primaryKey)) {
                }
                $primaryKey = $this->getDbTable()->insert($data);

                if ($primaryKey) {
                    $model->setId($primaryKey);
                } else {
                    throw new \Exception("Insert sentence did not return a valid primary key", 9000);
                }

                if ($this->_cache) {

                    $parentList = $model->getParentList();

                    foreach ($parentList as $constraint => $values) {

                        $refTable = $this->getDbTable();

                        $ref = $refTable->getReference('IvozProvider\\Mapper\\Sql\\DbTable\\' . $values["table_name"], $constraint);
                        $column = array_shift($ref["columns"]);

                        $cacheHash = 'IvozProvider\\Model\\' . $values["table_name"] . '_' . $data[$column] .'_' . $constraint;

                        if ($this->_cache->test($cacheHash)) {

                            $cachedRelations = $this->_cache->load($cacheHash);
                            $cachedRelations->results[] = $primaryKey;

                            if ($useTransaction) {

                                $this->_cache->save($cachedRelations, $cacheHash, array($transactionTag));

                            } else {

                                $this->_cache->save($cachedRelations, $cacheHash);
                            }
                        }
                    }
                }
            } else {
                $this->getDbTable()
                     ->update(
                         $data,
                         array(
                             $this->getDbTable()->getAdapter()->quoteIdentifier('id') . ' = ?' => $primaryKey
                         )
                     );
            }

            if (!empty($primaryKey) && !empty($fileObjects)) {

                foreach ($fileObjects as $key => $fso) {

                    $baseName = $fso->getBaseName();
                    if (!empty($baseName)) {
                        $fso->flush($primaryKey);
                    }
                }
            }


            if ($recursive) {
                if ($model->getBrandOperators(null, null, true) !== null) {
                    $brandOperators = $model->getBrandOperators();

                    if (!is_array($brandOperators)) {

                        $brandOperators = array($brandOperators);
                    }

                    foreach ($brandOperators as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getBrandURLs(null, null, true) !== null) {
                    $brandURLs = $model->getBrandURLs();

                    if (!is_array($brandURLs)) {

                        $brandURLs = array($brandURLs);
                    }

                    foreach ($brandURLs as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getBrandsRelLanguages(null, null, true) !== null) {
                    $brandsRelLanguages = $model->getBrandsRelLanguages();

                    if (!is_array($brandsRelLanguages)) {

                        $brandsRelLanguages = array($brandsRelLanguages);
                    }

                    foreach ($brandsRelLanguages as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getCompanies(null, null, true) !== null) {
                    $companies = $model->getCompanies();

                    if (!is_array($companies)) {

                        $companies = array($companies);
                    }

                    foreach ($companies as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getGenericCallACLPatterns(null, null, true) !== null) {
                    $genericCallACLPatterns = $model->getGenericCallACLPatterns();

                    if (!is_array($genericCallACLPatterns)) {

                        $genericCallACLPatterns = array($genericCallACLPatterns);
                    }

                    foreach ($genericCallACLPatterns as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getGenericMusicOnHold(null, null, true) !== null) {
                    $genericMusicOnHold = $model->getGenericMusicOnHold();

                    if (!is_array($genericMusicOnHold)) {

                        $genericMusicOnHold = array($genericMusicOnHold);
                    }

                    foreach ($genericMusicOnHold as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getGenericServices(null, null, true) !== null) {
                    $genericServices = $model->getGenericServices();

                    if (!is_array($genericServices)) {

                        $genericServices = array($genericServices);
                    }

                    foreach ($genericServices as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getInvoiceTemplates(null, null, true) !== null) {
                    $invoiceTemplates = $model->getInvoiceTemplates();

                    if (!is_array($invoiceTemplates)) {

                        $invoiceTemplates = array($invoiceTemplates);
                    }

                    foreach ($invoiceTemplates as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getInvoices(null, null, true) !== null) {
                    $invoices = $model->getInvoices();

                    if (!is_array($invoices)) {

                        $invoices = array($invoices);
                    }

                    foreach ($invoices as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getLcrRuleTarget(null, null, true) !== null) {
                    $lcrRuleTarget = $model->getLcrRuleTarget();

                    if (!is_array($lcrRuleTarget)) {

                        $lcrRuleTarget = array($lcrRuleTarget);
                    }

                    foreach ($lcrRuleTarget as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getLcrRules(null, null, true) !== null) {
                    $lcrRules = $model->getLcrRules();

                    if (!is_array($lcrRules)) {

                        $lcrRules = array($lcrRules);
                    }

                    foreach ($lcrRules as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getOutgoingRouting(null, null, true) !== null) {
                    $outgoingRouting = $model->getOutgoingRouting();

                    if (!is_array($outgoingRouting)) {

                        $outgoingRouting = array($outgoingRouting);
                    }

                    foreach ($outgoingRouting as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getPeerServers(null, null, true) !== null) {
                    $peerServers = $model->getPeerServers();

                    if (!is_array($peerServers)) {

                        $peerServers = array($peerServers);
                    }

                    foreach ($peerServers as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getPeeringContracts(null, null, true) !== null) {
                    $peeringContracts = $model->getPeeringContracts();

                    if (!is_array($peeringContracts)) {

                        $peeringContracts = array($peeringContracts);
                    }

                    foreach ($peeringContracts as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getPricingPlans(null, null, true) !== null) {
                    $pricingPlans = $model->getPricingPlans();

                    if (!is_array($pricingPlans)) {

                        $pricingPlans = array($pricingPlans);
                    }

                    foreach ($pricingPlans as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getPricingPlansRelCompanies(null, null, true) !== null) {
                    $pricingPlansRelCompanies = $model->getPricingPlansRelCompanies();

                    if (!is_array($pricingPlansRelCompanies)) {

                        $pricingPlansRelCompanies = array($pricingPlansRelCompanies);
                    }

                    foreach ($pricingPlansRelCompanies as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getPricingPlansRelTargetPatterns(null, null, true) !== null) {
                    $pricingPlansRelTargetPatterns = $model->getPricingPlansRelTargetPatterns();

                    if (!is_array($pricingPlansRelTargetPatterns)) {

                        $pricingPlansRelTargetPatterns = array($pricingPlansRelTargetPatterns);
                    }

                    foreach ($pricingPlansRelTargetPatterns as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getTargetGroups(null, null, true) !== null) {
                    $targetGroups = $model->getTargetGroups();

                    if (!is_array($targetGroups)) {

                        $targetGroups = array($targetGroups);
                    }

                    foreach ($targetGroups as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getTargetPatterns(null, null, true) !== null) {
                    $targetPatterns = $model->getTargetPatterns();

                    if (!is_array($targetPatterns)) {

                        $targetPatterns = array($targetPatterns);
                    }

                    foreach ($targetPatterns as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getTransformationRulesetGroupsTrunks(null, null, true) !== null) {
                    $transformationRulesetGroupsTrunks = $model->getTransformationRulesetGroupsTrunks();

                    if (!is_array($transformationRulesetGroupsTrunks)) {

                        $transformationRulesetGroupsTrunks = array($transformationRulesetGroupsTrunks);
                    }

                    foreach ($transformationRulesetGroupsTrunks as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getTransformationRulesetGroupsUsers(null, null, true) !== null) {
                    $transformationRulesetGroupsUsers = $model->getTransformationRulesetGroupsUsers();

                    if (!is_array($transformationRulesetGroupsUsers)) {

                        $transformationRulesetGroupsUsers = array($transformationRulesetGroupsUsers);
                    }

                    foreach ($transformationRulesetGroupsUsers as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getKamTrunksUacreg(null, null, true) !== null) {
                    $kamTrunksUacreg = $model->getKamTrunksUacreg();

                    if (!is_array($kamTrunksUacreg)) {

                        $kamTrunksUacreg = array($kamTrunksUacreg);
                    }

                    foreach ($kamTrunksUacreg as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

                if ($model->getParsedCDRs(null, null, true) !== null) {
                    $parsedCDRs = $model->getParsedCDRs();

                    if (!is_array($parsedCDRs)) {

                        $parsedCDRs = array($parsedCDRs);
                    }

                    foreach ($parsedCDRs as $value) {
                        $value->setBrandId($primaryKey)
                              ->saveRecursive(false, $transactionTag);
                    }
                }

            }

            if ($success === true) {

                foreach ($model->getOrphans() as $itemToDelete) {

                    $itemToDelete->delete();
                }

                $model->resetOrphans();
            }

            if ($useTransaction && $success) {

                $this->getDbTable()->getAdapter()->commit();

            } elseif ($useTransaction) {

                $this->getDbTable()->getAdapter()->rollback();

                if ($this->_cache) {

                    $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG, array($transactionTag));
                }
            }

        } catch (\Exception $e) {
            $message = 'Exception encountered while attempting to save ' . get_class($this);
            if (!empty($primaryKey)) {
                $message .= ' id: ' . $primaryKey;
            } else {
                $message .= ' with an empty primary key ';
            }

            $message .= ' Exception: ' . $e->getMessage();
            $this->_logger->log($message, \Zend_Log::ERR);
            $this->_logger->log($e->getTraceAsString(), \Zend_Log::DEBUG);

            if ($useTransaction) {
                $this->getDbTable()->getAdapter()->rollback();

                if ($this->_cache) {

                    if ($transactionTag) {

                        $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG, array($transactionTag));

                    } else {

                        $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG);
                    }
                }
            }

            throw $e;
        }

        if ($success && $this->_cache) {

            if ($useTransaction) {

                $this->_cache->save($model->toArray(), get_class($model) . "_" . $model->getPrimaryKey(), array($transactionTag));

            } else {

                $this->_cache->save($model->toArray(), get_class($model) . "_" . $model->getPrimaryKey());
            }
        }


        if ($success === true) {
            return $primaryKey;
        }

        return $success;
    }

    /**
     * Loads the model specific data into the model object
     *
     * @param \Zend_Db_Table_Row_Abstract|array $data The data as returned from a \Zend_Db query
     * @param IvozProvider\Model\Raw\Brands|null $entry The object to load the data into, or null to have one created
     * @return IvozProvider\Model\Raw\Brands The model with the data provided
     */
    public function loadModel($data, $entry = null)
    {
        if (!$entry) {
            $entry = new \IvozProvider\Model\Brands();
        }

        // We don't need to log changes as we will reset them later...
        $entry->stopChangeLog();

        if (is_array($data)) {
            $entry->setId($data['id'])
                  ->setName($data['name'])
                  ->setNif($data['nif'])
                  ->setExtensionBlackListRegExp($data['extensionBlackListRegExp'])
                  ->setDomain($data['domain'])
                  ->setDefaultTimezoneId($data['defaultTimezoneId'])
                  ->setLogoFileSize($data['logoFileSize'])
                  ->setLogoMimeType($data['logoMimeType'])
                  ->setLogoBaseName($data['logoBaseName'])
                  ->setPostalAddress($data['postalAddress'])
                  ->setPostalCode($data['postalCode'])
                  ->setTown($data['town'])
                  ->setProvince($data['province'])
                  ->setCountry($data['country'])
                  ->setRegistryData($data['registryData']);
        } else if ($data instanceof \Zend_Db_Table_Row_Abstract || $data instanceof \stdClass) {
            $entry->setId($data->{'id'})
                  ->setName($data->{'name'})
                  ->setNif($data->{'nif'})
                  ->setExtensionBlackListRegExp($data->{'extensionBlackListRegExp'})
                  ->setDomain($data->{'domain'})
                  ->setDefaultTimezoneId($data->{'defaultTimezoneId'})
                  ->setLogoFileSize($data->{'logoFileSize'})
                  ->setLogoMimeType($data->{'logoMimeType'})
                  ->setLogoBaseName($data->{'logoBaseName'})
                  ->setPostalAddress($data->{'postalAddress'})
                  ->setPostalCode($data->{'postalCode'})
                  ->setTown($data->{'town'})
                  ->setProvince($data->{'province'})
                  ->setCountry($data->{'country'})
                  ->setRegistryData($data->{'registryData'});

        } else if ($data instanceof \IvozProvider\Model\Raw\Brands) {
            $entry->setId($data->getId())
                  ->setName($data->getName())
                  ->setNif($data->getNif())
                  ->setExtensionBlackListRegExp($data->getExtensionBlackListRegExp())
                  ->setDomain($data->getDomain())
                  ->setDefaultTimezoneId($data->getDefaultTimezoneId())
                  ->setLogoFileSize($data->getLogoFileSize())
                  ->setLogoMimeType($data->getLogoMimeType())
                  ->setLogoBaseName($data->getLogoBaseName())
                  ->setPostalAddress($data->getPostalAddress())
                  ->setPostalCode($data->getPostalCode())
                  ->setTown($data->getTown())
                  ->setProvince($data->getProvince())
                  ->setCountry($data->getCountry())
                  ->setRegistryData($data->getRegistryData());

        }

        $entry->resetChangeLog()->initChangeLog()->setMapper($this);

        return $entry;
    }
}