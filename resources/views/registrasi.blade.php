<x-layout>


    <section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="{{asset("images/logo-ict.png")}}" alt="logo">
          Lab ICT    
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Registrasi
              </h1>
              <form method="POST" class="space-y-4 md:space-y-6" action="/registrasi">
                @csrf
                <div class="container-input flex gap-2" >
                    <div class="w-1/2">
                        <div>
                            <label for="nim_nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nim / Nip</label>
                            <input value="{{old("nim_nip")}}" type="text" name="nim_nip" id="nim_nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nip" required>
                            @error('nim_nip')
                                 <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input value="{{old("nama")}}" type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required>
                            @error('nama')
                                 <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input value="{{old("alamat")}}" type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat" required>
                            @error('alamat')
                                 <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                        <div>
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Handphone</label>
                            <input value="{{old("no_hp")}}" type="number" name="no_hp" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat" required>
                            @error('no_hp')
                                 <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-1/2"> 
                        <div>
                                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="jabatan" name="jabatan_lab" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="spv_iventory">Spv Inventory</option>
                                </select>
                                @error('jabatan_lab')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                                @enderror
                        </div>
                          <div>
                            <label for="nim_nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan Asisten</label>
                            <input value="{{old("angkatan_asisten")}}" type="text" name="angkatan_asisten" id="nim_nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nip" required>
                            @error('angkatan_asisten')
                                 <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                             @error('password')
                                 <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="confirm-password" name="password_confirmation" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            @error('password_confirmation')
                                 <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message}}</span></p>
                            @enderror
                        </div>
                    </div>
                </div>
                  <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</x-layout>