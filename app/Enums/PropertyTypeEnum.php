<?php

namespace App\Enums;

enum PropertyTypeEnum : string{
    case SINGLE = 'Single Family Home';
    case TOWNHOUSE = 'Town House';
    case MULTIFAMILY = 'Multi Family Home';
    case BUNGLOW = 'Bunglow';
}