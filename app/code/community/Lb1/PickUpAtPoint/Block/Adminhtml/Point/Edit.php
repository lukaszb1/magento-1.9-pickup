<?php
class Lb1_PickUpAtPoint_Block_Adminhtml_Point_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'lb1_pickupatpoint_adminhtml';
        $this->_controller = 'point';
        $this->_mode = 'edit';

        $newOrEdit = $this->getRequest()->getParam('id')
            ? $this->__('Edit')
            : $this->__('New');

        $this->_headerText =  $newOrEdit . ' ' . $this->__('Point');
    }
}