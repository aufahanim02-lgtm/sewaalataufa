<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKomentar;
use App\Models\ModelArtikel;

class KomentarController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN (LIHAT SEMUA KOMENTAR)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $data = ModelKomentar::with(['artikel', 'penyewa'])->latest()->get();
        return view('user.komentar.index', compact('data'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE KOMENTAR (DARI PENYEWA / LANDING PAGE)
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'artikelid' => 'required|exists:artikel,id',
            'isikomentar' => 'required',
        ]);

        ModelKomentar::create([
            'artikelid' => $request->artikelid,
            'penyewaid' => auth('penyewa')->id(), // ✅ multi auth penyewa
            'isikomentar' => $request->isikomentar,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL KOMENTAR
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $data = ModelKomentar::with(['artikel', 'penyewa'])->findOrFail($id);
        return view('user.komentar.show', compact('data'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT KOMENTAR
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data = ModelKomentar::findOrFail($id);
        return view('user.komentar.edit', compact('data'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE KOMENTAR
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'isikomentar' => 'required',
        ]);

        $data = ModelKomentar::findOrFail($id);

        $data->update([
            'isikomentar' => $request->isikomentar,
        ]);

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE KOMENTAR
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        ModelKomentar::findOrFail($id)->delete();
        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil dihapus');
    }
}