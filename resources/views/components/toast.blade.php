@props([
    'type' => 'success',
    'message' => '',
])

<div 
    x-data 
    x-show="$store.app.toastVisible"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    @click.away="$store.app.toastVisible = false"
    class="fixed top-5 right-5 z-50 p-4 rounded-lg shadow-lg flex items-center space-x-3"
    :class="{
        'bg-green-500 text-white': $store.app.toastType === 'success',
        'bg-red-500 text-white': $store.app.toastType === 'error'
    }"
    style="display: none;"
>
    <!-- Ikon Sukses -->
    <svg x-show="$store.app.toastType === 'success'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    
    <!-- Ikon Error -->
    <svg x-show="$store.app.toastType === 'error'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    
    <!-- Pesan Notifikasi -->
    <p x-text="$store.app.toastMessage" class="font-semibold"></p>
</div>
