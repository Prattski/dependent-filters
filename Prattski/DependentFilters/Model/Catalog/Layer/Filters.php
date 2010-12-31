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
 * Catalog layer filter model
 *
 * @category    Prattski
 * @package     Prattski_DependentFilters
 */
class Prattski_DependentFilters_Model_Catalog_Layer_Filters
{
	/**
     * Get all options for all filterable product attributes
     * 
     * @return <type> 
     */
    static public function getOptions()
	{
		$r = Mage::getSingleton('core/resource')->getConnection('core_read');
        $result = $r->query('select * from `catalog_eav_attribute` as catalog left join `eav_attribute` as eav on catalog.attribute_id = eav.attribute_id');
        
        $data = array();
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        	if ($row['is_filterable']) {
        		
        		$options = $r->query('select o.option_id, v.value from `eav_attribute_option` as o 
        							  left join `eav_attribute_option_value` as v on o.option_id = v.option_id
        							  where o.attribute_id = '.$row['attribute_id'].'
        							  order by v.value');
        		
        		$optionsArray = array();
        		
        		while ($option = $options->fetch(PDO::FETCH_ASSOC)) {
        			$optionsArray[] = array(
        								'value' => $option['option_id'],
        								'label'	=> $option['value']);
        		}
        		
        		$data[] = array(
        				'value' => $optionsArray,
        				'label'	=> $row['frontend_label']
        				);
        	}
        }
        
        return $data;
	}
}