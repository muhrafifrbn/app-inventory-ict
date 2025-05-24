<aside id="logo-sidebar" class="fixed sm:rounded-tl-4xl top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-lightGreen  sm:translate-x-0 dark:bg-gray-800 " aria-label="Sidebar">
   <div class="h-full pl-3 pb-4 overflow-y-auto bg-lightGreen dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <x-dashboard.navlink :active="request()->is('dashboard')">
           <x-slot:link>/dashboard</x-slot:link>
          <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
         </svg>
               <span class="ms-3 ">Dashboard</span>
        </x-dashboard.navlink>
      

         <x-dashboard.navlink :active="request()->is('notaBarang') || request()->is('notaBarang/*')">
                           <x-slot:link>/notaBarang/</x-slot:link>
                           <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                              <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                           </svg>
                              <span class="flex-1 ms-3 whitespace-nowrap">Nota Barang</span>
         </x-dashboard.navlink>

         <x-dashboard.navlink :active="request()->is('gudang') || request()->is('gudang/*')">
            <x-slot:link>/gudang</x-slot:link>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
                </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Gudang</span>
        </x-dashboard.navlink>

        @can('isAdmin')
         <x-dashboard.navlink :active="request()->is('dataKeperluan') || request()->is('dataKeperluan/*')">
            <x-slot:link>/dataKeperluan</x-slot:link>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
                </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Keperluan Data</span>
        </x-dashboard.navlink>
        @endcan
        
      </ul>
   </div>
</aside>