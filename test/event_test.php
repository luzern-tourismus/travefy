<?php

require __DIR__ . '/config.php';

$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {


    $builder = new \LuzernTourismus\Travefy\Builder\EventBuilder();
    $builder->event = 'Hotel ' . $number;
    $builder->url = 'https://www.hoteltest.ch/';
    $builder->phone = '123456';
    $builder->description = 'Hotel Beschreibung';
    $builder->geoCoordinates = new \Nemundo\Core\Type\Geo\GeoCoordinate();
    $builder->geoCoordinates->latitude = 47.053125472244936;
    $builder->geoCoordinates->longitude = 8.305512420420829;
    $builder->eventTypeId = \LuzernTourismus\Travefy\Type\EventType::HOTEL;
    $builder->buildEvent();

    $builder = new \LuzernTourismus\Travefy\Builder\EventBuilder();
    $builder->event = 'Restaurant ' . $number;
    $builder->url = 'https://www.restaurant.ch/';
    $builder->phone = '123456';
    $builder->description = 'Restaurant Beschreibung';
    $builder->geoCoordinates = new \Nemundo\Core\Type\Geo\GeoCoordinate();
    $builder->geoCoordinates->latitude = 47.053125472244936;
    $builder->geoCoordinates->longitude = 8.305512420420829;
    $builder->eventTypeId = \LuzernTourismus\Travefy\Type\EventType::FOOD_DRINK;
    $builder->buildEvent();

    $builder = new \LuzernTourismus\Travefy\Builder\EventBuilder();
    $builder->event = 'Activity ' . $number;
    $builder->url = 'https://www.restaurant.ch/';
    $builder->phone = '123456';
    $builder->description = 'Activity Beschreibung';
    $builder->geoCoordinates = new \Nemundo\Core\Type\Geo\GeoCoordinate();
    $builder->geoCoordinates->latitude = 47.053125472244936;
    $builder->geoCoordinates->longitude = 8.305512420420829;
    $builder->eventTypeId = \LuzernTourismus\Travefy\Type\EventType::ACTIVITY;
    $builder->buildEvent();


}