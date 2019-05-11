<?php

function is_username_valid($username){
	if (preg_match("/^.{8}[a-z.]*$/", $username)) return true;
	else return false;
}

function is_email_valid($email){
	$data = explode('@', $email);
	// mengecek panjang string pada akun
	if (strlen($data[0]) >=4 ) {
		//memvalidasi email 
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
		else return false;
	}else{
		return false;
	}
}

echo '===========================<br>';
echo 'validasi username<br>';
echo '//param = aden.trisna<br>';
var_dump(is_username_valid('aden.trisna'));
echo '<br>';
echo '==========<br>';
echo '//param = aden1<br>';
var_dump(is_username_valid('aden1'));
echo '<br>';
echo '===========================<br>';
echo 'validasi email<br>';
echo '//param = adentrisnadaudkurnia@gmail.com<br>';
var_dump(is_email_valid('adentrisnadaudkurnia@gmail.com'));
echo '<br>';
echo '==========<br>';
echo '//param = ade@gmail.com<br>';
var_dump(is_email_valid('ade@gmail.com'));
echo '<br>';
echo '===========================<br>';
