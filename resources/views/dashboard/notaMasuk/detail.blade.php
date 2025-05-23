<x-dashboard.layout>
    <div>
        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Nota Gagal Ditambahkan</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="flex items-center flex-1 space-x-4">
                            <h5>
                                <span class="text-gray-500">Detail Nota Masuk Untuk No Referensi</span>
                                <span class="dark:text-white">{{ $no_referensi }}</span>
                            </h5>
                         
                        </div>
                        <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                            <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Tambah Detail Nota
                            </button>
                           
                            {{-- <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                Export
                            </button> --}}
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Gudang</th>
                                    <th scope="col" class="px-4 py-3">Jumlah</th>
                                    <th scope="col" class="px-4 py-3">Keterangan</th>
                                    <th scope="col" class="px-4 py-3">Foto</th>
                                    <th scope="col" class="px-4 py-3">Pengelola Terakhir</th>
                                    <th scope="col" class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $detailNota as $item)
                                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="w-4 px-4 py-3">
                                                <div class="flex items-center">
                                                    <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->barang->nama_barang }} {{  $item->merek->nama_merek }}</td>                        
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->gudang->nama_gudang }}</td>
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->total_barang_baru }}</td>
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->keterangan }}</td>
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <button data-modal-target="default-{{$item->id}}" data-modal-toggle="default-{{$item->id}}" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Lihat</button> 
                                            </td>
                                             <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->user->nama }}</td>
                                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <button data-modal-target="update-{{$item->id}}" data-modal-toggle="update-{{$item->id}}" type="button" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</button>
                                            <a data-confirm-delete="true"  href="{{ route("detail.hapus", "$item->id") }}" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Hapus</button>
                                            </td>
                                    </tr>
                                @empty
                                      <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td colspan="8" > 
                                                <div class="p-4 text-center mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                                    <span class="font-medium">Detail Nota Masuk Pengadaan Masih Kosong!</span> 
                                                </div>
                                        </td>
                                      </tr>
                                @endforelse
                                  
                               
                               
                            
                            </tbody>
                        </table>
                    </div>
                    {{-- <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </section>
    </div>



    {{-- Create Modal --}}
    <!-- Main modal -->
        <div id="defaultModal"   data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Tambah Nota
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>   
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route("detail.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <input type="hidden" name="no_referensi" id="no_referensi" value="{{ $no_referensi }}">

                            <div>
                                    <label for="barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barang</label>
                                    <select id="barang" name="kd_barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach ($barang as $item)
                                                     <option value="{{ $item->kd_barang }}">{{ $item->nama_barang }}</option>
                                            @endforeach
                                    </select>
                                    @error('kd_barang')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                    @enderror
                            </div>
                            <div>      
                                    <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk</label>
                                    <select id="merk" name="kd_merek" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       @foreach ($merek as $item)
                                                     <option value="{{ $item->kd_merek }}">{{ $item->nama_merek }}</option>
                                        @endforeach
                                    </select>
                                    @error('kd_merek')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                    @enderror
                            </div>
                            <div>      
                                    <label for="gudang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gudang</label>
                                    <select id="gudang" name="kd_gudang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                       @foreach ($gudang as $item)
                                                     <option value="{{ $item->kd_gudang }}">{{ $item->nama_gudang }}</option>
                                        @endforeach
                                    </select>
                                    @error('kd_gudang')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                    @enderror
                            </div>
                            <div>
                                <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Barang</label>
                                <input type="number" name="jumlah" id="jumlah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jumlah" required="">
                                @error('jumlah')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                @enderror
                            </div>
                             <div> 
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Foto  </label>
                                <input name="file" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                @error('file')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                @enderror
                            </div>
                            <div>
                                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Keterangan" required="">
                                @error('keterangan')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end">
                                <button type="submit" class="text-white  inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Tambah
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


     {{-- Update Modal --}}
    <!-- Main modal -->
    @foreach ($detailNota as $item)  
    <div id="update-{{$item->id}}"   data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Update Detail Nota
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-{{$item->id}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>   
                </div>
                <!-- Modal body -->
                <form action="{{ route("detail.update", $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        
                        <div>
                                <label for="barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barang</label>
                                <select id="barang" name="kd_barang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($barang as $itemBarang)
                                                @if ($itemBarang->kd_barang == $item->kd_barang)
                                                    <option selected value="{{ $itemBarang->kd_barang }}">{{ $itemBarang->nama_barang }}</option>
                                                @else
                                                 <option value="{{ $itemBarang->kd_barang }}">{{ $itemBarang->nama_barang }}</option>
                                                @endif
                                        @endforeach
                                </select>
                                @error('kd_barang')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                @enderror
                        </div>
                        <div>      
                                <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk</label>
                                <select id="merk" name="kd_merek" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach ($merek as $itemMerek)
                                                @if ($itemMerek->kd_merek == $item->kd_merek)
                                                    <option selected value="{{ $itemMerek->kd_merek }}">{{ $itemMerek->nama_merek }}</option>
                                                @else
                                                 <option value="{{ $itemMerek->kd_merek }}">{{ $itemMerek->nama_merek }}</option>
                                                @endif
                                        @endforeach
                                </select>
                                @error('kd_merek')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                @enderror
                        </div>
                        <div>      
                                <label for="gudang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gudang</label>
                                <select id="gudang" name="kd_gudang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($gudang as $itemGudang)
                                                @if ($itemGudang->kd_gudang == $item->kd_gudang)
                                                    <option selected value="{{ $itemGudang->kd_gudang }}">{{ $itemGudang->nama_gudang }}</option>
                                                @else
                                                 <option value="{{ $itemGudang->kd_gudang }}">{{ $itemGudang->nama_gudang }}</option>
                                                @endif
                                        @endforeach
                                </select>
                                @error('kd_gudang')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                @enderror
                        </div>
                        <div>
                            <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Barang</label>
                            <input value="{{ $item->total_barang_baru }}" type="number" name="jumlah" id="jumlah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jumlah" required="">
                            @error('jumlah')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                         <div> 
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Foto Jika Foto Berubah </label>
                            <input name="file" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                            @error('file')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                        <div>
                            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <input value="{{ $item->keterangan }}" type="text" name="keterangan" id="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Keterangan" required="">
                            @error('keterangan')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end">
                            <button type="submit" class="text-white  inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Update
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    @endforeach
        
 

        {{-- Modal Show File --}}
        <!-- Main modal -->
        @foreach ($detailNota as $item) 
            <div id="default-{{$item->id}}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative  w-full max-w-7xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Foto Barang
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-{{$item->id}}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                <iframe class="w-full h-[600px]" src="{{ Storage::url($item->foto_barang) }}"></iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</x-dashboard.layout>