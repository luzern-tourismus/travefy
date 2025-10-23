<?php

require __DIR__ . "/config.php";

$reader = new \LuzernTourismus\Travefy\Reader\Trip\TripReader();
foreach ($reader->getData() as $trip) {

    (new \Nemundo\Core\Debug\Debug())->write($trip->getTrip());

}


