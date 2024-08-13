<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- alpine.js  -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    @include('admin.layout.navigation')

    <section>
        <div class="container mx-auto px-5 py-5">
            <div x-data="{ modalCreate: false }" class="flex gap-3">
                <h1 class="text-xl">List Produk</h1>
                <a @click="modalCreate = true" href="#" class="bg-blue-500 rounded-lg px-2 py-1 text-white">tambah produk</a>
                    @include ('admin.modal.create')
            </div>
            <div class="container mx-auto p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="border">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Img</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama Produk</th>
                        <th class="px-6 py-3 text-left font-semibold">Harga</th>
                        <th class="px-6 py-3 text-left font-semibold">Keterangan</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                        <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item)
                        <tr class="border hover:bg-blue-500 hover:bg-opacity-20 transition">
                            <td class="px-6 py-2">{{$loop -> index +1}}</td>
                            <td class="px-6 py-2 text-center">
                                <img src="{{ asset('/storage/produks/'.$item->img) }}" class="rounded object-cover w-full h-[30px]">
                            </td>
                            <td class="px-6 py-2">{{$item->nama_produk}}</td>
                            <td class="px-6 py-2">{{$item->harga}}</td>
                            <td class="px-6 py-2">{{$item->keterangan}}</td>
                            <td class="px-6 py-2">{{$item->status}}</td>
                            <td class="px-6 py-2 flex gap-1 items-center">
                                <div x-data="{ modalEdit: false }">
                                    <button @click="modalEdit = true" class="cursor-pointer bg-gray-500 px-2 py-1 text-sm m-1 text-white rounded-md">edit</button>
                                    @include('admin.modal.edit')
                                </div>
                                <div x-data="{ modalHapus: false }">
                                    <button @click="modalHapus = true" class="cursor-pointer bg-red-500 px-2 py-1 text-sm m-1 text-white rounded-md">hapus</button>
                                    @include('admin.modal.hapus')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>  
    </section>
</body>
</html>