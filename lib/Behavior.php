<?php

namespace BrickFTP;

use BrickFTP\ApiOperations\All;
use BrickFTP\ApiOperations\Create;
use BrickFTP\ApiOperations\Delete;
use BrickFTP\ApiOperations\Show;

class Behavior extends ApiResource
{
    use Create;
    use All;
    use Show;
    use Delete;
}
