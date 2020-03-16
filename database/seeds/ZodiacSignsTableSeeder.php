<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZodiacSignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zodiac_signs')->insert([
            ['name' => '水瓶座', 'from' => '2020-01-20', 'to' => '2020-02-19', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '雙魚座', 'from' => '2020-02-20', 'to' => '2020-03-20', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '牡羊座', 'from' => '2020-03-21', 'to' => '2020-04-20', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '金牛座', 'from' => '2020-04-21', 'to' => '2020-05-20', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '雙子座', 'from' => '2020-05-21', 'to' => '2020-06-21', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '巨蟹座', 'from' => '2020-06-22', 'to' => '2020-07-22', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '獅子座', 'from' => '2020-07-23', 'to' => '2020-08-22', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '處女座', 'from' => '2020-08-23', 'to' => '2020-09-22', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '天秤座', 'from' => '2020-09-23', 'to' => '2020-10-22', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '天蠍座', 'from' => '2020-10-23', 'to' => '2020-11-21', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '射手座', 'from' => '2020-11-22', 'to' => '2020-12-21', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '摩羯座', 'from' => '2020-12-22', 'to' => '2020-01-19', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
