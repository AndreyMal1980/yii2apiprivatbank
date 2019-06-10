<?php

namespace api\integrations\bank\privat\bankomat;
use api\integrations\bank\privat\bankomat\interfaces\getData;

class getData{
 
    public function get(getData $format) {
          return $format->get();
          
    }
}