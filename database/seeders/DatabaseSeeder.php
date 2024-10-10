<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i= 0;$i<10;$i++){
            Role::create([
                'name' => fake()->text(20)
            ]);
        }

        // for($i= 1;$i<11;$i++){
        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text,
        //     ]);
        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text,
        //     ]);
        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text,
        //     ]);
        // }
        // $userIDs = User::pluck('id')->all();
        // foreach ($userIDs as $userId){
        //     Phone::query()->create([
        //         'user_id'=>$userId,
        //         'value'=>fake()->unique()->phoneNumber()
        //     ]);
        // }
        // $this->call(ProductsSeeder::class);
        // $this->call(SalesSeeder::class);
        // $this->call(ExpensesSeeder::class);
        // $this->call(FinancialReportsSeeder::class);
        // $this->call(TaxesSeeder::class);
        // $this->call(EmployeeSeeder::class);
    }
}
