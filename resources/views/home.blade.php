<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penyedia Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('admin.layout.navigation')

    <section>
        <div class="container mx-auto px-5 py-5">
            <h1 class="text-xl">Produk</h1>
            <div class="container mx-auto p-4">
                <div class="grid grid-cols-4 gap-4">
                    <!-- Product 1 -->
                     @foreach ($produk as $item)
                        <div class="bg-white p-4 shadow-md hover:scale-105 transition">
                            <img src="{{ asset('/storage/produks/'.$item->img) }}" class="rounded object-cover w-full h-[150px]">
                            <h3 class="text-lg font-semibold">{{$item->nama_produk}}</h3>
                            <p class="text-gray-600">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            <p class="text-gray-600">{{$item->keterangan}}</p>
                        </div>
                     @endforeach
                </div>
            </div>
        </div>  
    </section>
</body>
</html>