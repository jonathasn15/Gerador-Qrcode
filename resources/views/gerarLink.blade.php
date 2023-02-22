<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerador QrCode') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action='QrGenerator' class="p-6">
                        @csrf
                        <label for="name">Nome do Cliente:</label><br/>
                        <input type="text" name="nomeCli" id="nomeCli" required><br/>
                        <label for="codCli">Código:</label><br/>
                        <input type="text" name="codCli" id="codCli" required><br/>
                        <label for="valor">Valor:</label><br/>
                        <input type="number" name="valor" id="valor" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required><br/>
                        <label for="Codigo">Código QrCode:</label><br/>
                        <input type="text" name="token" id="token" required><br/>
                        <label for="loja">Loja:</label><br/>
                        <input type="text" name="loja" id="loja" required><br/>
                        <label for="duration">Duração:</label><br/>
                        <input type="time" id="duration" name="duration" required><br/><br/>
                        
                        <x-primary-button type="submit" class="ml-5">
                            {{ __('Gerar') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
