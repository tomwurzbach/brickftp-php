<?php

namespace BrickFTP;

use BrickFTP\ApiOperations\All;
use BrickFTP\ApiOperations\Create;
use BrickFTP\ApiOperations\Delete;
use BrickFTP\ApiOperations\Show;

class Folder extends ApiResource
{
    public static function create( $folder )
    {
        $url = static::classUrl() . '/' . $folder;

        $response = static::_requestRaw( 'post', $url );
        $obj = static::convertToObject( $response, null );

        return $obj;
    }

    public static function delete( $folder )
    {
        $url = static::classUrl() . '/' . $folder;

        $response = static::_requestRaw( 'delete', $url );
        $obj = static::convertToObject( $response, null );

        return $obj;
    }
}
