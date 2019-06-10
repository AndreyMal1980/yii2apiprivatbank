<?php

namespace bank\privat\services;

use bank\privat\entities\Bankomat;
use bank\privat\forms\BankomatForm;
use bank\privat\repositories\BankomatRepository;

class BankomatManageService {

    private $bankomat;

    public function __construct(BankomatRepository $bankomat) {
        $this->bankomat = $bankomat;
    }

    public function create(BankomatForm $form) {
        
          /* echo '<pre>';
                print_r($form);
                echo '</pre>';*/
        
        $bankomat = Bankomat::create(
                $form->type,
                $form->cityRU,
                $form->cityUA,
                $form->cityEN,
                $form->fullAddressRu,
                $form->fullAddressUa,
                $form->fullAddressEn,
                $form->placeRu,
                $form->placeUa,
                $form->latitude,
                $form->longitude
        );
            
               /*echo '<pre>';
                print_r($bankomat);
                echo '</pre>';*/
              //  exit();
        $this->bankomat->save($bankomat);
        return $bankomat;
    }
    
     public function saveIsArray($device) {
        $bankomat = Bankomat::create(
                $device['type'], 
                $device['cityRU'],
                $device['cityUA'],
                $device['cityEN'],
                $device['fullAddressRu'],
                $device['fullAddressUa'],
                $device['fullAddressEn'],
                $device['placeRu'],
                $device['placeUa'],
                $device['latitude'],
                $device['longitude']
        );
     
        $this->bankomat->save($bankomat);
    }
    
      public function edit($id,BankomatForm $form )
      {
        $bankomat = $this->bankomat->get($id);
       //   $bankomat = new Bankomat();
        
        
         // echo $id;
         /*  echo '<pre>';
        print_r($form);
          echo '</pre>';*/
       /* echo '<pre>';
        print_r($bankomat);
         echo '</pre>';*/
    $bankomat->edit(
                $form->type,
                $form->cityRU,
                $form->cityUA,
                $form->cityEN,
                $form->fullAddressRu,
                $form->fullAddressUa,
                $form->fullAddressEn,
                $form->placeRu,
                $form->placeUa,
                $form->latitude,
                $form->longitude
        );
  
        $this->bankomat->save($bankomat);
        // return $bankomat;
    }

    public function remove($id) {
        $bankomat = $this->bankomat->get($id);
        $this->bankomat->remove($bankomat);
    }
    
     public function removeAll(): void {
        $this->bankomat->removeAll();
    }
    
      public function findAllIsArray() {
       return $this->bankomat->findAllIsArray();
    }
    
    public function findAllIsObject() {
       return $this->bankomat->findAllIsObject();
    }
    public function findBankomatsByCity($city){
        return $this->bankomat->findBankomatsByCity($city);
    }

    public function findAllBankomats() {
       return $this->bankomat->findAllBankomats();
    }
    
     public function truncateAll(): void {
         $this->bankomat->truncateAll();
     }
     
      public function find($id): void {
         $this->bankomat->get($id);
     }  
    
}
