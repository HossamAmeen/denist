<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeed::class,
        ]);
        factory('App\Models\User',5)->create();

        \App\Models\Configration::create([
            "website_name"=> "ekhsemly",
            "email"=>  "ekhsemly@gmail.com",
            "address"=>  "El-Gomhoreya",
            "phone"=> "01010079798",
            "about"=> "شركة خاصه بالخوصمات والعروض",
            "en_about"=> "good company",
            "terms_conditions"=> "terms and conditions",
            "privacy_policy"=>  "privacy and policy"

        ]);

        \App\Models\Category::create([
            'name'=> 'deals',
            'user_id'    =>1
        ]);
        \App\Models\City::create([
            'name'=> 'assuit',
            'user_id'    =>1
        ]);
        \App\Models\City::create([
            'name'=> 'Cairo',
            'user_id'    =>1
        ]);
        \App\Models\Vendor::create([
            'first_name' => "hossam",
            'last_name'  => "ameen",
          //  'gender'     => "male",
            'email'      => "hosamameen948@gmail.com",
            'password'   => bcrypt('admin'),
            'phone'      => "01010079798",
            'store_name' => "mac",
            'discount_ratio'=>15,
            'client_ratio' => 5,
            'client_vip_ratio'=>10,
            'status'=>"accept",
            'store_description' =>"good fast food",
            'store_logo' => 'avatar.png'
        ]);
        \App\Models\Vendor::create([
            'first_name' => "hossam",
            'last_name'  => "ameen",
          //  'gender'     => "male",
            'email'      => "hosamameen948s@gmail.com",
            'password'   => bcrypt('admins'),
            'phone'      => "01010079793",
            'store_name' => "KFC",
            'store_description' =>"fast food for every one",
            'status'     => 'accept',
            'client_ratio' => 10,
            'client_vip_ratio'=>20,
            'store_logo' => 'avatar.png'
        ]);
        \App\Models\Client::create([
            'first_name' => "hossam client",
            'last_name'  => "ameen",
            'gender'     => "male",
            'email'      => "client@gmail.com",
            'password'   => bcrypt('admin'),
            'phone'      => "01010079798",
            'status'     => "accept",
            'user_id'    =>1
        ]);
        \App\Models\Client::create([
            'first_name' => "aya client 2 ",
            'last_name'  => "ameen",
            'gender'     => "female",
            'email'      => "client2@gmail.com",
            'password'   => bcrypt('admin'),
            'phone'      => "01010079796",
            'user_id'    =>1
        ]);
        \App\Models\ClientAddress::create([
            'address'   => "new address",
            'first_name' => "hossam client",
            'last_name'  => "ameen",
            'phone'      => "01010079798",
            'is_favourite' => 1 ,
            'client_id'  => 1
        ]);

        \App\Models\ProductCategory::create([
            'name' => "sandwich",
            'vendor_id'=>1,
        ]);

        \App\Models\Product::create([
            'name' => "big testy",
            'description'=> "A sweet and delicious sandwich",
            'price' => 100,
            'quantity'=>5,
            'discount_ratio'=>10,
            'vendor_id'=>1,
            'category_id'=>1,
            'user_id'=>1
        ]);
        factory('App\Models\Category',9)->create();
        factory('App\Models\Vendor',25)->create();
        factory('App\Models\ProductCategory',10)->create();
        factory('App\Models\VendorCategory',9)->create();
        factory('App\Models\Product',500)->create();

        factory('App\Models\WishList',25)->create();
        factory('App\Models\Cart',5)->create();//
        factory('App\Models\Order',50)->create();
        factory('App\Models\OrderItem',60)->create();

        factory('App\Models\Question',5)->create();
        factory('App\Models\Complaint',5)->create();

        $this->productChoices();
        $this->OrderChoices();
    }
    public function productChoices()
    {
        \App\Models\ProductChoice::create([
            'name' => "larage",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
            'group_name'=>"size",
            'product_id'=>1
        ]);
        \App\Models\ProductChoice::create([
            'name' => "meduim",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
            'group_name'=>"size",
            'product_id'=>1
        ]);
        \App\Models\ProductChoice::create([
            'name' => "small",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
            'group_name'=>"size",
            'product_id'=>1
        ]);
        \App\Models\ProductChoice::create([
            'name' => "in",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
            'group_name'=>"place",
            'product_id'=>1
        ]);
        \App\Models\ProductChoice::create([
            'name' => "out",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
            'group_name'=>"place",
            'product_id'=>1
        ]);
    }
    public function OrderChoices()
    {

        \App\Models\OrderChoice::create([
            'name' => "larage",
            'group_name' => "size",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
            //'group_name'=>"size",
            'order_item_id'=>1
        ]);
        \App\Models\OrderChoice::create([
            'name' => "meduim",
            'group_name' => "size",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
          //  'group_name'=>"size",
            'order_item_id'=>1
        ]);
        \App\Models\OrderChoice::create([
            'name' => "small",
            'group_name' => "size",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
            //'group_name'=>"size",
            'order_item_id'=>1
        ]);
        \App\Models\OrderChoice::create([
            'name' => "in",
            'group_name' => "takeaway",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
          //  'group_name'=>"place",
            'order_item_id'=>1
        ]);

        \App\Models\OrderChoice::create([
            'name' => "out",
            'group_name' => "takeaway",
            'price'=>rand(30 , 60),
            'type' => rand(1,2),
         //   'group_name'=>"place",
            'order_item_id'=>1
        ]);
    }
}
