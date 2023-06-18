<?php

echo $ip =  $_SERVER['REMOTE_ADDR'];

echo "<br>";
	
// echo gethostname(); 
// echo gethostbyaddr($_SERVER['REMOTE_ADDR']);


$ip_info = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));  

if($ip_info && $ip_info->geoplugin_countryName != null){
	echo 'Country = '.$ip_info->geoplugin_countryName.'<br/>';
	echo 'Country Code = '.$ip_info->geoplugin_countryCode.'<br/>';
	echo 'City = '.$ip_info->geoplugin_city.'<br/>';
	echo 'Region = '.$ip_info->geoplugin_region.'<br/>';
	echo 'Latitude = '.$ip_info->geoplugin_latitude.'<br/>';
	echo 'Longitude = '.$ip_info->geoplugin_longitude.'<br/>';
	echo 'Timezone = '.$ip_info->geoplugin_timezone.'<br/>';
	echo 'Continent Code = '.$ip_info->geoplugin_continentCode.'<br/>';
	echo 'Continent Name = '.$ip_info->geoplugin_continentName.'<br/>';
	echo 'Timezone = '.$ip_info->geoplugin_timezone.'<br/>';
	echo 'Currency Code = '.$ip_info->geoplugin_currencyCode;
}


// echo $localIP = getHostByName(getHostName());

$exec = 'ipconfig | findstr /R /C:"IPv4.*"';
exec($exec, $output);
preg_match('/\d+\.\d+\.\d+\.\d+/', $output[0], $matches);
print_r($matches[0]);

// ===========================
// ob_start();
// system('ipconfig/all');
// $mysys = ob_get_contents();
// ob_clean();

// $findp = "Physical";
// $mymac =strpos($mysys, $findp);
// $mac = substr($mysys, ($mymac+36),17);
// // echo "your mac is :{$mac} <br>";

//     $ipaddress = '';
//     if (getenv('HTTP_CLIENT_IP'))
//         $ipaddress = getenv('HTTP_CLIENT_IP');
//     else if(getenv('HTTP_X_FORWARDED_FOR'))
//         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
//     else if(getenv('HTTP_X_FORWARDED'))
//         $ipaddress = getenv('HTTP_X_FORWARDED');
//     else if(getenv('HTTP_FORWARDED_FOR'))
//         $ipaddress = getenv('HTTP_FORWARDED_FOR');
//     else if(getenv('HTTP_FORWARDED'))
//        $ipaddress = getenv('HTTP_FORWARDED');
//     else if(getenv('REMOTE_ADDR'))
//         $ipaddress = getenv('REMOTE_ADDR');
//     else
//         $ipaddress = 'UNKNOWN';
//     // echo $ipaddress;
// @$date = date("y-m-d");

// echo $ipaddress;
// // $sql = "INSERT INTO visitor (`page_section`,`ip`, `mac`, `date`) VALUES ('$page', '$ipaddress', '$mac', '$date')";
// //     if(!$result = mysqli_query($conn, $sql )){
// //     	echo "err";
// //     }


// // =========================
?>