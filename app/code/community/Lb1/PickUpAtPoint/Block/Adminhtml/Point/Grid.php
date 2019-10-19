<?php

class Lb1_PickUpAtPoint_Block_Adminhtml_Point_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * @return Lb1_PickUpAtPoint_Helper_Data
     */
    protected function _getHelper()
    {
        return $this->helper('lb1_pickupatpoint');
    }

    /**
     * @inheritDoc
     */
    protected function _prepareCollection()
    {
        /**
         * @var Lb1_PickUpAtPoint_Model_Resource_Point_Collection $collection
         */
        $collection = Mage::getModel('lb1_pickupatpoint/point')->getCollection();

        $this->setCollection($collection);
        $this->setDefaultSort('updated_at');
        $this->setDefaultDir('DESC');

        return parent::_prepareCollection();
    }

    /**
     * @inheritDoc
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', [
            'header' => $this->_getHelper()->__('ID'),
            'type' => 'number',
            'index' => 'entity_id',
        ]);

        $this->addColumn('first_name', [
            'header' => $this->_getHelper()->__('First name'),
            'type' => 'text',
            'index' => 'first_name',
        ]);

        $this->addColumn('last_name', [
            'header' => $this->_getHelper()->__('Last name'),
            'type' => 'text',
            'index' => 'last_name',
        ]);

        $this->addColumn('street_name', [
            'header' => $this->_getHelper()->__('Street name'),
            'type' => 'text',
            'index' => 'street_name',
        ]);

        $this->addColumn('street_number', [
            'header' => $this->_getHelper()->__('Street nr'),
            'type' => 'text',
            'index' => 'street_number',
        ]);

        $this->addColumn('flat_number', [
            'header' => $this->_getHelper()->__('Flat nr'),
            'type' => 'text',
            'index' => 'flat_number',
        ]);

        $this->addColumn('city', [
            'header' => $this->_getHelper()->__('City'),
            'type' => 'text',
            'index' => 'city',
        ]);

        $this->addColumn('post_code', [
            'header' => $this->_getHelper()->__('Post code'),
            'type' => 'text',
            'index' => 'post_code',
        ]);

        $this->addColumn('phone_number', [
            'header' => $this->_getHelper()->__('Phone number'),
            'type' => 'text',
            'index' => 'city',
        ]);

        $this->addColumn('created_at', [
            'header' => $this->_getHelper()->__('Created at'),
            'type' => 'datetime',
            'index' => 'created_at',
        ]);

        $this->addColumn('updated_at', [
            'header' => $this->_getHelper()->__('Updated at'),
            'type' => 'datetime',
            'index' => 'updated_at',
        ]);

        $this->addColumn('visibility', [
            'header' => $this->_getHelper()->__('Visibility'),
            'type' => 'options',
            'index' => 'visibility',
            'options' => Mage::getSingleton('lb1_pickupatpoint/point')->getAvailableVisibilities()
        ]);

        $this->addColumn('action', [
            'header' => $this->_getHelper()->__('Action'),
            'type' => 'action',
            'actions' => [
                [
                    'caption' => $this->_getHelper()->__('Edit'),
                    'url' => [
                        'base' => '*/*/edit',
                    ],
                    'field' => 'id'
                ],
                [
                    'caption' => $this->_getHelper()->__('Delete'),
                    'url' => [
                        'base' => '*/*/delete',
                    ],
                    'field' => 'id'
                ],
            ],
            'filter' => false,
            'sortable' => false,
            'index' => 'entity_id',
        ]);

        return parent::_prepareColumns();
    }

    /**
     * @param Lb1_PickUpAtPoint_Model_Point $row
     * @return string
     */
    public function getRowUrl(Lb1_PickUpAtPoint_Model_Point $row)
    {
        return $this->getUrl('lb1_pickupatpoint_admin/point/edit', ['id' => $row->getId()]);
    }
}