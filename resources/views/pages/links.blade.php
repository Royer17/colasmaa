@extends('layouts.app')

@section('content')

<section id="vision">
    <div class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white">
        <h1 class="text-sm md:text-3xl uppercase">{{ $document['title'] }}</h1>
    </div>
    <div class="bg-[#E9E9E9] py-6 md:py-10">
        <div class="container mx-auto flex flex-col md:flex-row gap-6 px-3 md:px-20">
            <div class="flex-1 bg-white shadow-md rounded-2xl p-4 md:p-6">
                <div>
                 
                    @if(isset($document['external_image']))
                        <img class="w-full mb-5 max-h-[40rem] object-cover rounded-xl" src="{{ $document['external_image'] }}" alt="External image">
                    @endif
                    <div class="flex flex-col gap-4">
                        <div>
                            <h2 class="text-xl font-bold mb-4">{{ $document['title'] }}</h2>
                            <p class="text-sm md:text-base">
                                {!! $document['description'] !!}
                            </p>
                           
                        </div>
                        @if(count($files))
                            <div>
                                <h2 class="text-xl font-bold mb-4">Archivos relacionados</h2>
                                <div class="overflow-x-auto">

                                  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
                                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


                                  <div class="overflow-x-auto">
                                      <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                                          <thead class="bg-gray-800 text-white">
                                              <tr>
                                                  <th class="py-3 px-4 text-left">#</th>
                                                  <th class="py-3 px-4 text-left">Archivo</th>
                                                  <th class="py-3 px-4 text-left">Titulo</th>
                                                  
                                              </tr>
                                          </thead>
                                          <tbody class="text-gray-700">
                                              @foreach($files as $key => $file)
                                              <tr>
                                                  <td>
                                                    {{ $key + 1 }}
                                                  </td>
                                                  <td class="border-t">
                                                      <a href="{{ $file['url'] }}" target="_blank" class="flex items-center py-3 px-4 text-green-600">
                                                          <i class="mdi mdi-file-pdf-box text-red-500 mr-2"></i>
                                                          <img src="/img/pdf.png" alt="PDF icon" class="w-6 h-6 mr-2">
                                                      </a>
                                                  </td>
                                                  <td class="border-t py-3 px-4">
                                                    @if(pathinfo($file['url'], PATHINFO_EXTENSION) === 'pdf')
                                                            
                                                        @endif
                                                        {{ $file['title'] }}
                                                  
                                              </tr>

                                              @endforeach
                                          </tbody>
                                        
                                      </table>
                                  </div>

                                                              

                                          
                                        
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
       
    

@include('shared.information')
@endsection
