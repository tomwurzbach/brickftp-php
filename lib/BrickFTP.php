<?php
/**
 * Created by PhpStorm.
 * User: tomwurzbach
 * Date: 3/18/19
 * Time: 8:27 PM
 */

namespace BrickFTP;


class BrickFTP
{
    // @var string The Stripe API key to be used for requests.
    public static $apiKey = '7b548548698dadc87a6cd81842a2063e0c63d53f09a2da5b1a335767879a2e5d';

    // @var string The Stripe client_id to be used for Connect requests.
    public static $clientId;

    // @var string The base URL for the Stripe API.
    public static $apiBase = 'https://{subdomain}.brickftp.com/api/rest';

    // @var string The base URL for the OAuth API.
    public static $connectBase = 'https://connect.stripe.com';

    // @var string The base URL for the Stripe API uploads endpoint.
    public static $apiUploadBase = 'https://uploads.stripe.com';

    public static $subdomain;
}
