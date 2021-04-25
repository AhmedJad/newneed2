<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        
            DB::table('subcategories')->delete();
    
            \App\Models\Subcategory::class;
    
           DB::table('subcategories')->insert(array (
               0 =>
               array (
                   'name' => 'Grains sub',
                   'category_id'=>1,
                   'field' => 'Furniture',
                   'created_at' => '2019-08-29 22:54:23',
                   'updated_at' => '2019-10-18 12:38:04',
               ),
               1 =>
               array (

                   'name' => 'Sandwiches sub',
                   'category_id'=>2,
                   'field' => 'Pharmacy',
                   'created_at' => '2019-08-29 23:32:04',
                   'updated_at' => '2019-08-29 23:32:04',
               ),
               2 =>
               array (
            
                   'name' => 'Vegetables sub',
                   'category_id'=>3,
                   'field' => 'Pharmacy',
                   'created_at' => '2019-08-29 23:42:51',
                   'updated_at' => '2019-10-18 12:36:57',
               ),
               3 =>
               array (
            
                   'name' => 'Fruits sub',
                   'category_id'=>4,
                   'field' => 'Grocery',
                   'created_at' => '2019-08-30 12:07:15',
                   'updated_at' => '2019-10-18 12:37:18',
               ),
               4 =>
               array (
        
                   'name' => 'Protein sub',
                   'category_id'=>5,
                   'field' => 'Clothes',
                   'created_at' => '2019-08-30 12:07:38',
                   'updated_at' => '2019-10-18 12:37:32',
               ),
               5 =>
               array (
                
                   'name' => 'Grains sub 2',
                   'category_id'=>1,
                   'field' => 'Furniture',
                   'created_at' => '2019-08-29 22:54:23',
                   'updated_at' => '2019-10-18 12:38:04',
               ),
               6 =>
               array (
                   
                   'name' => 'Sandwiches sub 2',
                   'category_id'=>2,
                   'field' => 'Pharmacy',
                   'created_at' => '2019-08-29 23:32:04',
                   'updated_at' => '2019-08-29 23:32:04',
               ),
               7 =>
               array (
                   
                   'name' => 'Vegetables sub 3',
                   'category_id'=>3,
                   'field' => 'Pharmacy',
                   'created_at' => '2019-08-29 23:42:51',
                   'updated_at' => '2019-10-18 12:36:57',
               ),
               8 =>
               array (
            
                   'name' => 'Fruits sub 4',
                   'category_id'=>4,
                   'field' => 'Grocery',
                   'created_at' => '2019-08-30 12:07:15',
                   'updated_at' => '2019-10-18 12:37:18',
               ),
               9 =>
               array (
                
                   'name' => 'Protein sub 5',
                   'category_id'=>5,
                   'field' => 'Clothes',
                   'created_at' => '2019-08-30 12:07:38',
                   'updated_at' => '2019-10-18 12:37:32',
               )
           ));
                
     } 
}
