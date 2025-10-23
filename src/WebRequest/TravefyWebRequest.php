<?php

namespace LuzernTourismus\Travefy\WebRequest;

use LuzernTourismus\Travefy\Config\TravefyConfig;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\WebRequest\Json\AbstractJsonCurlWebRequest;

class TravefyWebRequest extends AbstractJsonCurlWebRequest
{

    private $endpoint;


    public function __construct($endpoint)
    {

        $this->endpoint = $endpoint;
        parent::__construct();

    }


    protected function loadRequest()
    {

        $this
            ->addKeyValueHeader('X-API-PUBLIC-KEY', TravefyConfig::$publicKey)
            ->addKeyValueHeader('X-USER-TOKEN', TravefyConfig::$userToken);

    }


    private function getDataUrl()
    {

        $baseUrl = 'https://api.travefy.com/api/v1-20241001';
        $url = $baseUrl . $this->endpoint;

        return $url;

    }


    public function getData()
    {

        $data = $this->getUrl($this->getDataUrl());

        //(new Debug())->write($data);

        $file = new TextFileWriter('output.json');
        $file->addLine($data->html);
        $file->overwriteExistingFile=true;
        $file->writeFile();


        return $data;

    }


    public function postData($json)
    {

        $data = $this->postUrl($this->getDataUrl(), $json);
        return $data;

    }

    public function deleteData($id)
    {

        $data = $this->deleteUrl($this->getDataUrl() . '/' . $id);
        return $data;

    }

}