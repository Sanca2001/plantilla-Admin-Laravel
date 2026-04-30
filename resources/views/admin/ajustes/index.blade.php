<x-layouts::app :title="__('Configuración')">
    <flux:heading size="xl" level="1">{{ __('Configuración') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Gestiona los ajustes y configuraciones de la aplicación.') }}</flux:subheading>
    <flux:separator variant="subtle" />


    <div class="">

        <!-- contenido -->
        <form action=" {{ route('admin.ajustes.store') }} " method="POST">
            @csrf

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- nombre empresa -->
                <flux:field>
                    <flux:label for="nombre_empresa"> Nombre de la empresa <span class="text-red-500 ml-2"> (*)</span> </flux:label>
                    <flux:input name="nombre_empresa" id="nombre_empresa" type="text" placeholder="Ingrese el nombre de la empresa" />

                    <flux:error name="nombre_empresa" />
                </flux:field>

                <!-- descripcion_empresa -->
                <flux:field>
                    <flux:label for="descripcion_empresa"> Descripcion </flux:label>
                    <flux:input name="descripcion_empresa" id="descripcion_empresa" type="text" placeholder="Breve reseña de la empresa" />
                    <flux:error name="descripcion_empresa" />
                </flux:field>

            </div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- direccion_empresa -->
                <flux:field>
                    <flux:label for="direccion_empresa"> Dirección <span class="text-red-500 ml-2"> (*)</span> </flux:label>
                    <flux:input name="direccion_empresa" id="direccion_empresa" type="text" placeholder="Calle Los Limos - Manaza 4" />
                    <flux:error name="direccion_empresa" />
                </flux:field>

                <!-- telefono_empresa -->
                <flux:field>
                    <flux:label for="telefono_empresa"> Telefono <span class="text-red-500 ml-2"> (*)</span></flux:label>
                    <flux:input name="telefono_empresa" id="telefono_empresa" type="text" placeholder="999 888 111" />
                    <flux:error name="telefono_empresa" />
                </flux:field>

            </div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- correo_empresa -->
                <flux:field>
                    <flux:label for="correo_empresa"> Correo <span class="text-red-500 ml-2"> (*)</span> </flux:label>
                    <flux:input name="correo_empresa" id="correo_empresa" type="text" placeholder="Correo de contactos" />
                    <flux:error name="correo_empresa" />
                </flux:field>

                <!-- divisa_empresa -->
                <flux:field>
                    <flux:label for="divisa_empresa"> Divisa <span class="text-red-500 ml-2"> (*)</span> </flux:label>
                    <flux:select id="divisa_empresa" name="divisa_empresa" placeholder="Seleccione una divisa...">
                        <flux:select.option value="SOL"> SOL</flux:select.option>
                        <flux:select.option value="DOLAR"> DOLAR </flux:select.option>
                    </flux:select>
                    <flux:error name="divisa_empresa" />
                </flux:field>

            </div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- logo_empresa -->
                <flux:field>
                    <flux:label for="logo_empresa">Logo Empresa</flux:label>

                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center cursor-pointer hover:border-lime-500 transition"
                        onclick="document.getElementById('logo_empresa').click()">

                        <img id="preview_logo" class="mx-auto mb-3 h-20 hidden" />

                        <p class="text-gray-500">Haz clic para subir el logo</p>
                        <p class="text-sm text-gray-400">PNG, JPG (max 2MB)</p>

                        <input id="logo_empresa" name="logo_empresa" type="file" class="hidden" onchange="previewImage(event)" />
                    </div>

                    <flux:error name="logo_empresa" />
                </flux:field>


                <!-- web_empresa -->
                <flux:field>
                    <flux:label for="web_empresa"> Sitio web </flux:label>
                    <flux:input name="web_empresa" id="web_empresa" type="text" placeholder="www.empresa.com" />
                    <flux:error name="web_empresa" />
                </flux:field>
            </div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- interes -->
                <flux:field>
                    <flux:label for="interes"> Tasa de interes mensual (%) </flux:label>
                    <flux:input name="interes" id="interes" type="number" placeholder="10.00" />
                    <flux:error name="interes" />
                </flux:field>

                <!-- mora -->
                <flux:field>
                    <flux:label for="mora"> Tasa de mora (%) </flux:label>
                    <flux:input name="mora" id="mora" type="number" placeholder="2.00" />
                    <flux:error name="mora" />
                </flux:field>




            </div>


            <!-- footer -->
            <div class="mt-4 text-left flex gap-2">
                <flux:button class="cursor-pointer" icon="arrow-down-on-square" type="submit" variant="primary" color="lime">Guardar</flux:button>
                <flux:button class="cursor-pointer" icon="x-mark" type="reset" variant="danger" color="red">Cancelar</flux:button>
            </div>

        </form>


    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview_logo');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>









</x-layouts::app>