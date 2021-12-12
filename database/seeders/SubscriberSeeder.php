<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Subscriber::create([
			'name' => 'Zayar Tun',
			'email' => 'zay.t@hotmail.com',
		]);

		Subscriber::create([
			'name' => 'Faisal Pasha',
			'email' => 'faisalpasha82@gmail.com',
		]);

		Subscriber::create([
			'name' => 'Zay Yar Tun',
			'email' => 'zayr.dev@outlook.com',
		]);
	}
}
