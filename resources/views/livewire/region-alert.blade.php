{{-- If your happiness depends on money, you will never be happy with yourself. --}}
<button href="#" class="btn btn-danger" wire:click="$dispatch('triggerDelete',{{ $regionId }})"><i
        class="bi bi-trash"></i>
    Hapus</button>

@push('delete')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', regionId => {
            Swal.fire({
                title: 'Anda Yakin?',
                text: 'Data Wilayah akan dihapus!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya Hapus!'
            }).then((result) => {
         //if user clicks on delete
                if (result.value) {
             // calling destroy method to delete
                    @this.call('destroy', regionId)
             // success response
                    Swal.fire({
                        title: 'Hapus Data Sukses!',
                        text: 'Data Wilayah telah dihapus!', 
                        icon: 'success',
                        showConfirmButton: true,
                        timer: 2500
                    });
                } else {
                    Swal.fire({
                        title: 'Hapus Data dibatalkan!',
                        text: 'Data Wilayah tidak dihapus!',
                        icon: 'error',
                        timer: 2500
                    });
                }
            });
        });
    })
</script>
@endpush