<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricelist;
use Illuminate\Http\Request;

class AdminPricelistController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $pricelists = Pricelist::all();
        return view('admin.pricelist.index', compact('pricelists'));
    }

    public function create()
    {
        return view('admin.pricelists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        Pricelist::create($request->all());

        return redirect()->route('admin.pricelists.index')
            ->with('success', 'Pricelist berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pricelist = Pricelist::findOrFail($id);
        return view('admin.pricelists.edit', compact('pricelist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        $pricelist = Pricelist::findOrFail($id);
        $pricelist->update($request->all());

        return redirect()->route('admin.pricelists.index')
            ->with('success', 'Pricelist berhasil diupdate');
    }

    public function destroy($id)
    {
        $pricelist = Pricelist::findOrFail($id);
        $pricelist->delete();

        return redirect()->route('admin.pricelists.index')
            ->with('success', 'Pricelist berhasil dihapus');
    }
}