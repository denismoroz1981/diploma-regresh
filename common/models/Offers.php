<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $id
 * @property string $city
 * @property int $flats_number
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
            [['flats_number'], 'integer'],
            [['city', 'address'], 'string', 'max' => 255],
            [['price'],'integer','min'=>0,'max'=>100000000]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'flats_number' => 'Room Number',
            'address' => 'Address',
            'price' => 'Price, UAH',
        ];
    }
}
