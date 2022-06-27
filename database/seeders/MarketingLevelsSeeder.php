<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketingLevelsSeeder extends Seeder
{
    protected $levels;
    /**
     * constructor to define marketing levels as initial
     */
    public function __construct()
    {
        $this->levels = array(
            ['level_name' => 'Level 1', 'percentage' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['level_name' => 'Level 2', 'percentage' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['level_name' => 'Level 3', 'percentage' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        );
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check levels array is not empty
        if (!empty($this->levels)) {
            foreach ($this->levels as $level) {
                $getExistLevel = DB::table('marketing_levels')->where('percentage', $level['percentage'])->first();
                if (empty($getExistLevel)) {
                    DB::table('marketing_levels')->insert($level);
                }
            }
        }
    }
}
