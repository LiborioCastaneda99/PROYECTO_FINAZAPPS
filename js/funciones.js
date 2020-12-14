

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
				$('#tabla').load('componentes/tabla.php');
				$('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[0]);
	$('#documentou').val(d[1]);
	$('#nombreu').val(d[2]);
	$('#apellidou').val(d[3]);
	$('#direccionu').val(d[4]);
	$('#emailu').val(d[5]);
	$('#telefonou').val(d[6]);
	$('#observacionu').val(d[7]);
	
}

function actualizaDatos(){

	id=$('#idpersona').val();
	documento=$('#documentou').val();
	nombre=$('#nombreu').val();
	apellido=$('#apellidou').val();
	direccion=$('#direccionu').val();
	email=$('#emailu').val();
	telefono=$('#telefonou').val();
	observacion=$('#observacionu').val();

	cadena= "id=" + id +
	"&documento=" + documento + 
	"&nombre=" + nombre +
	"&apellido=" + apellido +
	"&direccion=" + direccion +
	"&email=" + email +
	"&telefono=" + telefono +
	"&observacion=" + observacion;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
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
		url:"php/eliminarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Eliminado con exito!");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}