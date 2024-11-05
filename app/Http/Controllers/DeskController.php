<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
 


use Illuminate\Http\Request;

class DeskController extends Controller
{
    
    /* get all desks */ 
    public function index()
{
    $response = Http::get('http://127.0.0.1:8001/api/' . env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks');

    return $response->json();
}

public function show(Request $request, string $id)
{
    
    $response = Http::get('http://127.0.0.1:8001/api/' . env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks' . '/' . $id);

    return $response;
}


    public function update(Request $request, string $id, int $position)
{
    
    $response = Http::post('http://127.0.0.1:8000/api/' . env('DESK_API_VERSION') . '/' . env('DESK_API_KEY') . '/desks' . '/' . $id . '/' . $position);

    return $response;
}

}
