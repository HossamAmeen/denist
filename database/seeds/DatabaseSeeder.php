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

        \App\Models\Doctor::create([
            "name"=> "احمد",
            "user_name" => "doctor",
            "password" =>bcrypt('doctor'),
            "spiecalization"=>"رمد"
        ]);
        \App\Models\Doctor::create([
            "name"=> "محمد",
            "user_name" => "doctor2",
            "password" =>bcrypt('doctor2'),
            "spiecalization"=>"اسنان"
        ]);

        \App\Models\Nurse::create([
            "name"=> "يوسف",
            "user_name" => "nurse",
            "password" =>bcrypt('nurse'),
            "doctor_id"=>1
        ]);

        \App\Models\Nurse::create([
            "name"=> "محمود",
            "user_name" => "nurse2",
            "password" =>bcrypt('nurse2'),
            "doctor_id"=>2
        ]);

        \App\Models\Operation::create([
            "name"=> "حشو",
        ]);
        \App\Models\Operation::create([
            "name"=> "علاج جذور",
        ]);

        \App\Models\Operation::create([
            "name"=> "خلع",
        ]);

        \App\Models\Operation::create([
            "name"=> "simple",
            "cost"=>100,
            "operation_id"=>3
        ]);
        \App\Models\Operation::create([
            "name"=> "impaction",
            "cost"=>100,
            "operation_id"=>3
        ]);

        \App\Models\Operation::create([
            "name"=> "طربوش",
        ]);
        \App\Models\Operation::create([
            "name"=> "PFM",
            "cost"=>100,
            "operation_id"=>4
        ]);
        \App\Models\Operation::create([
            "name"=> "Ziscer",
            "cost"=>300,
            "operation_id"=>4
        ]);
        \App\Models\Patient::create([
            "name"=> "Hossam",
            'phone'=>"01010079798",
            'address'=>"assuit",
            'age'=>5,
            'Nurse_id'=>1,           
        ]);
      
        for ($i=0; $i <32 ; $i++) { 
            \App\Models\Teeth::create(
                [
                    
                    'initial_status'=>"good",
                    'patient_id'=>1 
                ]
                );
        }
        factory('App\Models\Patient',10)->create();

       
       

        factory('App\Models\Visit',50)->create();
        }
}
