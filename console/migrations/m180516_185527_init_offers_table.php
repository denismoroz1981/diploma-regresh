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
         $this->createTable('offers',
             [
                 'admin_id'=>'pk',
                 'street_name'=>'string',
                 'rooms_count'=>'integer',
                 'type'=>'string',
                 'is_commercial'=>$this->integer(),
                 'state_name'=>'string',
                 'beautiful_url'=>'string',
                 'description'=>'string',
                 'currency_type'=>'string',
                 'metro_station_name'=>'string',
                 'wall_type'=>'string',
                 'publishing_date'=>'string',
                 'price'=>'integer',
                 'realty_type_name'=>'string',
                 'latitude'=>'string',
                 'main_photo'=>'string',
                 'building_number_str'=>'string',
                 'city_name'=>'string',
                 'living_square_meters'=>$this->double(),
                 'realty_type_id'=>'integer',
                 'floors_count'=>'integer',
                 'kitchen_square_meters'=>'integer',
                 'flat_number'=>'string',
                 'total_square_meters'=>'integer',
                 'realty_id'=>$this->integer()->unique(),
                 'date_end'=>'string',
                 'district_name'=>'string',
                 'advert_type_name'=>'string',
                 'advert_type_id'=>'integer',
                 'admin_time_entered'=>$this->timestamp()->
                 defaultValue(['expression'=>'CURRENT_TIMESTAMP'])
             ],
               'ENGINE=InnoDB'
             );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('offers');
        //echo "m180516_185527_init_offers_table cannot be reverted.\n";

        //return false;
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
