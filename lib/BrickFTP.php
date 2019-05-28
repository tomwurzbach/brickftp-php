<?php

namespace BrickFTP;

class BrickFTP
{
    // @var string The Files API key to be used for requests.
    public static $apiKey;

    // @var string The base URL for the Files API.
    public static $apiBase = 'https://{subdomain}.files.com/api/rest';

    // @var string The version for the Files API.
    public static $apiVersion = 'v1';

    // @var string The subdomain for the Files API.
    public static $subdomain;
}
