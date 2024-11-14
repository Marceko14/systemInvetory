var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#num_documento").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#email").val("");
	$("#idpersona").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/persona.php?op=listarc',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/persona.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idpersona)
{
	$.post("../ajax/persona.php?op=mostrar",{idpersona : idpersona}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
		$("#tipo_documento").val(data.tipo_documento);
		$("#tipo_documento").selectpicker('refresh');
		$("#num_documento").val(data.num_documento);
		$("#direccion").val(data.direccion);
		$("#telefono").val(data.telefono);
		$("#email").val(data.email);
 		$("#idpersona").val(data.idpersona);
		

 	})
}

//Función para eliminar registros
function eliminar(idpersona)
{
	bootbox.confirm("¿Está Seguro de eliminar el cliente?", function(result){
		if(result)
        {
        	$.post("../ajax/persona.php?op=eliminar", {idpersona : idpersona}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

/// buscar en api sunat
function buscarDocuemnto(){
	let documento=$("#num_documento").val();
	let tipodocumento=$("#tipo_documento").val();
	let urlapiconsulta="consultadni.php";
	if(tipodocumento=="DNI"){
	 urlapiconsulta="consultadni.php";
	}else if(tipodocumento=="RUC"){
		urlapiconsulta="consultaruc.php";
	}else{
		alert("documento no encontra con extranjeria , escribir datos manualmente");
		return false;
	}
	$.post("../"+urlapiconsulta,{documento : documento}, function(data, status)
	{
		res = JSON.parse(data);	
		$("#nombre").val("");
		$("#direccion").val("");
		//console.log(res);
		if(res.codigo==0 || res.codigo==-1)	{
			alert(res.mensaje);
		}else if(res.codigo==1){
			if(tipodocumento=="DNI"){
				$("#nombre").val(res.data.nombres+' '+res.data.apellidoPaterno+' '+res.data.apellidoMaterno);
			}else{
				$("#nombre").val(res.data.nombre);
			}
			$("#direccion").val(res.data.direccion);
		}
		
 	})
}
init();