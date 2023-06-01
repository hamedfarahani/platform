<?php

namespace Database\Seeders;

use App\Enum\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = [
            [
                "slug" => Platform::NEWS,
            ],
            [
                "slug" => Platform::TWITTER,
            ],
            [
                "slug" => Platform::INSTAGRAM,
            ]
        ];

        foreach ($platforms as $platform) {
            \App\Models\Platform::updateOrCreate(['slug' => $platform['slug']], $platform);
        }
    }
}
