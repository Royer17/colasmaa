@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('assets/img/bgs/banner-img-1.jpg') }})"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Concejo Municipal</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Municipalidad</a></li>
                        <li class="active">Concejo Municipal</li>
                    </ul>
                </div>
                

            </div>
        </div>
    </div>
</section>
<section class="default-section">
    <div class="container-lg">

        <div class="row">
                        <!-- contenido -->
            @foreach($city_councils as $city_council)   
            <table width="800" border="0" class="cardprofile" style="margin-bottom: 10px;">
                <tbody class="tcuerpo">
                    <tr>
                        <td width="370" height="250">
                            <img class="sombra" src="{{ $city_council->photo }}" style="border-radius: 5px;">

                        </td>
                        
                        <td style="padding-left: 20px;">
                            <table border="0">
                                <tbody>
                                    <tr>
                                        <td  class="text-titulo pull-left" ><b style="color:#2e8ece"> {{ $city_council->position }}</b></td>
                                    </tr>
                                    <tr>
                                       <td class="text-titulo pull-left">{{ $city_council->name }}</td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="text-titulo pull-left">{{ $city_council->email }}</td>
                                        
                                    </tr>
                                </tbody>
                            </table>    
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <hr style="color: #0056b2;" /> <!-- separacion horizontal entre filas -->
            @endforeach
        </div>
    </div>
</section>
@endsection