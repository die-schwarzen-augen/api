<?php

namespace App\Ship\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class SeedTestingData
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class SeedTestingData extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->admins();
    }

    protected function admins()
    {
      $admins = [
        'spokk' => [
          'name' => 'Spokk',
          'email' => 'spokk@posteo.de',
        ],
        'sebastian' => [
          'name' => 'Sebastian',
          'email' => 'sebastian@borbarad-projekt.de',
        ],
      ];

      $hash = Hash::make('test');

      foreach ($admins as $admin) {
        if (!User::where('email', $admin['email'])->exists()) {
          $user = User::create([
              'is_client' => false,
              'email'     => $admin['email'],
              'password'  => $hash,
              'name'      => $admin['name'],
              'confirmed' => true,
          ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['admin']));
        }
      }
    }

}
