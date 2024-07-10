@extends('layouts.app')

@section('content')
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{ asset('/img/bgs/banner-img-1.jpg') }}"></div>
    <div class="banner-inner">
        <div class="container-lg">
            <div class="inner-container clearfix">
                <h1>Funcionarios</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('pages.home') }}">Inicio</a></li>
                        <li><a href="">Municipalidad</a></li>
                        <li class="active">Funcionarios</li>
                    </ul>
                </div>

   
            </div>
        </div>
    </div>


</section>


<section class="default-section">
    <div class="container-lg">
        {{-- 

            <div>
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" class="table" height="1000" style="width: 100%;" width="100%">

                <tr>
                    <td colspan="2" style="width: 253;">
                        <p>
                        <strong>GERENCIA MUNICIPAL </strong></p>
                    </td>
                        <td style="width: auto;">


                        <img src="{{ asset('/img/funcionarios/func1.jpg')}}" class="sombra img-thumbnail" higth="270" width="250" alt="">

                    </td>
                    <td style="width: auto;">
                        <p>
                        Ing. Econ. Bill Villegas Mamani </p>

                        <p  class="negrita" >Gerente Municipal</p>

                    </td>
                </tr>

                <tr>

                </tr>


                </tr>

                
        </table>
    </div>
        --}}
    </div>
</section>
@endsection