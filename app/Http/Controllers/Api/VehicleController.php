<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VehicleController extends Controller
{

//    public function fetchVehicleToken()
//    {
//        $client = new Client();
//        try {
//            $response = $client->request('POST', 'https://api.e-osgo.uz/oauth/token', [
//                'form_params' => [
//                    'client_id' => '5_529o76r9bz0ggcgg8wcoc0kococ4wc0so8o8k48k40o00080oc',
//                    'client_secret' => '4kmk6cucu2o0kcswg4k8c0s000k4koo0ws0c8w40scs8ggwc80',
//                    'grant_type' => 'password',
//                    'username' => 'impex_insurance',
//                    'password' => 'uJzJ"[w^JN6mr%9tL2CXnDK5f84.m5Ux',
//                ],
//            ]);
//
//            $tokenData = json_decode($response->getBody()->getContents(), true);
//            return $tokenData['access_token'];
//        } catch (\Exception $e) {
//            return response()->json(['error' => $e->getMessage()], $e->getCode());
//        }
//    }
    public function fetchVehicleInfo(Request $request)
    {
        // Inputlarni oling
        $techPassportSeria = $request->input('techPassportSeria');
        $techPassportNumber = $request->input('techPassportNumber');
        $stateNumber = $request->input('stateNumber');

        // Guzzle mijozini yarating
        $client = new Client();

        // Tashqi API'ga so'rov yuborish
        try {
            $response = $client->request('POST', 'https://api.e-osgo.uz/api/provider/vehicle', [
//                dd($request->all());
                'query' => [
                    'techPassportSeria' => $techPassportSeria,
                    'techPassportNumber' => $techPassportNumber,
                    'stateNumber' => $stateNumber,
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer YjY3NzI3ZmRmZGJjNWE3ZTc1MTkzZTAzMjIwZjk2YjFlZmE5NjkxZWU4YWJmOTU3NjQyOWFiNDljMzI1YmZmZA', // E-OSGO API tokeni bilan almashtiring
                ],
            ]);
            dd($response);

            // So'rov natijalarini oling
            $vehicleInfo = json_decode($response->getBody()->getContents(), true);

            // Natijalarni qaytaring
            return response()->json($vehicleInfo);

        } catch (\Exception $e) {
            // Xatolikni qaytarish
            return response()->json(['error' => $e->getMessage()], 500); // 500 Internal Server Error qaytarish
        }
    }

//
//    public function fetchVehicleInfo(Request $request)
//    {
//        // Inputlarni oling
//        $techPassportSeria = $request->input('techPassportSeria');
//        $techPassportNumber = $request->input('techPassportNumber');
//        $stateNumber = $request->input('stateNumber');
//
//        // Guzzle mijozini yarating
//        $client = new Client();
//
//        // Tashqi API'ga so'rov yuborish
//        try {
//            $response = $client->request('GET', 'https://api.e-osgo.uz/api/provider/vehicle', [
//                'query' => [
//                    'techPassportSeria' => $techPassportSeria,
//                    'techPassportNumber' => $techPassportNumber,
//                    'stateNumber' => $stateNumber,
//                ],
//                'headers' => [
//                    'Accept' => 'application/json',
//                    'client_id' => '5_529o76r9bz0ggcgg8wcoc0kococ4wc0so8o8k48k40o00080oc',
//                    'client_secret' => '4kmk6cucu2o0kcswg4k8c0s000k4koo0ws0c8w40scs8ggwc80',
//                    'grant_type' => 'password',
//                    'username' => 'impex_insurance',
//                    'password' => 'uJzJ"[w^JN6mr%9tL2CXnDK5f84.m5Ux',
//                    'Authorization' => 'Bearer YjY3NzI3ZmRmZGJjNWE3ZTc1MTkzZTAzMjIwZjk2YjFlZmE5NjkxZWU4YWJmOTU3NjQyOWFiNDljMzI1YmZmZA',
//                ]
//            ]);
//            dd($request->all());
//
//            // So'rov natijalarini oling
//            $vehicleInfo = json_decode($response->getBody()->getContents(), true);
//
//            // Natijalarni qaytaring
//            return response()->json($vehicleInfo);
//
//        } catch (\Exception $e) {
//            // Xatolikni qaytarish
//            return response()->json(['error' => $e->getMessage()], $e->getCode());
//        }
//    }
}



