<x-layouts::app :title="__('Configuración')">
    <flux:heading size="xl" level="1">{{ __('Configuración') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Gestiona los ajustes y configuraciones de la aplicación.') }}
    </flux:subheading>
    <flux:separator variant="subtle" />







    <div class="">

        <!-- contenido -->
        <form action=" {{ route('admin.ajustes.store') }} " method="POST" enctype="multipart/form-data">
            @csrf

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- nombre empresa -->
                <flux:field>
                    <flux:label for="nombre_empresa"> Nombre de la empresa <span class="text-red-500 ml-2"> (*)</span>
                    </flux:label>
                    <flux:input name="nombre_empresa" id="nombre_empresa" type="text"
                        value="{{ $ajustes->nombre_empresa ?? '' }}" placeholder="Ingrese el nombre de la empresa" />

                    <flux:error name="nombre_empresa" />
                </flux:field>

                <!-- descripcion_empresa -->
                <flux:field>
                    <flux:label for="descripcion_empresa"> Descripcion </flux:label>
                    <flux:input name="descripcion_empresa" id="descripcion_empresa" type="text"
                        value="{{ $ajustes->descripcion_empresa ?? '' }}" placeholder="Breve reseña de la empresa" />
                    <flux:error name="descripcion_empresa" />
                </flux:field>

            </div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- direccion_empresa -->
                <flux:field>
                    <flux:label for="direccion_empresa"> Dirección <span class="text-red-500 ml-2"> (*)</span>
                    </flux:label>
                    <flux:input name="direccion_empresa" id="direccion_empresa" type="text"
                        value="{{ $ajustes->direccion_empresa ?? '' }}" placeholder="Calle Los Limos - Manaza 4" />
                    <flux:error name="direccion_empresa" />
                </flux:field>

                <!-- telefono_empresa -->
                <!-- <flux:field>
                    <flux:label for="telefono_empresa"> Telefono <span class="text-red-500 ml-2"> (*)</span></flux:label>
                    <flux:input name="telefono_empresa" id="telefono_empresa" type="number" value="{{ $ajustes->telefono_empresa ?? '' }}" placeholder="999 888 111" />
                    <flux:error name="telefono_empresa" />
                </flux:field> -->

                <!-- ───────── INICIO DEL COMPONENTE ───────── -->
                <div class="relative" id="phoneField">

                    <!-- Label -->
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Teléfono
                    </label>

                    <!-- Input row -->
                    <div
                        class="flex rounded-lg border border-gray-300 overflow-visible focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 bg-white transition">

                        <!-- Country selector button -->
                        <button type="button" id="phoneCountryBtn" onclick="phoneToggleDropdown()"
                            class="flex items-center gap-2 px-3 bg-gray-50 border-r border-gray-300 rounded-l-lg hover:bg-gray-100 transition min-w-[105px] h-10 focus:outline-none"
                            aria-haspopup="listbox" aria-expanded="false">
                            <span id="phoneFlagDisplay"
                                class="fi fi-pe w-6 h-4 rounded-sm shadow-[0_0_0_1px_rgba(0,0,0,0.1)] flex-shrink-0"></span>
                            <span id="phoneCodeDisplay" class="text-sm font-semibold text-gray-800">+51</span>
                            <svg id="phoneChevron"
                                class="w-3 h-3 text-gray-400 ml-auto transition-transform duration-200"
                                viewBox="0 0 10 6" fill="none">
                                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>

                        <!-- Phone number input -->
                        <input type="tel" value="{{ $ajustes->telefono_empresa ?? '' }}" id="telefono_empresa"
                            name="telefono_empresa" placeholder="948 749 893" autocomplete="tel" oninput="phoneFormat()"
                            class="flex-1 px-3 text-sm text-gray-800 bg-transparent border-none outline-none placeholder-gray-400 h-10 tracking-wide" />
                    </div>

                    <!-- Dropdown -->
                    <div id="phoneDropdown"
                        class="absolute left-0 top-[calc(100%+6px)] z-50 hidden flex-col bg-white border border-gray-200 rounded-xl shadow-xl w-72 max-h-80 overflow-hidden">
                        <!-- Search -->
                        <div class="p-2 border-b border-gray-100">
                            <input type="text" id="phoneSearch" placeholder="Buscar país o código..."
                                oninput="phoneFilter()"
                                class="w-full text-sm px-3 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <!-- List -->
                        <ul id="phoneCountryList" class="overflow-y-auto flex-1" role="listbox"></ul>
                    </div>

                    <!-- Hidden input with full value (útil para forms) -->
                    <input type="hidden" id="phoneFullValue" name="phone_full" />

                </div>
                <!-- ───────── FIN DEL COMPONENTE ───────── -->













            </div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- correo_empresa -->
                <flux:field>
                    <flux:label for="correo_empresa"> Correo <span class="text-red-500 ml-2"> (*)</span> </flux:label>
                    <flux:input name="correo_empresa" id="correo_empresa" type="email"
                        value="{{ $ajustes->correo_empresa ?? '' }}" placeholder="[EMAIL_ADDRESS]" />
                    <flux:error name="correo_empresa" />
                </flux:field>

                <!-- divisa_empresa -->
                <flux:field>
                    <flux:label for="divisa_empresa"> Divisa <span class="text-red-500 ml-2"> (*)</span> </flux:label>
                    <flux:select id="divisa_empresa" name="divisa_empresa" placeholder="Seleccione una divisa...">
                        @foreach ($divisas as $divisa)
                            <flux:select.option 
                                value="{{ $divisa['symbol'] }}"
                                :selected="$ajustes->divisa_empresa ?? '' == $divisa['symbol']">{{ $divisa['name'] }}
                            </flux:select.option>

                            
                          

                        @endforeach
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

                        <img id="preview_logo"
                            class="mx-auto mb-3 h-20 {{ isset($ajustes->logo_empresa) ? '' : 'hidden' }}"
                            src="{{ isset($ajustes->logo_empresa) ? asset('storage/' . $ajustes->logo_empresa) : '' }}" />

                        <p class="text-gray-500">
                            {{ isset($ajustes->logo_empresa) ? 'Cambiar logo' : 'Haz clic para subir el logo' }}
                        </p>

                        <p class="text-sm text-gray-400">PNG, JPG (max 2MB)</p>

                        <input id="logo_empresa" name="logo_empresa" type="file" class="hidden"
                            onchange="previewImage(event)" />
                    </div>

                    <flux:error name="logo_empresa" />
                </flux:field>


                <!-- web_empresa -->
                <flux:field>
                    <flux:label for="web_empresa"> Sitio web </flux:label>
                    <flux:input name="web_empresa" id="web_empresa" value="{{ $ajustes->web_empresa ?? '' }}"
                        type="text" placeholder="www.empresa.com" />
                    <flux:error name="web_empresa" />
                </flux:field>
            </div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 ">
                <!-- interes -->
                <flux:field>
                    <flux:label for="interes"> Tasa de interes mensual (%) </flux:label>
                    <flux:input name="interes" id="interes" value="{{ $ajustes->interes ?? '' }}" type="number"
                        placeholder="10.00" />
                    <flux:error name="interes" />
                </flux:field>

                <!-- mora -->
                <flux:field>
                    <flux:label for="mora"> Tasa de mora (%) </flux:label>
                    <flux:input name="mora" id="mora" value="{{ $ajustes->mora ?? '' }}" type="number"
                        placeholder="2.00" />
                    <flux:error name="mora" />
                </flux:field>




            </div>


            <!-- footer -->
            <div class="mt-4 text-left flex gap-2">
                <flux:button class="cursor-pointer" icon="arrow-down-on-square" type="submit" variant="primary"
                    color="lime">Guardar</flux:button>
                <flux:button class="cursor-pointer" icon="x-mark" type="reset" variant="danger" color="red">Cancelar
                </flux:button>
            </div>

        </form>


    </div>

    <!-- fucion para ver el preview del logo -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview_logo');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        (function () {
            const COUNTRIES = [{
                name: "Argentina",
                iso: "ar",
                code: "+54",
                pattern: "## ####-####",
                placeholder: "11 5555-5555",
                digits: 10
            },
            {
                name: "Bolivia",
                iso: "bo",
                code: "+591",
                pattern: "# ###-####",
                placeholder: "7 123-4567",
                digits: 8
            },
            {
                name: "Brasil",
                iso: "br",
                code: "+55",
                pattern: "(##) #####-####",
                placeholder: "(11) 91234-5678",
                digits: 11
            },
            {
                name: "Chile",
                iso: "cl",
                code: "+56",
                pattern: "# #### ####",
                placeholder: "2 2123 4567",
                digits: 9
            },
            {
                name: "Colombia",
                iso: "co",
                code: "+57",
                pattern: "### ###-####",
                placeholder: "300 123-4567",
                digits: 10
            },
            {
                name: "Costa Rica",
                iso: "cr",
                code: "+506",
                pattern: "####-####",
                placeholder: "8888-9999",
                digits: 8
            },
            {
                name: "Cuba",
                iso: "cu",
                code: "+53",
                pattern: "# ###-####",
                placeholder: "5 123-4567",
                digits: 8
            },
            {
                name: "Ecuador",
                iso: "ec",
                code: "+593",
                pattern: "## ###-####",
                placeholder: "99 123-4567",
                digits: 9
            },
            {
                name: "El Salvador",
                iso: "sv",
                code: "+503",
                pattern: "####-####",
                placeholder: "7888-9999",
                digits: 8
            },
            {
                name: "España",
                iso: "es",
                code: "+34",
                pattern: "### ## ## ##",
                placeholder: "612 34 56 78",
                digits: 9
            },
            {
                name: "Estados Unidos",
                iso: "us",
                code: "+1",
                pattern: "(###) ###-####",
                placeholder: "(555) 123-4567",
                digits: 10
            },
            {
                name: "Guatemala",
                iso: "gt",
                code: "+502",
                pattern: "####-####",
                placeholder: "5555-1234",
                digits: 8
            },
            {
                name: "Honduras",
                iso: "hn",
                code: "+504",
                pattern: "####-####",
                placeholder: "9999-1234",
                digits: 8
            },
            {
                name: "México",
                iso: "mx",
                code: "+52",
                pattern: "## #### ####",
                placeholder: "55 1234 5678",
                digits: 10
            },
            {
                name: "Nicaragua",
                iso: "ni",
                code: "+505",
                pattern: "####-####",
                placeholder: "8888-1234",
                digits: 8
            },
            {
                name: "Panamá",
                iso: "pa",
                code: "+507",
                pattern: "####-####",
                placeholder: "6666-1234",
                digits: 8
            },
            {
                name: "Paraguay",
                iso: "py",
                code: "+595",
                pattern: "### ###-###",
                placeholder: "981 123-456",
                digits: 9
            },
            {
                name: "Perú",
                iso: "pe",
                code: "+51",
                pattern: "### ### ###",
                placeholder: "948 749 893",
                digits: 9
            },
            {
                name: "Puerto Rico",
                iso: "pr",
                code: "+1787",
                pattern: "(###) ###-####",
                placeholder: "(787) 123-4567",
                digits: 10
            },
            {
                name: "Rep. Dominicana",
                iso: "do",
                code: "+1809",
                pattern: "(###) ###-####",
                placeholder: "(809) 123-4567",
                digits: 10
            },
            {
                name: "Uruguay",
                iso: "uy",
                code: "+598",
                pattern: "## ###-####",
                placeholder: "98 123-4567",
                digits: 8
            },
            {
                name: "Venezuela",
                iso: "ve",
                code: "+58",
                pattern: "### ###-####",
                placeholder: "412 123-4567",
                digits: 10
            },
            ];

            let selected = COUNTRIES.find(c => c.iso === "pe");

            function applyPattern(digits, pattern) {
                let result = "",
                    di = 0;
                for (let i = 0; i < pattern.length && di < digits.length; i++) {
                    result += pattern[i] === "#" ? digits[di++] : pattern[i];
                }
                return result;
            }

            function renderList(list) {
                document.getElementById("phoneCountryList").innerHTML = list.map(c => `
      <li
        onclick="phoneSelect('${c.iso}')"
        role="option"
        aria-selected="${c.iso === selected.iso}"
        class="flex items-center gap-2.5 px-3 py-2.5 cursor-pointer text-sm text-gray-700 hover:bg-gray-50 ${c.iso === selected.iso ? 'bg-blue-50 text-blue-700' : ''}"
      >
        <span class="fi fi-${c.iso} flex-shrink-0 rounded-sm shadow-[0_0_0_1px_rgba(0,0,0,0.08)]" style="width:22px;height:15px;display:inline-block"></span>
        <span class="flex-1">${c.name}</span>
        <span class="text-xs font-medium ${c.iso === selected.iso ? 'text-blue-500' : 'text-gray-400'}">${c.code}</span>
      </li>`).join("");
            }

            window.phoneFilter = function () {
                const q = document.getElementById("phoneSearch").value.toLowerCase();
                renderList(COUNTRIES.filter(c => c.name.toLowerCase().includes(q) || c.code.includes(q)));
            };

            window.phoneSelect = function (iso) {
                selected = COUNTRIES.find(c => c.iso === iso);
                document.getElementById("phoneFlagDisplay").className = `fi fi-${iso} flex-shrink-0 rounded-sm shadow-[0_0_0_1px_rgba(0,0,0,0.1)]`;
                document.getElementById("phoneFlagDisplay").style.cssText = "width:24px;height:16px;display:inline-block";
                document.getElementById("phoneCodeDisplay").textContent = selected.code;
                document.getElementById("telefono_empresa").placeholder = selected.placeholder;
                document.getElementById("telefono_empresa").value = "";
                document.getElementById("phoneSearch").value = "";
                phoneCloseDropdown();
                renderList(COUNTRIES);
                phoneFormat();
                document.getElementById("telefono_empresa").focus();
            };

            window.phoneToggleDropdown = function () {
                const dd = document.getElementById("phoneDropdown");
                const isOpen = dd.classList.contains("flex");
                isOpen ? phoneCloseDropdown() : phoneOpenDropdown();
            };

            window.phoneOpenDropdown = function () {
                const dd = document.getElementById("phoneDropdown");
                dd.classList.remove("hidden");
                dd.classList.add("flex");
                document.getElementById("phoneChevron").style.transform = "rotate(180deg)";
                document.getElementById("phoneCountryBtn").setAttribute("aria-expanded", "true");
                setTimeout(() => document.getElementById("phoneSearch").focus(), 50);
            };

            window.phoneCloseDropdown = function () {
                const dd = document.getElementById("phoneDropdown");
                dd.classList.add("hidden");
                dd.classList.remove("flex");
                document.getElementById("phoneChevron").style.transform = "rotate(0deg)";
                document.getElementById("phoneCountryBtn").setAttribute("aria-expanded", "false");
            };

            window.phoneFormat = function () {
                const raw = document.getElementById("telefono_empresa").value.replace(/\D/g, "");
                const formatted = applyPattern(raw, selected.pattern);
                document.getElementById("telefono_empresa").value = formatted;
                document.getElementById("phoneFullValue").value = raw.length > 0 ? `${selected.code}${raw}` : "";
            };

            // Close on outside click
            document.addEventListener("click", function (e) {
                if (!document.getElementById("phoneField").contains(e.target)) phoneCloseDropdown();
            });

            // Close on Escape
            document.addEventListener("keydown", function (e) {
                if (e.key === "Escape") phoneCloseDropdown();
            });

            // Init
            renderList(COUNTRIES);
        })();
    </script>






















</x-layouts::app>