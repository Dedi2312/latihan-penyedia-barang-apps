<!-- Modal -->
<div x-show="modalHapus"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 border flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
    <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Hapus Produk</h2>
        <form action="{{ route('admin.hapus-produk', $item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="mb-5 flex flex-col">
                <P>Apakah anda yakin ingin menghapus <span class="font-bold">{{$item->nama_produk}}</span>?</P><br>
                <i class="text-red-500">harap hati-hati, data akan terhapus permanen!!!</i>
            </div>
            <button type="button" @click="modalHapus = false" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Batal</button>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
        </form>
    </div>
</div>
