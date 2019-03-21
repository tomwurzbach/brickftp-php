<?php
/**
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 8:43 PM
 */

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function createFixture($params = [])
    {
        return User::constructFrom(
            array_merge($params, $base),
            new Util\RequestOptions()
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



    public function testHasCorrectUrlForUser()
    {
        $resource = $this->createFixture(['customer' => 'cus_123']);
        $this->assertSame(
            "/v1/customers/cus_123/sources/" . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }
}
