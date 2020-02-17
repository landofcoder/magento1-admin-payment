<?php
/**
 * IDEALIAGroup srl
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@idealiagroup.com so we can send you a copy immediately.
 *
 * @category   Lof
 * @package    Lof_AdminPayment
 * @copyright  Copyright (c) 2014 IDEALIAGroup srl (http://www.idealiagroup.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
 
class Lof_AdminPayment_Block_Admin_Rule extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	protected $zoneType=null;
	
 	public function _construct()
    {
    	$this->zoneType = Mage::registry('lof_adminpayment_zone');
    	$zoneType = ucfirst($this->zoneType);
    	
    	$this->_blockGroup = 'lof_adminpayment';
    	$this->_controller = 'admin_rule';
    	$this->_headerText = Mage::helper('lof_adminpayment')->__('Lof Admin Payment prices - '.$zoneType.' fee');
    	$this->_addButtonLabel = Mage::helper('lof_adminpayment')->__('Add New Price Rule');
    	    	    	
    	parent::_construct();
    }
}