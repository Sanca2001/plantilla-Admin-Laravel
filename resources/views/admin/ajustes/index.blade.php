<x-layouts::app :title="__('Configuración')">
    <flux:heading size="xl" level="1">{{ __('Configuración') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Gestiona los ajustes y configuraciones de la aplicación.') }}</flux:subheading>
    <flux:separator variant="subtle" />


    <div class="">

        <!-- contenido -->
        <form action=" {{ route('admin.ajustes.store') }} " method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4 mt-4 ">
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

            <div class="grid grid-cols-2 gap-4 mt-4 ">
                <!-- direccion_empresa -->
                <flux:field>
                    <flux:label for="direccion_empresa"> Dirección </flux:label>
                    <flux:input name="direccion_empresa" id="direccion_empresa" type="text" placeholder="Calle Los Limos - Manaza 4" />
                    <flux:error name="direccion_empresa" />
                </flux:field>

                <!-- telefono_empresa -->
                <flux:field>
                    <flux:label for="telefono_empresa"> Telefono </flux:label>
                    <flux:input name="telefono_empresa" id="telefono_empresa" type="text" placeholder="999 888 111" />
                    <flux:error name="telefono_empresa" />
                </flux:field>

            </div>

            <div class="grid grid-cols-2 gap-4 mt-4 ">
                <!-- correo_empresa -->
                <flux:field>
                    <flux:label for="correo_empresa"> Correo </flux:label>
                    <flux:input name="correo_empresa" id="correo_empresa" type="text" placeholder="Correo de contactos" />
                    <flux:error name="correo_empresa" />
                </flux:field>

                <!-- divisa_empresa -->
                <flux:field>
                    <flux:label for="divisa_empresa"> Divisa </flux:label>
                    <flux:select id="divisa_empresa" name="divisa_empresa" placeholder="Seleccione una divisa...">
                        <flux:select.option>Photography</flux:select.option>
                        <flux:select.option>Design services</flux:select.option>
                        <flux:select.option>Web development</flux:select.option>
                        <flux:select.option>Accounting</flux:select.option>
                        <flux:select.option>Legal services</flux:select.option>
                        <flux:select.option>Consulting</flux:select.option>
                        <flux:select.option>Other</flux:select.option>
                    </flux:select>
                    <flux:error name="divisa_empresa" />
                </flux:field>

            </div>

            <div class="grid grid-cols-2 gap-4 mt-4 ">
                <!-- logo_empresa -->
                <flux:field>
                    <flux:label for="logo_empresa"> Logo Empresa</flux:label>
                    <flux:input id="logo_empresa" name="logo_empresa" type="file" />
                    <flux:error name="logo_empresa" />
                </flux:field>

                <!-- web_empresa -->
                <flux:field>
                    <flux:label for="web_empresa"> Sitio web </flux:label>
                    <flux:input name="web_empresa" id="web_empresa" type="text" placeholder="www.empresa.com" />
                    <flux:error name="web_empresa" />
                </flux:field>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4 ">
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









</x-layouts::app>