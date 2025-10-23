<?php

namespace LuzernTourismus\Travefy\Reader\Trip;

use LuzernTourismus\Travefy\Reader\Event\EventItem;
use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use LuzernTourismus\Travefy\WebRequest\TripWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class TripReader extends AbstractDataSource
{

    protected function loadData()
    {

        $data = (new TripWebRequest())->getData();

        $jsonReader = new JsonReader();
        $jsonReader->fromText($data->html);
        foreach ($jsonReader->getData() as $jsonRow) {

            //(new Debug())->write($jsonRow);

            $event = new TripItem($jsonRow);
            //$event->id = $jsonRow['Id'];
            //$event->event = $jsonRow['Name'];

            $this->addItem($event);

        }

    }


    /**
     * @return TripItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}