<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cities;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            [
                "sort" => "1",
                "city_name_ar" => "الأسكندرية",
                "city_name" => "Alexandria"
            ],
            [
                "sort" => "2",
                "city_name_ar" => "القاهرة",
                "city_name" => "Cairo"
            ],
            [
                "sort" => "3",
                "city_name_ar" => "الجيزة",
                "city_name" => "Giza"
            ],
            [
                "sort" => "4",
                "city_name_ar" => "الفيوم",
                "city_name" => "Fayoum"
            ],
            [
                "sort" => "5",
                "city_name_ar" => "بني سويف",
                "city_name" => "Beni Suef"
            ],
            [
                "sort" => "6",
                "city_name_ar" => "المنيا",
                "city_name" => "Minya"
            ],
            [
                "sort" => "7",
                "city_name_ar" => "اسيوط",
                "city_name" => "Assiut"
            ],
            [
                "sort" => "8",
                "city_name_ar" => "سوهاج",
                "city_name" => "Sohag"
            ],
            [
                "sort" => "9",
                "city_name_ar" => "قنا",
                "city_name" => "Qena"
            ],
            [
                "sort" => "10",
                "city_name_ar" => "الأقصر",
                "city_name" => "Luxor"
            ],
            [
                "sort" => "11",
                "city_name_ar" => "اسوان",
                "city_name" => "Aswan"
            ]
        ];
        Cities::insert($seeds);
    }
}
