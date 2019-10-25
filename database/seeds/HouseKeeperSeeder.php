<?php

use Illuminate\Database\Seeder;

class HouseKeeperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
              'id' => 1,
              'first_name' => 'Sean',
              'last_name' => 'Stanley',
              'address' => '8116 Adams St',
              'phone' => '0450492692',
              'email' => 'Sean.Stanley@example.com',
              'country_id' => 10,
            ],
            
          ];
          foreach ($items as $item) {
            \App\Housekeeper::create($item);
          }
    }
}
