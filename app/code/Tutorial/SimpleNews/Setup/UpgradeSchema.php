<?php

namespace Tutorial\SimpleNews\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable('tutorial_simplenews');
        if (version_compare($context->getVersion(), '2.0.3', '<')) {
            if ($setup->getConnection()->isTableExists($tableName) == true) {
                $connection = $setup->getConnection();


                $connection->addColumn(
                    $tableName,
                    'attribute_type',
                    ['type' => Table::TYPE_TEXT,'nullable' => false, 'default' => '','comment' =>'Attribute Type']

                );
                $connection->addColumn(
                    $tableName,
                    'is_required',
                    ['type' => Table::TYPE_TEXT,'nullable' => false, 'default' => '','comment' =>'Is Required']



                );
                $connection->addColumn(
                    $tableName,
                    'display_in',
                    ['type' => Table::TYPE_TEXT,'nullable' => false, 'default' => '','comment' =>'Display in Forms']


                );
            }
        }


        $setup->endSetup();

    }

}