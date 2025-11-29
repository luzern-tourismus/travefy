<?php

use Nemundo\Core\Debug\Debug;

require __DIR__ . '/config.php';

$builder = new \LuzernTourismus\Travefy\Builder\ContentBuilder();
$builder->name = 'Test 1';
//$builder->imageUrl = 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/PNY_Exterior_with_Rolls_Royce.jpg/1280px-PNY_Exterior_with_Rolls_Royce.jpg';
$builder->imageUrl='https://img.openbooking.ch/crop?url=https%3A%2F%2Fresc.deskline.net%2Fimages%2FEBG%2F1%2F64fa6841-aede-467e-bfd5-afde3d2d6459%2F99%2Fimage.jpg&type=auto&width=450&height=300&gravity=center';

/*$builder
    ->addImage('https://img.openbooking.ch/crop?url=https%3A%2F%2Fresc.deskline.net%2Fimages%2FEBG%2F1%2F64fa6841-aede-467e-bfd5-afde3d2d6459%2F99%2Fimage.jpg&type=auto&width=450&height=300&gravity=center')
    ->addImage('https://img.openbooking.ch/crop?url=https%3A%2F%2Fimageservice.atraveo.com%2Faccommodation%2F109576%2F1698922%2Faf7cbb3f-0af1-4ea5-a9ba-60f426e761f5.jpg&type=auto&width=450&height=300&gravity=center')
    ->addImage('https://img.openbooking.ch/crop?url=https%3A%2F%2Fimageservice.atraveo.com%2Faccommodation%2F108382%2F1725501%2Fe5bbd255-ac83-4b7b-85c1-bc1a209e5ed2.jpeg&type=auto&width=450&height=300&gravity=center');

$builder
    ->addCategory('SuperHotel')
    ->addCategory('EventBetterHotel');*/

$builder->address='Bahnhofstr. 1';
$builder->zipCode= 6000;
$builder->city = 'Luzern';
$builder->country='CH';


$builder->url = 'https://www.hoteltest.ch/';
$builder->phone = '123456';
$builder->description = 'Hotel Test 2';
$builder->geoCoordinates = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$builder->geoCoordinates->latitude = 47.053125472244936;
$builder->geoCoordinates->longitude = 8.305512420420829;

//47.053125472244936, 8.305512420420829

//$builder->price = 100;
//$builder->eventTypeId = \LuzernTourismus\Travefy\Type\EventType::FOOD_DRINK;  //::INFO;  //::HOTEL;
$id = $builder->build();

(new Debug())->write($id);
