@extends('layouts.colas_b')
@section('content')
<div class="fondo1">
    <div class="row" style="display:flex; justify-content:center; align-items:center; height:100vh;width: 100%;">
                <div class="col-md-6 text-center ">
                    <h3 class="display-4 text-white mb-0">Ingrese su</h3>
                    <h3 style="color:#CCFF00; font-weight:bolder" class="display-4 mt-0">DNI</h3>
                    <div class="text-center" style="margin:0px 100px; margin-top:50px">
                    <div class="row g-2">
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(1)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 1 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(2)" id="b1" class="btn btn-light btn-circle btn-xl"  value="2" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 2 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(3)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 3 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(4)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 4 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(5)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 5 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(6)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 6 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(7)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 7 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(8)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 8 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(9)" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 9 </span></button>
                        </div>

                        <div class="col-4 mb-4">
                        <button onclick="btnClean()" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><i class='bx bx-trash bx-md'></i></button>
                        </div>
                        <div class="col-4 mb-4">
                        <button onclick="handleNumeroClick(0)" id="b1" class="btn btn-light btn-circle btn-xl"  value="0" type="button"><span style="font-size:33px; font-weight:bolder; color:#194073 "> 0 </span></button>
                        </div>
                        <div class="col-4 mb-4">
                            <button onclick="btnBackClean()" id="b1" class="btn btn-light btn-circle btn-xl"  value="1" type="button"><i class='bx bxs-arrow-to-left bx-md'></i></button>
                        </div>
                    </div>
                </div>
                    
                </div>
                <div class="col-md-6">
                    <div class='col-span-6' style="display:flex; flex-direction:column; justify-content:center; align-items:center;">
                        <img class="img-dni" src="{{url('imagenes/colas/dniElectronico.png')}}">
                        <div class="w-full ">
                            <form method="post" style="display:flex; flex-direction:column; justify-content:center; align-items:center; gap:30px ">
                                {{ csrf_field() }}
                                <input id="resultado" name="dni" style="font-size:40px; width:350px; font-weight:bolder; color:#194073; border:none; text-align:center"
                                type="number" minlength="8" maxlength="8" />
                                <div style="display:none;" id="error" class="text-danger h2">
                                    <i class='bx bxs-error-circle'></i>
                                    <span id="error-text">
                                    </span>
                                </div>
                                <button style="margin-top:100px" type="submit" class='btn-enviar btn-xl'>OK</button>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
</div>

@endsection
@section('scripts')
<script>    

    const nombres = ['juan','pepe','lucho']
    localStorage.setItem('lista', JSON.stringify(nombres))
        

</script>

<script>
    var dir = "/"
    var dni = ''

    $(".btn-enviar").on("click",function(){
        let form = document.querySelector("form");    
        form.addEventListener("submit", (event) => {
            // cancela el comportamiento por defecto
            event.preventDefault();
            // resto del codigo
            if($("#resultado").val().length == 8){
                form.submit()
            }else {
                $("#error").show()
                $("#error-text").html("ingrese un dni valido")
                
            }        
        })
    })
    
    function handleNumeroClick(numero) {
        if (dni.length < 8) {
            dni += numero;
            $("#resultado").val(dni);
            $("#error-text").html("")
            $("#error").hide()


        }
    }
    
    function btnClean() {
        dni=''
        $("#resultado").val("");
        $("#error").hide()

    }
    
    function btnBackClean (){
        if (dni.length > 0) {
            const newDni = dni.slice(0, -1);
            dni=newDni
            $("#resultado").val(dni);
            $("#error").hide()

        }
        
    }
    
</script>
@endsection