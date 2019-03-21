<?php
/**
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 8:12 PM
 */

namespace BrickFTP\ApiOperations;


trait Create
{
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return ApiResource The created resource.
     */
    public static function create($params, $options = null)
    {
        $url = static::classUrl();

        $response = static::_request( 'post', $url, $params, $options );
        $obj = static::convertToObject( $response, $options );

        return $obj;
    }
}
