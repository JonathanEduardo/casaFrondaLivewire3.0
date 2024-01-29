<x-app-layout>

        @livewireStyles


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-xl sm:rounded-lg">
                    <livewire:catalogue.app-books/>
                </div>
            </div>
        </div>


        @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>


    <x-livewire-alert::flash />

    <x-livewire-alert::scripts />

    @stack('js')
</x-app-layout>

