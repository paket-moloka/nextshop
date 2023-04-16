<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_features_values}}`.
 */
class m210713_204343_create_products_features_values_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_features_values}}', [
            'id' => $this->primaryKey(),
            'feature_id' => $this->integer(11),
            'value' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_features_values}}');
    }
}
