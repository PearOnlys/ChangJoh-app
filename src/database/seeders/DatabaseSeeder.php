<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        \App\Models\Type::factory(10)->create();
        \App\Models\Card::factory(20)->create();
        \App\Models\Deck::factory(10)->create();

        //pivot deck_type
        $types = \App\Models\Type::all();
        \App\Models\Deck::all()->each(function ($deck) use ($types){
            $deck->types()->attach(
                $types->random(rand(1,3))->pluck('id')->toArray()
            );
        });
        //pivot card_deck
        $cards = \App\Models\Card::all();
        \App\Models\Deck::all()->each(function ($deck) use ($cards){
            $deck->cards()->attach(
                $cards->random(rand(1,10))->pluck('id')->toArray()
            );
            $deck->cards()->hidden = false;
        });
        \App\Models\Profile::factory(5)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
