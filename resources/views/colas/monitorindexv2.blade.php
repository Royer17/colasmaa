@extends('layouts.colas_b')
@section('content')
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    background-color: #163667;
/*    color: #163667;*/
    color: white;
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

  .blueLetter {
    color: #163667;
  }

  .whiteLetter {
    color: white;
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
/*    height:50%;*/
    width: 80%;
/*    display:flex;*/
    background-color: #163667;
/*    font-size: 8rem;*/
    font-weight: bold;
/*    background-image: url('imagenes/colas/logoUgel.png');*/
    background-size:50%;
    background-repeat: no-repeat;
    background-position: center;
  }

  .marcha {
/*    height:50%;*/
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
      <div class="contenedor" style="display:flex; align-items:center;">

        <div id="monitor" class="monitor" style="height: auto;">
          <table style="margin: 0 auto; box-shadow: 2px 2px black;">
            <thead style="font-size: 2rem;border: 1px solid black;">
              <tr>
                <th style="width: 300px;">Turno</th>
                <th style="width: 200px;">Módulo</th>
              </tr>
            </thead>
            <tbody style="font-size: 3.5rem;border: 1px solid black;">
              <tr>
                <td>TD001</td>
                <td>1</td>
              </tr>
              <tr>
                <td>AD002</td>
                <td>3</td>
              </tr>
              <tr>
                <td>AD002</td>
                <td>3</td>
              </tr>

              <tr>
                <td>AD002</td>
                <td>3</td>
              </tr>

              <tr>
                <td>AD002</td>
                <td>3</td>
              </tr>

              <tr>
                <td>AD002</td>
                <td>3</td>
              </tr>
            </tbody>
          </table>

<!--             <div id="ventana1" class="centrarDiv"  >
                <span class="badge badge-pill badge-success">V1</span>
                <p class="m-0" id="numeroTicket1"></p>
            </div>
            <div id="ventana2" class="centrarDiv" >
                <span class="badge badge-pill badge-success">V2</span>
                <p class="m-0" id="numeroTicket2"></p>
            </div> -->
        </div>
        
        <div class="marcha" style="height: auto;">
          @if($videos)
            @foreach($videos as $key => $video)
              <input type="hidden" name="" id="video-to-play{{ $key + 1 }}" class="videos-to-play" value="{{ $video->foto }}">
            @endforeach
          <video id="myVideo" autoplay controls >
            <source src="" id="mp4Source" type="video/mp4">
            Your browser does not support the html video tag.  
          </video>
          @else
          <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="{{url('imagenes/colas/marcha.png')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item ">
                <img src="{{url('imagenes/colas/imagen2.png')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item ">
                <img src="{{url('imagenes/colas/imagen3.png')}}" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      <audio hidden style="height: 0" id="audio" src="{{url('imagenes/colas/atenciontiket.mp3')}}" controls autoplay></audio>
  </body>
@endsection

@section('scripts')

<script>

function cleanAllChildren(element){
  while (element.firstChild) {
    element.removeChild(element.firstChild); 
  }
}

const tbody = document.querySelector('#monitor tbody');


// $('.carousel').carousel({
//   interval: 3000
// })

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
            url:'monitorcargav2',
            type:'get',
            success: function (data) {
                resultado = data.active_tickets.find(({estado})=>estado==1) 

                if(!resultado){
                    resultado = 0
                }else {
                    resultado = resultado.estado
                }

                let numeroVentanillas = data.active_tickets.length;       
                let listaTickets = data.active_tickets;   
                console.log(listaTickets)

                const monitor = document.getElementById('monitor')
                const numeroTicket1 = document.getElementById('numeroTicket1')
                const numeroTicket2 = document.getElementById('numeroTicket2')

                cleanAllChildren(tbody);

                data.active_tickets.forEach((element) => {
                  const tr = document.createElement('tr');
                  
                  tr.innerHTML = `<td>${element.code}</td>
                                  <td>${element.ventanilla_.title}</td>`;

                  tbody.appendChild(tr);

                  if (element.estado == 1) {
                    tr.classList.add('blueLetter');
                    let isColorAmarillo = true;
                    const interval = setInterval(() => {
                      if (isColorAmarillo) {
                        tr.classList.remove('colorGris');
                        tr.classList.add('colorAmarillo');
                      } else {
                        tr.classList.add('colorGris');
                        tr.classList.remove('colorAmarillo');
                      }
                      isColorAmarillo = !isColorAmarillo;
                    }, 500);
                  }

                  if (element.estado == 2) {
                    tr.classList.add('whiteLetter');

                    tr.classList.add('colorVerde');
                  }

                })
                
                data.tickets_in_queue.forEach((element) => {
                  const tr = document.createElement('tr');
                  
                  tr.innerHTML = `  <td>${element.code}</td>
                                    <td></td>`;

                  tbody.appendChild(tr);
                });

                return;
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
    
    //video functions
    var count=0;
    var player=document.getElementById('myVideo');
    var mp4Vid = document.getElementById('mp4Source');
    player.addEventListener('ended',myHandler,false);

    let videos = document.querySelectorAll('.videos-to-play');
    let quantityOfVideos = videos.length;

    function myHandler(e)
    {

      if(!e) 
      {
        e = window.event; 
      }
      count++;

      if (count > quantityOfVideos) {
        count = 1;
      }
      console.log(document.querySelector(`#video-to-play${count}`).value);
      $(mp4Vid).attr('src', document.querySelector(`#video-to-play${count}`).value);
      player.load();
      player.play();
    }

    myHandler();
    



</script>
@endsection