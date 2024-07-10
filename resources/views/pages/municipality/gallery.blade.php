@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<style>
  .hover\:bg-indigo-700:hover {
      background-color: rgb(6 58 98/var(--tw-bg-opacity));
  }
  </style>
<section id="vision">
    <div
      class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white"
    >
      <h1 class="text-sm md:text-3xl uppercase">Galería de Fotos</h1>
    
      
    </div>
    <div class="bg-[#E9E9E9]">
      <div
        class="flex flex-col md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10"
      >
        <div class="flex-1 bg-white shadow-md rounded-2xl h-fit p-4 md:p-6">

          <section class="md:h-full flex items-center text-gray-600">
            <div class="container px-5 py-24 mx-auto">
                <div class="text-center mb-12">
                    <h5 class="text-base md:text-lg text-indigo-700 mb-1">Municipalidad Distrital de Alto de la Alianza</h5>
                    <h1 class="text-4xl md:text-6xl text-gray-700 font-semibold">Galería de Fotos</h1>
                </div>
                <div class="flex flex-wrap -m-4">
  
                  @foreach($notice_images as $notice)
  
                    <div class="p-4 sm:w-1/2 lg:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <img class="lg:h-72 md:h-48 w-full object-cover object-center"
                                src="{{ $notice->foto }}" alt="blog">
                           
                        </div>
                    </div>
                  
                  @endforeach
                </div>
            </div>
        </section>

        </div>

@include('shared.information')
@endsection

