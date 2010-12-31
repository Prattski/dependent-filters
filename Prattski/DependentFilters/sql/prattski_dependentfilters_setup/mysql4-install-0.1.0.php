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
 * Mysql installer
 *
 * @category    Prattski
 * @package     Prattski_DependentFilters
 */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->addColumn($installer->getTable('catalog_eav_attribute'), 'depends_on', 'varchar(255) NOT NULL');
$installer->endSetup();