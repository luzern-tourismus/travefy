<?php

require __DIR__ . '/config.php';

$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {

    $builder = new \LuzernTourismus\Travefy\Builder\ContentBuilder();
    $builder->name = 'Content ' . $number;
    $builder->imageUrl = 'https://img.openbooking.ch/crop?url=https%3A%2F%2Fresc.deskline.net%2Fimages%2FEBG%2F1%2F64fa6841-aede-467e-bfd5-afde3d2d6459%2F99%2Fimage.jpg&type=auto&width=450&height=300&gravity=center';
    $builder->address = 'Bahnhofstr. 1';
    $builder->zipCode = 6000;
    $builder->city = 'Luzern';
    $builder->country = 'CH';
    $builder->url = 'https://www.hoteltest.ch/';
    $builder->phone = '123456';
    $builder->description = 'Content Test';
    $builder->geoCoordinates = new \Nemundo\Core\Type\Geo\GeoCoordinate();
    $builder->geoCoordinates->latitude = 47.053125472244936;
    $builder->geoCoordinates->longitude = 8.305512420420829;
    $builder->build();

}