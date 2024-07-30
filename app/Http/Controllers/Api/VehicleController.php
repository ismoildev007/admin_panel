<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehicleController extends Controller
{
    protected $apiToken = 'YjY3NzI3ZmRmZGJjNWE3ZTc1MTkzZTAzMjIwZjk2YjFlZmE5NjkxZWU4YWJmOTU3NjQyOWFiNDljMzI1YmZmZA';

    public function fetchVehicleInfo(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Bearer {$this->apiToken}",
        ])->post('https://api.e-osgo.uz/api/provider/vehicle', $request->all());

        // Check if response is successful
        if ($response->failed()) {
            return response()->json([
                'error' => $response->json('error', 'Unknown error'),
                'error_description' => $response->json('error_description', 'No description available'),
            ], $response->status());
        }

        return response()->json($response->json());
    }

    public function fetchKadaster(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Bearer {$this->apiToken}",
        ])->post('https://erspapi.e-osgo.uz/api/provider/cadaster', $request->all());

        // Check if response is successful
        if ($response->failed()) {
            // Log response body for debugging
            \Log::error('Kadaster API error', [
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return response()->json([
                'error' => $response->json('error', 'Unknown error'),
                'error_description' => $response->json('error_description', 'No description available'),
            ], $response->status());
        }

        return response()->json($response->json());
    }
}