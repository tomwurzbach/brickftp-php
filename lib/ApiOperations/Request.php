<?php
/**
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 9:55 PM
 */

namespace BrickFTP\ApiOperations;


use BrickFTP\BrickFTP;
use GuzzleHttp\Client;

trait Request
{
    protected static function _request( $method, $url, $params = null, $options = [] )
    {
        $options || $options = [];

        $options = array_merge( $options,[
            'auth' => [
                BrickFTP::$apiKey,
                'x'
            ] ] );
        if ( $params ) {
            $options = array_merge( $options, [
                'body' => json_encode( $params ),
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);
        }

        $baseUrl = static::baseUrl();

        $client = new Client();
        $response = $client->request( $method, $baseUrl . $url . '.json', $options );
        return json_decode( $response->getBody()->getContents() );
    }

    protected static function _requestRaw( $method, $url, $params = null, $options = [] )
    {
        $options || $options = [];

        $options = array_merge( $options,[
            'auth' => [
                BrickFTP::$apiKey,
                'x'
            ] ] );
        if ( $params ) {
            $options = array_merge( $options, [
                'body' => json_encode( $params )
            ]);
        }

        $baseUrl = static::baseUrl();

        $client = new Client();
        $response = $client->request( $method, $baseUrl . $url, $options );
        return json_decode( $response->getBody()->getContents() );
    }

    public static function convertToObject( $response, $opts )
    {
        if ( is_array( $response ) )
        {
            $map = [];
            foreach ($response as $i) {
                array_push($map, static::constructFrom( $i, $opts ));
            }
            return $map;
        }

        return static::constructFrom( $response, $opts );
    }
}
