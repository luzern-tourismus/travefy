<?php

require __DIR__ . "/config.php";

$reader = new \LuzernTourismus\Travefy\Reader\Event\EventReader();
foreach ($reader->getData() as $event) {

    (new \Nemundo\Core\Debug\Debug())->write($event->id);
    $event->delete();

}


