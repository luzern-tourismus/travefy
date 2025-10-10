<?php

namespace LuzernTourismus\Travefy\Builder;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;

class EventBuilder extends AbstractBase
{

    public $event;

    public $imageUrl;

    public $url;

    public $phone;

    public $description;

    public $address;

    public $city;

    public $zipCode;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinates;


    public $eventTypeId;

    public function buildEvent()
    {

        $data = [];
        $data['Name'] = $this->event;
        $data['Url'] = $this->url;
        $data['Phone'] = $this->phone;
        $data['Description'] = $this->description;
        $data['Latitude'] = $this->geoCoordinates->latitude;
        $data['Longitude'] = $this->geoCoordinates->longitude;
        $data['Address'] = $this->address;
        $data['City'] = $this->city;
        $data['ZipCode'] = $this->zipCode;
        $data['EventType'] = $this->eventTypeId;

        if ($this->imageUrl !== null) {
            $data['ImageUrl'] = $this->imageUrl;
        }

        $json = (new JsonText())->addData($data)->getJson();
        $data = (new EventTravefyWebRequest())->postData($json);
        (new Debug())->write($data);

    }

}