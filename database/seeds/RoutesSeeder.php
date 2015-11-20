<?php

use Illuminate\Database\Seeder;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Read the routes SQL file
        $file = dirname(__FILE__) . "/routes.csv";
        $csv = array_map('str_getcsv', file($file));
        $i = 0;
        while($i <= 4) {
            unset($csv[$i]);
            $i++;
        }

        foreach($csv as $entry) {
            DB::table('routes')
                ->insert([
                    'puv_type'      =>      $entry[0],
                    'route'         =>      $entry[1],
                    'region'        =>      'NCR'
                ]);
        }


    }
}
