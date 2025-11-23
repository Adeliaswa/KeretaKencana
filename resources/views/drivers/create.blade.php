<x-app-layout>
    <div class="container mx-auto px-4 py-6">

        <h1 class="text-2xl font-bold mb-6">Tambah Driver Baru</h1>

        <form action="{{ route('drivers.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block font-medium mb-1">Nama</label>
                <input type="text" name="name"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            {{-- Nomor Telepon --}}
            <div>
                <label class="block font-medium mb-1">No. Telepon</label>
                <input type="text" name="phone"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block font-medium mb-1">Alamat</label>
                <textarea name="address"
                          class="w-full border rounded px-3 py-2"
                          required></textarea>
            </div>

            {{-- Nomor Lisensi (SIM) --}}
            <div>
                <label class="block font-medium mb-1">Nomor Lisensi (SIM)</label>
                <input type="text" name="license_number"
                       class="w-full border rounded px-3 py-2"
                       required>
            </div>

            {{-- Status Driver --}}
            <div>
                <label class="block font-medium mb-1">Status Driver</label>
                <select name="status"
                        class="w-full border rounded px-3 py-2"
                        required>
                    <option value="available">Available (Tersedia)</option>
                    <option value="on_trip">On Trip (Sedang Bertugas)</option>
                    <option value="offline">Offline (Tidak Aktif)</option>
                </select>
            </div>

            {{-- Tombol Submit --}}
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan
            </button>

        </form>

    </div>
</x-app-layout>
