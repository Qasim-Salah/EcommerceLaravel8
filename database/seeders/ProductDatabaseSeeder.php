<?php
namespace Database\Seeders;

use App\Models\Product as ProductModel;
use Illuminate\Database\Seeder;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductModel::factory()->times(22)->create();
    }
}
