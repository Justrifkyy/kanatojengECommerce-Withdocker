    <x-admin-layout>
        <x-slot name="header">
            Edit Produk: {{ $product->name }}
        </x-slot>
        
        <div class="p-6 bg-gray-100" 
             x-data="{
                // Logika untuk menghapus media via AJAX
                deleteMedia(mediaId, event) {
                    if (!confirm('Anda yakin ingin menghapus media ini?')) {
                        return;
                    }

                    let button = event.currentTarget;
                    button.disabled = true; // Nonaktifkan tombol saat proses

                    fetch(`/admin/products/media/${mediaId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            // Hapus elemen media dari tampilan secara langsung
                            button.closest('.media-item').remove();
                            // Tampilkan notifikasi (jika Anda punya sistem toast)
                            alert(data.message); 
                        } else {
                            alert('Gagal menghapus media.');
                            button.disabled = false;
                        }
                    })
                    .catch(() => {
                        alert('Terjadi kesalahan koneksi.');
                        button.disabled = false;
                    });
                }
             }">

            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @include('admin.products.partials.form', ['product' => $product])
            </form>
        </div>
    </x-admin-layout>
    