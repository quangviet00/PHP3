<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use App\Models\Position;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //trong model user có trait HasFactory
        // có UserFactory đã định nghĩa dư liệu mẫu
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Room::factory(10)->create();
        // User::factory(10)->create();
        // Position::factory(10)->create();
        Product::factory(10)->create();


    }
}
