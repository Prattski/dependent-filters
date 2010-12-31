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
 * Adminhtml Attribute Edit Block
 *
 * @category    Prattski
 * @package     Prattski_DependentFilters
 */
class Prattski_DependentFilters_Block_Adminhtml_Catalog_Product_Attribute_Edit_Tab_Main extends Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit_Tab_Main
{
	/**
     * Adds new fields to the attribute edit view for dependent filters
     * 
     * @return Prattski_DependentFilters_Block_Adminhtml_Catalog_Product_Attribute_Edit_Tab_Main
     */
    protected function _prepareForm()
    {
    	parent::_prepareForm();
    	$attributeObject = $this->getAttributeObject();
    	$form = $this->getForm();
		$fieldset = $form->getElement('base_fieldset');
		$yesno = Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray();
        
        $fieldset->addField('depends_on', 'depends', array(
            'name'        => 'depends_on[]',
            'label'       => Mage::helper('catalog')->__('Depends On'),
        	'note'		  => 'This attribute must be a filterable attribute for this to have any effect.  Any filter options that are selected here will have to have been chosen on the frontend for this filter to show up on the frontend.',
            'values'      => Prattski_DependentFilters_Model_Catalog_Layer_Filters::getOptions(),
            'mode_labels' => array(
                'all'     => Mage::helper('catalog')->__('None'),
                'custom'  => Mage::helper('catalog')->__('Select Filter(s)')
            ),
            'required'    => false
        ), 'frontend_class');
        
    	$form->getElement('depends_on')->setSize(10);

        if ($dependsOn = $attributeObject->getDependsOn()) {
            $dependsOn = is_array($dependsOn) ? $dependsOn : explode(',', $dependsOn);
            $form->getElement('depends_on')->setValue($dependsOn);
        } else {
            $form->getElement('depends_on')->addClass('no-display ignore-validate');
        }
    	
    	return $this;
    }
    
	/**
     * Retrieve additional element types for product attributes
     *
     * @return array
     */
    protected function _getAdditionalElementTypes()
    {
    	$array = array();
    	$array = parent::_getAdditionalElementTypes();
    	
    	$array['depends'] = Mage::getConfig()->getBlockClassName('prattski_dependentfilters/adminhtml_catalog_product_helper_form_depends');
    	
    	return $array;
    	
    }
}