<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([

        [
            'name' => 'contacts',
            'url' => '#',
            'parent_id'=>0,
        ],
        [
            'name' => 'services',
            'url' => '#',
            'parent_id'=>0,
        ],
        [
            'name' => 'departments',
            'url' => '#',
            'parent_id'=>0,
        ],
        [
            'name' => 'communities',
            'url' => '#',
            'parent_id'=>0,
        ],

        [
            'name' => 'Boards and Commissions1',
            'url' => 'city_governments',
            'parent_id'=>1,
        ],
        [
            'name' => 'Quasi eos molestias',
            'url' => 'communities',
            'parent_id'=>5,
        ],
        [
            'name' => 'Dial A Ride',
            'url' => 'departments',
            'parent_id'=>4,
        ],
        [
            'name' => 'Adipisci non magni d',
            'url' => 'services',
            'parent_id'=>3,
        ],
        [
            'name' => 'Dial A Ride1',
            'url' => 'services',
            'parent_id'=>3,
        ],
        [
            'name' => 'City Of Ionia',
            'url' => 'contacts',
            'parent_id'=>2,
        ],
        [
            'name' => 'Est consequatur El',
            'parent_id'=>2,
            'url' => 'contacts',
           
        ],
        
    
    ]);

  
    
    }
}
