<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $fillable = [
        'sort',
        'city_name_ar',
        'city_name',
    ];

    static function getSelectedCities(): \Illuminate\Support\Collection
    {
        $cities = Cities::get(['id', 'city_name', 'sort'])->whereIn('id', range(2, 5))->toArray();

        $cities_collection = collect($cities);
        return $cities_collection->mapWithKeys(function (array $city) {
            return [$city['id'] => $city['city_name']];
        });
    }

    static function getCrossOverCities($source_city_id, $destination_city_id): \Illuminate\Support\Collection
    {
        $cities = self::get(['id', 'city_name', 'sort'])->whereIn('id', range($source_city_id, $destination_city_id))->toArray();
        $cities_collection = collect($cities);
        return $cities_collection->mapWithKeys(function (array $city) {
            return [$city['id'] => $city['city_name']];
        });
    }
}
