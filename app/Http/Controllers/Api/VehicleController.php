<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VehicleController extends Controller
{
    public function fetchVehicleInfo(Request $request)
    {
        // Inputlarni oling
        $techPassportSeria = $request->input('techPassportSeria');
        $techPassportNumber = $request->input('techPassportNumber');
        $govNumber = $request->input('govNumber');

        // Guzzle mijozini yarating
        $client = new Client();

        // Tashqi API'ga so'rov yuborish
        try {
            $response = $client->request('POST', 'https://api.e-osgo.uz/api/provider/vehicle', [
                'form_params' => [
                    'techPassportSeria' => $techPassportSeria,
                    'techPassportNumber' => $techPassportNumber,
                    'govNumber' => $govNumber,
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer YjY3NzI3ZmRmZGJjNWE3ZTc1MTkzZTAzMjIwZjk2YjFlZmE5NjkxZWU4YWJmOTU3NjQyOWFiNDljMzI1YmZmZA', // E-OSGO API tokeni
                ],
            ]);

            // So'rov natijalarini oling
            $responseBody = $response->getBody()->getContents();
            dd($responseBody);

            // Natijalarni qaytaring
            $vehicleInfo = json_decode($responseBody, true);
            return response()->json($vehicleInfo);

        } catch (\Exception $e) {
            // Xatolikni qaytarish
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}