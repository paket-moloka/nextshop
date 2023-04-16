<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carts}}`.
 */
class m220710_122345_create_carts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carts}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'user_id' => $this->string(255),
            'qty' => $this->integer(),
            'price' => $this->integer(),
            'totalSumm' => $this->integer(),
            'discount' => $this->integer(),
            'created' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%carts}}');
    }
}
