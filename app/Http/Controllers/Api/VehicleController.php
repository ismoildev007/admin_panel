<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Use Laravel's HTTP client

class VehicleController extends Controller
{
    public function fetchVehicleInfo(Request $request)
    {
        // Perform the HTTP request using Laravel's HTTP client
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer YjY3NzI3ZmRmZGJjNWE3ZTc1MTkzZTAzMjIwZjk2YjFlZmE5NjkxZWU4YWJmOTU3NjQyOWFiNDljMzI1YmZmZA',
        ])->post('https://api.e-osgo.uz/api/provider/vehicle', $request->all());

        // Convert response to JSON
        $responseBody = $response->json();

        return response()->json($responseBody);
    }
    public function fetchKadaster(Request $request)
    {
        // Perform the HTTP request using Laravel's HTTP client
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer YjY3NzI3ZmRmZGJjNWE3ZTc1MTkzZTAzMjIwZjk2YjFlZmE5NjkxZWU4YWJmOTU3NjQyOWFiNDljMzI1YmZmZA',
        ])->post('https://erspapi.e-osgo.uz/api/provider/cadaster', $request->all());

        // Convert response to JSON
        $responseBody = $response->json();

        return response()->json($responseBody);
    }
}