<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Romance'],
            ['name'=>'Animation'],
            ['name'=>'Action'],
            ['name'=>'Comedy'],
            ['name'=>'Horror'],
            ['name'=>'Crime'],
            ['name'=>'Adventure'],

        ];
        foreach ($data as $d){
            DB::table('genres')->insert([
                'name' => $d['name'],
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
