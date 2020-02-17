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
 
class Lof_AdminPayment_Block_Admin_Rule_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	protected $zoneType = null;
	
	public function _construct()
	{
		parent::_construct();
		$this->zoneType = Mage::registry('lof_adminpayment_zone');
		$this->setId('adminpaymentGrid');
		$this->_controller = 'lof_adminpayment';
	}
	
	protected function _prepareCollection()
	{
 		$model = Mage::getModel('lof_adminpayment/'.$this->zoneType);
 		$collection = $model->getCollection();
 		$this->setCollection($collection);
 		
 		$this->setDefaultSort('amount_from');
		$this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);

		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		$this->addColumn('id', array(
			'header'        => Mage::helper('lof_adminpayment')->__('ID'),
			'align'         => 'right',
			'width'         => '50px',
			'index'         => 'lof_adminpayment_'.$this->zoneType.'_id',
		));
		
		$this->addColumn('from', array(
			'header'        => Mage::helper('lof_adminpayment')->__('From amount'),
			'align'         => 'left',
			'index'         => 'amount_from',
			'type'          => 'currency',
			'truncate'      => 50,
			'escape'        => true,
		));
		
		$this->addColumn('fixed_fee', array(
			'header'		=> Mage::helper('lof_adminpayment')->__('Fixed Fee'),
			'align'         => 'left',
			'index'         => 'fixed_fee',
			'type'          => 'currency',
			'truncate'      => 30,
			'escape'        => true,
        ));
        
		$this->addColumn('percent_fee', array(
				'header'		=> Mage::helper('lof_adminpayment')->__('Percentual Fee'),
				'align'         => 'left',
				'index'         => 'percent_fee',
				'type'          => 'currency',
				'truncate'      => 30,
				'escape'        => true,
		));

		$this->addColumn('action',
            array(
                'header'    => Mage::helper('lof_adminpayment')->__('Action'),
                'width'     => '100px',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(array(
                    'caption'   => Mage::helper('lof_adminpayment')->__('Edit'),
                    'url'       => array(
                        'base'=>'*/*/edit'
                    ),
                    'field'   => 'id'
                )),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'lof_adminpayment',
        ));
		
		return parent::_prepareColumns();
	}
	
	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/edit', array(
			'id' => $row->getId(),
		));
	}
}