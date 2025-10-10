<?php

namespace LuzernTourismus\Travefy\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use LuzernTourismus\Travefy\Import\EventImport;

class ImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'travefy-import';
    }

    public function run()
    {

        (new EventImport())->importData();

    }
}