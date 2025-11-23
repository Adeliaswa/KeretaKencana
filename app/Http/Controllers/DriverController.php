<?php

namespace App\Http\Controllers;

use App\Models\Driver; // Import Model Driver
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Diperlukan untuk validasi 'status'

class DriverController extends Controller
{
    /**
     * Display a listing of the resource (READ: Daftar Driver).
     */
    public function index()
    {
        $drivers = Driver::latest()->get();
        // Mengirim data ke resources/views/drivers/index.blade.php
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource (CREATE: Tampilkan Form).
     */
    public function create()
    {
        // Ambil semua driver yang status-nya 'available'
        $drivers = Driver::where('status', 'available')->get();

        // Kirim ke view
        return view('drivers.create', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage (CREATE: Proses Simpan).
     */
    public function store(Request $request)
    {
        // Validasi data masukan
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            // Pastikan phone dan license_number unik di tabel drivers
            'phone' => 'required|string|max:15|unique:drivers,phone',
            'license_number' => 'required|string|max:50|unique:drivers,license_number',
            // Validasi bahwa status hanya boleh salah satu dari nilai yang ditentukan (enum)
            'status' => ['required', Rule::in(['available', 'on_trip', 'offline'])],
        ]);

        // Simpan ke database
        Driver::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.drivers.index')->with('success', 'Driver baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource. (Tidak digunakan dalam CRUD sederhana ini)
     */
    public function show(string $id)
    {
        // Opsional: Untuk melihat detail satu driver
        // $driver = Driver::findOrFail($id);
        // return view('drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource (UPDATE: Tampilkan Form Edit).
     */
    public function edit(Driver $driver) // Menggunakan Route Model Binding
    {
        // Mengirim data driver yang akan diubah ke resources/views/drivers/edit.blade.php
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage (UPDATE: Proses Update).
     */
    public function update(Request $request, Driver $driver) // Menggunakan Route Model Binding
    {
        // Validasi data masukan
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            // Validasi unik, kecuali untuk driver yang sedang di-edit
            'phone' => ['required', 'string', 'max:15', Rule::unique('drivers')->ignore($driver->id)],
            'license_number' => ['required', 'string', 'max:50', Rule::unique('drivers')->ignore($driver->id)],
            'status' => ['required', Rule::in(['available', 'on_trip', 'offline'])],
        ]);

        // Update data di database
        $driver->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.drivers.index')->with('success', 'Data Driver berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage (DELETE: Hapus Data).
     */
    public function destroy(Driver $driver) // Menggunakan Route Model Binding
    {
        // Hapus data driver dari database
        $driver->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.drivers.index')->with('success', 'Driver berhasil dihapus!');
    }
}