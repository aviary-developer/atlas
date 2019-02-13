<?php

use Illuminate\Database\Seeder;
use App\CalendarioMenu;

class DiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          for($i=1;$i<=5;$i++) {
              $calendarioMenu= new CalendarioMenu();
              $calendarioMenu->dia=$i;
              $calendarioMenu->save();
          }
    }
}
