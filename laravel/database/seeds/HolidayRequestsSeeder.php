<?php

use App\HolidayRequests;
use Illuminate\Database\Seeder;
use App\User;

class HolidayRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create()->each(function ($user)
        {

            $name = $user->name;
            $splitName = explode(' ', $name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones

            $first_name = $splitName[0];
            $last_name = !empty($splitName[1]) ? $splitName[1] : ''; // If last name doesn't exist, make it empty


            $user->HolidayRequests()->save(
                factory(HolidayRequests::class, 5)->create([
                    'user_id' => $user->id, 
                    'email'=> $user->email,
                    // 'email'=> $first_name.'_'.$last_name.'@gmail.com',
                    'firstName' => $first_name,
                    'lastName' => $last_name
                    ])
            );
            
        });
    }
}


