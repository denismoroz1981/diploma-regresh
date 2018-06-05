<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $admin_id
 * @property string $city
 * @property int $rooms_count
 * @property string $address
 * @property int $price
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           [['street_name'], 'string'],
            //[['city', 'address'], 'string', 'max' => 255],
            //[['price'],'integer','min'=>0,'max'=>100000000]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            //'city' => 'City',
            'rooms_count' => 'Room Number',
            //'address' => 'Address',
            //'price' => 'Price, UAH',
        ];
    }
}
