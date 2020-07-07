<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $all_products = config("products");
        foreach ($all_products as $prodotto) {
            $new_product = new Product();
            $new_product->code = $prodotto["code"];
            $new_product->name = $prodotto["name"];
            $new_product->category = $prodotto["category"];
            $new_product->color = $prodotto["color"];
            $new_product->price = $prodotto["price"];
            $new_product->save();
        }

        for ($i=0; $i <10 ; $i++) {
            $new_product = new Product();
            $new_product->code = $faker->numberBetween($min = 1000, $max = 9000);
            $new_product->name = $faker->shuffle('Prodotto casuale');
            $new_product->category = $faker->randomElement($array = array ("Alimenti","Bevande","Dolci e sfizi", "Altro"));
            $new_product->color = $faker->safeColorName;
            $new_product->price = $faker-> randomFloat($nbMaxDecimals = 2, $min = 0, $max = 6);
            $new_product->save();
        }
    }
}
