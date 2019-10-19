<?php
/**
 * @var Mage_Core_Model_Resource_Setup $this
 */
$this->startSetup();

$table = $this->getConnection()->newTable($this->getTable('lb1_pickupatpoint/point'));

$table->addColumn(
    'entity_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    [
        'auto_increment' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ]
);

$table->addColumn(
    'first_name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'last_name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'street_name',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'street_number',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    10,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'flat_number',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    10,
    [
        'nullable' => true,
    ]
);

$table->addColumn(
    'city',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'post_code',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'phone_number',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    15,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'visibility',
    Varien_Db_Ddl_Table::TYPE_BOOLEAN,
    null,
    [
        'nullable' => false,
    ]
);

$table->addColumn(
    'created_at',
    Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
    null,
    [
        'nullable' => false,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ]
);

/**
 * Varien_Db_Ddl_Table::TIMESTAMP_INIT_UPDATE Will not always work
 * @see Lb1_PickUpAtPoint_Model_Point _updateTimestamps
 */
$table->addColumn(
    'updated_at',
    Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
    null,
    [
        'nullable' => true,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT_UPDATE
    ]
);

$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');

$this->getConnection()->createTable($table);

$this->endSetup();