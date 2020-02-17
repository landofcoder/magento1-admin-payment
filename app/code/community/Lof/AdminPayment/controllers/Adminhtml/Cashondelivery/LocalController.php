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

require_once(BP.DS.'app'.DS.'code'.DS.'community'.DS.'Lof'.DS.'AdminPayment'.DS.'controllers'.DS.'Adminhtml'.DS.'AdminpaymentController.php');
class Lof_AdminPayment_Adminhtml_Adminpayment_LocalController extends Lof_AdminPayment_Adminhtml_AdminpaymentController
{
	protected $zoneType='local';
}