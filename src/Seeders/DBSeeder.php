<?php

declare (strict_types = 1);

namespace Ourgold\Furniture\Seeders;

use Illuminate\Database\Seeder;
use Ourgold\Furniture\Models\ApartmentModel;
use Ourgold\Furniture\Models\FurnitureModel;
use Ourgold\Furniture\Models\RoomModel;

class DBSeeder extends Seeder
{
    /**
     * {@inheritdoc }
     */
    public function run()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../database/data.json'), true);

        !isset($data[$table = 'apartments']) ?: array_map(function ($row) {
            ApartmentModel::create($row);
        }, $data[$table]);

        !isset($data[$table = 'rooms']) ?: array_map(function ($row) {
            RoomModel::create($row);
        }, $data[$table]);

        !isset($data[$table = 'furnitures']) ?: array_map(function ($row) {
            FurnitureModel::create($row);
        }, $data[$table]);
    }
}
