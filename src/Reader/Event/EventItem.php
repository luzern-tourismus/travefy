<?php

namespace LuzernTourismus\Travefy\Reader\Event;

use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

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