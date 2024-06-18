<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     //Using ORM Eloquent
     $user = new User;
     $user->document = '1002591304';
     $user->fullname = 'Brahian agudelo';
     $user->gender = 'Masculino';
     $user->birthdate = '2001-01-09';
     $user->phone = '3152132573';
     $user->email = 'brahianamarin23@gmail.com';
     $user->password = bcrypt('admin');
     $user->role = 'Administrator';
     $user->save();

     //Using ORM Eloquent
     $user = new User;
     $user->document = '1053864579';
     $user->fullname = 'juan manuel';
     $user->gender = 'Male';
     $user->birthdate = '1998-07-27';
     $user->phone = '3207896985';
     $user->email = 'juanmanuelfukenes@gmail.com';
     $user->password = bcrypt('admin');
     $user->role = 'Administrator';
     $user->save();

     //Using DB Array
     DB::table('users')->insert([
         'document' => '75000001',
         'fullname' => 'Jhom Wick',
         'gender' => 'Male',
         'birthdate' => '1995-01-01',
         'phone' => '1234567890',
         'email' => '4C6pW@example.com',
         'password' => bcrypt('admin'),
         'role' => 'Customer'
     ]);
    }
}
