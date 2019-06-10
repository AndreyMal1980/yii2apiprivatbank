<?php

namespace bank\privat\repositories;

use bank\privat\entities\Bankomat;

class BankomatRepository {

    public function get($id) {
        if (!$bankomat = Bankomat::findOne($id)) {
            throw new NotFoundException('Bankomat is not found.');
        }
        return $bankomat;
    }

    public function findByAddressRU($fullAddressRu) {
        return Bankomat::findOne(['fullAddressRu' => $fullAddressRu]);
    }
    
    public function findByAddressUA($fullAddressUa) {
        return Bankomat::findOne(['fullAddressUa' => $fullAddressUa]);
    }

    public function findByAddressEN($fullAddressEn) {
        return Bankomat::findOne(['fullAddressEn' => $fullAddressEn]);
    }

    public function save(Bankomat $bankomat) {
        if (!$bankomat->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Bankomat $bankomat) {
        if (!$bankomat->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
  
    public function removeAll(): void {
        if (Bankomat::find()->count() > 0) {
            if (!Bankomat::deleteAll()) {
                throw new \RuntimeException('RemovingAll error.');
            }
        }
    }
    
    public function truncateAll(): void {
        if (Bankomat::find()->count() > 0) {
            if (\Yii::$app->db->createCommand("TRUNCATE TABLE  privat")->execute()) {
                throw new \RuntimeException('RemovingAll error.');
            }
        }
    }

    public function findAllIsArray() {
        if (!$bankomats = Bankomat::find()->asArray()->all()) {
            throw new \RuntimeException('findAll error.');
        }
         return $bankomats;  
    }
    
     public function findAllIsObject() {
        if (!$bankomats = Bankomat::find()->all()) {
            throw new \RuntimeException('findAll error.');
        }
         return $bankomats;  
    }
    
      public function findAllBankomats() {
        if (!$bankomats = Bankomat::find()->asArray()->all()) {
            throw new \RuntimeException('findAllBankomats error.');
        }
       return json_encode($bankomats);
        
    }
    
       public function findBankomatsByCity($city) {
        if (!$bankomats = Bankomat::find()->asArray()->where(['cityRU' => $city])->all()){
             throw new \RuntimeException('findBankomatsByCity error.');
        }
           return json_encode($bankomats);
    }
}
