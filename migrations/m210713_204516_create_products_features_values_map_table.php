<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_features_values_map}}`.
 */
class m210713_204516_create_products_features_values_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_features_values_map}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'feature_id' => $this->integer(11),
            'feature_value_id' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_features_values_map}}');
    }
}
