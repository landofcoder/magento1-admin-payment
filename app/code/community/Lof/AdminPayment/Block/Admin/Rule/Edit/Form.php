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

class Lof_AdminPayment_Block_Admin_Rule_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected $zoneType = null;

	protected function _construct() {
		parent::_construct();
		$this->zoneType = Mage::registry('lof_adminpayment_zone');
	}

	protected function getRule()
	{
		return Mage::registry('lof_adminpayment_data');
	}

	protected function _prepareForm()
	{
		$values = array();
		if (!$this->getRule() || !$this->getRule()->getId()) // Default values
		{
			$values = array(
					'amount_from' => 0
			);
		}
		else
		{
			$values = $this->getRule()->getData();
		}

		$form = new Varien_Data_Form(array(
				'id'		=> 'edit_form',
				'action'	=> $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
				'method'	=> 'post',
		));

		$fieldset = $form->addFieldset('lof_adminpayment_', array('legend' => Mage::helper('lof_adminpayment')->__('Admin Payment fee')));

		$fieldset->addField('amount_from', 'text', array(
				'label'     => Mage::helper('lof_adminpayment')->__('Apply from amount'),
				'required'  => true,
				'name'      => 'amount_from',
		));

		$fieldset->addField('fixed_fee', 'text', array(
				'label'     => Mage::helper('lof_adminpayment')->__('Fixed Fee'),
				'required'  => false,
				'name'      => 'fixed_fee',
		));

		$fieldset->addField('percent_fee', 'text', array(
				'label'     => Mage::helper('lof_adminpayment')->__('Percentual Fee'),
				'required'  => false,
				'name'      => 'percent_fee',
		));

		if (Mage::getSingleton('adminhtml/session')->getMspAdminpaymentData())
		{
			$form->setValues(Mage::getSingleton('adminhtml/session')->getMspAdminpaymentData());
			Mage::getSingleton('adminhtml/session')->getMspAdminpaymentData(null);
		}
		elseif (Mage::registry('lof_adminpayment'))
		{
			die("i dati ci sono!");
			$form->setValues(Mage::registry('lof_adminpayment_data')->getData());
		}
		$form->setValues($values);

		$form->setUseContainer(true);
		$this->setForm($form);

		return parent::_prepareForm();
	}
}