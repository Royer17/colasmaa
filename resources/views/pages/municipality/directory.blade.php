@extends('layouts.app')

@section('content')

<section id="vision">
    <div
      class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white"
    >
      <h1 class="text-sm md:text-3xl uppercase">Directorio Telefónico</h1>

      
      
    </div>
    <div class="bg-[#E9E9E9]">
      <div
        class="flex flex-col md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10"
      >
        <div class="flex-1 bg-white shadow-md rounded-2xl h-fit p-4 md:p-6">
          <div>
            
            <div class="flex flex-col gap-4">
              <div>
                
                <p class="text-sm md:text-base">
                    {!! $directory !!}
                </p>
              </div>
            </div>
          </div>
        </div>
 
   


  @include('shared.information')
@endsection