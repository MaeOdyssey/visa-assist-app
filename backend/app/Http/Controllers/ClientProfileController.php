<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientProfileController extends Controller
{
    //

    public function show(Request $request)
{
    $client = Client::where('user_id', $request->user()->id)->with('user')->first();
    return response()->json($client);
}

}
