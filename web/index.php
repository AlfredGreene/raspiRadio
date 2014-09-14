<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

require __DIR__."/../vendor/autoload.php";

require __DIR__."/../src/Download.php";

//use Rpr\Download;
//use Naak\Bloc;
echo "<pre>";

$dl = new Rpr\Download();
$dl->debug=true;



// 8bitpp
$url="http://www.8bitpeoples.com/discography?show=all";
echo "getPage('$url')\n";
$dl->getPage($url);
//http://www.8bitpeoples.com/mp3/get/767/8bp133-02-knife_city-goodbye_goodbye_goodbye.mp3
$mp3s=$dl->custom("/\b(http:\/\/www\.8bitpeoples\.com\/mp3\/.*\.mp3)/i");
//print_r($mp3s);
echo implode("\n", $mp3s);
//$html;
/*
$hrefs=$dl->hrefs();
print_r($hrefs);
$mp3s=$dl->mp3s();
print_r($mp3s);
*/

exit;

// ouiedire
/*
echo "getPage('http://www.ouiedire.net')\n";
$dl->getPage('http://www.ouiedire.net');
$hrefs=$dl->hrefs();
foreach ($hrefs as $url) {
    if (preg_match("/^\/emission/", $url)) {
        echo "get http://www.ouiedire.net".$url."\n";
        $html=$dl->getPage('http://www.ouiedire.net'.$url);
        //print_r($html);exit;
        //$hrefs=$dl->hrefs();
        $mp3s=$dl->mp3s();
        foreach ($mp3s as $key => $mp3) {
            $dl->addFile($mp3);
        }
        print_r($mp3s);
        //exit;
    }
}
*/
echo "\n";
echo implode("\n", $dl->files());

exit;

// the brain
/*
$htm = $dl->getPage('http://www.thebrainradio.com/playlists.php');
foreach (explode("\n", $htm) as $row) {
    // thebrain //<a href="mp3/thebrain129.mp3"> 
    preg_match_all("/\ba href=\"(mp3\/thebrain[0-9]+.mp3)/", $row, $o);
    if(count($o[1])){
        //print_r($o[1]);
        foreach($o[1] as $url){
            $dl->addFile("http://www.thebrainradio.com/$url");
        }
    }
}
*/



echo "<hr />files:\n";
echo implode("\n", $dl->files());