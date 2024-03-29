<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        if(app()->environment() != 'production'){
            Organization::factory(5)->hasUsers(10)->create();
            Category::factory(10)->hasSubCategory(5)->create();
            Brand::factory(5)->create();
            Product::factory(200)->create();
    
            Customer::factory(10)->create();
            Supplier::factory(10)->create();
            Sale::factory(50)->hasOrders(10)->create();
        }
    }
}
