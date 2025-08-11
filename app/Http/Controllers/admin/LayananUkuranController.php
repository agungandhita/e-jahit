<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Ukuran;
use App\Models\LayananUkuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananUkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LayananUkuran::with(['layanan', 'ukuran']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('layanan', function($q) use ($search) {
                $q->where('nama_layanan', 'like', '%' . $search . '%');
            })->orWhereHas('ukuran', function($q) use ($search) {
                $q->where('nama_ukuran', 'like', '%' . $search . '%');
            });
        }

        // Filter by layanan
        if ($request->filled('layanan_id')) {
            $query->where('layanan_id', $request->layanan_id);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $layananUkuran = $query->orderBy('layanan_id')
                              ->orderBy('ukuran_id')
                              ->paginate(15);

        $layananOptions = Layanan::aktif()->pluck('nama_layanan', 'layanan_id');

        return view('admin.layanan-ukuran.index', compact('layananUkuran', 'layananOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layananOptions = Layanan::aktif()->get();
        $ukuranOptions = Ukuran::aktif()->get();
        
        return view('admin.layanan-ukuran.create', compact('layananOptions', 'ukuranOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'layanan_id' => 'required|exists:layanan,layanan_id',
            'ukuran_id' => 'required|exists:ukuran,ukuran_id',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        // Check for duplicate combination
        $exists = LayananUkuran::where('layanan_id', $request->layanan_id)
                              ->where('ukuran_id', $request->ukuran_id)
                              ->exists();

        if ($exists) {
            return redirect()->back()
                           ->withErrors(['ukuran_id' => 'Kombinasi layanan dan ukuran sudah ada.'])
                           ->withInput();
        }

        LayananUkuran::create($request->all());

        return redirect()->route('admin.layanan-ukuran.index')
                        ->with('success', 'Harga layanan ukuran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LayananUkuran $layananUkuran)
    {
        $layananUkuran->load(['layanan', 'ukuran']);
        return view('admin.layanan-ukuran.show', compact('layananUkuran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LayananUkuran $layananUkuran)
    {
        $layananOptions = Layanan::aktif()->get();
        $ukuranOptions = Ukuran::aktif()->get();
        
        return view('admin.layanan-ukuran.edit', compact('layananUkuran', 'layananOptions', 'ukuranOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LayananUkuran $layananUkuran)
    {
        $validator = Validator::make($request->all(), [
            'layanan_id' => 'required|exists:layanan,layanan_id',
            'ukuran_id' => 'required|exists:ukuran,ukuran_id',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        // Check for duplicate combination (excluding current record)
        $exists = LayananUkuran::where('layanan_id', $request->layanan_id)
                              ->where('ukuran_id', $request->ukuran_id)
                              ->where('layanan_ukuran_id', '!=', $layananUkuran->layanan_ukuran_id)
                              ->exists();

        if ($exists) {
            return redirect()->back()
                           ->withErrors(['ukuran_id' => 'Kombinasi layanan dan ukuran sudah ada.'])
                           ->withInput();
        }

        $layananUkuran->update($request->all());

        return redirect()->route('admin.layanan-ukuran.index')
                        ->with('success', 'Harga layanan ukuran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananUkuran $layananUkuran)
    {
        // Check if there are any orders using this combination
        if ($layananUkuran->pesanan()->exists()) {
            return redirect()->back()
                           ->with('error', 'Tidak dapat menghapus karena masih ada pesanan yang menggunakan kombinasi ini.');
        }

        $layananUkuran->delete();

        return redirect()->route('admin.layanan-ukuran.index')
                        ->with('success', 'Harga layanan ukuran berhasil dihapus.');
    }

    /**
     * Toggle status of the specified resource.
     */
    public function toggleStatus(LayananUkuran $layananUkuran)
    {
        $layananUkuran->status = $layananUkuran->status === 'aktif' ? 'nonaktif' : 'aktif';
        $layananUkuran->save();

        $message = $layananUkuran->status === 'aktif' ? 'Harga layanan ukuran berhasil diaktifkan.' : 'Harga layanan ukuran berhasil dinonaktifkan.';

        return redirect()->back()->with('success', $message);
    }

    /**
     * Get ukuran by layanan (AJAX)
     */
    public function getUkuranByLayanan(Request $request)
    {
        $layananId = $request->layanan_id;
        
        $ukuran = Ukuran::aktif()
                        ->whereDoesntHave('layananUkuran', function($query) use ($layananId) {
                            $query->where('layanan_id', $layananId);
                        })
                        ->orderBy('nama_ukuran')
                        ->get();
        
        return response()->json($ukuran);
    }

    /**
     * Bulk create for a layanan
     */
    public function bulkCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'layanan_id' => 'required|exists:layanan,layanan_id',
            'ukuran_data' => 'required|array',
            'ukuran_data.*.ukuran_id' => 'required|exists:ukuran,ukuran_id',
            'ukuran_data.*.harga' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $layananId = $request->layanan_id;
        $created = 0;

        foreach ($request->ukuran_data as $data) {
            $exists = LayananUkuran::where('layanan_id', $layananId)
                                  ->where('ukuran_id', $data['ukuran_id'])
                                  ->exists();

            if (!$exists) {
                LayananUkuran::create([
                    'layanan_id' => $layananId,
                    'ukuran_id' => $data['ukuran_id'],
                    'harga' => $data['harga'],
                    'status' => 'aktif'
                ]);
                $created++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Berhasil menambahkan {$created} harga layanan ukuran."
        ]);
    }
}