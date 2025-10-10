<?php

namespace LuzernTourismus\Travefy\Reader;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use LuzernTourismus\Travefy\WebRequest\TravefyWebRequest;

class EventItem extends AbstractBase
{

    public $id;

    public $event;



    public function delete()
    {

        $data = (new EventTravefyWebRequest())->deleteData($this->id);
        (new Debug())->write($data);

    }



}