@extends('layouts.app')

@section('content')

<section id="vision">
    <div
      class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white"
    >
    <h1 class="text-2xl md:text-4xl font-bold mb-4 ">Portal de Transparencia</h1>

      
    </div>
    <div class="bg-[#E9E9E9]">
      <div
        class="flex flex-col md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10"
      >
      
        <div class="flex-1 bg-white shadow-md rounded-2xl h-fit p-4 md:p-6">
          <div>
            
            <div class="flex justify-center">

                <iframe src="https://mpv.munialtoalianza.gob.pe/" width="100%" height="1550" title="Portal de Transparencia" style="padding-top:1px;"></iframe>
            </div>

            <div class="flex flex-col gap-4">
              <div>

              </div>
            </div>
          </div>
        </div>


  @include('shared.information')
@endsection