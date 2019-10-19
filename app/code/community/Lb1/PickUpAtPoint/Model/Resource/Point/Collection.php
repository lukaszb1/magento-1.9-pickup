<?php

class Lb1_PickUpAtPoint_Model_Resource_Point_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        parent::_construct();

        $this->_init('lb1_pickupatpoint/point', 'lb1_pickupatpoint/point');
    }

    /**
     * Add visibility field to filter
     *
     * @param int $visibility
     * @return $this
     */
    public function addVisibilityToFilter($visibility = 1)
    {
        $visibilities = Mage::getSingleton('lb1_pickupatpoint/point')->getAvailableVisibilities();

        if (array_key_exists($visibility, $visibilities)) {
            $this->addFieldToFilter('visibility', $visibility);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {
        $result = [];

        foreach ($this as $item) {
            $label = $var = <<<EOT
            {$item->getFirstName()} {$item->getLastName()}: str. {$item->getStreetName()} {$item->getStreetNumber()}/{$item->getFlatNumber()},
            {$item->getPostCode()} {$item->getCity()}
EOT;

            $result[] = [
                'value' => $item->getId(),
                'label' => $label
            ];
        }

        return $result;
    }
}