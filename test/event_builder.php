<?php

require __DIR__ . '/config.php';

$builder = new \LuzernTourismus\Travefy\Builder\EventBuilder();
$builder->event = 'Hotel Test';
$builder->imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/PNY_Exterior_with_Rolls_Royce.jpg/1280px-PNY_Exterior_with_Rolls_Royce.jpg';
$builder->url = 'https://www.hoteltest.ch/';
$builder->phone = '123456';
$builder->description = 'Hotel Test';
$builder->geoCoordinates = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$builder->geoCoordinates->latitude = 47;
$builder->geoCoordinates->longitude = -123;
$builder->eventTypeId = \LuzernTourismus\Travefy\Type\EventType::HOTEL;
$builder->buildEvent();
