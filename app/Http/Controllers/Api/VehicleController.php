<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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

    public function fetchPerson(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'senderPinfl' => 'required|string',
            'document' => 'required|string',
            'birthDate' => 'required|date_format:Y-m-d', // Validate date format
            'isConsent' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Generate a transaction ID using the current timestamp in milliseconds
            $transactionId = Carbon::now()->valueOf();

            // Prepare the request data
            $info = [
                'transactionId' => $transactionId,
                'senderPinfl' => $request->input('senderPinfl'),
                'document' => $request->input('document'),
                'birthDate' => $request->input('birthDate'),
                'isConsent' => $request->input('isConsent'),
            ];

            // Make the HTTP POST request
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => "Bearer {$this->apiToken}",
            ])->post('https://api.e-osgo.uz/api/provider/passport-birth-date-v2', $info);

            // Check for successful response
            if ($response->successful()) {
                return $this->handleResponse($response);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'API request failed',
                    'status' => $response->status(),
                    'error' => $response->json(),
                ], $response->status());
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the HTTP request
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'error' => $e->getMessage(),
            ], 500);
        }
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
