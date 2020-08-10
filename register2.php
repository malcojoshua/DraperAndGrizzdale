<?php
include("utils.php");

$empty = "";
foreach($_POST as $k => $v){
    if ($v == '') {
        $empty .= "<li> $k is not provided</li>";
    }
}
if ($empty != "") die("Errors found:<br><ul>$empty");

$Fname = SQLs($_POST[Fname]);
$Mname = SQLs($_POST[Mname]);
$Lname = SQLs($_POST[Lname]);
$Email = SQLs($_POST[Email]);
$Mobile = SQLs($_POST[Mobile]);
$Company = SQLs($_POST[Company]);
$Role = SQLs($_POST[Role]);
$CertName = SQLs($_POST[CertName]);
$Learning = SQLs($_POST[Learning]);
$Expectation = SQLs($_POST[Expectation]);
$FundSource = SQLs($_POST[FundSource]);
$EventCode = SQLs($_POST[EventCode]);
$Accept1 = (SQLs($_POST[Accept1]) == 'NULL') ? 'NULL' : SQLs($manilanow);
$Accept2 = (SQLs($_POST[Accept2]) == 'NULL') ? 'NULL' : SQLs($manilanow);


DBOpen();

$id = DBGetData("SELECT ID FROM reg WHERE Email=$Email AND EventCode=$EventCode")[0][0];
if (is_null($id))
 $id = DBExecute("INSERT INTO reg(Fname, Mname, Lname, Email, Mobile, Company, Role, CertName, Learning, Expectation, FundSource, Accept1, Accept2, EventCode, Created) VALUES($Fname, $Mname, $Lname, $Email, $Mobile, $Company, $Role, $CertName, $Learning, $Expectation, $FundSource, $Accept1, $Accept2, $EventCode, '$manilanow')");

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