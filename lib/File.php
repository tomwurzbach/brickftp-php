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
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class File extends ApiResource
{
    public static function delete( $folder )
    {
        try {
            $url = static::classUrl() . $folder;

            static::_requestRaw( 'delete', $url );
            return true;
        } catch( ClientException $re ) {
            if ( $re->getResponse()->getStatusCode() == 404 ) return false;
            throw $re;
        }
    }

    public static function download( $file )
    {
        $url = static::classUrl() . $file;

        $response = static::_requestRaw( 'get', $url );
        $obj = static::convertToObject( $response, null  );
        return $obj;
    }

    public function contents()
    {
        return file_get_contents( $this->download_uri );
    }
}
