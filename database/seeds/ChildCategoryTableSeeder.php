<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   
    {
        
        DB::table('child_category')->delete();

        App\Models\SubCategory::class;

       DB::table('child_category')->insert(array (
           0 =>
           array (
            
               'name' => 'Grains sub child',
               'subcategory_id'=>1,
               'field' => 'Furniture',
               'created_at' => '2019-08-29 22:54:23',
               'updated_at' => '2019-10-18 12:38:04',
           ),
           1 =>
           array (

               'name' => 'Sandwiches sub child',
               'subcategory_id'=>2,
               'field' => 'Pharmacy',
               'created_at' => '2019-08-29 23:32:04',
               'updated_at' => '2019-08-29 23:32:04',
           ),
           2 =>
           array (
        
               'name' => 'Vegetables sub child',
               'subcategory_id'=>3,
               'field' => 'Pharmacy',
               'created_at' => '2019-08-29 23:42:51',
               'updated_at' => '2019-10-18 12:36:57',
           ),
           3 =>
           array (
               
               'name' => 'Fruits sub child',
               'subcategory_id'=>4,
               'field' => 'Grocery',
               'created_at' => '2019-08-30 12:07:15',
               'updated_at' => '2019-10-18 12:37:18',
           ),
           4 =>
           array (
        
               'name' => 'Protein subb child',
               'subcategory_id'=>5,
               'field' => 'Clothes',
               'created_at' => '2019-08-30 12:07:38',
               'updated_at' => '2019-10-18 12:37:32',
           ),
           5 =>
           array (
               'name' => 'Grains sub child 2',
               'subcategory_id'=>1,
               'field' => 'Furniture',
               'created_at' => '2019-08-29 22:54:23',
               'updated_at' => '2019-10-18 12:38:04',
           ),
           6 =>
           array (
    
               'name' => 'Sandwiches sub child 2',
               'subcategory_id'=>2,
               'field' => 'Pharmacy',
               'created_at' => '2019-08-29 23:32:04',
               'updated_at' => '2019-08-29 23:32:04',
           ),
           7 =>
           array (

               'name' => 'Vegetables sub child 3',
               'subcategory_id'=>3,
               'field' => 'Pharmacy',
               'created_at' => '2019-08-29 23:42:51',
               'updated_at' => '2019-10-18 12:36:57',
           ),
           8 =>
           array (
    
               'name' => 'Fruits sub child 4',
               'subcategory_id'=>4,
               'field' => 'Grocery',
               'created_at' => '2019-08-30 12:07:15',
               'updated_at' => '2019-10-18 12:37:18',
           ),
           9 =>
           array (

               'name' => 'Protein sub child 5',
               'subcategory_id'=>5,
               'field' => 'Clothes',
               'created_at' => '2019-08-30 12:07:38',
               'updated_at' => '2019-10-18 12:37:32',
           )
       ));
            
 } 
}
