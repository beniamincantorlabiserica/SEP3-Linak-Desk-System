<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


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

public function show_category(Request $request, string $id, string $category)
{
    
    $response = Http::get(env('DESK_API_ENDPOINT') .  env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks' . '/' . $id . '/' . $category);

    return $response->json();
}


public function update_category(Request $request, string $id, string $category, string $opt, int $val)
{
    
    if($opt == "position_mm")
    {
    
        $data = [
            "position_mm" => $val
          
        ];
    }else
    {
        $data = [  ];
    }

    $response = Http::withBody(json_encode($data), 'application/json')->put(env('DESK_API_ENDPOINT') .  env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks' . '/' . $id . '/' . $category);
    return $response->json();
}

}
