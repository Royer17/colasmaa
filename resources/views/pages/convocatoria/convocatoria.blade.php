@extends('layouts.app')

@section('content')
<style>
    

    table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid gray;
}

th, td {
    padding: 15px;
    text-align: left;
}

tr:nth-child(odd) {
    background-color: #f9f9f9;
}

tr:nth-child(even) {
    background-color: #ffffff;
}

dt {
    font-weight: normal;
    color: gray;
}

dd {
    color: black;
    font-weight: bold;
    margin: 0;
}

.c-orange {
    color: orange;
}

.img-responsive {
    width: 50px;
    height: auto;
}

.dataTables_paginate {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 0;
    font-family: Arial, sans-serif;
}

.paginate_button {
    margin: 0 5px;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-decoration: none;
    color: #007bff;
    background-color: #f9f9f9;
    transition: background-color 0.3s, color 0.3s;
}

.paginate_button:hover {
    background-color: #007bff;
    color: white;
}

.paginate_button.current {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    cursor: default;
}

.paginate_button.disabled {
    color: #ccc;
    cursor: not-allowed;
}

.ellipsis {
    padding: 8px 12px;
    color: #777;
}


</style>

<section id="vision">
    <div class="flex items-center px-10 md:px-20 bg-dark-blue w-full h-16 md:h-20 text-white">
        <h1 class="text-sm md:text-3xl uppercase">Convocatorias</h1>
    </div>
    <div class="bg-[#E9E9E9] py-6 md:py-10">
        <div class="container mx-auto flex flex-col md:flex-row gap-6 px-3 md:px-20">
            <div class="flex-1 bg-white shadow-md rounded-2xl p-4 md:p-6">
                <div class="mb-6">
                    <a href="https://munialtoalianza.gob.pe/web/resources/fotoContenido/293_3419_17012023_FORMATOS%20CAS.pdf" target="_blank" class="text-blue-500 hover:underline font-bold">DESCARGAR FORMATO CAS</a>
                </div>

                  <br><br>
                  <div class="overflow-x-auto">
                    <table id="tabla_convoca" class="stripe w-full bg-white rounded-lg overflow-hidden shadow-md border border-gray-300">
                        <!-- Cabecera de la tabla -->
                        <thead class="bg-gray-100 border-b border-gray-300">
                            <tr>
                                <th class="px-4 py-2">Nº</th>
                                <th class="px-4 py-2">Descripción</th>
                                <th class="px-4 py-2">Unidad</th>
                                <th class="px-4 py-2">Fecha</th>
                                <th class="px-4 py-2 text-center">Bases</th>
                                <th class="px-4 py-2 text-center">Aptos</th>
                                <th class="px-4 py-2 text-center">Resultados</th>
                            </tr>
                        </thead>
                        <!-- Cuerpo de la tabla -->
                        <tbody>
                            <!-- Contenido de la tabla -->
                        </tbody>
                    </table>
                </div>
                
                @push('scripts')
                <script>
                    $(document).ready(function () {
                        $('#tabla_convoca').DataTable({
                            "pagingType": "simple_numbers", // Usar paginación simple
                            "language": {
                                "paginate": {
                                    "next": "&rarr;", // Personalizar botón de siguiente
                                    "previous": "&larr;" // Personalizar botón de anterior
                                }
                            }
                        });
                    });
                </script>
                @endpush
                
   
       

@section('scripts')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="/js/convocatoria.js"></script>
@endsection

@include('shared.information2')
@endsection
