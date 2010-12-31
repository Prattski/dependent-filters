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
 * Adminhtml Attribute Edit Block Helper
 *
 * @category    Prattski
 * @package     Prattski_DependentFilters
 */
class Prattski_DependentFilters_Block_Adminhtml_Catalog_Product_Helper_Form_Depends extends Varien_Data_Form_Element_Multiselect
{
    /**
     * Build toggle select element (to enable/disable filter dependency)
     * 
     * @return string (html)
     */
    public function getElementHtml()
    {
        $elementAttributeHtml = '';

        if ($this->getReadonly()) {
            $elementAttributeHtml = $elementAttributeHtml . ' readonly="readonly"';
        }

        if ($this->getDisabled()) {
            $elementAttributeHtml = $elementAttributeHtml . ' disabled="disabled"';
        }

        $html = '<select onchange="toggleApplyVisibility(this)"' . $elementAttributeHtml . '>'
              . '<option value="0">' . $this->getModeLabels('all'). '</option>'
              . '<option value="1" ' . ($this->getValue()==null ? '' : 'selected') . '>' . $this->getModeLabels('custom'). '</option>'
              . '</select><br /><br />';

        $html .= parent::getElementHtml();
        return $html;
    }

    /**
     * Dublicate interface of Varien_Data_Form_Element_Abstract::setReadonly
     *
     * @param bool $readonly
     * @param bool $useDisabled
     * @return Mage_Adminhtml_Block_Catalog_Product_Helper_Form_Apply
     */
    public function setReadonly($readonly, $useDisabled = false)
    {
        $this->setData('readonly', $readonly);
        $this->setData('disabled', $useDisabled);
        return $this;
    }

}