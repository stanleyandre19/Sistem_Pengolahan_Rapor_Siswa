<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        $data = Guru::all();
        return view('pages.guru', compact('data'));
    }

    public function store(Request $request)
    {
        Guru::create($request->all());
        return redirect('/guru');
    }

    public function edit($id)
    {
        $data = Guru::find($id);
        return view('pages.edit_guru', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->update($request->all());

        return redirect('/guru');
    }

    public function destroy($id)
    {
        Guru::destroy($id);
        return redirect('/guru');
    }
}