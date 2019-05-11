<?php
function generateRandString($param){
	$string = "abcdefghijklmnopqrstuvwxyz0123456789";
	$strs = [];
	$result = '';
	// melakukan perulangan mengacak string
	for ($a=1; $a <= $param ; $a++) {
		$str = '';
		// mengacak string
		for ($b=1; $b <= 32 ; $b++) { 
			$char = rand(0, (strlen($string)-1) );
			$str .= $string{$char};
		}
		array_push($strs, $str);
	}
	// pengecekan data yang sama
	// jika data terdapat duplikasi maka akan diambil salah satunya
	$data = array_unique($strs); 
	// mencetak data
	foreach ($data as $str) {
		echo $str."<br>";
	}
	echo '<b>string dicetak sebanyak '.count($data). 'kali</b> <br>';
}

generateRandString(7);