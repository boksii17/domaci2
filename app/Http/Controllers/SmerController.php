<?php

namespace App\Http\Controllers;

use App\Http\Resources\SmerResurs;
use App\Models\Smer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SmerController extends BaseController
{
    public function index()
    {
        $smerovi = Smer::all();
        return $this->uspesno(SmerResurs::collection($smerovi), 'Vraceni su svi smerovi.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivSmera' => 'required',
            'fakultetID' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $smer = Smer::create($input);

        return $this->uspesno(new SmerResurs($smer), 'Novi smer je kreiran.');
    }


    public function show($id)
    {
        $smer = Smer::find($id);
        if (is_null($smer)) {
            return $this->greska('Smer sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new SmerResurs($smer), 'Smer sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $smer = Smer::find($id);
        if (is_null($smer)) {
            return $this->greska('Smer sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivSmera' => 'required',
            'fakultetID' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $smer->nazivSmera = $input['nazivSmera'];
        $smer->fakultetID = $input['fakultetID'];
        $smer->save();

        return $this->uspesno(new SmerResurs($smer), 'Smer je izmenjen.');
    }

    public function destroy($id)
    {
        $smer = Smer::find($id);
        if (is_null($smer)) {
            return $this->greska('Smer sa zadatim ID-em ne postoji.');
        }

        $smer->delete();
        return $this->uspesno([], 'Smer je obrisan.');
    }
}
