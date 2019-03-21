<?php
/**
 * Created by PhpStorm.
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 10:00 PM
 */

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
        return str_replace( "{subdomain}", "lifesouth", $baseUrl );
    }

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        $base = static::className();
        return "/v1/${base}s";
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
