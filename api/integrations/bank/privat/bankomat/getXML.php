<?php

namespace api\integrations\bank\privat\bankomat;
use api\integrations\bank\privat\bankomat\interfaces\getData;

class getXML implements getData {

    public function get() {
        $list = file_get_contents('https://api.privatbank.ua/p24api/infrastructure?atm&address=&city=');
        $xml = new \SimpleXMLElement($list);
        return $xml->asXML();
         
    }

}
