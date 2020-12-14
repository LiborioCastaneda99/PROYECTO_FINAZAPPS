

function agregardatos(buscar_nit,fecha,concepto,monto,tipo_transaccion,clase_transaccion,forma_pago,consecutivo){

	cadena="buscar_nit=" + buscar_nit + 
	"&fecha=" + fecha +
		"&concepto=" + concepto +
	"&monto=" + monto +
	"&tipo_transaccion=" + tipo_transaccion +
	"&clase_transaccion=" + clase_transaccion +
	"&forma_pago=" + forma_pago+
	"&consecutivo=" + consecutivo;

	$.ajax({
		type:"POST",
		url:"php/agregarDatosTrans.php",
		data:cadena,
		success:function(r){
			if(r>=1){
				$('#tabla').load('componentes/tablaTransacciones.php');
				//$('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');
	$('#idConsecutivo').val(d[0]);
	$('#conceptoT').val(d[3]);
	$('#montoT').val(d[4]);
	
}


function actualizaDatos(){

	idConsecutivo=$('#idConsecutivo').val();
	concepto=$('#conceptoT').val();
	monto=$('#montoT').val();

	cadena= "idConsecutivo=" + idConsecutivo + 
	"&concepto=" + concepto +
	"&monto=" + monto;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatosTrans.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tablaTransacciones.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Realmente Desea Eliminar Esta Transacción?', 
		function(){ eliminarDatos(id) }
		, function(){ alertify.error('Se cancelo la eliminación del registro.')});
}

function eliminarDatos(id){

	cadena="id=" + id;

	$.ajax({
		type:"POST",
		url:"php/eliminarDatosTrans.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tablaTransacciones.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}