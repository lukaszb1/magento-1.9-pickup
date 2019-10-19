<?php

class Lb1_PickUpAtPoint_Model_Point
    extends Mage_Core_Model_Abstract
{
    const VISIBILITY_INVISIBLE = 0;
    const VISIBILITY_VISIBLE = 1;

    protected function _construct()
    {
        $this->_init('lb1_pickupatpoint/point');
    }

    /**
     * @inheritDoc
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();

        $this->_updateTimestamps();

        return $this;
    }

    /**
     * Set last update timestamp
     *
     * @return $this
     */
    protected function _updateTimestamps()
    {
        $now = Mage::getModel('core/date')->gmtDate('Y-m-d H:i:s');

        $this->setUpdatedAt($now);

        return $this;
    }

    /**
     * Return available visibilities
     *
     * @return string[]
     */
    public function getAvailableVisibilities()
    {
        return [
            self::VISIBILITY_INVISIBLE => Mage::helper('lb1_pickupatpoint')->__('Hidden'),
            self::VISIBILITY_VISIBLE => Mage::helper('lb1_pickupatpoint')->__('Visible'),
        ];
    }

    /**
     * Return the delivery address to the point
     *
     * @return Mage_Sales_Model_Quote_Address
     */
    public function getShippingAddress()
    {
        /**
         * @var Mage_Sales_Model_Quote_Address $address
         */
        $address = Mage::getModel('sales/quote_address');

        $address->setFirstname($this->getFirstName());
        $address->setLastname($this->getLastName());

        $street = $this->getStreetName() . ' ' . $this->getStreetNumber() . '/' . $this->getFlatNumber();

        $address->setStreetFull($street);
        $address->setCity($this->getCity());
        $address->setPostcode($this->getPostCode());
        $address->setTelephone($this->getPhoneNumber());

        return $address;

    }
}