      


function agregardatos(consecutivoU,valorAbono,concepto, responsable,transaccionU,saldoU){

	cadena="consecutivoU=" + consecutivoU + 
	"&valorAbono=" + valorAbono +
	"&concepto=" + concepto +
	"&responsable=" + responsable +
	"&transaccionU=" + transaccionU+
	"&saldoU=" + saldoU;

	$.ajax({
		type:"POST",
		url:"php/agregarDatosPagos.php",
		data:cadena,
		success:function(r){
			if(r>=1){
				$('#tableLista').load('control-pagos-cuentas.php');
				//$('#buscador').load('componentes/buscador.php');
				alertify.success("Pago agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#consecutivoU').val(d[0]);
	$('#transaccionU').val(d[1]);
	$('#saldoU').val(d[2]);
	$('#estadoU').val(d[3]);
	$('#nitU').val(d[4]);
	$('#nombresU').val(d[5]);
	
}

function actualizaDatos(){

	documento=$('#consecutivoU').val();
	nombre=$('#transaccionU').val();
	direccion=$('#saldoU').val();
	email=$('#estadoU').val();
	telefono=$('#nitU').val();
	observacion=$('#nombresU').val();

	cadena= "documento=" + documento + 
	"&nombre=" + nombre +
	"&direccion=" + direccion +
	"&email=" + email +
	"&telefono=" + telefono +
	"&observacion=" + observacion;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatosClieProv.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tablaProv.php');
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