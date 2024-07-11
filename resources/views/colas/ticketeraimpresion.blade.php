@extends('layouts.colas')
@section('content')
<style>
    body {
        margin:0;
        padding:0;
        font-family:arial;
    }
  .contenedor {
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 4rem;
    text-align: center;
    color: white;
    height: 100vh;
    width: 100%;
    background-color: #194073;
  }  

  .image-contenedor {
    position: relative;
    width: 100%;
    height: 100%;
    /* margin-top: 10px; */
  }

  .image-contenedor img {
    width: 45%;
    padding: 0 20px;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }

  .turno-text {
    position: absolute;
    top: 15px;
    font-size: 3rem;
    font-weight: bold;
    left: 50%;
    transform: translateX(-50%);
    color: black;
  }

  .ticket-number {
    position: absolute;
    top: 30%;
    font-size: 3rem;
    font-weight: bold;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
  }

  .ticket-date {
    position: absolute;
    bottom: 15%;
    font-size: 2rem;
    font-weight: bold;
    left: 50%;
    transform: translateX(-50%);
    color: black;
  }

  .ticket-time {
    position: absolute;
    bottom: 0px;
    font-size: 2rem;
    font-weight: bold;
    left: 50%;
    transform: translateX(-50%);
    color: black;
  }

  .wait-text {
    margin-top: 20px;
    font-size: 3rem;
    text-align: center;
  }

  .btn-conteo {
    position:absolute;
    bottom:5px;
    right:5px;
    background-color:#D7F205;
    color:#194073;
    width: 100px;
    font-weight: bolder;
    height: 100px;
    padding: 10px 16px;
    border-radius: 60px;
    font-size: 36px;
    border:none;
}

.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}
</style>
<body>
    <div class="relative">
        <div class="contenedor">
            <p style="font-weight: bold;">Recoja su<br><span style="color: #D7F205;">Ticket</span></p>
            <div class="image-contenedor">
                <img src="{{url('img/colas/figura.png')}}">
                <p class="turno-text">Tu Turno es:</p>
                <p class="ticket-number">TD-{{$ticket->ticket}}</p>
                <p class="ticket-date">{{ date('d/m/Y', strtotime($ticket->created_at))}}</p>
                <p class="ticket-time">{{ date('h:i a', strtotime($ticket->created_at))}}</p>
            </div>
            <p class="wait-text">Espere su<br><span>Turno</span></p>
        </div>
        <button id="conteo" type="submit" class='btn-conteo btn-xl'>05</button>
        
    </div>
</body>
@endsection

@section('scripts')
<script>
    var conteo = document.getElementById("conteo")
    setInterval(() => {
        var valorActual = parseInt(conteo.textContent);
        if(valorActual>0){
            valorActual--;
            conteo.textContent= valorActual < 5 ? "0"+valorActual : "";
        }else{
        setTimeout(function() {
            window.location.href = "/"
        }, 100);

        }
    }, 1000);
</script>
@endsection