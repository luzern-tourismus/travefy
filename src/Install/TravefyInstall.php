<?php

namespace LuzernTourismus\Travefy\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use LuzernTourismus\Travefy\Application\TravefyApplication;
use LuzernTourismus\Travefy\Data\TravefyModelCollection;
use LuzernTourismus\Travefy\Script\ImportScript;

class TravefyInstall extends AbstractInstall
{
    public function install()
    {
        //(new ModelCollectionSetup())->addCollection(new TravefyModelCollection());

        (new ScriptSetup(new TravefyApplication()))
            ->addScript(new ImportScript());


    }
}