<?php

use yii\db\Migration;

/**
 * Class m220710_205908_update_orders_table
 */
class m220710_205908_update_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220710_205908_update_orders_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220710_205908_update_orders_table cannot be reverted.\n";

        return false;
    }
    */
}
