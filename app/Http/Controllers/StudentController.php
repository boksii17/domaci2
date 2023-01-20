<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResurs;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends BaseController
{
    public function index()
    {
        $studenti = Student::all();
        return $this->uspesno(StudentResurs::collection($studenti), 'Vraceni su svi studenti.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'brojIndeksa' => 'required',
            'smerID' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $student = Student::create($input);

        return $this->uspesno(new StudentResurs($student), 'Novi student je kreiran.');
    }


    public function show($id)
    {
        $student = Student::find($id);
        if (is_null($student)) {
            return $this->greska('Student sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new StudentResurs($student), 'Student sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (is_null($student)) {
            return $this->greska('Student sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'brojIndeksa' => 'required',
            'smerID' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $student->ime = $input['ime'];
        $student->prezime = $input['prezime'];
        $student->brojIndeksa = $input['brojIndeksa'];
        $student->smerID = $input['smerID'];
        $student->save();

        return $this->uspesno(new StudentResurs($student), 'Student je izmenjen.');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (is_null($student)) {
            return $this->greska('Student sa zadatim ID-em ne postoji.');
        }
        $student->delete();
        return $this->uspesno([], 'Student je obrisan.');
    }
}
