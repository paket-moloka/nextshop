<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%regions}}`.
 */
class m220710_200353_create_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%regions}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'okrug' => $this->string(),
            'autocod' => $this->string(),
            'capital' => $this->string(),
            'english' => $this->string(),
            'iso' => $this->string(),
            'country' => $this->string(),
            'vid' => $this->string(),
            'wiki' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%regions}}');
    }
}
