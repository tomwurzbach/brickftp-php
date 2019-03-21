<?php
/**
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 8:25 PM
 */

namespace BrickFTP\ApiOperations;

trait All
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of ApiResources
     */
    public static function all( $params = null, $opts = null )
    {
        $url = static::classUrl();

        $response = static::_request( 'get', $url );
        $obj = static::convertToObject( $response, $opts );

        return $obj;
    }

}
