<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HoroscopesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horoscopes')->insert([
            ['name' => '整體運勢', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '愛情運勢', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '事業運勢', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => '財運運勢', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
