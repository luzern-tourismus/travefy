<?php

namespace LuzernTourismus\Travefy\Builder;

use LuzernTourismus\Travefy\WebRequest\EventTravefyWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class EventBuilder extends AbstractBase
{

    public $event;

    //public $imageUrl;

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


    private $imageUrlList = [];

    private $categoryList = [];

    /*public function addImage($imageUrl)
    {

        $this->imageUrlList[] = $imageUrl;
        return $this;

    }*/


    /*public function addCategory($category)
    {

        $this->categoryList[] = $category;
        return $this;

    }*/


    public function buildEvent()
    {

        $data = [];
        $data['Name'] = $this->event;
        $data['Url'] = $this->url;
        $data['Phone'] = $this->phone;
        $data['Description'] = $this->description;
        $data['Latitude'] = $this->geoCoordinates->latitude;
        $data['Longitude'] = $this->geoCoordinates->longitude;
        $data['Address'] = $this->address;
        $data['City'] = $this->city;
        $data['ZipCode'] = $this->zipCode;
        $data['EventType'] = $this->eventTypeId;

        if ($this->price !== null) {
            $data['PriceInCents'] = $this->price * 100;
            $data['CurrencyCode'] = 'CHF';
        }

        /*if ($this->imageUrl !== null) {
            $data['Images'] = $this->imageUrl;
        }*/

        $data['ImageUrls'] = $this->imageUrlList;
        $data['TopLevelCategories'] = $this->categoryList;

        $json = (new JsonText())->addData($data)->getJson();

        //(new Debug())->write($json);

        $response = (new EventTravefyWebRequest())->postData($json);
        //(new Debug())->write($data);


        $id = null;
        if ($response->statusCode == 201) {
            $json = (new JsonReader())->fromText($response->html)->getData();
            $id = $json['Id'];
        } else {
            (new Debug())->write($data);
        }

        return $id;



        /*
                "Id": "test-123 1760103707",
            "Name": "Personalized Tours of Travefy Office",
            "Url": "https://travefy.com/",
            "Description": "See where the Travefy magic happens! \r\n Enjoy your lovely view of the vibrant Lincoln Haymarket.",
            "ImageUrl": "http://nebraskaglobal.com/images/img-contact2.jpg",
            "IsActive": true,
            "Latitude": 40.814385,
            "Longitude": -96.710113,
            "Price": null,
            "CurrencyCode": null,
            "Address": "151 N 8th St, #300",
            "City": "Lincoln",
            "State": "NE",
            "Country": "US",
            "ZipCode": "68506",
            "HideOnMap": false,
            "SearchAttributes": [
                {
                    "Key": "Type",
                    "Value": "Office"
                },
                {
                    "Key": "Maximum Occupancy",
                    "Value": "15"
                }
            ],
            "ImageUrls": [
                "https://about.travefy.com/wp-content/uploads/2015/09/team-bkgrd-2015.jpg",
                "https://about.travefy.com/wp-content/uploads/2014/08/Andrew-Badami-Travefy.jpg",
                "https://about.travefy.com/wp-content/uploads/2015/06/stephanie-leonard-travefy.jpg"
            ],
            "TopLevelCategories": [
                "Office Tours"
            ],
            "DescriptionAttributes": [
                {
                    "Key": "Cost",
                    "Value": "FREE!"
                },
                {
                    "Key": "Hours",
                    "Value": "30pm"
                },
                {
                    "Key": "WiFi",
                    "Value": "Available"
                },
                {
                    "Key": "Parking",
                    "Value": "On Street"
                }
            ]*/


    }

}