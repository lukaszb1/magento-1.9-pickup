<?php

class Lb1_PickUpAtPoint_Model_Observer
    extends Mage_Core_Model_Abstract
{
    /**
     * Update the delivery address if pick up at point has been selected
     * @param Varien_Event_Observer $observer
     * @return void
     * @throws Exception
     */
    public function checkoutControllerOnepageSaveShippingMethodAfter(Varien_Event_Observer $observer)
    {
        /**
         * @var Mage_Sales_Model_Quote $address
         */
        $quote = $observer->getQuote();

        $current = $quote->getShippingAddress()->getShippingMethod();
        $target = Mage::getModel('lb1_pickupatpoint/carrier')->getCarrierCode();

        if (strpos($current, $target) !== false) {
            if (!$pointId = (int) $observer->getRequest()->getParam('shipping_point_id')) {
                throw new Exception('Invalid data.');
            }

            $point = Mage::getModel('lb1_pickupatpoint/point')->load($pointId);

            if (!$point->getId()) {
                throw new Exception('Point not found.');
            }

            $quote->setShippingAddress($point->getShippingAddress());
            $quote->save();
        }
    }
}