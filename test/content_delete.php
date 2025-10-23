<?php

require __DIR__ . "/config.php";

$reader = new \LuzernTourismus\Travefy\Reader\Content\ContentReader();
foreach ($reader->getData() as $content) {

    //(new \Nemundo\Core\Debug\Debug())->write($content);

    //$id = $content['id'];

    $content->delete();

    //$data = (new \LuzernTourismus\Travefy\WebRequest\ContentTravefyWebRequest())->deleteData($content->id);
    //(new Debug())->write($data);


}


