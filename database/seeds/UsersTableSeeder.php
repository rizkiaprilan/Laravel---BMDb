<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=> 'Mhd. Rezki Aprilan','email'=>'riskiazza@gmail.com','password'=>'123456789','gender'=>'male','address'=>'jl. Nimun Raya','role'=>'admin','date'=>'1999-04-08','photo'=>'default.png'],
            ['name'=> 'Kunta Rizki Purnama','email'=>'kuntarizki@gmail.com','password'=>'123456789','gender'=>'male','address'=>'jl. Cempedak','role'=>'admin','date'=>'1999-08-08','photo'=>'default.png']
        ];
        foreach ($data as $d){
            DB::table('users')->insert([
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => Hash::make($d['password']),
                'gender' => $d['gender'],
                'role'=> $d['role'],
                'address' => $d['address'],
                'date' => $d['date'],
                'photo' => $d['photo'],
            ]);
        }




    }
}
