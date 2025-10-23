<?php

namespace LuzernTourismus\Travefy\Reader\Content;

use LuzernTourismus\Travefy\Reader\Event\EventItem;
use LuzernTourismus\Travefy\WebRequest\ContentTravefyWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Json\Reader\JsonReader;

class ContentReader extends AbstractDataSource
{

    protected function loadData()
    {

        $data = (new ContentTravefyWebRequest())->getData();

        $jsonReader = new JsonReader();
        $jsonReader->fromText($data->html);
        foreach ($jsonReader->getData() as $jsonRow) {

            //(new Debug())->write($jsonRow);

            $content = new ContentItem();
            $content->id = $jsonRow['Id'];
            $content->name = $jsonRow['Name'];

            $this->addItem($content);

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