<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\logins;
class login extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        logins::create([
            'email'=>'faisal123@gmail.com',
            'password'=>hash::make('admin'),
            'created_at' => \Carbon\Carbon::createFromDate(2014,07,22)->toDateTimeString(),
            'updated_at' =>\Carbon\Carbon::createFromDate(2014,07,22)->toDateTimeString(),
        ]);
    }
}
