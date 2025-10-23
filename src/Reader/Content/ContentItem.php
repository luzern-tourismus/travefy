<?php

namespace LuzernTourismus\Travefy\Reader\Content;

use LuzernTourismus\Travefy\WebRequest\ContentTravefyWebRequest;
use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class ContentItem extends AbstractBase
{

    public $id;

    public $name;



    public function delete()
    {

        $data = (new ContentTravefyWebRequest())->deleteData($this->id);
        (new Debug())->write($data);

    }



}