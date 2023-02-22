<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <body>
                        <div>
                            <h1>Listagem dos links gerados:</h1>
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                      <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                          <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Código:
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                              Nome:
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                              Chave:
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                              Loja:
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                               Valor:
                                              </th>
                                              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Duração:
                                              </th>
                                             
                                          </tr>
                                        </thead>
                                        @foreach ($Generate as $item)
                                        <tbody>
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$item->CodCli}}</td>
                                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$item->nome}}
                                              </td>
                                              <td class="text-xs text-gray-900 font-light px-1 py-4 whitespace-nowrap">
                                                {{$item->chave}}
                                              </td>
                                              <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                                {{$item->loja}}
                                              </td>
                                              <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                                {{$item->valor}}
                                              </td>
                                              <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                                {{$item->duration}}
                                              </td>
                                              <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap">
                                              
                                                 
                                                <x-primary-button class="ml-5">
                                                  <a href="{{route('generator.lerlink',['id' =>$item['id']])}}">
                                                    {{ __('Ver') }}
                                                  </a>
                                                
                                                </x-primary-button>
                                              
                                              </td>
                                              
                                            </tr>
                                        </tbody>
                                        @endforeach
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>