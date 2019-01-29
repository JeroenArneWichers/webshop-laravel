<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create
        ([
            'name' => 'Lorica Segmentata',
            'slug' => 'Lorica Segmentata',
            'details' => 'Segmented Armor',
            'price' => 1200,
            'description' => 'Segmented armor for the roman legionary',
        ]);
        Product::create
        ([
            'name' => 'Lorica Hamata',
            'slug' => 'Lorica Hamata',
            'details' => 'Chainmail Armor',
            'price' => 600,
            'description' => 'Chainmail armor for the roman legionary',
        ]);
        Product::create
        ([
            'name' => 'Gladius Mainz',
            'slug' => 'Gladius Mainz',
            'details' => 'Gladius of type Mainz',
            'price' => 300,
            'description' => 'legionary Roman sword of the type found in Mainz Germany',
        ]);
        Product::create
        ([
            'name' => 'Gladius Hispania',
            'slug' => 'Gladius Hispania',
            'details' => 'Gladius of type Hispania',
            'price' => 250,
            'description' => 'legionary Roman sword of the type found in Spain',
        ]);
        Product::create
        ([
            'name' => 'Toga',
            'slug' => 'Toga',
            'details' => 'Simple white toga',
            'price' => 50,
            'description' => 'Roman toga for an average citizen',
        ]);
        Product::create
        ([
            'name' => 'Tunic',
            'slug' => 'Tunic',
            'details' => 'Simple tunic',
            'price' => 30,
            'description' => 'Roman tunic for an average citizen',
        ]);
        Product::create
        ([
            'name' => 'Pugio',
            'slug' => 'Pugio',
            'details' => 'Roman dagger',
            'price' => 30,
            'description' => 'Roman dagger. keep away from people named Ceasar...',
        ]);
        Product::create
        ([
            'name' => 'Pilum',
            'slug' => 'Pilum',
            'details' => 'Roman throwing spear',
            'price' => 30,
            'description' => 'Roman throwing spear. Designed to prevent enemy from throwing it back',
        ]);
    }
}
