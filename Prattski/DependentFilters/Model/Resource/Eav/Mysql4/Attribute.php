<?php
/**
 * Prattski
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA that can
 * be found on the web at the following URL:
 * http://store.prattski.com/LICENSE.txt
 *
 * @category   Prattski
 * @package    Prattski_DependentFilters
 * @copyright  Copyright (c) 2010-2011 Prattski (http://prattski.com/)
 * @license    http://store.prattski.com/LICENSE.txt
 */

/**
 * EAV attribute resource model
 *
 * @category    Prattski
 * @package     Prattski_DependentFilters
 */
class Prattski_DependentFilters_Model_Resource_Eav_Mysql4_Attribute extends Mage_Catalog_Model_Resource_Eav_Mysql4_Attribute
{
    /**
     * Perform actions before object save
     *
     * @param Mage_Core_Model_Abstract $object
     * @return Mage_Catalog_Model_Resource_Eav_Mysql4_Attribute
     */
    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
    	$dependsOn = $object->getDependsOn();
        if (is_array($dependsOn)) {
            $object->setDependsOn(implode(',', $dependsOn));
        }
        
        return parent::_beforeSave($object);
    }
}