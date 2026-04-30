<x-layouts::app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
        
        @if (($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono')))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "{{ $icono }}",
                title: "{{ $mensaje }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        @endif

        <!-- <flux:toast position="top right" />
        @if (session('mensaje'))
        <script>
            document.addEventListener('livewire:navigated', () => {
                Flux.toast({
                    heading: '{{ session("icono") === "success" ? "¡Éxito!" : "Aviso" }}',
                    text: '{{ session("mensaje") }}',
                    variant: '{{ session("icono") === "success" ? "success" : "danger" }}'
                });
            }, {
                once: true
            }); 
        </script>
        @endif -->



    </flux:main>
</x-layouts::app.sidebar>

