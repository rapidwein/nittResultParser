<?php

define("_ROLL",107111099);
/*
_SEM=70 for Nov 2011
_SEM=77 for MAY 2012
_SEM=84 for NOV 2012
_SEM=88 for May 2013

*/
define("_SEM",70);

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
$senddata="__VIEWSTATE=".rawurlencode($matches[0])."&Dt1="._SEM."&TextBox1="._ROLL;
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,$senddata);
curl_setopt($ch,CURLOPT_URL , $url);


curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$res = curl_exec($ch);
echo $res;











curl_close($ch);




?>
