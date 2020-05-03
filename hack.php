<?php

//o peres vai vencer

$votes = 35000;
$counter = 0;

echo "Bot votador de eleições feito por Terremoth - Free Software under GPLv3".PHP_EOL;

while ($counter < $votes ) {

	$postdata = http_build_query(
		array(
			'resposta' => '26854', //id do peres
			'eqt_id' => 'XXXX'
		)
	);

	$opts = array(
		'http' => array(
			'Content-Type: text/html; charset=utf-8',
			'method' => "POST",
			'Content-length: '. strlen($postdata) . "\r\n",
			'max_redirects' => '0',
			'header'  => 'Content-Type: application/x-www-form-urlencoded',
			'ignore_errors' => '1',
			'content' => $postdata
		 )
	);

	$context = stream_context_create($opts);

	$result = file_get_contents('https://pa.srvsite.com/XXXXXX/votar', false, $context);
	
	if (!$result) {
		echo "Parei no voto $counter e não consigo mais votar. HTTP Status: ".$http_response_header[0].PHP_EOL;
	}
	
	echo "Contabilizando voto nº $counter para o Peres".PHP_EOL;
		
	$counter++;
	
	sleep(rand(1,2.6));
	

}
