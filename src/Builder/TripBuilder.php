<?php

namespace LuzernTourismus\Travefy\Builder;

use LuzernTourismus\Travefy\WebRequest\TripWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class TripBuilder extends AbstractBase
{

    public $name;

    public $imageUrl;

    public $url;

    public $phone;

    public $description;

    public $address;

    public $city;

    public $zipCode;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinates;

    public $price;

    public $eventTypeId;


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


        /*       {
                   "Name": "Trip 1761107285",
           "InviteMessage": "Welcome to the trip!",
           "TripCoverPhotoUrl": "http://lorempixel.com/640/480/city",
           "SeconaryLogoUrl": "https://travefy.com/content/app/images/logo.png",
           "EstimatedCost": "$1,234",
           "IsCostPerPerson": true,
           "PartnerIdentifier": "trip-1761107285",
           "Status": "Quote",
           "IsChatDisabled": false,
           "IsPdfEnabled": false,
           "IsAppEnabled": true
       }*/


        $data = [];
        $data['Name'] = $this->name;
        /*     $data['Url'] = $this->url;
             $data['Phone'] = $this->phone;
             $data['Description'] = $this->description;
             $data['Latitude'] = $this->geoCoordinates->latitude;
             $data['Longitude'] = $this->geoCoordinates->longitude;
             $data['Address'] = $this->address;
             $data['City'] = $this->city;
             $data['ZipCode'] = $this->zipCode;
             //$data['EventType'] = $this->eventTypeId;

             //$data['Price'] = $this->price;

             //"Price": null,

          /*   if ($this->imageUrl !== null) {
                 $data['ImageUrl'] = $this->imageUrl;
             }

             $data['IsActive'] =true;


         /*    "TopLevelCategories": [
             "Office Tours"
         ],*/
        //"ImageUrls": [

        //$data['ImageUrls']=$this->imageUrlList;
        //$data['TopLevelCategories'] = $this->categoryList;
        $data['Category'] = 388;  // $this->categoryList;


        $json = (new JsonText())->addData($data)->getJson();

        //(new Debug())->write($json);

        $response = (new TripWebRequest())->postData($json);
        //(new Debug())->write($data);

        $id = null;
        if ($response->statusCode == 201) {
            $json = (new JsonReader())->fromText($response->html)->getData();
            $id = $json['Id'];
        } else {
            (new Debug())->write($data);
        }

        return $id;

    }

}