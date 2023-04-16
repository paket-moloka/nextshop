<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m210713_204523_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'summary' => $this->text(),
            'meta_description' => $this->text(),
            'description' => $this->text(),
            'status' => $this->integer(11),
            'price' => $this->string(64),
            'currency' => $this->string(64),
            'count' => $this->integer(11),
            'total_sales' => $this->string(64),
            'cat_id' => $this->integer(11),
            'article' => $this->string(64),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
