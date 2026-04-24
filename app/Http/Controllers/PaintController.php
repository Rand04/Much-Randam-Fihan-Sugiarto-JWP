<?php

namespace App\Http\Controllers;

use App\Models\Paint;
use App\Models\PaintType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaintController extends Controller
{
    public function index()
    {
        $paints = \App\Models\Paint::with('type')->get();
        return view('paints.index', compact('paints'));
    }

    public function create()
    {
        $types = PaintType::all();
        return view('paints.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cat' => 'required',
            'paint_type_id' => 'required',
            'jenis' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'terjual' => 'required',
            'kualitas' => 'required',
            'ukuran' => 'required',
        ]);

        Paint::create($request->all());

        return redirect()->route('paints.index');
    }

    public function edit($id)
    {
        $paint = Paint::findOrFail($id);
        $types = PaintType::all();
        return view('paints.edit', compact('paint','types'));
    }

    public function update(Request $request, $id)
    {
        $paint = Paint::findOrFail($id);
        $paint->update($request->all());

        return redirect()->route('paints.index');
    }

    public function destroy($id)
    {
        Paint::destroy($id);
        return redirect()->route('paints.index');
    }

    public function rekomendasi(Request $request)
    {
        $query = \App\Models\Paint::query();

        // FILTER USER
        if ($request->paint_type_id) {
            $query->where('paint_type_id', $request->paint_type_id);
        }

        if ($request->jenis) {
            $query->where('jenis', $request->jenis);
        }

        // SMART SCORING
        $paints = $query->select('*', DB::raw("
            (terjual * 2) +
            (CASE 
                WHEN kualitas = 'premium' THEN 20 
                ELSE 10 
            END) -
            (harga / 10000)
            as score
        "))
        ->orderByDesc('score')
        ->take(6)
        ->get();

        return view('paints.rekomendasi', compact('paints'));
    }
}