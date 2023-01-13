<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://sportprogram.iddaa.com/SportProgram?ProgramType=1&SportId=1&MukList=1_1,2_88,2_100,2_101_2.5,2_89');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: sportprogram.iddaa.com';
$headers[] = 'Accept: application/json, text/plain, */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Client-Transaction-Id: fba596c9-fa99-4291-aebc-suphiwashere';
$headers[] = 'Origin: https://www.iddaa.com';
$headers[] = 'Platform: web';
$headers[] = 'Referer: https://www.iddaa.com/';
$headers[] = 'Sec-Ch-Ua: \"Not_A Brand\";v=\"99\", \"Google Chrome\";v=\"109\", \"Chromium\";v=\"109\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Timestamp: 1673641578474';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$sonuc = json_decode($result, true);
foreach($sonuc['data']['spg'][0]['eventGroup'][0]['eventResponse'] as $sup){
	//örn : Kosta Rika Ascenso Ligi, Kapanış, 2.Grup
$lig = $sup['cn'];	

//örn : 14 Ocak Cumartesi
$tarih1 = $sup['ede'];

//örn : 2023-01-14T00:00:00	
$tarih2 = $sup['e'];	

//ev sahibi
$ev = $sup['eprt'][0]['acr'];	

//dep
$dep = $sup['eprt'][1]['acr'];	

//ms1
$ms1 = $sup['m'][0]['o'][0]['odd'];

//msx
$msx = $sup['m'][0]['o'][1]['odd'];

//ms2
$ms2 = $sup['m'][0]['o'][2]['odd'];

//IY1
$IY1 = $sup['m'][1]['o'][0]['odd'];

//IYX
$IYx = $sup['m'][1]['o'][1]['odd'];

//IY2
$IY2 = $sup['m'][1]['o'][2]['odd'];

//kgv
$KGV = $sup['m'][4]['o'][0]['odd'];

//kgy
$KGY = $sup['m'][4]['o'][1]['odd'];


//test command
//echo "$ev - $dep m1=> $ms1 msx => $msx ms2=> $ms2 <br/>";

}

//for json 
$theend = json_encode($sonuc['data']['spg'][0]['eventGroup'][0]['eventResponse']);
print_r($theend);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
