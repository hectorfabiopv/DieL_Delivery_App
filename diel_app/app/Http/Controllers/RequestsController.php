<?php
namespace App\Http\Controllers;

Use App\Requests;
use Illuminate\Http\Request;

class RequestsController extends Controller
{

    public function index()
    {
        return Requests::all();
    }

    public function show(Requests $Requests)
    {
        return $Requests;
    }

    public function store(Request $request)
    {
        $Requests = Requests::create($request->all());

        return response()->json($Requests, 201);
    }

    public function update(Request $request, Requests $Requests)
    {
        $Requests->update($request->all());

        return response()->json($Requests, 200);
    }

    public function delete(Requests $Requests)
    {
        $Requests->delete();

        return response()->json(null, 204);
    }
}