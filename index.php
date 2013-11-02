<?php

if (!isset($_SERVER["HTTP_HOST"])) {
  parse_str($argv[1], $_GET);
  parse_str($argv[1], $_POST);
}
define("_ROLL",$_POST['rollno']);
/*
_SEM=70 for Nov 2011
_SEM=77 for MAY 2012
_SEM=84 for NOV 2012


*/
$SEM = Array(70,77,84,88);

/*
echo "<select name='rollno' id='rollno'><option value='0'>Select--</option>";
for($i=0;$i<105;$i++){
$no=_ROLL+$i;
echo "<option value=".$no.">".$no."</option>";
}
echo "</select>";
*/
$url = "http://www.nitt.edu/prm/nitreg/ShowRes.aspx";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL , $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_COOKIEJAR,"cookie_file.txt");
curl_setopt($ch,CURLOPT_COOKIEFILE,"cookie_file.txt");
$res = curl_exec($ch);


preg_match("/<input type=\"hidden\" name=\"__VIEWSTATE\" value=\"(.*?)\"/s",$res,$matches);

$matches[0]=preg_replace("/<input type=\"hidden\" name=\"__VIEWSTATE\" value=/"," ",$matches[0]);
$matches[0] = str_replace(array('\'', '"'), '', $matches[0]); 
$senddata="__VIEWSTATE=".rawurlencode($matches[0])."&TextBox1="._ROLL."&Button1=Show";
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,$senddata);
curl_setopt($ch,CURLOPT_URL , $url);


curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$res = curl_exec($ch);



preg_match("/<input type=\"hidden\" name=\"__VIEWSTATE\" value=\"(.*?)\"/s",$res,$matches);

$matches[0]=preg_replace("/<input type=\"hidden\" name=\"__VIEWSTATE\" value=/"," ",$matches[0]);
$matches[0] = str_replace(array('\'', '"'), '', $matches[0]);
$senddata="__VIEWSTATE=".rawurlencode($matches[0])."&TextBox1="._ROLL."&Dt1=";
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch,CURLOPT_URL , $url);


curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
for($i=0;$i<4;$i++){
curl_setopt($ch,CURLOPT_POSTFIELDS,$senddata.$SEM[$i]);
$res = curl_exec($ch);


preg_match("/<span id=\"LblName\">(.*?)<\/span>/s",$res,$name);
$name = preg_replace("/<span id=\"LblName\">(.*?)\">/s","",$name[0]);
$name = preg_replace("/<\/font><\/b><\/span>/s","",$name);

preg_match("/<span id=\"LblEnrollmentNo\">(.*?)<\/span>/s",$res,$roll);
$roll = preg_replace("/<span id=\"LblEnrollmentNo\">(.*?)\">/s","",$roll[0]);
$roll = preg_replace("/<\/font><\/b><\/span>/s","",$roll);

preg_match("/<span id=\"LblExamName\">(.*?)<\/span>/s",$res,$exam);
$exam = preg_replace("/<span id=\"LblExamName\">(.*?)\">/s","",$exam[0]);
$exam = preg_replace("/<\/font><\/b><\/span>/s","",$exam);

preg_match("/<span id=\"LblGPA\">(.*?)<\/span>/s",$res,$gpa);
$gpa = preg_replace("/<span id=\"LblGPA\">(.*?)\">/s","",$gpa[0]);
$gpa = preg_replace("/<\/font><\/b><\/span>/s","",$gpa);

echo "\n".$name." | ".$roll." | ".$exam." | ".$gpa."\n\n";
}










curl_close($ch);




?>
