<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class MeteoController extends Controller
{
    /** 
     * - An instance of the GuzzleHttp Client class is created to consume an API. 
     * - We make a GET request by sending the bearer token in the request header, we get the data and the response code.
     */

    public function index()
    {
        $client = new Client();

        try{

            $response = $client->request('GET', 'https://opendata.aemet.es/opendata/api/maestro/municipios', [
                'headers' => [
                    'api_key' => env('METEO_API_TOKKEN'),
                    'accept' => 'application/json'
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = utf8_encode($response->getBody()->getContents());
            $data = (json_decode($body, true, 512, JSON_UNESCAPED_UNICODE));
            $municipalities = [];

            foreach($data as $current){
                $currentId = substr($current['id'], 2);
                $municipality = [
                    "municipality_code" => $currentId,
                    "municipality_name" => $current['nombre']
                ];
                $municipalities[] = $municipality;     
            }

        } catch(Exception $e){
            
        }

        return view('index', compact('municipalities'));
    }

    /**
     * - An instance of the GuzzleHttp Client class is created to consume an API. 
     * - We make a POST request by sending the bearer token in the request header, we get the municipality weather data and the response code of the request.
     */

    public function municipalityWeather(Request $request){

        $client = new Client();

        try{

            $response = $client->request('GET', '/api/prediccion/especifica/municipio/diaria/'.$request['municipality'], [
                'headers' => [
                    'api_key' => env('METEO_API_TOKKEN'),
                    'accept' => 'application/json'
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = utf8_encode($response->getBody());
            $data = (json_decode($body, true, 512, JSON_UNESCAPED_UNICODE));
            
            return response()->json(["result" => true, "municipality_name" => $data]);

        } catch(Exception $e){
            
        }


    }
}
