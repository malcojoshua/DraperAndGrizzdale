<?php
include("utils.php");

$empty = "";
foreach($_POST as $k => $v){
    if ($v == '') {
        $empty .= "<li> $k is not provided</li>";
    }
}
if ($empty != "") die("Errors found:<br><ul>$empty");


$Expectation = SQLs($_POST[Expectation]);
$Fname = SQLs($_POST[Fname]);
$Lname = SQLs($_POST[Lname]);
$Email = SQLs($_POST[Email]);
$Mobile = SQLs($_POST[Mobile]);
$EventCode = "'Session'";

DBOpen();

$id = DBGetData("SELECT ID FROM reg WHERE Email=$Email AND EventCode=$EventCode")[0][0];
if (is_null($id))
 $id = DBExecute("INSERT INTO reg(Fname, Lname, Email, Mobile, Expectation, EventCode, Created) VALUES($Fname, $Lname, $Email, $Mobile, $Expectation, $EventCode, '$manilanow')");

$data = http_build_query(array(
 'Fname' => unquote($Fname),
 'Lname' => unquote($Lname),
 'Email' => unquote($Email),
 'Mobile' => unquote($Mobile),
 'Org' => 'DG',
 'EventCode' => unquote($EventCode)
));

$r = json_decode(mycurl('https://regawat.com/reg/api-reg.php', $data));

DBExecute("UPDATE reg SET Price='$r->Price', PayVia='regawat', PayRef='$r->RefNo' WHERE ID=$id");

DBClose();

redir("https://regawat.com/reg/pay.php?id=$r->RefNo");
?>