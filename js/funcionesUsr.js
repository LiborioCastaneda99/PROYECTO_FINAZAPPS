
function agregardatos(Identificacion,Nombre,Apellido,email,pass){

	cadena="Identificacion=" + Identificacion + 
	"&Nombre=" + Nombre +
	"&Apellido=" + Apellido +
	"&email=" + email +
	"&pass=" + pass ;

	$.ajax({
		type:"POST",
		url:"php/agregarDatosUsr.php",
		data:cadena,
		success:function(r){
			if(r>=1){
				$('#tabla').load('../login.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}
