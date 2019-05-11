<?php

function mybiodata(){
	$biodata = [
		'name' => 'Aden Trisna Daud Kurnia',
		'address' => 'Kampung Cilayung RT.03/04, Kelurahan Wargamekar, Kecamatan Baleendah, Kabupaten Bandung',
		'hobbies' => ['menyanyi','menonton','membaca novel'],
		'is_married' => false,
		'school' => (object) [
			'highSchool' => 'SMK Negeri 7 Baleendah',
			'university' => ''
		],
		'skills' => (object) [
			[
				'name' => 'HTML',
				'score' => '95 out of 100'
			],
			[
				'name' => 'JS',
				'score' => '75 out of 100'
			],
			[
				'name' => 'CSS',
				'score' => '80 out of 100'
			],
			[
				'name' => 'PHP',
				'score' => '85 out of 100'
			]
		]
	];

	return json_encode($biodata);
}

echo mybiodata();