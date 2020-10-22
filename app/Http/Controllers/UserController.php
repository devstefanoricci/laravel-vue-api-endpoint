<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $data = Http::get('https://reqres.in/api/users');
        Log::info('API endpoint index (GET) response status ' . $data->status());
        return $data;
//        return view('users.index', ['data' => $data]);
//        return $data->body();
    }

    public function paging($page)
    {
        $data = Http::get('https://reqres.in/api/users?page=' . $page);
        Log::info('API endpoint index (GET) response status ' . $data->status());
        return $data;
//        return view('users.index', ['data' => $data]);
//        return $data->body();
    }

    public function show($id)
    {
        $user = Http::get('https://reqres.in/api/users/' . $id );
        Log::info('API endpoint show (GET) response status ' . $user->status());
        return $user;

//        return view('users.show')->with(compact('user'));
    }

    public function delete($id)
    {
        $request = Http::delete('https://reqres.in/api/users/' . $id );
        Log::info('API endpoint DELETE response status ' . $request->status());
        return  ($request);
    }

//    public function delete($id)
//    {
//        $response = Http::delete('https://reqres.in/api/users/' . $id);
//
//        if($response->status()===204)    //$response->status()===200
//            return $this->index()->with('message','Deleted successfully');
//        else
//            return view('users.index')->with('message', 'Response error: ' . $response->status());
//
//
//    }
}
