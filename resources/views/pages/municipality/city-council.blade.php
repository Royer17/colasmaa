@extends('layouts.app')

@section('content')

<section id="vision">
    <div
      class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white"
    >
      <h1 class="text-sm md:text-3xl uppercase">Concejo Municipal</h1>

      
      
    </div>
    <div class="bg-[#E9E9E9]">
      <div
        class="flex flex-col md:flex-row gap-4 px-3 md:px-20 py-2 md:py-10"
      >
        <div class="flex-1 bg-white shadow-md rounded-2xl h-fit p-4 md:p-6">
          <div>
<!--             <img
              class="w-full mb-5 max-h-[40rem]"
              src="https://picsum.photos/1200/600"
            /> -->
            <div class="flex flex-col gap-4">

              <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach($city_councils as $city_council)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-32 object-cover object-center" src="{{ $city_council->photo }}" alt="{{ $city_council->name }}">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-blue-600 mb-2">{{ $city_council->position }}</h2>
                        <p class="text-lg font-semibold text-gray-800 mb-2">{{ $city_council->name }}</p>
                        <p class="text-lg text-gray-600">{{ $city_council->email }}</p>
                    </div>
                </div>
                <br><br>
                @endforeach
            </div>
            
            
            </div>
          </div>
        </div>
        
        

  @include('shared.information')
@endsection

