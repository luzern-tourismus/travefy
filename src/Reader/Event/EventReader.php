<?php

namespace LuzernTourismus\Travefy\Reader\Event;

use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class EventReader extends AbstractDataSource
{

    protected function loadData()
    {

        $data = (new EventTravefyWebRequest())->getData();

        $jsonReader = new JsonReader();
        $jsonReader->fromText($data->html);
        foreach ($jsonReader->getData() as $jsonRow) {

            //(new Debug())->write($jsonRow);

            $event = new EventItem();
            $event->id = $jsonRow['Id'];
            $event->event = $jsonRow['Name'];

            $this->addItem($event);

        }

    }


    /**
     * @return EventItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}