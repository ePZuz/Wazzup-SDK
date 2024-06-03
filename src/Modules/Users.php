<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Dto\UserAddRequestDto;
use Epzuz\WazzupSdk\Exceptions\RequestException;

class Users extends WazzupModuleWithCRUD
{
    protected const API_POINT = 'users/';

}