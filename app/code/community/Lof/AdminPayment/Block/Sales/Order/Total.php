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

class Lof_AdminPayment_Block_Sales_Order_Total extends Mage_Sales_Block_Order_Totals
{
	public function initTotals(){
		$order = $this->getParentBlock()->getOrder();
		if($order->getMspAdminpayment() > 0){
			$this->getParentBlock()->addTotal(new Varien_Object(array(
					'code'  => 'lof_adminpayment',
					'value' => $order->getMspAdminpayment(),
					'base_value'    => $order->getMspBaseAdminpayment(),
					'label' => Mage::helper('lof_adminpayment')->__('Admin Payment'),
			)),'subtotal');
		}
	}
}