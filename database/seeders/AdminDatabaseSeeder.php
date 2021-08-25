<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use \App\Models\Admin as AdminModel;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminModel::create([
            'name' => 'Qasim Salah',
            'email' => 'Qasim@gmail.com',
            'password' => bcrypt('Qasim Salah'),
            'role_id' => 1,
        ]);
    }
}
