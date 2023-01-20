<?php

namespace App\Http\Controllers;

use App\Http\Resources\FakultetResurs;
use App\Models\Fakultet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FakultetController extends BaseController
{
    public function index()
    {
        $fakulteti = Fakultet::all();
        return $this->uspesno(FakultetResurs::collection($fakulteti), 'Vraceni su svi fakulteti.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivFakulteta' => 'required',
            'grad' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $fakultet = Fakultet::create($input);

        return $this->uspesno(new FakultetResurs($fakultet), 'Novi fakultet je kreiran.');
    }


    public function show($id)
    {
        $fakultet = Fakultet::find($id);
        if (is_null($fakultet)) {
            return $this->greska('Fakultet sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new FakultetResurs($fakultet), 'Fakultet sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $fakultet = Fakultet::find($id);
        if (is_null($fakultet)) {
            return $this->greska('Fakultet sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivFakulteta' => 'required',
            'grad' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $fakultet->nazivFakulteta = $input['nazivFakulteta'];
        $fakultet->grad = $input['grad'];
        $fakultet->save();

        return $this->uspesno(new FakultetResurs($fakultet), 'Fakultet je izmenjen.');
    }

    public function destroy($id)
    {
        $fakultet = Fakultet::find($id);
        if (is_null($fakultet)) {
            return $this->greska('Fakultet sa zadatim ID-em ne postoji.');
        }

        $fakultet->delete();
        return $this->uspesno([], 'Fakultet je obrisan.');
    }
}
