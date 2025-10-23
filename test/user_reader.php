<?php

require __DIR__ . "/config.php";


foreach ((new \LuzernTourismus\Travefy\Reader\User\UserReader())->getData() as $content) {

    (new \Nemundo\Core\Debug\Debug())->write($content);

}


