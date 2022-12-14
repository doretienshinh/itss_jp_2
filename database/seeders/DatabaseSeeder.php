<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\SpendingType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => '必要',
            ],
            [
                'name' => '自身',
            ],
            [
                'name' => '貯金',
            ],
        ];

        foreach ($types as $type) {
            $newType = SpendingType::create($type);
        }
    }
}
