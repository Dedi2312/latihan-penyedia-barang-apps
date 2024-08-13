<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('admin.layout.navigation')

    <section>
        <div class="container mx-auto px-5 py-5">
            <h1 class="text-xl">Dashboard</h1>
            <div class="container mx-auto p-4">
                <div class="grid grid-cols-4 gap-4">
                    <!-- total user -->
                    <div class="bg-blue-200 p-4 shadow-md hover:scale-105 transition">
                        <h3 class="text-lg font-semibold">Total user</h3>
                        <p class="text-gray-600 text-center text-5xl m-4">{{$totalUser}}</p>
                    </div>
                    <!-- total produk -->
                    <div class="bg-red-200 p-4 shadow-md hover:scale-105 transition">
                        <h3 class="text-lg font-semibold">Total produk</h3>
                        <p class="text-gray-600 text-center text-5xl m-4">{{$totalProduk}}</p>
                    </div>
                    <!-- user aktif -->
                    <div class="bg-yellow-200 p-4 shadow-md hover:scale-105 transition">
                        <h3 class="text-lg font-semibold">User aktif</h3>
                        <p class="text-gray-600 text-center text-5xl m-4">{{$userAktif}}</p>
                    </div>
                    <!-- produk aktif -->
                    <div class="bg-green-200 p-4 shadow-md hover:scale-105 transition">
                        <h3 class="text-lg font-semibold">Produk aktif</h3>
                        <p class="text-gray-600 text-center text-5xl m-4">{{$produkAktif}}</p>
                    </div>
                </div>
            </div>
            <hr class="my-5">  
        </div>
    </section>

    <section>
        <div class="container mx-auto px-5 py-5">
            <h1 class="text-xl">List Produk</h1>
            <div class="container mx-auto p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="border">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama Produk</th>
                        <th class="px-6 py-3 text-left font-semibold">Harga</th>
                        <th class="px-6 py-3 text-left font-semibold">Keterangan</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item)
                        <tr class="border hover:bg-blue-500 hover:bg-opacity-20 transition">
                            <td class="px-6 py-2">{{$loop -> index +1}}</td>
                            <td class="px-6 py-2">{{$item->nama_produk}}</td>
                            <td class="px-6 py-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-2">{{$item->keterangan}}</td>
                            <td class="px-6 py-2">{{$item->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <hr class="my-5">  
        </div>  
    </section>

    <section>
        <div class="container mx-auto px-5 py-5">
            <h1 class="text-xl">List Pengguna</h1>
            <div class="container mx-auto p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="border">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold">Phone</th>
                        <th class="px-6 py-3 text-left font-semibold">Email</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengguna as $item1)
                        <tr class="border hover:bg-blue-500 hover:bg-opacity-20 transition">
                            <td class="px-6 py-2">{{$loop -> index +1}}</td>
                            <td class="px-6 py-2">{{$item1->name}}</td>
                            <td class="px-6 py-2">{{$item1->phone}}</td>
                            <td class="px-6 py-2">{{$item1->email}}</td>
                            <td class="px-6 py-2">{{$item1->status}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>  
    </section>
</body>
</html>