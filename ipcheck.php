<?php

$contry = strip_tags(@$_GET['country']);
if(!empty($contry) && isset($contry)){
    $_SESSION['country'] = $contry;
}

$domainRaw = explode('.',$_SERVER['HTTP_HOST']);
$domain = $domainRaw[1];
// echo $_GET['country'];
if(isset($contry) && (isset($_SESSION['country']))){

}else{
    $country_code = ip_info("Visitor", "Country Code");
$uri = explode('?', $_SERVER['REQUEST_URI']);
$uriF = $uri[0];
    switch ($country_code) {
        case 'SE':
            if($domain != 'se'){
                echo '<script type="text/javascript">
                        location.replace("https://sharkspeed.se'.$uriF.'");
                    </script>';
                    exit();
                }
            break;
            
            

        case 'DK':
            if($domain != 'dk'){
                echo '<script type="text/javascript">
                        location.replace("https://sharkspeed.dk'.$uriF.'");
                    </script>';
                    exit();
                }

            break;

        case 'FI':
            if($domain != 'fi'){
                echo '<script type="text/javascript">
                        location.replace("https://sharkspeed.fi'.$uriF.'");
                    </script>';
                    exit();
                }

            break;

        case 'NO':
            if($domain != 'no'){
                echo '<script type="text/javascript">
                        location.replace("https://sharkspeed.no'.$uriF.'");
                    </script>';
                    exit();
                }

            break;
        
        default:
            if($domain != 'com'){
                echo '<script type="text/javascript">
                        location.replace("https://sharkspeed.com'.$uriF.'");
                    </script>';
                    exit();
                }

            break;
    }
}


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

?>