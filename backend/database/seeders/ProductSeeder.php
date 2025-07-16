<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'room_type_id' => 1, // Ví dụ: Bungalow
                'name' => 'Honeymoon Bungalow',
                'description' => 'Phòng dành cho cặp đôi với không gian lãng mạn, đầy đủ tiện nghi.',
                'price' => 5500000,
                'max_guests' => 2,
                'type' => 'VIP',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_type_id' => 2,
                'name' => 'Natural Wood Room',
                'description' => 'Phòng sử dụng chất liệu gỗ tự nhiên, không gian yên bình.',
                'price' => 5300000,
                'max_guests' => 2,
                'type' => 'Deluxe',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_type_id' => 3,
                'name' => 'Minimalist Room',
                'description' => 'Phòng thiết kế tối giản, hiện đại, tiện nghi đầy đủ.',
                'price' => 4500000,
                'max_guests' => 2,
                'type' => 'Standard',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_type_id' => 3,
                'name' => 'Green Light Room',
                'description' => 'Phòng với ánh sáng xanh dễ chịu và thiết kế tự nhiên.',
                'price' => 5500000,
                'max_guests' => 2,
                'type' => 'Deluxe',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
