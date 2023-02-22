<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    <body>
                        <div class="text-xs">
                       <strong>1</strong>.Clique no botão <strong>COPIAR</strong> para copiar o código.<br/>
                       <strong>2</strong>.Vá até o aplicativo do banco e cole na opção do PIX "copiar e colar código".<br/>
                       <strong>3</strong>.Confira o valor e efetue o pagamento.<br/><br/>
                       Se preferir scaneie o QrCode abaixo utilizando a opção "Ler QrCode" no aplicativo do seu banco.
                        </div><br/>
                   {!! QrCode::size(300)->generate($token) !!}<br/> 

                    <div class="text-xl font-black flex justify-center justify-items-center flex items-center">
                        <strong>R$ {{$valor}}</strong></div><br/>
                    
                    <div id="textToCopy" class="text-sm flex items-center" id="target-to-copy">
                        {{$token}}</div><br/>

                    <div class="flex justify-center justify-items-center flex items-center">
                      <x-new-button class="text-lg bg-red-600" id="copyButton" >
                        COPIAR CÓDIGO
                      </x-new-button>
                    <br/><br/><br/>
                    </div>
                    <div class="text-xs flex justify-center justify-items-center flex items-center">
                      Essa chave se expira em: </p> 
                    </div>
                    <div id="countdown" class="text-xl font-bold flex justify-center justify-items-center items-center">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    document.getElementById("copyButton").addEventListener("click", function() {
      var textToCopy = document.getElementById("textToCopy").innerText;
      var copyButton = document.getElementById("copyButton");
      navigator.clipboard.writeText(textToCopy).then(function() {
        copyButton.innerText = "Copiado";
        copyButton.classList.add("bg-class-200");
        copyButton.disabled = true;s
      }, function(err) {
        alert("Erro ao copiar texto: " + err);
      });
    });
    </script>
   <script>
    let hours = {{$horas}};
    let minutes = {{$minutos}};
    let seconds = {{$segundos}};
  
    setInterval(function() {
      if (seconds === 0) {
        if (minutes === 0) {
          if (hours === 0) {
            clearInterval();
            document.getElementById("countdown").innerHTML = "Tempo Esgotado!";
            setTimeout(function() {
              location.reload();
              }, 1);
            return;
          }
          hours--;
          minutes = 59;
        }
        minutes--;
        seconds = 59;
      }
      seconds--;
      document.getElementById("countdown").innerHTML = hours + " hrs " + minutes + " min " + seconds + " seg";
    }, 1000);
  </script>

<script>
    setTimeout(function() {
      location.reload();
    }, 900000); // Atualiza a página a cada 60 segundos (60000 milissegundos)
  </script>
   