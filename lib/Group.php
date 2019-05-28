<?php

namespace BrickFTP;

use BrickFTP\ApiOperations\All;
use BrickFTP\ApiOperations\Create;
use BrickFTP\ApiOperations\Delete;
use BrickFTP\ApiOperations\Show;

class Group extends ApiResource
{
    use Create;
    use All;
    use Show;
    use Delete;

    public function create_user( $params, $options = null )
    {
        $url = $this->instanceUrl();

        $url .= "/users";

        $params = [ 'user' => $params ];
        $response = static::_request( 'post', $url, $params, $options );
        $obj = User::convertToObject( $response, $options  );

        return $obj;
    }

    public function add_member( $user, $admin = false )
    {
        $url = $this->userInstanceUrl( $user );
        $params = $this->membership( $admin );

        $response = static::_request( 'put', $url, $params );
        $obj = static::convertToObject( $response, null  );

        return $obj;

    }

    public function update_member( $user, $admin = false )
    {
        $url = $this->userInstanceUrl( $user );

        $params = $this->membership( $admin );
        $response = static::_request( 'patch', $url, $params );
        $obj = static::convertToObject( $response, null  );

        return $obj;

    }

    public function remove_member( $user )
    {
        $url = $this->userInstanceUrl( $user );

        $response = static::_request( 'delete', $url  );
        $obj = static::convertToObject( $response, null  );

        return $obj;
    }

    protected function userInstanceUrl( $user )
    {
        $userid = ( is_object( $user ) ? $user->id : $user );

        $url = $this->instanceUrl() . "/memberships/{$userid}";
        return $url;
    }

    protected function membership( $admin )
    {
        $params = [ 'membership' => [ 'admin' => ($admin ? 'true' : 'false') ] ];
        return $params;
    }
}
