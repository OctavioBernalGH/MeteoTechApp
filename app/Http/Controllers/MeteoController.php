<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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
                    'api_key' => 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJvYmVybmFsLndvcmtAcHJvdG9ubWFpbC5jb20iLCJqdGkiOiI3OTJmYTk0Ni1mZmRhLTRlZTgtYTM1Zi02NzBiOTc1YmNkNTAiLCJpc3MiOiJBRU1FVCIsImlhdCI6MTcxMTM5NzE0MiwidXNlcklkIjoiNzkyZmE5NDYtZmZkYS00ZWU4LWEzNWYtNjcwYjk3NWJjZDUwIiwicm9sZSI6IiJ9.I9DEdaveHKfAGAQtz1wOYmh6G5sljY0sVP1A_ACjyXg',
                    'accept' => 'application/json'
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = mb_convert_encoding($response->getBody()->getContents(), 'UTF-8', 'UTF-8');

            $data = (json_decode($body, true));
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

        return view('', compact($municipalities));
    }
}
