<?php


class UserTest extends \PHPUnit\Framework\TestCase
{
    public function createFixture($params = [])
    {
        return \BrickFTP\User::constructFrom(
            array_merge($params, []),
            []
        );

        /*

                 $resource = $this->createFixture(['customer' => 'cus_123']);
                $this->assertSame(
                    "/v1/customers/cus_123/sources/" . self::TEST_RESOURCE_ID,
                    $resource->instanceUrl()
                );
        */
//        $s =
    }

    public function setUp()
    {
        parent::setUp();
        \BrickFTP\BrickFTP::$apiKey = getenv( 'BRICKFTP_KEY' );
        \BrickFTP\BrickFTP::$subdomain = getenv( 'BRICKFTP_DOMAIN' );


        $folder = \BrickFTP\Folder::create( 'tom/testing' );
        print_r( $folder );
        exit;
    }

    public function testGetUsers()
    {
        $p = \BrickFTP\User::all();
        print_r( $p );
        exit;
    }

    public function testHasCorrectUrlForUser()
    {
        $resource = $this->createFixture(['customer' => 'cus_123']);
        print_r( $resource );
        exit;

        $this->assertSame(
            "/v1/customers/cus_123/sources/" . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }
}
