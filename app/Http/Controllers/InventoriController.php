<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoriController extends Controller
{
    // Tampilkan halaman dashboard inventori
    public function dashboardInventori()
    {
        $items = Item::all();
        $stokTotal = $items->sum('quantity');
        $totalNilaiStok = $items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        $rataRataHarga = $items->avg('price');
        $jumlahItem = Item::count();
        $jumlahCategory = Category::count();
        $jumlahSupplier = Supplier::count();

        // ringkasan untuk kategoti makanan
        $itemsMakanan = $items->where('category_id', 1);
        $jumlahItemMakanan = $itemsMakanan->count();
        $totalNilaiStokMakanan = $itemsMakanan->sum(function ($itemMakanan) {
            return $itemMakanan->quantity * $itemMakanan->price;
        });
        $rataRataHargaMakanan = $itemsMakanan->avg('price');

     

        return view('inventori.dashboard', compact(['stokTotal', 'totalNilaiStok', 'rataRataHarga',
    'jumlahItem', 'jumlahCategory', 'jumlahSupplier', 'itemsMakanan', 'jumlahItemMakanan',
'totalNilaiStokMakanan', 'rataRataHargaMakanan']));
    }

    public function showUrgentStock()
    {
        $itemsUrgentStock = Item::where('quantity', '<=', 5)->get();
        return view('inventori.urgentStock', compact('itemsUrgentStock'));
    }



    // Tampilkan semua kategori
    public function showcategory()
    {
        $categories = Category::all();
        return view('inventori.category', compact('categories'));
    }

    // Simpan kategori baru
    public function storecategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => 1, // pastikan user login
        ]);

        return redirect()->route('inventoriCategory')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori
    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('inventori.categoryEdit', compact('category'));
    }

    // Update kategori
    public function updatecategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('inventoriCategory')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroycategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('inventoriCategory')->with('success', 'Kategori berhasil dihapus.');
    }
}
