<?php

namespace bank\privat\entities;

use yii\db\ActiveRecord;

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
class Bankomat extends ActiveRecord {

    public static function create($type, $cityRU, $cityUA, $cityEN, $fullAddressRu, $fullAddressUa, $fullAddressEn, $placeRu, $placeUa, $latitude, $longitude) {

        $bankomat = new static();
        $bankomat->type = $type;
        $bankomat->cityRU = $cityRU;
        $bankomat->cityUA = $cityUA;
        $bankomat->cityEN = $cityEN;
        $bankomat->fullAddressRu = $fullAddressRu;
        $bankomat->fullAddressUa = $fullAddressUa;
        $bankomat->fullAddressEn = $fullAddressEn;
        $bankomat->placeRu = $placeRu;
        $bankomat->placeUa = $placeUa;
        $bankomat->latitude = $latitude;
        $bankomat->longitude = $longitude;
        return $bankomat;
    }

    public function edit($type, $cityRU, $cityUA, $cityEN, $fullAddressRu, $fullAddressUa, $fullAddressEn, $placeRu, $placeUa, $latitude, $longitude) {
        $this->type = $type;
        $this->cityRU = $cityRU;
        $this->cityUA = $cityUA;
        $this->cityEN = $cityEN;
        $this->fullAddressRu = $fullAddressRu;
        $this->fullAddressUa = $fullAddressUa;
        $this->fullAddressEn = $fullAddressEn;
        $this->placeRu = $placeRu;
        $this->placeUa = $placeUa;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function tableName() {
        return '{{%privat}}';
    }

}
