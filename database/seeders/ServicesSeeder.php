<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'نص تجريبي',
                'slug' => \Str::slug('نص تجريبي'),
                'short_description' => 'نص تجريبي',
                'description' => 'نص تجريبي',
                'keywords' => 'نص تجريبي',
                'logo' => 'نص تجريبي'
            ],
            [
                'name' => 'نص تجريبي',
                'slug' => \Str::slug('نص تجريبي'),
                'short_description' => 'نص تجريبي',
                'description' => 'نص تجريبي',
                'keywords' => 'نص تجريبي',
                'logo' => 'نص تجريبي'
            ],
            [
                'name' => 'نص تجريبي',
                'slug' => \Str::slug('نص تجريبي'),
                'short_description' => 'نص تجريبي',
                'description' => 'نص تجريبي',
                'keywords' => 'نص تجريبي',
                'logo' => 'نص تجريبي'
            ]
        ];
        foreach ($services as $service)
        {
            Service::query()->create($service);
        }
    }
}
