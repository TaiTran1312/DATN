<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('room_types')->insert([
            ['name' => 'Bungalow', 'description' => 'Không gian riêng tư, lãng mạn', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Natural Wood', 'description' => 'Gỗ tự nhiên, thân thiện môi trường', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Minimalist', 'description' => 'Tối giản, hiện đại', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
