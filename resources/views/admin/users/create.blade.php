<x-layouts::app :title="__('Usuarios')">

    <flux:heading size="xl" level="1">{{ __('Usuarios') }}</flux:heading>

    <div class="flex flex-row justify-between  items-center mb-2">
        <flux:subheading size="lg" class="">{{ __('Agrega un nuevo usuario') }}
        </flux:subheading>

    </div>


    <flux:separator variant="subtle" />

    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-zinc-700 bg-white dark:bg-zinc-800">
   
    </div>

    <!-- paginacion -->
    <div class="py-4 flex justify-center">

    </div>



    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#18181b', // Color oscuro estilo Flux
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>






</x-layouts::app>