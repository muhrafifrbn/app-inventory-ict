<x-dashboard.layout>
   <div class="flex gap-5 flex-wrap">
       @forelse ($items as $item)
           <div class="w-1/4 w-75 p-6 bg-lightGreen border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
               <div class="mb-3 stock-icon">
                   {!! $iconSvg !!}
               </div>
               <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $item->nama_barang }}</h5>
               <p class="mb-2 font-normal text-lg text-white dark:text-gray-400">Jumlah Stok: {{ count($item->detailGudang) }}</p>
           </div>
       @empty
           <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
               <p class="text-center text-gray-700 dark:text-gray-400">Belum ada data barang stok.</p>
           </div>
       @endforelse
   </div>
</x-dashboard.layout>