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

$res = curl_exec($ch);
//$res = str_get_html($res);


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


/*
$senddata="__VIEWSTATE=".rawurlencode("dDwtMTM3NzI1MDM3O3Q8O2w8aTwxPjs+O2w8dDw7bDxpPDE+O2k8Mj47PjtsPHQ8cDxwPGw8VmlzaWJsZTs+O2w8bzxmPjs+Pjs+O2w8aTwxPjtpPDM+Oz47bDx0PDtsPGk8Mz47PjtsPHQ8O2w8aTwwPjs+O2w8dDw7bDxpPDE+Oz47bDx0PEAwPDs7Ozs7Ozs7Ozs+Ozs+Oz4+Oz4+Oz4+O3Q8cDxwPGw8VmlzaWJsZTs+O2w8bzxmPjs+Pjs+Ozs+Oz4+O3Q8O2w8aTw5PjtpPDExPjs+O2w8dDxwPHA8bDxUZXh0O1Zpc2libGU7PjtsPFNlbGVjdCBTZXNzaW9uICAgO288dD47Pj47Pjs7Pjt0PHQ8cDxwPGw8VmlzaWJsZTs+O2w8bzx0Pjs+Pjs+O3Q8aTw1PjtAPC0gU2VsZWN0IC07Tk9WLTIwMTEgKFJFR1VMQVIgRVhBTSk7TUFZLTIwMTIgKFJFR1VMQVIgRVhBTSk7Tk9WLTIwMTIgKFJFR1VMQVIgRVhBTSk7TUFZLTIwMTMoUkVHVUFMUiBFWEFNKTs+O0A8MDs3MDs3Nzs4NDs4ODs+Pjs+Ozs+Oz4+Oz4+Oz4+Oz7A6mF+M3eCWQXdEDNofqNSHLW6mQ==")."&TextBox1=107111099&Button1=Show";
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,$senddata);
curl_setopt($ch,CURLOPT_URL , $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

$res = curl_exec($ch);
echo $res;

*/









/*





$senddata = '__VIEWSTATE='.rawurlencode('dDwtMTM3NzI1MDM3O3Q8O2w8aTwxPjs+O2w8dDw7bDxpPDE+O2k8Mj47aTw0Pjs+O2w8dDxwPHA8bDxWaXNpYmxlOz47bDxvPHQ+Oz4+Oz47bDxpPDE+O2k8Mz47PjtsPHQ8O2w8aTwwPjtpPDE+O2k8Mj47aTwzPjtpPDQ+O2k8NT47aTw2Pjs+O2w8dDw7bDxpPDA+Oz47bDx0PDtsPGk8MT47PjtsPHQ8cDxwPGw8VGV4dDs+O2w8RklSU1QgU0VNRVNURVIgTk9WLTIwMTEgKFJFR1VMQVIgRVhBTSk7Pj47Pjs7Pjs+Pjs+Pjt0PDtsPGk8MT47PjtsPHQ8O2w8aTwxPjs+O2w8dDxwPHA8bDxUZXh0Oz47bDxWQVJVTiBSIFNFS0FSOz4+Oz47Oz47Pj47Pj47dDw7bDxpPDE+Oz47bDx0PDtsPGk8MT47PjtsPHQ8cDxwPGw8VGV4dDs+O2w8MTA3MTExMDk5Oz4+Oz47Oz47Pj47Pj47dDw7bDxpPDA+Oz47bDx0PDtsPGk8MT47PjtsPHQ8QDA8cDxwPGw8UGFnZUNvdW50O18hSXRlbUNvdW50O18hRGF0YVNvdXJjZUl0ZW1Db3VudDtEYXRhS2V5czs+O2w8aTwxPjtpPDg+O2k8OD47bDw+Oz4+Oz47Ozs7Ozs7Ozs7PjtsPGk8MD47PjtsPHQ8O2w8aTwxPjtpPDI+O2k8Mz47aTw0PjtpPDU+O2k8Nj47aTw3PjtpPDg+Oz47bDx0PDtsPGk8MD47aTwxPjtpPDI+O2k8Mz47aTw0PjtpPDU+Oz47bDx0PHA8cDxsPFRleHQ7PjtsPDE7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPFBIMTAxOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxQSFlTSUNTLUk7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPDM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPEE7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPFZHOz4+Oz47Oz47Pj47dDw7bDxpPDA+O2k8MT47aTwyPjtpPDM+O2k8ND47aTw1Pjs+O2w8dDxwPHA8bDxUZXh0Oz47bDwyOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxNUDEwMTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8RU5HSU5FRVJJTkcgR1JBUEhJQ1M7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPDM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPEI7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPEc7Pj47Pjs7Pjs+Pjt0PDtsPGk8MD47aTwxPjtpPDI+O2k8Mz47aTw0PjtpPDU+Oz47bDx0PHA8cDxsPFRleHQ7PjtsPDM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPE1FMTAxOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxFTkdJTkVFUklORyBNRUNIQU5JQ1M7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPDM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPFM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPFZHOz4+Oz47Oz47Pj47dDw7bDxpPDA+O2k8MT47aTwyPjtpPDM+O2k8ND47aTw1Pjs+O2w8dDxwPHA8bDxUZXh0Oz47bDw0Oz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxNQTEwMTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8TUFUSEVNQVRJQ1MtSTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8Mzs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8QTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8Rzs+Pjs+Ozs+Oz4+O3Q8O2w8aTwwPjtpPDE+O2k8Mj47aTwzPjtpPDQ+O2k8NT47PjtsPHQ8cDxwPGw8VGV4dDs+O2w8NTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8SE0xMDE7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPEJBU0lDIENPVVJTRSBJTiBDT01NVU5JQ0FUSVZFIEVOR0xJU0g7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPDM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPEE7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPE07Pj47Pjs7Pjs+Pjt0PDtsPGk8MD47aTwxPjtpPDI+O2k8Mz47aTw0PjtpPDU+Oz47bDx0PHA8cDxsPFRleHQ7PjtsPDY7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPENTMTAxOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxCQVNJQ1MgT0YgUFJPR1JBTU1JTkc7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPDM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPEI7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPFZHOz4+Oz47Oz47Pj47dDw7bDxpPDA+O2k8MT47aTwyPjtpPDM+O2k8ND47aTw1Pjs+O2w8dDxwPHA8bDxUZXh0Oz47bDw3Oz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxDSDEwMTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8Q0hFTUlTVFJZLUk7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPDM7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPEI7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPFZHOz4+Oz47Oz47Pj47dDw7bDxpPDA+O2k8MT47aTwyPjtpPDM+O2k8ND47aTw1Pjs+O2w8dDxwPHA8bDxUZXh0Oz47bDw4Oz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxDQzEwMTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8RU5FUkdZIEFORCBFTlZJUk9OTUVOVEFMIEVOR0lORUVSSU5HOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDwyOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxBOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDxWRzs+Pjs+Ozs+Oz4+Oz4+Oz4+Oz4+Oz4+O3Q8O2w8aTwxPjs+O2w8dDw7bDxpPDE+Oz47bDx0PHA8cDxsPFRleHQ7PjtsPDIzOz4+Oz47Oz47Pj47Pj47dDw7bDxpPDE+Oz47bDx0PDtsPGk8MT47PjtsPHQ8cDxwPGw8VGV4dDs+O2w8MjM7Pj47Pjs7Pjs+Pjs+Pjt0PDtsPGk8MT47PjtsPHQ8O2w8aTwxPjs+O2w8dDxwPHA8bDxUZXh0Oz47bDw4Ljc0Oz4+Oz47Oz47Pj47Pj47Pj47dDxwPHA8bDxWaXNpYmxlOz47bDxvPGY+Oz4+Oz47Oz47Pj47dDw7bDxpPDk+O2k8MTE+Oz47bDx0PHA8cDxsPFRleHQ7VmlzaWJsZTs+O2w8U2VsZWN0IFNlc3Npb24gICA7bzx0Pjs+Pjs+Ozs+O3Q8dDxwPHA8bDxWaXNpYmxlOz47bDxvPHQ+Oz4+Oz47dDxpPDU+O0A8LSBTZWxlY3QgLTtOT1YtMjAxMSAoUkVHVUxBUiBFWEFNKTtNQVktMjAxMiAoUkVHVUxBUiBFWEFNKTtOT1YtMjAxMiAoUkVHVUxBUiBFWEFNKTtNQVktMjAxMyhSRUdVQUxSIEVYQU0pOz47QDwwOzcwOzc3Ozg0Ozg4Oz4+O2w8aTwxPjs+Pjs7Pjs+Pjt0PHA8cDxsPFRleHQ7PjtsPFxlOz4+Oz47Oz47Pj47Pj47PtY4Y8ciFa5VOmsSVcPfoW4UxFMl').'&__EVENTTARGET=Dt1:&__EVENTARGUMENT=70';
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,$senddata);
curl_setopt($ch, CURLOPT_URL,"http://www.nitt.edu/prm/nitreg/ShowRes.aspx");   
echo curl_exec($ch);
*/


curl_close($ch);




?>
