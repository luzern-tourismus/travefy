<?php
namespace LuzernTourismus\Travefy\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use LuzernTourismus\Travefy\Data\TravefyModelCollection;
use LuzernTourismus\Travefy\Application\TravefyApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class TravefyUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new TravefyModelCollection());
}
}