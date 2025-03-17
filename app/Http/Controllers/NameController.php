<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NameController extends Controller
{
    public function generate(Request $request)
    {
        // Fetch a random base name based on filters
        $query = DB::table('base_names');

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $base_name = $query->inRandomOrder()->first();

        if (!$base_name) {
            return response()->json(['error' => 'No names found for the given filters'], 404);
        }

        // Fetch a random prefix (50% chance)
        $prefix = DB::table('prefixes')->inRandomOrder()->first();
        $use_prefix = rand(0, 1) == 1 ? ($prefix ? $prefix->prefix : null) : null;

        // Fetch a random compound name (50% chance)
        $compound_name = DB::table('compound_names')->inRandomOrder()->first();
        $use_compound_name = rand(0, 1) == 1 ? ($compound_name ? $compound_name->compound_name : null) : null;

        // Assemble the final name
        $final_name = $base_name->name;
        if ($use_prefix) {
            $final_name = $use_prefix . ' ' . $final_name;
        }
        if ($use_compound_name) {
            $final_name .= ' ' . $use_compound_name;
        }

        return response()->json(['name' => $final_name, 'category' => $base_name->category, 'type' => $base_name->type]);
    }
}
