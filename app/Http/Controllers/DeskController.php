<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
 


use Illuminate\Http\Request;

class DeskController extends Controller
{

    $api_key = "test";
    $version = "v1";
    
    /* get all desks */ 
    public function desks()
{
    /*
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post('https://reqres.in/api/users', [
        'name' => 'George',
    ]);
    */

    $response = Http::acceptJson()->get('http://127.0.0.1:800/api/' . $version . '/' . $api_key . '/desks');

    return $response;
}

public function get_desk(Request $request)
{
    

    $response = Http::get('https://reqres.in/api/users', [
        'desk_id' => $request->input('deskid'),
    ]);

    return $response;
}

    public function test()
{
    /*
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post('https://reqres.in/api/users', [
        'name' => 'George',
    ]);
    */

    $response = Http::acceptJson()->get('https://reqres.in/api/users');

    return $response;
}

public function test_post()
{
    /*
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post('https://reqres.in/api/users', [
        'name' => 'George',
    ]);
    */

    $response = Http::post('https://reqres.in/api/users', [
        'name' => 'Steve',
        'job' => 'Network Administrator',
    ]);

    

    return $response->status();
}
}
