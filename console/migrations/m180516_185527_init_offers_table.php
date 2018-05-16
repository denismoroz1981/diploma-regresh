<?php

use yii\db\Migration;

/**
 * Class m180516_185527_init_offers_table
 */
class m180516_185527_init_offers_table extends Migration
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
        echo "m180516_185527_init_offers_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180516_185527_init_offers_table cannot be reverted.\n";

        return false;
    }
    */
}
