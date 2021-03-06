<?php

namespace BrickFTP;


class BrickObject extends \ArrayIterator
{
    protected $_values;

    public function __construct( $id, $opts = null )
    {
        list( $id, $options ) = $this->normalizeId( $id );

        $this->_values = [];
        $this->_dirty = [];
        if ( $id !== null ) {
            $this->_values[ 'id' ] = $id;
        }
    }

    public function normalizeId( $id )
    {
        if ( is_array( $id ) ) {
            $params = $id;
            $id = $params[ 'id' ];
            unset( $params[ 'id' ] );
        } else {
            $params = [];
        }
        return [ $id, $params ];
    }

    public function __set( $k, $v )
    {
        $this->_values[ $k ] = $v;
        $this->_dirty = $k;
    }


    public function &__get($k)
    {
        // function should return a reference, using $nullval to return a reference to null
        $nullval = null;
        if (!empty($this->_values) && array_key_exists($k, $this->_values)) {
            return $this->_values[$k];


        }
        return $nullval;
    }

    public static function constructFrom( $values, $opts )
    {
        if ( get_class( $values ) == 'stdClass' )
        {
            $values = json_decode( json_encode( $values ), true );
        }

        $obj = new static( isset( $values[ 'id' ] ) ? $values[ 'id' ] : null );
        $obj->refreshFrom( $values, $opts );
        return $obj;
    }

    public function refreshFrom( $values, $opts )
    {
        foreach ( $values as $k => $v ) {
            $this->_values[ $k ] = $v;
        }

    }

    public static function className()
    {
        $class = get_called_class();
        // Useful for namespaces: Foo\Charge
        if ( $postfixNamespaces = strrchr( $class, '\\' ) ) {
            $class = substr( $postfixNamespaces, 1 );
        }
        // Useful for underscored 'namespaces': Foo_Charge
        if ( $postfixFakeNamespaces = strrchr( $class, '' ) ) {
            $class = $postfixFakeNamespaces;
        }
        if ( substr( $class, 0, strlen( 'BrickFTP' ) ) == 'BrickFTP' ) {
            $class = substr( $class, strlen( 'BrickFTP' ) );
        }

        $re = '/(?<=[a-z])(?=[A-Z])/x';
        $a = preg_split($re, $class );
        $class = join($a, "_" );

        $name = urlencode( $class );
        $name = strtolower( $name );

        return $name;
    }

}
