<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    <body>
                      Informações:
                       <div class="">
                   {!! QrCode::size(300)->generate($token) !!}<br/>
                        </div>
                    <div class="">
                        <strong>Valor: R$ {{$valor}}</strong>
                      </div><br/>
                      <div class="">
                        <strong>data criação: {{$create}}</strong>
                      </div><br/>
                      <div class="">
                        <strong>Hora de criação: {{$hora}}</strong>
                      </div><br/>
                      <div class="">
                        <strong>Duração: {{$duration}}</strong>
                      </div><br/>

                      <div class="">
                        <strong>Criado por: {{$User}}</strong>
                      </div><br/>
                    
                    <div id="textToCopy" class="text-sm" id="target-to-copy">
                      <strong>Chave:</strong> {{$token}}</div>
                    </div>

    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

   