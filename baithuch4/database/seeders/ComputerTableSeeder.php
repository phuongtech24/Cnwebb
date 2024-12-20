<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Thêm 50 bản ghi mới vào bảng computers
        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->regexify('Lab[1-9]-PC[0-9]{2}'),
                'model' => $faker->word . ' ' . $faker->randomNumber(3),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Ubuntu 20.04']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5']),
                'memory' => $faker->numberBetween(4, 32), // RAM từ 4 đến 32GB
                'avaiable' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Thêm 50 bản ghi mới vào bảng issues
        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 50), // Liên kết với `computers.id`
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTime(),
                'description' => $faker->paragraph(),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
