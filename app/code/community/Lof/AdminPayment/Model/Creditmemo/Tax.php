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

class Lof_AdminPayment_Model_Creditmemo_Tax extends Mage_Sales_Model_Order_Creditmemo_Total_Tax
{
	protected $_code = 'lof_adminpayment_tax';

	public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
	{
		$_helper = Mage::helper('lof_adminpayment');
		$_model = Mage::getModel('lof_adminpayment/adminpayment');
		$order = $creditmemo->getOrder();
		
		$baseAmount = $order->getMspBaseAdminpayment();
		$baseAmountInclTax = $order->getMspBaseAdminpaymentInclTax();
		$amount = $order->getMspAdminpayment();
		$amountInclTax = $order->getMspAdminpaymentInclTax();
		
		$codTax = $amountInclTax - $amount;
		$codBaseTax = $baseAmountInclTax - $baseAmount;
		
		$creditmemo->setTaxAmount($creditmemo->getTaxAmount() + $codTax);
		$creditmemo->setBaseTaxAmount($creditmemo->getBaseTaxAmount() + $codBaseTax);
		$creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $codTax);
		$creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $codBaseTax);
		
		return $this;
	}

	public function fetch(Mage_Sales_Model_Quote_Address $address)
	{
		return $this;
	}
}
