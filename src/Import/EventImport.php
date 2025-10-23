<?php

namespace LuzernTourismus\Travefy\Import;

use Nemundo\Core\Base\Import\AbstractImport;
use Nemundo\DestinationOne\Data\ItemCategory\ItemCategoryReader;
use Nemundo\DestinationOne\Type\Topic\AbstractTopic;
use Nemundo\DestinationOne\Type\Topic\PackageTopic;
use LuzernTourismus\Travefy\Builder\EventBuilder;
use LuzernTourismus\Travefy\Type\EventType;

class EventImport extends AbstractImport
{


    public function importData()
    {

        //$this->importDestinationOne(EventType::FOOD_DRINK, 'Restaurant');
        $this->importDestinationOne(EventType::EVENT, 'Führung', new PackageTopic());

    }


    private function importDestinationOne($eventTypeId, $category, AbstractTopic $topic = null)
    {

        $reader = new ItemCategoryReader();
        $reader->model
            ->loadCategory()
            ->loadItem();
        $reader->model->item
            ->loadCity()
            ->loadLicence();
        //$reader->filter->andEqual($reader->model->item->active, true);

        if ($topic !== null) {
            $reader->filter->andEqual($reader->model->item->topicId, $topic->id);
        }
        $reader->filter->andEqual($reader->model->category->category, $category);

        foreach ($reader->getData() as $itemRow) {

            (new \Nemundo\Core\Debug\Debug())->write($itemRow->item->item);

            $builder = new EventBuilder();
            $builder->event = $itemRow->item->item;

            if ($itemRow->item->hasImage) {
                $builder->imageUrl = $itemRow->item->imageUrl;
            }
            $builder->url = $itemRow->item->web;
            $builder->phone = $itemRow->item->phone;
            $builder->description = $itemRow->item->text;
            $builder->address = $itemRow->item->street;
            $builder->zipCode = $itemRow->item->zip;
            $builder->city = $itemRow->item->city->city;
            $builder->geoCoordinates = $itemRow->item->geoCoordinate;
            $builder->eventTypeId = $eventTypeId;
            $builder->buildEvent();

        }

        return $this;

    }

}