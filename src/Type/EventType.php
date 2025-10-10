<?php

namespace LuzernTourismus\Travefy\Type;

use Nemundo\Core\Base\AbstractBase;

class EventType extends AbstractBase
{

    const HOTEL=6;

    const FOOD_DRINK = 11;

    const INFO = 12;

    const ACTIVITY = 9;


    /*
Unspecified	null	Event
Flight	0	Flight
Car Rental	1	Transportation -> Car Rental
Train	2	Transportation -> Rail
Cruise	3	Cruise
Bus	4	Transportation -> Other
Walk	5	N/A
Hotel	6	Lodging
Vacation Rental	7	N/A
Camp	8	N/A
Event	9	Activity
Automobile	10	N/A
Food/Drink	11	Food/Drink
Info	12	Info
    */


}