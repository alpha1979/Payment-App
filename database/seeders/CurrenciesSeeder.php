<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $currencies =[
          'GBP',
          'USD',
          'EUR',
          'NPR',
      ];
      
      foreach($currencies as $currency){
          Currency::create([
              'iso'=> $currency,
          ]);
      }
    }
}