<?php
class Lb1_PickUpAtPoint_Block_Adminhtml_Point
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        parent::_construct();

        $this->_blockGroup = 'lb1_pickupatpoint_adminhtml';
        $this->_controller = 'point';
        $this->_headerText = $this->helper('lb1_pickupatpoint')->__('Points');
    }

    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        return $this->getUrl('lb1_pickupatpoint_admin/point/edit');
    }
}