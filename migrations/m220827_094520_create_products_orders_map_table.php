<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_orders_map}}`.
 */
class m220827_094520_create_products_orders_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_orders_map}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'price' => $this->integer(),
            'count' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_orders_map}}');
    }
}
