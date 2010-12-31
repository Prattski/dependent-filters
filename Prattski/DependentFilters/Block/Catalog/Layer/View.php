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
 * Filter output block
 *
 * @category    Prattski
 * @package     Prattski_DependentFilters
 */
class Prattski_DependentFilters_Block_Catalog_Layer_View extends Mage_Catalog_Block_Layer_View
{
    /**
     * Get all layer filters
     *
     * @return array
     */
    public function getFilters()
    {
        // Get currently active filters
        $activeArray = array();
        $_activeFilters = Mage::getSingleton('Mage_Catalog_Block_Layer_State')->getActiveFilters();
        foreach ($_activeFilters as $_active) {
            $activeArray[] = $_active->getValue();
        }

        $filters = array();
        if ($categoryFilter = $this->_getCategoryFilter()) {
            $filters[] = $categoryFilter;
        }

        // Get all filterable attributes
        $filterableAttributes = $this->_getFilterableAttributes();

        // Only allow any dependent filters in if the dependency
        // has already been selected.
        foreach ($filterableAttributes as $attribute) {
            $depends = $attribute->getDependsOn();
            if (!empty($depends)) {
                if (array_intersect($depends, $activeArray)) {
                    $filters[] = $this->getChild($attribute->getAttributeCode() . '_filter');
                }
            } else {
                $filters[] = $this->getChild($attribute->getAttributeCode() . '_filter');
            }
        }
        return $filters;
    }
}