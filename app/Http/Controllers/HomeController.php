<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pokedex;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function show(Request $request){

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$request->name}");

        if($response->status() == 200){

            $time = Carbon::now();

            try{

                Pokedex::create([
                    'statusResponse' => true,
                    'timesResponse'  => $time->toTimeString(),
                    'responseQuery'  => $response->json()
                ]);

                return $response->json();
            }catch(\Exception $e){
                
                return response()->json([
                    'status'  => 400,
                    'message' => $e->getMessage()
                ]);
            }
        }
    }

    public function showPokedex($param = null){
        if(!empty($param)){
            return Pokedex::findOrFail($param);
        }
        return Pokedex::all();
    }
}
