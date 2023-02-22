<x-guest-layout>
    <div class="py-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900 dark:text-gray-100"> 
                    <body>
                        <div class="">
                            <h1 class= "text-lg" ><strong>Tempo Esgotado!!!</strong></h1>
                            <p class="text-sm">O tempo de duração dessa chave se expirou... Solicite uma nova chave para realizar o pagamento.</p>
                        </div>

                        <svg viewBox="0 0 1200 1200">
                            <image xlink:href="images/timeout.jpg" x="0" y="0" height="1200" width="1200"/>
                        </svg>

                        <div class="flex justify-center justify-items-center flex items-center">
                            <x-new-button class="text-sm bg-red-600" id="copyButton" >
                            Solicitar Agora!
                            </x-new-button>
                        </div>

                    </body>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
