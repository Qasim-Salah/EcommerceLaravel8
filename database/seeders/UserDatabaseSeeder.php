<?php
namespace Database\Seeders;
use App\Models\User as UserModel;
use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create([
            'name' => 'Qasim Salah',
            'email' => 'Qasim@gmail.com',
            'password' => bcrypt('Qasim Salah'),
        ]);
    }
}
