<?php

namespace Foxtes\WazzupDriver\Modules;

use Foxtes\WazzupDriver\Dto\UserAddRequestDto;
use Foxtes\WazzupDriver\Exceptions\RequestException;

class Users extends WazzupModuleWithCRUD
{
    protected const API_POINT = 'users/';

}