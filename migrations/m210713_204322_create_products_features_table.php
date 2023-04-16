<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_features}}`.
 */
class m210713_204322_create_products_features_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_features}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11),
            'name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_features}}');
    }
}
