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

        return $this->handleResponse($response);
    }

    public function fetchKadaster(Request $request)
    {
        dd($request->all());
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Bearer {$this->apiToken}",
        ])->post('https://erspapi.e-osgo.uz/api/provider/cadaster', $request->all());

        return $this->handleResponse($response);
    }

    public function fetchDriverLicense(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Bearer {$this->apiToken}",
        ])->post('https://api.e-osgo.uz/api/provider/driver-license', $request->all());

        return $this->handleResponse($response);
    }
    public function fetchDriverSummary(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Bearer {$this->apiToken}",
        ])->post('https://api.e-osgo.uz/api/provider/driver-summary', $request->all());

        return $this->handleResponse($response);
    }

    public function fetchInnInfo(Request $request)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Bearer {$this->apiToken}",
        ])->post('https://api.e-osgo.uz/api/provider/inn', $request->all());

        return $this->handleResponse($response);
    }
    protected function handleResponse($response)
    {
        if ($response->failed()) {
            \Log::error('API Request Failed', [
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
