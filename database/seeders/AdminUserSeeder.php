<?php

namespace Database\Seeders;

use DB;
use Hash;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    protected $adminUser;
    public function __construct()
    {
        $this->adminUser = array('name' => 'admin user', 'email' => 'moriswala3880@gmail.com', 'password' => Hash::make('12345678'), 'referral_code' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'),0,8), 'mlm_level' => 0, 'user_level' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now());
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = DB::table('users')->where('email', $this->adminUser['email'])->first();
        if (empty($result)) {
            DB::table('users')->insert($this->adminUser);
        }
    }
}
