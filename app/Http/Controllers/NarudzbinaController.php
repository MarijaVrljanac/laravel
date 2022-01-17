<?php

namespace App\Http\Controllers;

use App\Http\Resources\NarudzbinaResource;
use App\Models\Narudzbina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NarudzbinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $narudzbine = Narudzbina::all();
        return NarudzbinaResource::collection($narudzbine);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'broj' => 'required',
            'cena' => 'required',
            'brojTelefona' => 'required',
            'adresa' => 'required|string|max:255',
            'proizvodID' => 'required'
            //polje user_id ne stavljamo u validator jer ce to zapravo biti id ulogovanog korisnika jer je on kreirao narudzbinu
        ]);

        if ($validator->fails()) 
            return response()->json($validator->errors());
        $n = Narudzbina::create([
            'broj' => $request->broj,
            'cena' => $request->cena,
            'brojTelefona' => $request->brojTelefona,
            'adresa' => $request->adresa,
            'proizvodID' => $request->proizvodID,
           
            'user_id' => Auth::user()->id


        ]);
        $n->save();
        return response()->json(['Narudzbina je uspesno kreirana!', new NarudzbinaResource($n)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Narudzbina  $narudzbina
     * @return \Illuminate\Http\Response
     */
    public function show($id)    //$id
    {
        return new NarudzbinaResource(Narudzbina::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Narudzbina  $narudzbina
     * @return \Illuminate\Http\Response
     */
    public function edit(Narudzbina $narudzbina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Narudzbina  $narudzbina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    //$id
    {
        $validator = Validator::make($request->all(), [
            'broj' => 'required',
            'cena' => 'required',
            'brojTelefona' => 'required',
            'adresa' => 'required|string|max:255',
            'proizvodID' => 'required'
            //polje userID ne stavljamo u validator jer ce to zapravo biti id ulogovanog korisnika jer je on kreirao narudzbinu
        ]);

        $n =  Narudzbina::find($id);
        if($n){
            $n->adresaDostave = $request->adresaDostave;
            $n->cena = $request->cena;
            $n->status = $request->status;
            $n->beauty_id = $request->beauty_id;
            $n->save();
            return response()->json(['Narudzbina uspesno izmenjena!', new NarudzbinaResource($p)]);

        }else{
            return response()->json('Ne postoji trazena narudzbina!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Narudzbina  $narudzbina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //$id
    {
        $n = Narudzbina::find($id);
        if($n){
            $n->delete();
            return response()->json(['Narudžbina je obrisana!',new NarudzbinaResource($n)]);
        }else{
            return response()->json('Tražena narudžbina ne postoji u bazi!');
        }
    }
}
