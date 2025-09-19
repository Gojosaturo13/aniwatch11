
<?php 

// Database configuration - Use environment variables for security
$db_host = getenv('DB_HOST') ?: 'HOSTNAME';
$db_user = getenv('DB_USER') ?: 'USERNAME';
$db_pass = getenv('DB_PASS') ?: 'PASSWORD';
$db_name = getenv('DB_NAME') ?: 'DATABASE';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    // Don't show detailed error in production
    if (getenv('VERCEL_ENV') !== 'production') {
        echo("Database connection failed: " . $conn->connect_error);
    } else {
        echo("Service temporarily unavailable.");
    }
}

$websiteTitle = "AniPaca";
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$websiteUrl = "{$protocol}://{$_SERVER['SERVER_NAME']}";
$websiteLogo = $websiteUrl . "/public/logo/logo.png";
$contactEmail = "raisulentertainment@gmail.com";

$version = "1.0.2";

$discord = "https://dcd.gg/anipaca";
$github = "https://github.com/PacaHat";
$telegram = "https://t.me/anipaca";
$instagram = "https://www.instagram.com/pxr15_"; 

// all the api you need - Use environment variables for flexibility
$zpi = getenv('ZEN_API_URL') ?: "https://zen-api-brown.vercel.app"; //https://github.com/PacaHat/zen-api
$proxy = $websiteUrl . "/src/ajax/proxy.php?url=";

//If you want faster loading speed use external proxy
$external_proxy = getenv('PROXY_URL') ?: "https://m3u8proxy.vercel.app/proxy?url="; //https://github.com/PacaHat/shrina-proxy
if (getenv('USE_EXTERNAL_PROXY') === 'true') {
    $proxy = $external_proxy;
}


$banner = $websiteUrl . "/public/images/banner.png";

    