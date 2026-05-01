<x-layouts::app :title="__('Configuración')">

    <flux:heading size="xl" level="1">{{ __('Roles') }}</flux:heading>

    <div class="flex flex-row justify-between  items-center mb-2">
        <flux:subheading size="lg" class="">{{ __('Gestiona los roles y permisos de la aplicación.') }}</flux:subheading>
        <flux:modal.trigger name="edit-profile">
            <flux:button icon="plus" variant="primary" color="indigo" class="cursor-pointer" size="xs">AÑADIR</flux:button>

        </flux:modal.trigger>
    </div>










    <!-- MODAL PARA LA CREACION DEL ROL -->
    <flux:modal name="edit-profile" flyout :open="$errors->any()">
        <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <flux:heading size="lg">Añadir Nuevo Rol</flux:heading>
                <flux:text class="mt-2">Introduce los datos para crear un nuevo rol.</flux:text>
            </div>

            <flux:field>
                <flux:label>NOMBRE ROL</flux:label>
                <!-- old('name') permite que el texto no se borre si hay un error -->
                <flux:input name="name" id="name" value="{{ old('name') }}" placeholder="Ej: Administrador" required />
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label>TIPO ROL</flux:label>
                <flux:input name="guard_name" value="{{ old('guard_name', 'web') }}" required />
                <flux:error name="guard_name" />
            </flux:field>

            <div class="flex">
                <flux:spacer />
                <flux:button color="lime" class="cursor-pointer" type="submit" size="xs" variant="primary">GUARDAR ROL</flux:button>
            </div>
        </form>
    </flux:modal>








    <flux:separator variant="subtle" />

    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 mt-6">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-50 dark:bg-zinc-900 text-center">
                <tr>
                    <th
                        class="px-6 py-3 border-x border-b border-gray-200 dark:border-zinc-700 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Nro</th>
                    <th
                        class="px-6 py-3 border-x border-b border-gray-200 dark:border-zinc-700 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Rol</th>

                    <th
                        class="px-6 py-3 border-x border-b border-gray-200 dark:border-zinc-700 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Tipo</th>
                    <th
                        class="px-6 py-3 border-x border-b border-gray-200 dark:border-zinc-700 text-xs font-bold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-zinc-800">
                @foreach ($roles as $rol)
                <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition">
                    <td
                        class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-center">
                        {{ $loop->iteration }}
                    </td>
                    <td
                        class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $rol->name }}
                    </td>

                    <td
                        class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $rol->guard_name }}
                    </td>


                    <td class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-center">
                        <div class="flex justify-center gap-2">

                            <!-- Boton Show con disparador unico -->
                            <flux:modal.trigger name="show-rol-{{ $rol->id }}">
                                <flux:button class="cursor-pointer" variant="primary" icon="eye" color="yellow" size="xs"> VER </flux:button>
                            </flux:modal.trigger>

                            <flux:modal name="show-rol-{{ $rol->id }}" flyout class="text-left">
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg"> VER DETALLES </flux:heading>
                                        <flux:text class="mt-2"> Aca veras los detalles del rol. </flux:text>
                                    </div>
                                    <flux:input value="{{ $rol->name }}" label="Nombre Rol" readonly />
                                    <flux:input value="{{ $rol->guard_name }}" label="Tipo Rol" readonly />
                                    <flux:input value="{{ $rol->created_at->format('d-m-Y H:i:s') }}" label="Fecha de Registro" readonly />
                                    <flux:input value="{{ $rol->updated_at->format('d-m-Y H:i:s') }}" label="Última Actualización" readonly />



                                </div>
                            </flux:modal>





                            <!-- Botón Editar con disparador único -->
                            <flux:modal.trigger name="edit-rol-{{ $rol->id }}">
                                <flux:button class="cursor-pointer" variant="primary" icon="pencil-square" color="sky" size="xs"> EDITAR </flux:button>
                            </flux:modal.trigger>

                            <!-- MODAL DE EDICIÓN (Uno por cada rol) -->
                            <flux:modal name="edit-rol-{{ $rol->id }}" flyout class="text-left">
                                <form action="{{ route('admin.roles.update', $rol->id) }}" method="POST" class="space-y-6">
                                    @csrf
                                    @method('PATCH') {{-- Importante para actualizar --}}

                                    <div>
                                        <flux:heading size="lg">Editar Rol: {{ $rol->name }}</flux:heading>
                                        <flux:text class="mt-2">Modifica los detalles del rol a continuación.</flux:text>
                                    </div>

                                    <flux:input name="name" label="NOMBRE ROL" value="{{ $rol->name }}" required />
                                    <flux:input name="guard_name" label="TIPO ROL" value="{{ $rol->guard_name }}" required />

                                    <div class="flex">
                                        <flux:spacer />
                                        <flux:button color="lime" class="cursor-pointer" type="submit" size="xs" variant="primary">ACTUALIZAR DATOS</flux:button>
                                    </div>
                                </form>
                            </flux:modal>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('admin.roles.destroy', $rol->id) }}" method="POST" id="delete-form-{{ $rol->id }}">
                                @csrf
                                @method('DELETE')
                                <flux:button
                                    type="button"
                                    onclick="confirmDelete({{ $rol->id }})"
                                    class="cursor-pointer"
                                    variant="primary"
                                    icon="trash"
                                    color="rose"
                                    size="xs">
                                    ELIMINAR
                                </flux:button>
                            </form>








                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
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