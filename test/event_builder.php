<?php

require __DIR__ . '/config.php';

$builder = new \LuzernTourismus\Travefy\Builder\EventBuilder();
$builder->event = 'Activity Test 1';

$builder->url = 'https://www.restauranttest.ch/';
$builder->phone = '123456';
//$builder->description = 'Restaurant <b>Test</b>';
$builder->imageUrl='https://cdn.unitycms.io/images/2VS686B8qGh9eLEkPH34b8.jpg?op=ocroped&val=1920,1280,1000,1000,0,0&sum=iE1bQzRqvRo';


$builder->description = '<p>Restaurant <strong>asdfasdfasdfasdfasdfasdfasdfasd</strong></p>';
$builder->geoCoordinates = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$builder->geoCoordinates->latitude = 47.053125472244936;
$builder->geoCoordinates->longitude = 8.305512420420829;
//47.053125472244936, 8.305512420420829
$builder->price = 150;
//$builder->eventTypeId = \LuzernTourismus\Travefy\Type\EventType::FOOD_DRINK;  //ACTIVITY;  //::HOTEL;
//$builder->eventTypeId = \LuzernTourismus\Travefy\Type\EventType::FOOD_DRINK;
$builder->eventTypeId = 0;
$builder->buildEvent();
