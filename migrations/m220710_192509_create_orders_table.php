<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m220710_192509_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->integer(),
            'discount' => $this->integer(),
            'first_name' => $this->string(),
            'name' => $this->string(),
            'last_name' => $this->string(),
            'company' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'comment' => $this->text(),
            'delivety_type' => $this->integer(),
            'delivery_summ' => $this->integer(),
            'city' => $this->string(),
            'region' => $this->string(),
            'zip_code' => $this->string(),
            'address' => $this->string(),
            'payment_type' => $this->integer(),
            'payment_summ' => $this->integer(),
            'status' => $this->integer(),
            'created' => $this->integer(),
            'updated' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
