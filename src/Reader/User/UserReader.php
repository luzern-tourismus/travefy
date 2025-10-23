<?php

namespace LuzernTourismus\Travefy\Reader\User;

use LuzernTourismus\Travefy\Reader\Event\EventItem;
use LuzernTourismus\Travefy\WebRequest\TravefyWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class UserReader extends AbstractDataSource
{

    protected function loadData()
    {

        $data = (new TravefyWebRequest('/users'))->getData();

        $jsonReader = new JsonReader();
        $jsonReader->fromText($data->html);
        foreach ($jsonReader->getData()['Users'] as $jsonRow) {

            (new Debug())->write($jsonRow);
/*
            $event = new EventItem();
            $event->id = $jsonRow['Id'];
            $event->event = $jsonRow['Name'];

            $this->addItem($event);*/

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