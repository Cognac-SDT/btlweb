<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 26/07/2018
 * Time: 3:00 PM
 */
namespace App\Seeder;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{
    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name' => 'admin',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}