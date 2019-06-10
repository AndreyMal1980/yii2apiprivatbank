<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "privat".
 *
 * @property string $id
 * @property string $type
 * @property string $cityRU
 * @property string $cityUA
 * @property string $cityEN
 * @property string $fullAddressRu
 * @property string $fullAddressUa
 * @property string $fullAddressEn
 * @property string $placeRu
 * @property string $placeUa
 * @property string $latitude
 * @property string $longitude
 */
class Privat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'cityRU', 'cityUA', 'cityEN', 'fullAddressRu', 'fullAddressUa', 'fullAddressEn', 'placeRu', 'placeUa', 'latitude', 'longitude'], 'required'],
            [['fullAddressRu', 'fullAddressUa', 'fullAddressEn', 'placeRu', 'placeUa'], 'string'],
            [['type', 'cityRU', 'cityUA', 'cityEN', 'latitude', 'longitude'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'cityRU' => 'City Ru',
            'cityUA' => 'City Ua',
            'cityEN' => 'City En',
            'fullAddressRu' => 'Full Address Ru',
            'fullAddressUa' => 'Full Address Ua',
            'fullAddressEn' => 'Full Address En',
            'placeRu' => 'Place Ru',
            'placeUa' => 'Place Ua',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
