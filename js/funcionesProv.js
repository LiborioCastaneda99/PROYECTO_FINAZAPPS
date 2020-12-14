

function agregardatos(documento,nombre,apellido,direccion,email,telefono,tipo_clie_prov,observacion){

	cadena="documento=" + documento + 
	"&nombre=" + nombre +
	"&apellido=" + apellido +
	"&direccion=" + direccion +
	"&email=" + email +
	"&telefono=" + telefono +
	"&tipo_clie_prov=" + tipo_clie_prov +
	"&observacion=" + observacion;

	$.ajax({
		type:"POST",
		url:"php/agregarDatosClieProv.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tablaProv.php');
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

	$('#documentou').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#direccionu').val(d[2]);
	$('#emailu').val(d[4]);
	$('#telefonou').val(d[3]);
	$('#observacionu').val(d[6]);
	
}

function actualizaDatos(){

	documento=$('#documentou').val();
	nombre=$('#nombreu').val();
	direccion=$('#direccionu').val();
	email=$('#emailu').val();
	telefono=$('#telefonou').val();
	observacion=$('#observacionu').val();

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
	alertify.confirm('Eliminar Datos', '¿Realmente Desea Eliminar Este Clientes?', 
		function(){ eliminarDatos(id) }
		, function(){ alertify.error('Se cancelo la eliminación del registro.')});
}

function eliminarDatos(id){

	cadena="id=" + id;

	$.ajax({
		type:"POST",
		url:"php/eliminarDatosClieProv.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tablaProv.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}