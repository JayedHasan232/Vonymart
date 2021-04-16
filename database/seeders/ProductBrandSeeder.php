<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ProductBrand;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductBrand::factory(25)->create();
    }
}
