<?php
// Add pick up point
$point = Mage::getModel('lb1_pickupatpoint/point');
$point
    ->setFirstName('Pick up point')
    ->setLastName('Wrocław')
    ->setStreetName('Świdnicka')
    ->setStreetNumber('1')
    ->setFlatNumber('2')
    ->setCity('Wrocław')
    ->setPostCode('50-101')
    ->setPhoneNumber('123456789')
    ->setVisibility(1)
    ->save();

// Add simple product
$product = Mage::getModel("catalog/product");
$product
    ->setStoreId(0)
    ->setWebsiteIds([Mage::app()->getStore()->getWebsiteId()])
    ->setAttributeSetId(4)
    ->setTypeId('simple')
    ->setCreatedAt(strtotime('now'))
    ->setSku('01234')
    ->setName('Test product - sku 01234')
    ->setWeight(1.0000)
    ->setStatus(1)
    ->setTaxClassId(4)
    ->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
    ->setCountryOfManufacture('PL')
    ->setPrice(11.22)
    ->setCost(22.33)
    ->setDescription('This is a long description')
    ->setShortDescription('This is a short description')
    ->setMediaGallery(['images' => [], 'values' => []])
    ->setStockData([
        'manage_stock' => 1,
        'is_in_stock' => 1,
        'qty' => 999
    ])
    ->save();