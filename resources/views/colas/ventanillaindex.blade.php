@extends('layouts.colas')
@section('content')
<div class="flex justify-center items-center h-screen bg-[#163667] gap-5">
	<div class="relative w-1/3 flex flex-col gap-5 justify-center items-center h-1/2 text-center">
		<p class="absolute top-0 text-white text-8xl font-bold">Ventanilla {{$ventanilla_name}} - {{ $office_name }}</p>
		
		<div id="numeroTicket" class="bg-slate-200 z-50 absolute bottom-32 px-5 rounded-2xl w-full h-2/4 flex items-center justify-center text-slate-800 md:text-7xl lg:text-8xl font-bold text-5xl">- ? -</div>
		<div class="z-20 absolute bottom-20 px-5 rounded-2xl w-full h-2/4 flex items-center justify-center text-slate-800 bg-[#999999] md:text-7xl lg:text-8xl font-bold text-5xl"></div>
		<div class="z-10 absolute bottom-10 px-5 rounded-2xl w-full h-2/4 flex items-center justify-center text-slate-800 bg-[#666666] md:text-7xl lg:text-8xl font-bold text-5xl"></div>
		<p id="ticketsRestantes" class="z-20 absolute bottom-10 text-4xl text-white">+{{$tticket}}</p>
	</div>
	<div class="w-24 h-2/4 py-16 mt-16 flex flex-col justify-between">
		
		<!-- BOTON ALARMA -->
		
		<button 
		id="btnAlarma"
		class="bg-[#FDFF03] h-20 w-20 rounded-xl flex justify-center items-center" 
		>
		<svg class="h-10" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
			<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
		</svg>
	</button>
	
	<!-- BOTON ATENCION -->
	
	<button 
	id="btnAtencion"
	class="bg-green-100 text-slate-400 cursor-not-allowed h-20 w-20 rounded-xl flex justify-center items-center" 
	>
	
	<svg class="h-10" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
		<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
	</svg>
</button>

<!-- BOTON SIGUIENTE TURNO -->

<button 
id="btnSiguiente"

class="bg-orange-100 text-slate-400 cursor-not-allowed h-20 w-20 rounded-xl flex justify-center items-center" 

>

<p class=" font-bold  ">
	<svg class="h-8  " xmlns="http://www.w3.org/2000/svg"  fill="currentColor"  viewBox="0 0 16 16" >
		<path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
		<path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
</p>

</button>
</div>
</div>
@endsection

@section('scripts')
<script>
	
	// variables Controlador
	var id = null;
	// variables del DOM
	const btnAlarma = document.getElementById('btnAlarma')
	const btnAtencion = document.getElementById('btnAtencion')
	const btnSiguiente = document.getElementById('btnSiguiente')
	const ticketsRestantes = document.getElementById('ticketsRestantes')
	const numeroTicket = document.getElementById('numeroTicket');
	btnAlarma.addEventListener('click',activarAlarma)
	btnAtencion.addEventListener('click',activarAtencion)
	btnSiguiente.addEventListener('click',activarSiguiente)
	
	// funciones para actualizar el estado en el DOM
	var intervalId
	var llamando = true
	
	function activarAlarma(){
		$.ajax({
			url:'enespera',
			type:'get',
			data:{ventanilla:"{{$ventanilla}}"},
			success: function (data) {
				console.log(data)
				if (data[0]>0){
					if(data[1].estado==2){
						numeroTicket.classList.remove('bg-[#FDFF03]', 'bg-slate-200')
						numeroTicket.classList.add('bg-[#329900]','text-white')
						btnAtencion.classList.add('bg-green-100', 'text-slate-400', 'cursor-not-allowed')
						btnAtencion.classList.remove('bg-[#329900]','cursor-pointer')
						btnAtencion.disabled=true
						btnSiguiente.disabled=false
						btnSiguiente.classList.add('bg-[#FE9900]')
						btnSiguiente.classList.remove('text-slate-400','bg-orange-100','cursor-not-allowed')		
						btnAlarma.disabled = true;
						btnAlarma.classList.add('cursor-not-allowed','bg-yellow-100', 'text-slate-400')
						btnAlarma.classList.remove('bg-[#FDFF03]')
					}else {

						intervalId = setInterval(() => {
							console.log('setinterval')
							if(llamando){
								numeroTicket.classList.remove('bg-[#FDFF03]')
								numeroTicket.classList.add('bg-slate-200')
							}else {
								numeroTicket.classList.remove('bg-slate-200')
								numeroTicket.classList.add('bg-[#FDFF03]')
							}
							llamando=!llamando
						}, 500);
						
						btnAlarma.disabled = true;
						btnAlarma.classList.add('cursor-not-allowed','bg-yellow-100', 'text-slate-400')
						btnAlarma.classList.remove('bg-[#FDFF03]')
						btnAtencion.classList.remove('cursor-not-allowed','bg-green-100','text-slate-400')
						btnAtencion.classList.add('bg-[#329900]','cursor-pointer')
						btnAtencion.disabled = false;
					}

					console.log('funcionando')
					//numeroTicket.textContent = "TD-"+data[1]['ticket']; //imprime numero de ticket
					numeroTicket.textContent = data[1]['code']; //imprime numero de ticket

					ide = data[1]['id'];
					ticketsRestantes.textContent = "+"+data[0]; //imprime total
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
	
	function activarAtencion(){
		$.ajax({
			url:'enatencion',
			type:'get',
			data:{'ide':ide },
			success: function (data) {
				let atencion = true
				clearInterval(intervalId)
				numeroTicket.classList.remove('bg-[#FDFF03]', 'bg-slate-200')
				numeroTicket.classList.add('bg-[#329900]','text-white')
				btnAtencion.classList.add('bg-green-100', 'text-slate-400', 'cursor-not-allowed')
				btnAtencion.classList.remove('bg-[#329900]','cursor-pointer')
				btnAtencion.disabled=true
				btnSiguiente.disabled=false
				btnSiguiente.classList.add('bg-[#FE9900]')
				btnSiguiente.classList.remove('text-slate-400','bg-orange-100','cursor-not-allowed')		
				console.log('funcionando')
				
				numeroTicket.textContent = "TD-"+data[1]['ticket']; //imprime numero de ticket
				ticketsRestantes.textContent = "+"+data[0]; //imprime total
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
	
	function activarSiguiente() {
		$.ajax({
			url:'encierre',
			type:'get',
			data:{'ide':ide },
			success: function (data) {
				numeroTicket.classList.remove('bg-[#329900]','text-white')
				numeroTicket.classList.add('bg-slate-200')
				numeroTicket.textContent = "- ? -"; //imprime numero de ticket
				console.log(ticketsRestantes)
				btnAlarma.disabled=false
				btnAlarma.classList.remove('bg-slate-200','cursor-not-allowed','bg-yellow-100','text-slate-400')
				btnAlarma.classList.add('bg-[#FDFF03]')
				btnSiguiente.disabled=true
				btnSiguiente.classList.remove('bg-[#FE9900]')
				btnSiguiente.classList.add('bg-orange-100','text-slate-400','cursor-not-allowed')
				//llamando=true
				ticketsRestantes.textContent = "+"+data[0]; //imprime total
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