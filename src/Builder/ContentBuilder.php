<?php

namespace LuzernTourismus\Travefy\Builder;

use LuzernTourismus\Travefy\WebRequest\ContentTravefyWebRequest;
use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class ContentBuilder extends AbstractBase
{

    public $name;

    public $imageUrl;

    public $url;

    public $phone;

    public $description;

    public $address;

    public $city;

    public $zipCode;

    public $country;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinates;

    //public $price;

    //public $eventTypeId;


   /* private $imageUrlList=[];
    
    private $categoryList=[];

    public function addImage($imageUrl)
    {

        $this->imageUrlList[] = $imageUrl;
        return $this;

    }


    public function addCategory($category)
    {

        $this->categoryList[] = $category;
        return $this;

    }*/
    
    

    public function build()
    {

        $data = [];
        $data['Name'] = $this->name;
        $data['Url'] = $this->url;
        $data['Phone'] = $this->phone;
        $data['Description'] = $this->description;
        $data['Latitude'] = $this->geoCoordinates->latitude;
        $data['Longitude'] = $this->geoCoordinates->longitude;
        $data['Address'] = $this->address;
        $data['City'] = $this->city;
        $data['ZipCode'] = $this->zipCode;
        $data['Country'] = $this->country;


        //$data['EventType'] = $this->eventTypeId;

        //$data['Price'] = $this->price;

        //"Price": null,

        if ($this->imageUrl !== null) {
            $data['ImageUrl'] = $this->imageUrl;
        }

        $data['IsActive'] =true;
        $data['PartnerIdentifier'] = 'test-content-123';
        $data['Rating']= 5;
        $data['Category'] = 338;
        $data['PartnerIdentifier']='test-content-123';

        $json = (new JsonText())->addData($data)->getJson();

        (new Debug())->write($json);

        $data = (new ContentTravefyWebRequest())->postData($json);
        (new Debug())->write($data);


    }

}