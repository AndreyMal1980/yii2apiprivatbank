<?php

namespace api\integrations\bank\privat\bankomat;
use api\integrations\bank\privat\bankomat\interfaces\getData;

class getJSON implements getData {

    public function get() {
        $json = file_get_contents("https://api.privatbank.ua/p24api/infrastructure?json&atm&address=&city=");
        return $json;
    }

}
