<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Dto\ListRequestDto;
use Epzuz\WazzupSdk\Exceptions\RequestException;

class Deals extends WazzupModuleWithCRUD
{
    protected const API_POINT = 'deals/';

}