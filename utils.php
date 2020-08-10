<?php
set_time_limit(300);
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();


$now = new DateTime('NOW', new DateTimeZone('Asia/Singapore'));
$maniladate = $now->format("Y-m-d");
$manilatime = $now->format("H:i:s");
$manilanow = "$maniladate $manilatime";
$conn = null;
define("c", ",");


function curljson($url, $auth, $json){

 $headers = array(
 "Authorization: $auth",
 'Content-Type: application/json;charset=UTF-8'
 );

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 $output = curl_exec($ch);
 curl_close($ch);

 return json_decode($output);

}


function getViaAgent(){
 $useragent=$_SERVER['HTTP_USER_AGENT'];
 return (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) ? 'Mobile' : 'Desktop';
}

function saveCookie($Name, $Value){
 setcookie($Name, $Value, time() + (86400 * 30), '/', '', TRUE, TRUE); 
}

function delCookie($Name){
 setcookie($Name, '', time() - 3600, '/', '', TRUE, TRUE);
}

function jsonResp($type, $data){
 die(json_encode(Array("type" => $type, "data" => $data)));
}

function AmountInWords($num){
 $ones = array(0 =>"ZERO", 1 => "ONE", 2 => "TWO", 3 => "THREE", 4 => "FOUR", 5 => "FIVE", 6 => "SIX", 7 => "SEVEN", 8 => "EIGHT", 9 => "NINE", 10 => "TEN", 11 => "ELEVEN", 12 => "TWELVE", 13 => "THIRTEEN", 14 => "FOURTEEN", 15 => "FIFTEEN", 16 => "SIXTEEN", 17 => "SEVENTEEN", 18 => "EIGHTEEN", 19 => "NINETEEN", "014" => "FOURTEEN"); $tens = array(0 => "ZERO", 1 => "TEN", 2 => "TWENTY", 3 => "THIRTY", 4 => "FORTY", 5 => "FIFTY", 6 => "SIXTY", 7 => "SEVENTY", 8 => "EIGHTY", 9 => "NINETY"); $hundreds = array("HUNDRED", "THOUSAND", "MILLION", "BILLION", "TRILLION", "QUARDRILLION"); /*limit t quadrillion */ $num = number_format($num,2,".",","); $num_arr = explode(".",$num); $wholenum = $num_arr[0]; $decnum = $num_arr[1]; $whole_arr = array_reverse(explode(",",$wholenum)); krsort($whole_arr,1); $rettxt = ""; foreach($whole_arr as $key => $i){ while(substr($i,0,1)=="0" && substr($i,0,1) != false) { $i=substr($i,1,5); }; if($i < 20){/* echo "getting:".$i; */ $rettxt .= $ones[$i]; }elseif($i < 100){if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; }else{if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; } if($key > 0 && $i != '000'){$rettxt .= " ".$hundreds[$key]." "; } } if($decnum > 0) $rettxt .= " AND $decnum/100"; else $rettxt .= " ONLY"; return ucwords(strtolower($rettxt));
}

function dateDiff($date1, $date2){
 $date1 = date_create($date1); 
 $date2 = date_create($date2);
 return (int)date_diff($date1, $date2)->format('%a');
}

function formatDate($date, $format = 'MM')
{
 $date = new DateTime($date);
 switch($format){
  case 'MM': return $date->format('n/j/Y'); break;
  case 'MON': return $date->format('M j, Y'); break;
  case 'MONTH': return $date->format('F j, Y'); break;
 }
}

function is_date($date, $format = 'mdY')
{
 $d = DateTime::createFromFormat($format, $date);
 return $d && $d->format($format) === $date;
}

function padzero($a,$n){
 return str_pad($a, $n, '0', STR_PAD_LEFT);
}

function searchlike($word){
 $out = '%';
 for($i=0; $i < strlen($word); $i++) {
  $out .= substr($word, $i, 1) . '%';
 }
 return $out;
}

function hyperlinks($text){    
 $text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
 $ret = ' ' . $text;
 // Replace Links with http://
 $ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\" rel=\"nofollow\">\\2</a>", $ret);
 // Replace Links without http://
 $ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\" rel=\"nofollow\">\\2</a>", $ret);
 // Replace Email Addresses
 $ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
 $ret = substr($ret, 1);
 // carriage returns to <br>
 $ret = str_replace("\n", '<br>', $ret);
 return $ret;
}

function agoString($time)
{
 global $manilanow;

 $time = strtotime($manilanow) - strtotime($time); // to get the time since that moment

 $time = ($time < 1) ? 1 : $time;
 $tokens = array (
  31536000 => 'yr',
  2592000 => 'mo',
  604800 => 'wk',
  86400 => 'day',
  3600 => 'hr',
  60 => 'min',
  1 => 'sec'
 );

 foreach ($tokens as $unit => $text) {
  if ($time < $unit) continue;
  $numberOfUnits = floor($time / $unit);
  return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
 }
}

function cdbl($s){
 return (real)str_replace(c,'',trim($s));
}

function unquote($s) {
 return str_replace("'", "", $s);
}

function sesvar($set, $item){
 $_SESSION[$item] = $set[$item];
 return $set[$item];
}

function mycurl($url, $postdata) {
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 $output = curl_exec($ch);
 curl_close($ch);
 return $output;
}

function dateadd($dtm, $interval) {
 $date = new DateTime($dtm);
 date_add($date, date_interval_create_from_date_string($interval));
 return $date->format('Y-m-d H:i:s');
}

function wrInput($name, $value, $type) {
 if ($type == "") $type = "text";
 wr("<div class='form-label-group'>
  <input type='$type' id='$name' name='$name' class='form-control' autocomplete='off' placeholder='$name' value='$value'>
  <label for='$name'>$name</label>
  </div>");
}

function left($str, $length) {
 return substr($str, 0, $length);
}

function right($str, $length) {
 return substr($str, -$length);
}

function cleanMobile($m) {
 $m = trim($m);
 $m = preg_replace("/[^0-9]/", "", $m);
 if (left($m,2) == "63") $m = "0" . right($m,10);
 if (strlen($m) == 10) $m = "0" . $m;
 if (strlen($m) != 11) $m = NULL;
 return $m;
}

function cleanEmail($email) {
 $email = trim($email);
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $email = '';
 return $email;
}

include "conn.php";

function DBOpen() {
  global $serverName;
  global $username; 
  global $password;
  global $conn;

  try {
      $conn = new PDO($serverName, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }
}


function dump($d, $die = false) {
 echo "<pre>";
 var_dump($d);
 echo "</pre>";
 if ($die) die();
}

function DBExecute($query) {
 global $conn;
 $conn->query($query);
 return $conn->lastInsertId(); // no Oracle support
}

function DBGetData($query) {
 global $conn;
 $stmt = $conn->query($query);
 $stmt->setFetchMode(PDO::FETCH_NUM); // NUM ASSOC BOTH
 return $stmt->fetchAll();
}

function DBGetData2($query) {
 global $conn;
 $stmt = $conn->query($query);
 $stmt->setFetchMode(PDO::FETCH_ASSOC); // NUM ASSOC BOTH
 return $stmt->fetchAll();
}

function DBClose() {
 global $conn;
 $conn = null;
}

function SQLs($val) {
 if ($val == null)
  return "NULL";
 else
  return "'" . str_replace("'", "''", $val) . "'";
}

$encryption_key = base64_decode("eHchwxYMq6RsYeSEZhghVryeDWlMlQq/MoptlybGli6=");
// $encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));
function encode($data) {
 global $encryption_key;
 return openssl_encrypt($data, 'aes-256-cbc', $encryption_key); //, 0, $iv);
}

function decode($data) {
 global $encryption_key;
 return openssl_decrypt($data, 'aes-256-cbc', $encryption_key); // , 0, $iv);
}

function wr($string) {
 echo $string;
 ob_flush();
 flush();  
}

function match($a, $b, $c) {
 if ($a == $b) return $c;
}

function matchin($haystack, $needle, $c) {
 if (stripos($haystack,$needle) === false)
  return "";
 else
  return $c;
}

function redir($url) {
 header("Location: $url");
 exit();
}

function redirMsg($url, $msg) {
 $_SESSION['alert.msg'] = $msg;
 redir($url);
}
?>