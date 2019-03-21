<?php
/**
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 8:10 PM
 */

namespace BrickFTP\ApiOperations;

/**
 * Trait for deletable resources. Adds a `delete()` method to the class.
 *
 * This trait should only be applied to classes that derive from BrickFTP.
 */

trait Delete
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource The deleted resource.
     */
    public function delete($params = null, $options = null)
    {
        $url = static::instanceUrl();

        $response = static::_request( 'delete', $url, [], $options );
        $obj = static::convertToObject( $response, $options );

        return $obj;

    }
}
