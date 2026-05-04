<x-layouts::app :title="__('Usuarios')">

    <flux:heading size="xl" level="1">{{ __('Usuarios') }}</flux:heading>

    <div class="flex flex-row justify-between  items-center mb-2">
        <flux:subheading size="lg" class="">{{ __('Gestiona los usuarios y sus permisos de la aplicación.') }}
        </flux:subheading>

        <a href="{{ route('admin.users.create') }}">
            <flux:button icon="plus" class="cursor-pointer" variant="primary" color="indigo" size="xs">
                NUEVO USUARIO
            </flux:button>
        </a>

    </div>


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
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700/50 transition">
                        <td
                            class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td
                            class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                            {{ $user->name }}
                        </td>

                        <td
                            class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                            {{ $user->email }}
                        </td>


                        <td class="px-3 py-2 border border-gray-200 dark:border-zinc-700 whitespace-nowrap text-center">
                            <div class="flex justify-center gap-2">

                                <!-- Boton Show con disparador unico -->
                                <flux:modal.trigger name="show-user-{{ $user->id }}">
                                    <flux:button class="cursor-pointer" variant="primary" icon="eye" color="yellow"
                                        size="xs"> VER </flux:button>
                                </flux:modal.trigger>

                                <!-- MODAL PARA VER DETALLES DEL USUARIO -->
                                <flux:modal name="show-user-{{ $user->id }}" flyout class="text-left  w-[750px]   ">

                                    <div class="mb-2">
                                        <div class="flex items-center gap-2 sm:gap-4">
                                            <!-- <flux:avatar circle size="lg" class="max-sm:size-8" src="https://unavatar.io/github/calebporzio" /> -->
                                            <flux:avatar name="{{$user->nombres}}" />

                                            <div class="flex flex-col">
                                                <flux:heading> {{$user->nombres}}
                                                    <flux:badge size="sm" color="blue" class="ml-1 max-sm:hidden"> SUPER
                                                        ADMINISTRADOR </flux:badge>
                                                </flux:heading>
                                                <flux:text class="max-sm:hidden">{{$user->email}}</flux:text>
                                            </div>
                                        </div>
                                    </div>


                                    <div x-data="{ tab: 'tab1' }" class="w-full max-w-3xl mx-auto">



                                        <!-- Botones -->
                                        <div class="flex border-b border-gray-200">
                                            <button @click="tab = 'tab1'"
                                                :class="tab === 'tab1' ? 'border-blue-500 text-blue-600' : 'text-gray-500'"
                                                class="px-4 py-2 font-medium border-b-2 transition">
                                                DETALLES
                                            </button>

                                            <button @click="tab = 'tab2'"
                                                :class="tab === 'tab2' ? 'border-blue-500 text-blue-600' : 'text-gray-500'"
                                                class="px-4 py-2 font-medium border-b-2 transition">
                                                -----
                                            </button>

                                            <button @click="tab = 'tab3'"
                                                :class="tab === 'tab3' ? 'border-blue-500 text-blue-600' : 'text-gray-500'"
                                                class="px-4 py-2 font-medium border-b-2 transition">
                                                -----
                                            </button>
                                        </div>

                                        <!-- Contenido -->
                                        <div class="mt-4">

                                            <!-- TAB 1 -->
                                            <div x-show="tab === 'tab1'" x-transition>

                                                <div
                                                    class="flex p-4 justify-between items-center rounded-tl-xl rounded-tr-xl  border">
                                                    <p class="font-bold">Informacion Basica</p>
                                                    <flux:button variant="primary" class="cursor-pointer" size="xs"
                                                        color="orange" icon="pencil"> Editar Usuario </flux:button>
                                                </div>

                                                <div
                                                    class="p-4 grid grid-cols-2 gap-4 rounded-bl-xl rounded-br-xl border border-t-0">
                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Nombres y Apellidos </label>
                                                        <input disabled class="p-1" type="text"
                                                            value="{{ $user->nombres }} {{ $user->apellidos }}">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Correo Electronico </label>
                                                        <input disabled class="p-1" type="text" value="{{ $user->email }}">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Tipo Documento </label>
                                                        <input disabled class="p-1" type="text"
                                                            value="{{ $user->tipo_documento }}">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Numero Documento </label>
                                                        <input disabled class="p-1" type="text"
                                                            value="{{ $user->numero_documento }}">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Celular </label>
                                                        <input disabled class="p-1" type="text"
                                                            value="{{ $user->celular }}">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Direccion </label>
                                                        <input disabled class="p-1" type="text"
                                                            value="{{ $user->direccion }}">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Fecha Nacimiento </label>
                                                        <input disabled class="p-1" type="date"
                                                            value="{{ $user->fecha_nacimiento }}">
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="block" for=""> Genero </label>
                                                        <input disabled class="p-1" type="text" value="{{ $user->genero }}">
                                                    </div>






                                                </div>

                                            </div>

                                            <!-- TAB 2 -->
                                            <div x-show="tab === 'tab2'" x-transition>
                                                <h2 class="text-lg font-semibold mb-2">Seguridad</h2>
                                                <p class="text-gray-600">Configuraciones de seguridad del usuario.</p>
                                            </div>

                                            <!-- TAB 3 -->
                                            <div x-show="tab === 'tab3'" x-transition>
                                                <h2 class="text-lg font-semibold mb-2">Preferencias</h2>
                                                <p class="text-gray-600">Opciones personalizadas del sistema.</p>
                                            </div>

                                        </div>
                                    </div>



                                </flux:modal>

                                <!-- Botón Editar con disparador único -->
                                <flux:modal.trigger name="edit-rol-{{ $user->id }}">
                                    <flux:button class="cursor-pointer" variant="primary" icon="pencil-square" color="sky"
                                        size="xs"> EDITAR </flux:button>
                                </flux:modal.trigger>

                                <!-- MODAL DE EDICIÓN (Uno por cada rol) -->
                                <flux:modal name="edit-rol-{{ $user->id }}" flyout class="text-left">
                                    <form action="{{ route('admin.roles.update', $user->id) }}" method="POST"
                                        class="space-y-6">
                                        @csrf
                                        @method('PATCH') {{-- Importante para actualizar --}}

                                        <div>
                                            <flux:heading size="lg">Editar Rol: {{ $user->name }}</flux:heading>
                                            <flux:text class="mt-2">Modifica los detalles del rol a continuación.
                                            </flux:text>
                                        </div>

                                        <flux:input name="name" label="NOMBRE ROL" value="{{ $user->name }}" required />
                                        <flux:input name="guard_name" label="TIPO ROL" value="{{ $user->gmail }}"
                                            required />

                                        <div class="flex">
                                            <flux:spacer />
                                            <flux:button color="lime" class="cursor-pointer" type="submit" size="xs"
                                                variant="primary">ACTUALIZAR DATOS</flux:button>
                                        </div>
                                    </form>
                                </flux:modal>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('admin.roles.destroy', $user->id) }}" method="POST"
                                    id="delete-form-{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="button" onclick="confirmDelete({{ $user->id }})"
                                        class="cursor-pointer" variant="primary" icon="trash" color="rose" size="xs">
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