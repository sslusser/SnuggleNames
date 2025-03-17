<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NamePartsSeeder extends Seeder
{
    public function run()
    {
        // Prefixes
        $prefixes = ['Sir', 'Captain', 'Queen', 'King', 'Dr.', 'Professor', 'Major', 'Count', 'Duke', 'Baron'];
        foreach ($prefixes as $prefix) {
            DB::table('prefixes')->insert(['prefix' => $prefix]);
        }

        // Base Names
        $pet_names = ['Buddy', 'Whiskers', 'Tweety', 'Fluffy', 'Shadow', 'Bubbles', 'Sparky', 'Luna', 'Oreo', 'Mochi'];
        $partner_names = ['Snuggles', 'Honey', 'Sugar', 'Lovebug', 'Pumpkin', 'Cutie', 'Sweetie', 'Darling', 'Babe', 'Cuddlebug'];

        foreach ($pet_names as $name) {
            DB::table('base_names')->insert(['name' => $name, 'category' => 'pet', 'type' => 'dog']);
        }

        foreach ($partner_names as $name) {
            DB::table('base_names')->insert(['name' => $name, 'category' => 'partner', 'type' => 'girlfriend']);
        }

        // Compound Names
        $compound_names = ['Muffin', 'Shadow', 'Nugget', 'Snuggle', 'Bubbles', 'Fuzzy', 'Cuddles', 'Jellybean', 'Tofu', 'Pancake'];
        foreach ($compound_names as $compound_name) {
            DB::table('compound_names')->insert(['compound_name' => $compound_name]);
        }
    }
}
