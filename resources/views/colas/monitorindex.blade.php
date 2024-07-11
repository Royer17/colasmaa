@extends('layouts.colas_b')
@section('content')
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    background-color: #163667;
    color: #163667;
    text-align: center;
    height:100vh;

  }

  .contenedor {
    height:100%;
  }
  
  .centrarDiv {
    display:flex;
    height:100%;
    width:100% ;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .colorGris {
      background-color:#8993a4;
  }
  .colorAmarillo {
      background-color:#FDFF03;
  }
  .colorVerde {
      background-color:#329900;
      color:white;
  }


  .hidden {
    display:none;
  }
  .colum1 {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr;
  }
  .colum2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr;
  }
  
  .monitor {
    height:50%;
    width: 100%;
    display:flex;
    background-color: #163667;
    font-size: 8rem;
    font-weight: bold;
    background-image: url('img/colas/logoUgel.png');
    background-size:50%;
    background-repeat: no-repeat;
    background-position: center;
  }

  .marcha {
    height:50%;
    width: 100%;
  }

  .ventana {    
    width: 100%;
    height: 100%;
    display:flex;
    justify-content:center;
    align-items:center;

  }

  img {
    width: 100%;
    height: 100%;
    /* object-fit: cover; */
  }
  /* .parrafo {
    width: 100%;
    height:100%;
    object-fit: contain;
  } */
  
</style>

  <body>
      <div class="contenedor">
        <div id="monitor" class="monitor">
            <div id="ventana1" class="hidden centrarDiv"  >
                <span class="badge badge-pill badge-success">V1</span>
                <p class="m-0" id="numeroTicket1"></p>
            </div>
            <div id="ventana2" class="hidden centrarDiv" >
                <span class="badge badge-pill badge-success">V2</span>
                <p class="m-0" id="numeroTicket2"></p>
            </div>
        </div>


        <div class="marcha">
          <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="{{url('img/colas/marcha.png')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item ">
                <img src="{{url('img/colas/imagen2.png')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item ">
                <img src="{{url('img/colas/imagen3.png')}}" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        </div>
      </div>
      <audio hidden style="height: 0" id="audio" src="{{url('img/colas/atenciontiket.mp3')}}" controls autoplay></audio>
  </body>
@endsection

@section('scripts')

<script>

$('.carousel').carousel({
  interval: 3000
})
var resultado = 0

function reproducirAudio() {
  const audioElement = document.getElementById('audio');
  audioElement.play();
}

setInterval(() => {
    cargar()
    if(resultado == 1){
        reproducirAudio()  
    }
},2500);
    
    function cargar(){
        $.ajax({
            url:'monitorcarga',
            type:'get',
            success: function (data) {
                resultado =data[0].find(({estado})=>estado==1) 

                if(!resultado){
                    resultado = 0
                }else {
                    resultado = resultado.estado
                }
                let numeroVentanillas = data[0].length;       
                let listaTickets = data[0];   
                console.log(listaTickets)

                const monitor = document.getElementById('monitor')
                const numeroTicket1 = document.getElementById('numeroTicket1')
                const numeroTicket2 = document.getElementById('numeroTicket2')
                if(numeroVentanillas == 1){
                    monitor.classList.add('colum1')
                    listaTickets.map(({ticket,estado,ventanilla})=>{
                      if(ventanilla==1){
                          ventana2.classList.add('hidden')
                          ventana2.classList.remove('colorVerde')

                          numeroTicket2.textContent=''
                          if (estado == 1){
                              ventana1.classList.remove('hidden')
                              ventana1.classList.add('colorAmarillo');
                              let isColorAmarillo = true;
                              const interval = setInterval(() => {
                                if (isColorAmarillo) {
                                    ventana1.classList.remove('colorGris');
                                    ventana1.classList.add('colorAmarillo');
                                  } else {
                                    ventana1.classList.remove('colorAmarillo');
                                    ventana1.classList.add('colorGris');
                                  }
                                  isColorAmarillo = !isColorAmarillo;
                                }, 500);
                              setTimeout(()=>{
                                    clearInterval(interval)
                              },2500)
                              numeroTicket1.textContent=`TD-${ticket}`
                              
                          }else if(estado == 2){
                            ventana1.classList.add('colorVerde')
                                                   
                              ventana1.classList.remove("hidden")
                              ventana1.classList.remove("colorAmarillo")
                              ventana2.classList.remove('colorAmarillo')
                              monitor.classList.remove('colum2')
                              numeroTicket1.textContent=`TD-${ticket}`

                          }else{
                              ventana1.classList.remove('colorVerde')
                              ventana1.classList.add('hidden')
                              numeroTicket1.textContent=''
                            }
                      }else if (ventanilla==2){
                          ventana1.classList.add('hidden')
                          ventana1.classList.remove('colorVerde')
                          numeroTicket1.textContent=''
                          if (estado == 1){
                              ventana2.classList.remove('hidden')
                              ventana2.classList.add('colorAmarillo')
                              let isColorAmarillo = true;
                              const interval = setInterval(() => {
                                if (isColorAmarillo) {
                                    ventana2.classList.remove('colorGris');
                                    ventana2.classList.add('colorAmarillo');
                                  } else {
                                    ventana2.classList.remove('colorAmarillo');
                                    ventana2.classList.add('colorGris');
                                  }
                                  isColorAmarillo = !isColorAmarillo;
                                }, 500);
                                setTimeout(()=>{
                                      clearInterval(interval)
                                },2500)
                              numeroTicket2.textContent=`TD-${ticket}`
                              
                          }else if(estado== 2) {
                              ventana2.classList.remove("hidden")
                              ventana2.classList.remove("colorAmarillo")
                              ventana2.classList.add('colorVerde')
                              monitor.classList.remove('colum2')
                              numeroTicket2.textContent=`TD-${ticket}`
                            }else {
                              ventana2.classList.remove('colorVerde')
                              ventana2.classList.add('hidden')
                              numeroTicket1.textContent=''
                            }
                      }
                  })
                }
                else if(numeroVentanillas == 2) {
                  monitor.classList.remove('colum1')
                  monitor.classList.add('colum2')
                    listaTickets.map(({ticket,estado,ventanilla})=>{
                      if (ventanilla == 1){
                            numeroTicket1.textContent=`TD-${ticket}`
                            if(estado==1){
                                ventana1.classList.add('colorAmarillo')
                                ventana1.classList.remove('hidden')
                                let isColorAmarillo = true;
                                const interval = setInterval(() => {
                                  if (isColorAmarillo) {
                                      ventana1.classList.remove('colorGris');
                                      ventana1.classList.add('colorAmarillo');
                                    } else {
                                      ventana1.classList.remove('colorAmarillo');
                                      ventana1.classList.add('colorGris');
                                    }
                                    isColorAmarillo = !isColorAmarillo;
                                  }, 500);
                                setTimeout(()=>{
                                      clearInterval(interval)
                                },2500)

                            }else if(estado==2){
                                ventana1.classList.remove('hidden')
                                ventana1.classList.remove('colorAmarillo')
                                ventana1.classList.add('colorVerde')


                            }else{
                                ventana1.className="hidden"
                                ventana1.classList.remove('colorVerde')
                                numeroTicket1.textContent=''
                            }                                                            
                            
                        }else if(ventanilla == 2){
                          numeroTicket2.textContent=`TD-${ticket}`
                          if(estado==1){
                            ventana2.classList.add('colorAmarillo')
                            ventana2.classList.remove('hidden')
                            let isColorAmarillo = true;
                            const interval = setInterval(() => {
                              if (isColorAmarillo) {
                                  ventana2.classList.remove('colorGris');
                                  ventana2.classList.add('colorAmarillo');
                                } else {
                                  ventana2.classList.remove('colorAmarillo');
                                  ventana2.classList.add('colorGris');
                                }
                                isColorAmarillo = !isColorAmarillo;
                              }, 500);
                              setTimeout(()=>{
                                    clearInterval(interval)
                              },2500)
                          }else if(estado==2){
                                ventana2.classList.remove('hidden')
                                ventana2.classList.remove(`colorAmarillo`)

                                ventana2.classList.add(`colorVerde`)
                          }else{
                                ventana2.classList.add('hidden')
                                ventana2.classList.remove(`colorVerde`)
                                numeroTicket2.textContent=''
                            }
                        }
                  })
                }else {
                    ventana1.className="hidden centrarDiv"
                    ventana2.className="hidden centrarDiv"
                    monitor.className="monitor"
                    numeroTicket1.textContent=''
                    numeroTicket2.textContent=''
                   
                }
                
            },
            statusCode: {
                404: function() {
                    alert('web not found');
                }
            },
            error:function(x,xs,xt){
                window.open(JSON.stringify(x));
                console.log('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
            }
        });
    }

    

    



</script>
@endsection