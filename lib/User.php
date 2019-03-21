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

class User extends ApiResource
{
    use Create;
    use All;
    use Show;
    use Delete;

    public function unlock()
    {
        $url = $this->instanceUrl();

        $url .= "/unlock";

        $response = static::_request( 'post', $url);
        $obj = static::convertToObject( $response, null );

        return $obj;
    }

    public function create_api_key( $params, $opts = null )
    {
        $url = $this->instanceUrl();

        $url .= "/api_keys";

        $response = static::_request( 'post', $url, $params, $opts );
        $obj = ApiKey::convertToObject( $response, null );

        return $obj;
    }

    public function list_api_keys()
    {
        $url = $this->instanceUrl();

        $url .= "/api_keys";

        $response = static::_request( 'get', $url );
        $obj = ApiKey::convertToObject( $response, null );

        return $obj;
    }
}
