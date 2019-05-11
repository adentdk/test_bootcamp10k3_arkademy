<?php

function bendera(){
	$string = ['P','R','O','G','R','A','M','M','E','R'];
	$bendera = [];

	// loop membuat bendera
	for ($a=0; $a < count($string) ; $a++) {
		for ($b=0; $b < count($string) ; $b++) {
			$data[$a][$b] = '=';
		}
	}

	// loop tambah tulisan programmer
	for ($c=0; $c < count($string) ; $c++) { 

		$d = count($string) - 1 - $c;

		$data[$c][$c] = $string[$c];
		$data[$c][$d] = $string[$c];	
	}

	// loop cetak bendera
	for ($e=0; $e < count($string) ; $e++) {
		for ($f=0; $f < count($string) ; $f++) {
			echo ''.$data[$e][$f].'&nbsp;&nbsp;';
		}
		echo '<br>';
	}
}

bendera();