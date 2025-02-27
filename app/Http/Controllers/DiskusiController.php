<?php

namespace App\Http\Controllers;

use App\Models\DiskusiModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diskusi = DiskusiModel::all();
        return Inertia::render('Diskusi/Diskusi', [
            'diskusi' => $diskusi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Diskusi/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
        ]);

        DiskusiModel::create($request->all());

        return redirect()->route('diskusi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DiskusiModel $diskusi)
    {
        return Inertia::render('Diskusi/Show', [
            'diskusi' => $diskusi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiskusiModel $diskusi)
    {
        return Inertia::render('Diskusi/Edit', [
            'diskusi' => $diskusi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DiskusiModel $diskusi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $diskusi->update($request->all());

        return redirect()->route('diskusi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiskusiModel $diskusi)
    {
        $diskusi->delete();

        return redirect()->route('diskusi.index');
    }
}
