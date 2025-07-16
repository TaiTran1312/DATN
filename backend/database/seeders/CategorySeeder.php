<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Quần Áo',
                'slug' => self::customSlug('Quần Áo'),
                'image' => 'quanao.jpg',
                'parent_id' => null,
            ],
            [
                'name' => 'Áo',
                'slug' => self::customSlug('Áo'),
                'image' => 'ao.jpg',
                'parent_id' => 1,
            ],
            [
                'name' => 'Quần',
                'slug' => self::customSlug('Quần'),
                'image' => 'quan.jpg',
                'parent_id' => 1,
            ],
            [
                'name' => 'Giày',
                'slug' => self::customSlug('Giày'),
                'image' => 'giay.jpg',
                'parent_id' => 1,
            ],
            [
                'name' => 'Áo khoác',
                'slug' => self::customSlug('Áo khoác'),
                'image' => 'aokhoac.jpg',
                'parent_id' => 2,
            ],
            [
                'name' => 'Quần Tây',
                'slug' => self::customSlug('Quần Tây'),
                'image' => 'quantay.jpg',
                'parent_id' => 3,
            ],
            [
                'name' => 'Giày sneaker',
                'slug' => self::customSlug('Giày sneaker'),
                'image' => 'giaysneaker.jpg',
                'parent_id' => 4,
            ],
        ]);
    }

    /**
     * Tạo slug giữ nguyên chữ in hoa đầu từ.
     */
    private static function customSlug($string)
    {
        return ucwords(str_replace('-', ' ', Str::slug($string)));
    }
}
