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

class Lof_AdminPayment_Model_Quote_Total extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
	protected $_code = 'lof_adminpayment';

	public function collect(Mage_Sales_Model_Quote_Address $address)
	{
		$_helper = Mage::helper('lof_adminpayment');
		if (!$_helper->getSession()->getQuoteId()) return $this;
				
		parent::collect($address);
		$_model = Mage::getModel('lof_adminpayment/adminpayment');
		$quote = $address->getQuote();
		$baseAmount = $_model->getBaseExtraFee();
		$amount = $_model->getExtraFee();
		$baseAmountInclTax = $_model->getBaseExtraFeeInclTax();
		$amountInclTax = $_model->getExtraFeeInclTax();
				
		if (
		($_helper->getQuote()->getPayment()->getMethod() == $_model->getCode()) &&
		($address->getAddressType() == Mage_Sales_Model_Quote_Address::TYPE_SHIPPING)
		) {
			$address->setGrandTotal($address->getGrandTotal() + $amount);
			$address->setBaseGrandTotal($address->getBaseGrandTotal() + $baseAmount);
			
			$address->setMspAdminpayment($amount);
			$address->setMspBaseAdminpayment($baseAmount);
			$address->setMspAdminpaymentInclTax($amountInclTax);
			$address->setMspBaseAdminpaymentInclTax($baseAmountInclTax);
			$quote->setMspAdminpayment($amount);
			$quote->setMspBaseAdminpayment($baseAmount);
			$quote->setMspAdminpaymentInclTax($amountInclTax);
			$quote->setMspBaseAdminpaymentInclTax($baseAmountInclTax);
		}
		elseif($_helper->getQuote()->getPayment()->getMethod() != $_model->getCode()) {
					$address->setGrandTotal(0);
					$address->setBaseGrandTotal(0);
		
					$address->setMspAdminpayment(0);
					$address->setMspBaseAdminpayment(0);
					$address->setMspAdminpaymentInclTax(0);
					$address->setMspBaseAdminpaymentInclTax(0);
					$quote->setMspAdminpayment(0);
					$quote->setMspBaseAdminpayment(0);
					$quote->setMspAdminpaymentInclTax(0);
					$quote->setMspBaseAdminpaymentInclTax(0);
		
				}

		return $this;
	}

	public function fetch(Mage_Sales_Model_Quote_Address $address)
	{
		$_helper = Mage::helper('lof_adminpayment');
		if (!$_helper->getSession()->getQuoteId()) return $this;
		
		parent::fetch($address);

		if ($address->getAddressType() != Mage_Sales_Model_Quote_Address::TYPE_SHIPPING)
			return $this;

		$_model = Mage::getModel('lof_adminpayment/adminpayment');
		
		$amount = $_model->getExtraFeeForTotal();

		if ($amount > 0 && $_helper->getQuote()->getPayment()->getMethod() == $_model->getCode())
		{
	        $address->addTotal(array(
	            'code'  => $_model->getCode(),
	            'title' => $_helper->__('Cash On Delivery'),
	            'value' => $amount,
	        ));
		}
		
	    return $this;
	}

	/**
	 * Get Subtotal label
	 *
	 * @return string
	 */
	public function getLabel()
	{
		return Mage::helper('lof_adminpayment')->__('Cash On Delivery');
	}
}
