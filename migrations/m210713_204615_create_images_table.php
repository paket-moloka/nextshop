<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 */
class m210713_204615_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11),
            'filename' => $this->string(255),
            'original_filename' => $this->string(255),
            'ext' => $this->string(64),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%images}}');
    }
}
