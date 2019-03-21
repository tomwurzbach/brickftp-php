<?php
/**
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 8:09 PM
 */

namespace BrickFTP;

use BrickFTP\ApiOperations\All;
use BrickFTP\ApiOperations\Create;
use BrickFTP\ApiOperations\Delete;
use BrickFTP\ApiOperations\Show;

class ApiKey extends ApiResource
{
    use Delete;
    use Show;
}
