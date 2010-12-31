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
 * EAV resource setup
 *
 * @category    Prattski
 * @package     Prattski_DependentFilters
 */
class Prattski_DependentFilters_Model_Resource_Eav_Mysql4_Setup extends Mage_Catalog_Model_Resource_Eav_Mysql4_Setup
{
    /**
     * Prepare catalog attribute values to save
     *
     * @param array $attr
     * @return array
     */
    protected function _prepareValues($attr)
    {
        $data = parent::_prepareValues($attr);
        $data = array_merge($data, array(
            'depends_on'   => $this->_getValue($attr, 'depends_on', '')
        ));
        
        return $data;
    }
}