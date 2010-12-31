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
class Prattski_DependentFilters_Model_Resource_Eav_Attribute extends Mage_Catalog_Model_Resource_Eav_Attribute
{
	/**
     * Retrieve depends_on to products array
     * Return empty array if applied to all products
     *
     * @return array
     */
    public function getDependsOn()
    {
        if ($this->getData('depends_on')) {
            if (is_array($this->getData('depends_on'))) {
                return $this->getData('depends_on');
            }
            return explode(',', $this->getData('depends_on'));
        } else {
            return array();
        }
    }
}