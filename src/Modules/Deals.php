<?php

namespace Foxtes\WazzupDriver\Modules;

use Foxtes\WazzupDriver\Dto\ListRequestDto;
use Foxtes\WazzupDriver\Exceptions\RequestException;

class Deals extends WazzupModuleWithCRUD
{
    protected const API_POINT = 'deals/';

}