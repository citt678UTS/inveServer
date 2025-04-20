<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Category;
use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
  

    // Tampilkan semua item
    public function showitem()
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        $categories = Category::all();
        // $stokTotal = $items->sum('quantity');
        return view('inventori.item', compact(['items', 'suppliers', 'categories']));
    }

   

    // Simpan kategori baru
    public function storeitem(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
        ]);

        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'created_by' => 1, // pastikan user login
        ]);

        return redirect()->route('inventoriItem')->with('success', 'Item berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori
    public function edititem($id)
    {
        $item = Item::findOrFail($id);
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('inventori.itemEdit', compact(['item', 'suppliers', 'categories']));
    }

    // Update kategori
    public function updateitem(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
        ]);


        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
        ]);

        return redirect()->route('inventoriItem')->with('success', 'Item berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroyitem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('inventoriItem')->with('success', 'Item berhasil dihapus.');
    }
}
