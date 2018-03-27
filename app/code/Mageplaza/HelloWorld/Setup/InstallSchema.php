<?php


namespace Mageplaza\HelloWorld\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_mageplaza_helloworld_post = $setup->getConnection()->newTable($setup->getTable('mageplaza_helloworld_post'));

        
        $table_mageplaza_helloworld_post->addColumn(
            'newform_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );
        

        
        $table_mageplaza_helloworld_post->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            100,
            [],
            'name'
        );
        

        
        $table_mageplaza_helloworld_post->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'email'
        );
        

        
        $table_mageplaza_helloworld_post->addColumn(
            'comments',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'comments'
        );

        $table_mageplaza_helloworld_post->addColumn(
            'gender',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            100,
            [],
            'gender'
        );

        $table_mageplaza_helloworld_post->addColumn(
            'country',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            100,
            [],
            'country'
        );

        $setup->getConnection()->createTable($table_mageplaza_helloworld_post);

        $setup->endSetup();
    }
}
