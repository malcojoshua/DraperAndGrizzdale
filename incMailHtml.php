<?php
include("Mail.php");
include("Mail/mime.php");

// 2019-09-27
// returns '' or 'error message'
function SendEmailHtml($from, $to, $subject, $template, $vars){
 // get html template
 $myfile = fopen($template, "r");
 $html = fread($myfile,filesize($template));
 fclose($myfile);
 // merge vars
 foreach($vars as $i => $v) {
  $html = str_replace("#$i#", $v, $html);
 }
 
 $mime = new Mail_mime("\n");
 $mime ->setHTMLBody($html);
 $body = $mime->get();

 $username = "erick@kalugdan.com";
 $password = "6r8pS8pj23qS";
 $host = "ssl://smtp-pulse.com";
 
 $from = "$from <noreply@myinfotxt.com>";

 $hdrs = array ('From' => $from, 'To' => $to, 'Subject' => $subject, 'Reply-to' => 'claire@draperandgrizzdale.com');
 $hdrs = $mime->headers($hdrs);
 $mail = Mail::factory('smtp', array ('host' => $host, 'port' => '465', 'auth' => true, 'username' => $username, 'password' => $password));
 $mail ->send("$to,erick@kalugdan.com", $hdrs, $body);

 if (PEAR::isError($mail))
  return $mail->getMessage();
 else
  return "";
}
?>