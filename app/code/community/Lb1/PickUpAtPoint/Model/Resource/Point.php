<?php
class Lb1_PickUpAtPoint_Model_Resource_Point extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('lb1_pickupatpoint/point', 'entity_id');
    }
}