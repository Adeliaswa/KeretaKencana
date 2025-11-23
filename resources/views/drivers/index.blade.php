<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
    <a href="{{ route('drivers.edit', $driver->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
    
    <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Driver {{ $driver->name }}? Aksi ini tidak bisa dibatalkan.');">
        @csrf
        @method('delete') <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Hapus</button>
    </form>
</td>