<?php
/**
 * Created by PhpStorm.
 * User: tomwurzbach
 * Date: 6/14/19
 * Time: 8:53 PM
 */

namespace BrickFTP;


class BrickFTPException extends \Exception
{
    static public function file_not_found( $filename )
    {
        return new static( 'File not found, filename = ' . $filename );
    }
}
