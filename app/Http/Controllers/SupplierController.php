<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
  

    // Tampilkan semua kategori
    public function showsupplier()
    {
        $suppliers = Supplier::all();
        return view('inventori.supplier', compact('suppliers'));
    }

    // Simpan kategori baru
    public function storesupplier(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string',
        ]);

        Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'created_by' => 1, // pastikan user login
        ]);

        return redirect()->route('inventoriSupplier')->with('success', 'Supplier berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori
    public function editsupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('inventori.supplierEdit', compact('supplier'));
    }

    // Update kategori
    public function updatesupplier(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
        ]);

        return redirect()->route('inventoriSupplier')->with('success', 'Supplier berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroysupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('inventoriSupplier')->with('success', 'Supplier berhasil dihapus.');
    }
}
