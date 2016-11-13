<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10 ; $i++){
			Product::create(
				[
					'imagePath' => "http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg",
					'title' => "An awesome  Book {$i}",
					'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, beatae qui voluptas rerum ullam dolore eaque eveniet temporibus quod tempore necessitatibus iste voluptatem? Iure, quae modi quisquam commodi perferendis odio!",
					'price' => 10
					 
				]
			);
		}
		
    }
}
