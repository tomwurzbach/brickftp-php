<?php

namespace BrickFTP;

class ApiResource extends BrickObject
{
    use ApiOperations\Request;

    /**
     * @return string The base URL for the given class.
     */
    public static function baseUrl()
    {
        $baseUrl = BrickFTP::$apiBase;
        return str_replace( "{subdomain}", BrickFTP::$subdomain, $baseUrl );
    }

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        $base = static::className();
        return "/" . BrickFTP::$apiVersion . "/${base}s";
    }

    public function instanceUrl()
    {
        return $this->resourceUrl( $this->id );
    }

    public function resourceUrl( $id )
    {
        $classUrl = static::classUrl();
        $encodedId = urlencode( $id );
        return $classUrl . '/' . $encodedId;
    }
}
