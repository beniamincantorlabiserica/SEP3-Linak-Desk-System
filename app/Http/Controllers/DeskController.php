<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
 


use Illuminate\Http\Request;

class DeskController extends Controller
{
    
    /* get all desks */ 
    public function index()
{
    $response = Http::get(env('DESK_API_ENDPOINT') .  env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks');

    return $response->json();
}

public function show(Request $request, string $id)
{
    
    $response = Http::get(env('DESK_API_ENDPOINT') .  env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks' . '/' . $id);

    return $response->json();
}


    public function update(Request $request, string $id, int $position)
{
    
    $response = Http::put(env('DESK_API_ENDPOINT') .  env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks' . '/' . $id . '/' . $position);

    

    return $response->json();
}

}
