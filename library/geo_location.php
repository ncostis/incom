<?php
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE, $currency = 'EUR') {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        // if ($deep_detect) {
        //     if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
        //         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //     if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
        //         $ip = $_SERVER['HTTP_CLIENT_IP'];
        // }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address", "currencycode");
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
        $ctx = stream_context_create(array('http'=>array('timeout' => 1,)));
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip ."&base_currency=$currency",FALSE,$ctx));
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
                case "currencycode":
                    $output = array(
                        //"city"           => @$ipdat->geoplugin_city,
                        //"state"          => @$ipdat->geoplugin_regionName,
                        //"country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        //"continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode,
                        "currency_code" => @$ipdat->geoplugin_currencyCode,
                        "currency_symbol" => @$ipdat->geoplugin_currencySymbol,
                        "currency_converter" => @$ipdat->geoplugin_currencyConverter,
                    );
                    break;
            }
        }
    }
    return $output;
}


// User Get Time Zones
function showclienttime()
{
    if(!isset($_COOKIE['GMT_bias'])) {
        ?>
        <script type="text/javascript">
            var Cookies = {};
            Cookies.create = function (name, value, days) {
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    var expires = "; expires=" + date.toGMTString();
                } else {
                    var expires = "";
                }
                document.cookie = name + "=" + value + expires + "; path=/";
                this[name] = value;
            }
            var now = new Date();
            Cookies.create("GMT_bias", now.getTimezoneOffset(), 1);
            //window.location = "<?php echo $_SERVER['PHP_SELF'];?>";
        </script>
        <?php
    }
    //} else {
        $fct_clientbias = isset($_COOKIE['GMT_bias']) ? $_COOKIE['GMT_bias'] : 0;
    //}
    $fct_servertimedata = gettimeofday();
    $fct_servertime = $fct_servertimedata['sec'];
    $fct_serverbias = $fct_servertimedata['minuteswest'];
    $fct_totalbias = $fct_serverbias - $fct_clientbias;
    $fct_totalbias = $fct_totalbias * 60;
    $fct_clienttimestamp = $fct_servertime + $fct_totalbias;
    $fct_time = time();
    $fct_year = strftime("%Y", $fct_clienttimestamp);
    $fct_month = strftime("%B", $fct_clienttimestamp);
    $fct_day = strftime("%A", $fct_clienttimestamp);
    $fct_hour = strftime("%H", $fct_clienttimestamp);
    $fct_minute = strftime("%M", $fct_clienttimestamp);
    $fct_second = strftime("%S", $fct_clienttimestamp);
    $fct_am_pm = strftime("%p", $fct_clienttimestamp);
    //echo $fct_day.", ".$fct_month." ".$fct_year." ( ".$fct_hour.":".$fct_minute.":".$fct_second." ".$fct_am_pm." )";
    $userTime = $fct_hour.$fct_minute.$fct_day;
    return $userTime;
}

function convertCurrency($amount, $currency, $currencyConverter ) {
        $float = 0;
        if($currency == $currencyConverter)
            return $amount;
        if ( !is_numeric($currencyConverter) || $currencyConverter == 0 ) {
            return $amount;
        }
        if ( !is_numeric($amount) ) {
            return $amount;
        }
        return round( ($amount * $currencyConverter), $float );
    }
?>