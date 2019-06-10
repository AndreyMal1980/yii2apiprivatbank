<?php

namespace bank\privat\forms;

use bank\privat\entities\Bankomat;
use yii\base\Model;

class BankomatForm extends Model {

    public $type;
    public $cityRU;
    public $cityUA;
    public $cityEN;
    public $fullAddressRu;
    public $fullAddressUa;
    public $fullAddressEn;
    public $placeRu;
    public $placeUa;
    public $latitude;
    public $longitude;
    
    private $_bankomat;

    public function __construct(Bankomat $bankomat = null, $config = []) {
        if ($bankomat) {
            $this->type = $bankomat->type;
            $this->cityRU = $bankomat->cityRU;
            $this->cityUA = $bankomat->cityUA;
            $this->cityEN = $bankomat->cityEN;
            $this->fullAddressRu = $bankomat->fullAddressRu;
            $this->fullAddressUa = $bankomat->fullAddressUa;
            $this->fullAddressEn = $bankomat->fullAddressEn;
            $this->placeRu = $bankomat->placeRu;
            $this->placeUa = $bankomat->placeUa;
            $this->latitude = $bankomat->latitude;
            $this->longitude = $bankomat->longitude;
          
             /* echo '<pre>';
                print_r($bankomat);
                echo '</pre>';*/
            
            $this->_bankomat = $bankomat;
        }
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['type', 'cityRU', 'cityUA', 'cityEN', 'fullAddressRu', 'fullAddressUa', 'fullAddressEn', 'placeRu', 'placeUa', 'latitude', 'longitude'], 'required'],
            [['fullAddressRu', 'fullAddressUa', 'fullAddressEn', 'placeRu', 'placeUa'], 'string'],
            [['type', 'cityRU', 'cityUA', 'cityEN', 'latitude', 'longitude'], 'string', 'max' => 255],
       // [['type'], 'unique', 'targetClass' => Bankomat::class, 'filter' => $this->_bankomat ? ['<>', 'id', $this->_bankomat->id] : null]
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
