<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('categories')->delete();

        factory(\App\Models\Category::class,6)->create();

       DB::table('categories')->insert(array (
           0 =>
           array (
               'name' => 'Grains',
               'field' => 'Furniture',
               'created_at' => '2019-08-29 22:54:23',
               'updated_at' => '2019-10-18 12:38:04',
           ),
           1 =>
           array (
               'name' => 'Sandwiches',
               'field' => 'Pharmacy',
               'created_at' => '2019-08-29 23:32:04',
               'updated_at' => '2019-08-29 23:32:04',
           ),
           2 =>
           array (
               'name' => 'Vegetables',
               'field' => 'Pharmacy',
               'created_at' => '2019-08-29 23:42:51',
               'updated_at' => '2019-10-18 12:36:57',
           ),
           3 =>
           array (
               'name' => 'Fruits',
               'field' => 'Grocery',
               'created_at' => '2019-08-30 12:07:15',
               'updated_at' => '2019-10-18 12:37:18',
           ),
           4 =>
           array (
               'name' => 'Protein',
               'field' => 'Clothes',
               'created_at' => '2019-08-30 12:07:38',
               'updated_at' => '2019-10-18 12:37:32',
           ),
       ));
        
        
    }
}