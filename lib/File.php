<?php


namespace BrickFTP;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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
        try {
            $client = new Client();
            $response = $client->get( $this->download_uri );
            return $response->getBody()->getContents();
        } catch( ClientException $re ) {
            if ( $re->getResponse()->getStatusCode() == 404 ) return false;
            throw new BrickFTPException( $re->getMessage() );
        }
    }
}
