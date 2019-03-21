<?php
/**
 * Created by PhpStorm.
 * User: tomwurzbach
 * Date: 3/19/19
 * Time: 7:49 AM
 */

namespace BrickFTP\ApiOperations;


trait Show
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of ApiResources
     */
    public static function show( $id, $opts = null )
    {
        $instance = new static( $id, $opts );
        $instance->refresh();
        return $instance;
    }

    public function refresh()
    {
        $url = $this->instanceUrl();

        $response = static::_request( 'get', $url );
        $obj = static::convertToObject( $response, null );

        foreach( $obj->_values as $k=>$v )
        {
            $this->_values[ $k ] = $v;
        }
    }
}
