<?php

class Lb1_PickUpAtPoint_Block_Onepage_Shipping_Method_Available
    extends Mage_Checkout_Block_Onepage_Shipping_Method_Available
{
    /**
     * Return available points collection
     *
     * @return Lb1_PickUpAtPoint_Model_Resource_Point_Collection
     */
    public function getAvailablePoints()
    {
        return Mage::getModel('lb1_pickupatpoint/point')
            ->getCollection()
            ->addVisibilityToFilter();
    }

    /**
     * Return code of 'pick up at point' carrier
     *
     * @return string
     */
    public function getPickUpAtPointCarrierCode()
    {
        return (string) Mage::getModel('lb1_pickupatpoint/carrier')
            ->getCarrierCode();
    }
}
