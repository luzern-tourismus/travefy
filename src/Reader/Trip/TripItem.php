<?php

namespace LuzernTourismus\Travefy\Reader\Trip;

use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class TripItem extends AbstractBase
{

    private $id;

    private $trip;


    public function __construct($data)
    {

        $this->id = $data['Id'];
        $this->trip = $data['Name'];
        //$event->event = $jsonRow['Name'];


    }


    public function getId()
    {
        return $this->id;
    }

    public function getTrip()
    {
        return $this->trip;
    }


    public function delete()
    {

        $data = (new EventTravefyWebRequest())->deleteData($this->id);
        (new Debug())->write($data);

    }


}