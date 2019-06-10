<?php

namespace bank\privat\forms;

use bank\privat\entities\Bankomat;
use yii\base\Model;

class FilterBankomatForm extends Model{
    
    public $city;
   
    
     public function rules(): array {
        
          return [
           [['city'], 'string'],
        ];
    }
}
