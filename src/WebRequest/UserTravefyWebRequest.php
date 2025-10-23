<?php

namespace LuzernTourismus\Travefy\WebRequest;

class UserTravefyWebRequest extends TravefyWebRequest
{

    public function __construct()
    {

        parent::__construct('/users');

    }

}