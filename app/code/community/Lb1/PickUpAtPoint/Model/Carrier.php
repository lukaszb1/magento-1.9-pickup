<?php

class Lb1_PickUpAtPoint_Model_Carrier
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'lb1_pickupatpoint';

    /**
     * @inheritDoc
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        /**
         * @var Mage_Shipping_Model_Rate_Result_Method $rate
         */
        $rate = Mage::getModel('shipping/rate_result_method');

        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod('standard');
        $rate->setMethodTitle('Standard');
        $rate->setPrice(0.0);
        $rate->setCost(0.0);

        /**
         * @var $result Mage_Shipping_Model_Rate_Result
         */
        $result = Mage::getModel('shipping/rate_result');
        $result->append($rate);

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getAllowedMethods()
    {
        return [
            'standard' => 'Standard'
        ];
    }
}