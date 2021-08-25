<?php
namespace Database\Seeders;

use App\Models\Category as CategoryModel;
use Illuminate\Database\Seeder;
class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryModel::factory()->times(6)->create();
    }
}
