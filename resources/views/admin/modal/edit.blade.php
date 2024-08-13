<!-- Modal -->
<div x-show="modalEdit"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 border flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
    <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Edit Produk</h2>
        <form action="{{ route('admin.edit-produk', $item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-5 flex flex-col">
                <label for="img">Gambar Produk</label>
                <input type="file" name="img" id="img" class="border p-1" required value="{{ old('img', $item->img) }}">
                <!-- error message -->
                @if ($errors->has('img'))
                    <div class="alert alert-danger">{{ $errors->first('img') }}</div>
                @endif
            </div>
            <div class="mb-5 flex flex-col">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="border p-1" required value="{{ old('nama_produk', $item->nama_produk) }}">
                <!-- error message -->
                @if ($errors->has('nama_produk'))
                    <div class="alert alert-danger">{{ $errors->first('nama_produk') }}</div>
                @endif
            </div>
            <div class="mb-5 flex flex-col">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="border p-1" required value="{{ old('harga', $item->harga) }}">
                <!-- error message -->
                @if ($errors->has('harga'))
                    <div class="alert alert-danger">{{ $errors->first('harga') }}</div>
                @endif
            </div>
            <div class="mb-5 flex flex-col">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="border p-1" required value="{{ old('keterangan', $item->keterangan) }}">
                <!-- error message -->
                @if ($errors->has('keterangan'))
                    <div class="alert alert-danger">{{ $errors->first('keterangan') }}</div>
                @endif
            </div>
            <div class="mb-5 flex flex-col">
                <label for="status">Status<i class="text-danger">*</i></label>
                  <select class="p-1 border" id="status" name="status" required>
                    <option value="{{ old('status', $item->status) }}" disabled selected>select status</option>
                    <option value="aktif">aktif</option>
                    <option value="non-aktif">non-aktif</option>
                </select>
            </div>
            <button type="button" @click="modalEdit = false" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Batal</button>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        </form>
    </div>
</div>
