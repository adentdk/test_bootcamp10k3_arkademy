<?php

function getLargeLetter($data){

	for ($i=0; $i < count($data) ; $i++) { 
		rsort($data[$i]); #mengurutkan secara terbalik masing2 index di $data
		$newData[$i] = $data[$i][0]; #mengambil nilai pertama setip index
	}

	return $newData;
}

$data = [
	['a','g','c'],
	['h','z','s','t'],
	['v','q','e','r']
];

$newData = getLargeLetter($data);
var_dump($newData);
