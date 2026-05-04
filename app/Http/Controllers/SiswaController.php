<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::all();
        return view('pages.siswa', compact('data'));
    }

    public function store(Request $request)
    {
        Siswa::create($request->all());
        return redirect('/siswa');
    }

    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return redirect('/siswa');
    }
}