document.getElementById("limpBuscar").addEventListener("click", function() {
LimpiarformBuscar();
});


function LimpiarformBuscar()
{
	
   document.getElementById("txtRut_bsc").value = "";
   document.getElementById("txtNombre_bsc").value = "";
   document.getElementById("txtTelefono_bsc").value = "";
   document.getElementById("cmbSexo_bsc").value = "0";
   document.getElementById("txtEmail_bsc").value = "";
   document.getElementById("txtDireccion_bsc").value = "";
   document.getElementById("cmbComuna_bsc").value = 13101;
   document.getElementById("txtNroUV_bsc").value = "";
   document.getElementById("txtNroTarjeta_bsc").value = "";
}

function valida_envia(){ 
        varRut = document.getElementById("txtRut_bsc").value;

   	//valido el nombre 
   	varNombre = document.getElementById("txtNombre_bsc").value;
        varTel = document.getElementById("txtTelefono_bsc").value;
        varDireccion = document.getElementById("txtDireccion_bsc").value;
        varComuna = document.getElementById("cmbComuna_bsc").selected;

        if( varRut == null || varRut.length == 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor ingresar RUT', type: 'error' });
            document.getElementById("txtRut_bsc").focus();
            event.stopImmediatePropagation();


        }else if( varNombre == null || varNombre.length == 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor ingresar NOMBRE', type: 'error' });
            document.getElementById("txtNombre_bsc").focus();
            event.stopImmediatePropagation();


        }else if(varTel == null || varTel.length == 0)
        {
//            alert("Favor Ingresar Telefono...");
            swal({ title: 'Error', text: 'Favor ingresar TELEFONO', type: 'error' });
            document.getElementById("txtTelefono_bsc").focus();
            event.stopImmediatePropagation();
           

        } else if(varDireccion == null || varDireccion.length == 0)
        {
//            alert("Favor Ingresar Telefono...");
            swal({ title: 'Error', text: 'Favor ingresar DIRECCIÓN', type: 'error' });
            document.getElementById("txtDireccion_bsc").focus();
            event.stopImmediatePropagation();
           

        }
        else if(varComuna.length.value == 0)
        {
//            alert("Favor Ingresar Telefono...");
            swal({ title: 'Error', text: 'Favor seleccionar COMUNA', type: 'error' });
            document.getElementById("cmbComuna_bsc").focus();
            event.stopImmediatePropagation();
           

        }
        
        else{} 
   	
    }
    
    function valida_enviaBici(){ 
        varCodTag = document.getElementById("tagBic").value;
   	varModeloBic = document.getElementById("modeloBic").value;
        varDescBic = document.getElementById("descBic").value;
        

        if( varCodTag == null || varCodTag.length == 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor escanear CHIP', type: 'error' });
            document.getElementById("tagBic").focus();
            event.stopImmediatePropagation();


        }else if(varModeloBic == null || varModeloBic.length == 0)
        {
            swal({ title: 'Error', text: 'Favor ingresar Marca/modelo', type: 'error' });
            document.getElementById("modeloBic").focus();
            event.stopImmediatePropagation();
            
        }else if(varDescBic == null || varDescBic.length == 0)
        {
            swal({ title: 'Error', text: 'Favor ingresar Descripción', type: 'error' });
            document.getElementById("descBic").focus();
            event.stopImmediatePropagation();
            
        }else{}
    }
    
     function validaUlock(){
        varUlock = document.getElementById("txtNumUlock").value;     
        
        
        if( varUlock == null || varUlock <= 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor ingrese U-Lock', type: 'error' });
            document.getElementById("txtNumUlock").focus();
            event.stopImmediatePropagation();


        }else{}
        
        
        
    }
    

function mensajeOk(mensaje)
{
	$("#textCuadroOk").empty();
    $("#textCuadroOk").append(mensaje);
	$('#fondoAvisoCorrecto').css('display', 'block');
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

document.getElementById("txtRut_bsc").value = getParameterByName("rut");
if((document.getElementById("txtRut_bsc").value) != '')
{
	buscarBicicletas(document.getElementById("txtRut_bsc").value);
}



//CERRAR SESION
$('#CloseSesion').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'funciones.php',
        dataType: 'json',
        data: {cerrarSesion: 1},
		success: function (response) 
		{
			
		},
		
    });
	url = "index.html";
	$(location).attr('href', url);
});


/****  ASOCIAR CANDADO A USUARIO  ****/

$('#GuardarUlock').click(function (e) {
	
	var rutCic = document.getElementById("txtRutSeleccionado").value;
	var cndUlock = document.getElementById("txtNumUlock").value;
	
	cndUlock = cndUlock.trim();
	
	valorCnd = parseInt(cndUlock)

      //Compruebo si es un valor numérico
      if (isNaN(valorCnd)) {
            swal({title:'Error',text:'El valor ingresado debe ser un número entero',type:'error'});
            return "";
      }
	
	
    e.preventDefault();
    $.ajax({
        type: 'GET',
        url: 'funciones.php',
        dataType: 'json',
        data: {"rutObtCndSet": rutCic, "numCndSet": valorCnd },
		success: function (response) 
		{
			swal({title:'Exito',text:'Candado Asociado correctamente',type:'success'});
			document.getElementById("txtNumUlock").value = "";
			buscarCandadosCiclista(rutCic);
		},
		
    });
});


//INSERTAR OBSERVACION
$('#GuardarObs').click(function (e) {
	
	var rutCic = document.getElementById("txtRutSeleccionado").value;
	var tipoObservacion = document.getElementById("cmbTipoObs_bsc").value;
	var descObservacion = document.getElementById("txtDescObs").value;
	
	

      if (descObservacion.trim() == "") {
            swal({title:'Error',text:'Favor, describir la observación ',type:'error'});
            return "";
      }
	
    e.preventDefault();
    $.ajax({
        type: 'GET',
        url: 'funciones.php',
        dataType: 'json',
        data: {"rutInsObs": rutCic, "tipoInsObs": tipoObservacion, "descInsObs": descObservacion },
		success: function (response) 
		{
			swal({title:'Exito',text:'Observación agregada correctamente',type:'success'});
			document.getElementById("txtDescObs").value = "";
			document.getElementById("cmbTipoObs_bsc").value = 1;
			buscarObsCiclista(rutCic);
		},
		
    });
});


 //AJAX AGREGAR BICICLETA
$('#GuardaBic').click(function (e) {
    document.getElementById("GuardaBic").disabled = true;
	
    var rutCic = document.getElementById("txtRutSeleccionado").value;
    var tagBic = document.getElementById("tagBic").value;
    var modeloBic = document.getElementById("modeloBic").value;
    var descBic = document.getElementById("descBic").value; 

	
	e.preventDefault();
        
    $.ajax({
        
        type: 'GET',
        url: 'funciones.php',
        data: {"rutCic": rutCic,
		"tagBic": tagBic,
		"modeloBic": modeloBic,
		"descBic": descBic },
        error: function (jqXHR, textStatus, errorThrown) {
            //alert("Error" + jqXHR + " *" + textStatus + " *" + errorThrown);
			swal({title:'Error',text:'No se pudo asociar la bicicleta al usuario',type:'error'});
                        document.getElementById("GuardaBic").disabled = false;
        },
        success: function (response) {
			swal({title:'Exito',text:'Bicicleta agregada correctamente',type:'success'});
                        document.getElementById("GuardaBic").disabled = false;
            //alert("Bicicleta agregada correctamente");

            document.getElementById("tagBic").value = "";
            document.getElementById("modeloBic").value = "";
            document.getElementById("descBic").value = "";

           // document.getElementById('id03').style.display = 'none';
        }
    });
});

//BUSCAR BICICLETAS POR CICLISTAS
function buscarBicicletas(rut)
{
	$("#tblBicCic").empty();
	  
	document.getElementById("tblBicCic").insertRow(-1).innerHTML = '<tr><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Bic Id</font></td>' +
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Cod Tag</font></td>' +
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Marca/Modelo</font></td>'+
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Descripción</font></td>';
			
	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"rutObtBic":rut},
    error: function (jqXHR, textStatus, errorThrown) {

    },
    success: function (response) {
	
    var len = response.length;
	
    for (var i = 0; i < len; i++) 
	{
	
        var BIC_ID = response[i].BIC_ID,
		NRO_TAG = response[i].BIC_NRO_TAG,
		MODELO = response[i].BIC_MODELO,
		DESCR = response[i].BIC_DESCRIPCION;
		document.getElementById("tblBicCic").insertRow(-1).innerHTML = 
		'<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + BIC_ID +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + NRO_TAG +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + MODELO +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + DESCR +
		'</font></td>';
                     
    }

    }
    });
	
}


//BUSCAR VISITAS POR CICLISTAS
function buscarVisitasCiclista(rut)
{
	$("#tblVisCic").empty();
	  
	document.getElementById("tblVisCic").insertRow(-1).innerHTML = '<tr><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">N° Visita</font></td>' +
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>'+
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Hora llegada</font></td>'+
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Hora Salida</font></td>';
			
	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"rutObtVis":rut},
    error: function (jqXHR, textStatus, errorThrown) {

    },
    success: function (response) {
	
    var len = response.length;
	
    for (var i = 0; i < len; i++) 
	{
	
        var hentrada = response[i].HORA_ENTRADA,
		hsalida = response[i].HORA_SALIDA,
		fecha = response[i].FECHA;
		document.getElementById("tblVisCic").insertRow(-1).innerHTML = 
		'<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + (i+1) +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + fecha +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + hentrada +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + hsalida +
		'</font></td>';
                     
    }

    }
    });
	
}

//BUSCAR CANDADOS POR CICLISTAS
function buscarCandadosCiclista(rut)
{
	$("#tblUlockAsig").empty();
	  
	document.getElementById("tblUlockAsig").insertRow(-1).innerHTML = '<tr><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>' +
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">U-Lock</font></td>';
			
	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"rutObtCnd":rut},
    error: function (jqXHR, textStatus, errorThrown) {

    },
    success: function (response) {
	
    var len = response.length;
	
    for (var i = 0; i < len; i++) 
	{
	
        var numCand = response[i].CND_NUMERO,
		fecha = response[i].CND_HORA;
		document.getElementById("tblUlockAsig").insertRow(-1).innerHTML = 
		'<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + fecha.toString("dd/MM/yyyy hh:mm:ss") +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + numCand +
		'</font></td>';
                     
    }

    }
    });
	
}


//BUSCAR OBSERVACIONES POR CICLISTAS
function buscarObsCiclista(rut)
{
	var cantLevel = 0;
	var cantGraves = 0;
	$("#tblObsCic").empty();
	  
	document.getElementById("tblObsCic").insertRow(-1).innerHTML = '<tr><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Cod. Observación</font></td>' +
												'<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>' +
												'<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Tipo</font></td>' +
                                                '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Observación</font></td>';




	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"rutObtObs":rut},
    error: function (jqXHR, textStatus, errorThrown) {

    },
    success: function (response) {
	
    var len = response.length;
	
	
	
    for (var i = 0; i < len; i++) 
	{
	
        var obs_id = response[i].OBS_ID,
		obsTipo = response[i].OBS_TIPO,
		obsHora = response[i].OBS_HORA,
		obsDesc = response[i].OBS_DESCRIPCION;
		document.getElementById("tblObsCic").insertRow(-1).innerHTML = 
		'<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + obs_id +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + obsHora +
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + (obsTipo == 1? "LEVE" : "GRAVE" ) +		
		'</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + obsDesc +
		'</font></td>';
		if(obsTipo == 1)
		{
			cantLevel = cantLevel + 1;
		}
		else
		{
			cantGraves = cantGraves + 1;
		}
                     
    }
	
	document.getElementById("txtCantLeves").value = "" +cantLevel;
	document.getElementById("txtCantGraves").value = "" + cantGraves;


    }
    });
	
}





function blurRutField(txt_rut) {
    if (txt_rut.value == "")
        return;
          
    var rut = txt_rut.value;   

    var invertido = formatoRut(rut);

    txt_rut.value = invertido;
}


function formatoRut(rut) {
    //Limpia rut
    var tmpstr = "";
    for (i = 0; i < rut.length; i++)
        if (rut.charAt(i) != ' ' && rut.charAt(i) != '.' && rut.charAt(i) != '-')
            tmpstr = tmpstr + rut.charAt(i);
    rut = tmpstr;
    var largo = rut.length;

    var invertido = "";
    for (i = (largo - 1), j = 0; i >= 0; i--, j++)
        invertido = invertido + rut.charAt(i);
    var drut = "";
    drut = drut + invertido.charAt(0);
    drut = drut + '-';
    cnt = 0;
    for (i = 1, j = 2; i < largo; i++, j++) {
        if (cnt == 3) {
            drut = drut + '.';
            j++;
            drut = drut + invertido.charAt(i);
            cnt = 1;
        }
        else {
            drut = drut + invertido.charAt(i);
            cnt++;
        }
    }
    invertido = "";
    for (i = (drut.length - 1), j = 0; i >= 0; i--, j++)
        invertido = invertido + drut.charAt(i);

    return invertido;
}


function C_Rut(args) {
    var rut = args.value;

    var tmpstr = "";
    for (i = 0; i < rut.length; i++)
        if (rut.charAt(i) != ' ' && rut.charAt(i) != '.' && rut.charAt(i) != '-')
            tmpstr = tmpstr + rut.charAt(i);
    rut = tmpstr;
    largo = rut.length;
       

    // [VARM+]
    tmpstr = "";
    for (i = 0; rut.charAt(i) == '0'; i++);
    for (; i < rut.length; i++)
        tmpstr = tmpstr + rut.charAt(i);
    rut = tmpstr;
    largo = rut.length;
    // [VARM-]
    if (largo < 2) {
        //alert("Debe ingresar el rut completo.");
        args.IsValid = false;
        return;
    }
    for (i = 0; i < largo; i++) {
        if (rut.charAt(i) != "0" && rut.charAt(i) != "1" && rut.charAt(i) != "2" && rut.charAt(i) != "3" && rut.charAt(i) != "4" && rut.charAt(i) != "5" && rut.charAt(i) != "6" && rut.charAt(i) != "7" && rut.charAt(i) != "8" && rut.charAt(i) != "9" && rut.charAt(i) != "k" && rut.charAt(i) != "K") {
            //alert("El valor ingresado no corresponde a un R.U.T valido.");
            args.IsValid = false;
            return;
        }
    }
        
    if (!checkDV2A(rut)) {
        args.IsValid = false;
        return;
    }
    return false;

    args.IsValid = true;
}


function checkearRut(rut)
{
//	var rut = document.querySelector("#txtRut_");
	var valido = checkDV2A(rut.value);
	if(valido ==false)
	{
		rut.value= "";
		swal({title:'Error',text:'El RUT es incorrecto',type:'error'});
		//alert("Rut no es correcto");
	}
	
}

function checkearRutCic(rut, tipoRevision)
{
	
	
	
//	var rut = document.querySelector("#txtRut_");
	var valido = checkDV2A(rut.value);
	if(valido ==false)
	{
		rut.value= "";
		swal({title:'Error',text:'El RUT es incorrecto',type:'error'});
		//alert("Rut no es correcto");
	}
	else
	{
		return UsuarioExiste(rut, tipoRevision);
	}
	
}

function UsuarioExiste(rut, tipoRevision)
{
	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"rutConsultaCic": rut.value},
    error: function (jqXHR, textStatus, errorThrown) {

    },
    success: function (response) {
		
		var nombre = response[0].RESP;
		
		if(nombre != "-1")
		{
			if(tipoRevision == 0)
			{
				alert("El usuario " + nombre + " ya se encuentra registrado");
				rut.value="";
				return false;
			}
			else
			{
				return true;
			}
			
		
		}
		else
		{
			if(tipoRevision == 1)
			{
				swal({title:'Error',text:'El usuario no se encuentra registrado',type:'error'});
				//alert("El usuario no se encuentra registrado");
				rut.value="";
				return false;
			}
			else
			{
				return true 
			}
		}

    }
    });
}


function checkDV2A(crut) {
	crut = crut.replace('.','');
	crut = crut.replace('.','');
	crut = crut.replace('.','');
	crut = crut.replace('-','');
	crut = crut.replace('-','');
	crut = crut.trim();
    largo = crut.length;
    if (largo < 2) {
        //alert("Debe ingresar el rut completo.");
        return false;
    }
    if (largo > 2)
        rut = crut.substring(0, largo - 1);
    else
        rut = crut.charAt(0);
    dv = crut.charAt(largo - 1);
    checkCDVA(dv);
    if (rut == null || dv == null)
        return 0;
    var dvr = '0';
    suma = 0;
    mul = 2;
    for (i = rut.length - 1; i >= 0; i--) {
        suma = suma + rut.charAt(i) * mul;
        if (mul == 7)
            mul = 2;
        else
            mul++;
    }
    res = suma % 11;
    if (res == 1)
        dvr = 'k';
    else if (res == 0)
        dvr = '0';
    else {
        dvi = 11 - res;
        dvr = dvi + "";
    }
    if (dvr != dv.toLowerCase()) {
		
        //alert("EL rut es incorrecto.");
        return false;
    }
    return true;
}
function checkCDVA(dvr) {
    dv = dvr + "";
    if (dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k' && dv != 'K') {
        //alert("Debe ingresar un digito verificador valido.");
        return false;
    }
    return true;
}


function UpdateRegistros() {

        }
		
		function InfoUsuario(rutSeleccionado)
		{
			document.getElementById("txtRutSeleccionado").value = rutSeleccionado;
			document.getElementById('id03').style.display = 'block';
			
			buscarBicicletas(rutSeleccionado);
			buscarVisitasCiclista(rutSeleccionado);
			buscarCandadosCiclista(rutSeleccionado);
			buscarObsCiclista(rutSeleccionado);
		}

        //AJAX BUSCAR USUARIO
        function mostrar(rutSeleccionado) {
            document.getElementById("txtRut_bsc").value = "";
            document.getElementById("txtNombre_bsc").value = "";
            document.getElementById("txtTelefono_bsc").value = "";
            document.getElementById("cmbSexo_bsc").value = "0";
            document.getElementById("txtEmail_bsc").value = "";
            document.getElementById("txtDireccion_bsc").value = "";
            document.getElementById("txtNroUV_bsc").value = "";
            document.getElementById("txtNroTarjeta_bsc").value = "";
            document.getElementById("cmbComuna_bsc").value = "";
            document.getElementById("bscFechaNacimiento").empty;


            var resume_table = document.getElementById("tblBusqueda");

            for (var i = 0, row; row = resume_table.rows[i]; i++) {


                if ((row.cells[0].innerText) == rutSeleccionado) {
                    document.getElementById("txtRut_bsc").value = row.cells[0].innerText;
                    document.getElementById("txtNombre_bsc").value = row.cells[1].innerText;
                    document.getElementById("txtTelefono_bsc").value = row.cells[2].innerText;
                    document.getElementById("cmbSexo_bsc").value = row.cells[3].innerText;
                    document.getElementById("txtEmail_bsc").value = row.cells[5].innerText;
                    document.getElementById("txtDireccion_bsc").value = row.cells[6].innerText;
                    document.getElementById("cmbComuna_bsc").value = row.cells[10].innerText;
                    document.getElementById("txtNroUV_bsc").value = row.cells[8].innerText;
                    document.getElementById("txtNroTarjeta_bsc").value = row.cells[9].innerText;
                    document.getElementById("bscFechaNacimiento").value = row.cells[11].innerText;
                    document.getElementById("cmbNacionalidad").value = row.cells[12].innerText;

                }

                //alert(cell[i].innerText);
                /*
                for (var j = 0, col; col = row.cells[j]; j++)
                {
                    //alert(col[j].innerText);
                    console.log(`Txt: ${col.innerText} \tFila: ${i} \t Celda: ${j}`);
                }
                */
            }


            //	alert(mensajito + "");
        }



        $(document).ready(function () {

            $("input").keydown(function (e) {
                // Capturamos qué telca ha sido
                var keyCode = e.which;
                // Si la tecla es el Intro/Enter
                if (keyCode == 13) {
                    // Evitamos que se ejecute eventos
                    event.preventDefault();
                    // Devolvemos falso
                    return false;
                }
            });




            $('#ActualizarCliente').click(function (e) {


                var rut_bsc = document.getElementById("txtRut_bsc").value;
                var nombre_bsc = document.getElementById("txtNombre_bsc").value;
                var telefono_bsc = document.getElementById("txtTelefono_bsc").value;
                var sexo_bsc = document.getElementById("cmbSexo_bsc").value;
                var email_bsc = document.getElementById("txtEmail_bsc").value;
                var direccion_bsc = document.getElementById("txtDireccion_bsc").value;
                var comuna_bsc = document.getElementById("cmbComuna_bsc").value;
                var numerouv_bsc = document.getElementById("txtNroUV_bsc").value;
                var nroTarjeta_bsc = document.getElementById("txtNroTarjeta_bsc").value;
                var fecNaci_bsc = document.getElementById("bscFechaNacimiento").value;
                var pais_bsc = document.getElementById("cmbNacionalidad").value;


                if(sexo_bsc == "0")
                {
                    swal({title:'Error',text:'Seleccione el sexo del ciclista',type:'error'});
                    return null;
                }
                else if(telefono_bsc.length < 12)
                {
                    swal({title:'Error',text:'Debe ingresar un telefono valido',type:'error'});
                    return false;
                }


                var fechaNacimiento = $("#bscFechaNacimiento").val();
                var fechaHoy = new Date().getTime();
                var aniosDiferencia = ((fechaHoy - fechaNacimiento) / (1000 * 60 * 60 * 24 * 365.25));

                if(aniosDiferencia < 7 || aniosDiferencia > 100)
                {
                    swal({title:'Error',text:'Por favor ingrese una fecha de nacimiento correcta',type:'error'});
                    return false;
                }


                






                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: {
                        "rutUpd": rut_bsc,
                        "nombreupd": nombre_bsc,
                        "telefonoupd": telefono_bsc,
                        "sexoupd": sexo_bsc,
                        "emailupd": email_bsc,
                        "direccionupd": direccion_bsc,
                        "comunaupd": comuna_bsc,
                        "numerouvupd": numerouv_bsc,
                        "nroTarjetaupd": nroTarjeta_bsc,
                        "fecnacupd": fecNaci_bsc,
                        "nacionalidadupd": pais_bsc
                        

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                
			//alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
			swal({title:'Error',text:'El registro no se insertó',type:'error'});
                    },
                    success: function (response) {
						swal({title:'Exito',text:'Usuario actualizado correctamente',type:'success'});
                        //alert("Usuario actualizado correctamente");
                        LimpiarformBuscar();
			// document.getElementById('id01').style.display = 'none';
                    }

                });


            });

            $('#fondoAvisoCorrecto').click(function () {


                $('#fondoAvisoCorrecto').css('display', 'none');


            });



            $('#form-bsc-user').submit(function (e) {

                $("#tblBusqueda").empty();

                document.getElementById("tblBusqueda").insertRow(-1).innerHTML = '<td class="tdClientes" > <font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">RUT</font></td >' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">NOMBRE</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">TELEFONO</font></td>' +
                    '<td style="display:none"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">SEXO</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">NACIONALIDAD</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">E-MAIL</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">DIRECCION</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">COMUNA</font></td>' +
                    '<td style="display:none"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">N° UNIDAD VECINAL</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">TARJETA</font></td>' +
                    '<td style="display:none">idcomuna</td>' +
                    '<td style="display:none">fecNac</td>';




                var rutBsc = $("#txtRut_bsc").val() == '' ? 'nul' : $("#txtRut_bsc").val();
                //var rutBsc = $("#txtRut_bsc").val();
                var nombreBsc = $("#txtNombre_bsc").val() == '' ? 'nul' : $("#txtNombre_bsc").val();
                var telefonoBsc = $("#txtTelefono_bsc").val() == '' ? 'nul' : $("#txtTelefono_bsc").val();
                var sexoBsc = 'nul';//$("#cmbSexo_bsc").val() == '' ? 'nul' : $("#cmbSexo_bsc").val();
                var fecNacBsc = 'nul';
                var nacionalidadBsc = 0; //$("#cmbNacionalidad").val() == '' ? '0' : $("#cmbNacionalidad").val();
                var emailBsc = $("#txtEmail_bsc").val() == '' ? 'nul' : $("#txtEmail_bsc").val();
                var direccionBsc = $("#txtDireccion_bsc").val() == '' ? 'nul' : $("#txtDireccion_bsc").val();
                var comunaBsc = 0; //$("#cmbComuna_bsc").val() == '' ? '0' : $("#cmbComuna_bsc").val();
                var nroUvBsc = $("#txtNroUV_bsc").val() == '' ? 'nul' : $("#txtNroUV_bsc").val();
                var nroTarjetaBsc = $("#txtNroTarjeta_bsc").val() == '' ? 'nul' : $("#txtNroTarjeta_bsc").val();


                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: {
                        "txtRutBsc": rutBsc,
                        "txtNombre_": nombreBsc,
                        "txtTelefono": telefonoBsc,
                        "cmbSexo": sexoBsc,
                        "txtFechaNacimiento": fecNacBsc,
                        "cmbNacionalidad": nacionalidadBsc,
                        "txtEmail": emailBsc,
                        "txtDireccion": direccionBsc,
                        "cmbComuna": comunaBsc,
                        "txtNroUV": nroUvBsc,
                        "txtNroTarjeta": nroTarjetaBsc
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
						swal({title:'Error',text:'No se logró realizar la busqueda',type:'error'});
                        //alert("Error");
                    },
                    success: function (response) {

                        var len = response.length;
                        for (var i = 0; i < len; i++) {

                            var RUT_E = response[i].CIC_RUT,
                                NOMBRE_E = response[i].CIC_NOMBRE,
                                TELEFONO_E = response[i].CIC_TELEFONO,
                                SEXO_E = response[i].CIC_SEXO,
                                NACIMIENTO_E = response[i].CIC_FECHA_NACIMIENTO,
                                NACIONALIDAD_E = response[i].NACIONALIDAD_E,
                                EMAIL_E = response[i].CIC_EMAIL,
                                DIRECCION_E = response[i].CIC_DIRECCION_VECINAL,
                                COM_ID = response[i].COM_ID,
                                COM_DESCRIPCION = response[i].COM_DESCRIPCION,
                                VECINAL_E = response[i].CIC_NRO_UNIDAD_VECINAL,
                                TARJETA_E = response[i].CIC_NRO_TARJETA;
                                ID_NACIONALIDAD = response[i].ID_NACIONALIDAD;

                            document.getElementById("tblBusqueda").insertRow(-1).innerHTML = '<td style="width:80px" class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + RUT_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + NOMBRE_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + TELEFONO_E +
                                '</font></td><td style="display:none"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + SEXO_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + NACIONALIDAD_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + EMAIL_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + DIRECCION_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + COM_DESCRIPCION +
                                '</font></td><td style="display:none"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + VECINAL_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + TARJETA_E +
                                '</font></td><td style="display:none" >' + COM_ID + '</td>' +
                                '<td style="display:none" >' + NACIMIENTO_E + '</td>' +
                                '<td style="display:none" >' + ID_NACIONALIDAD + '</td>' +

                                '<td class="tdClientes"><img style="width:20px; height:20px" onClick="mostrar(\'' + RUT_E + '\')" src="Img/editar.png" />Editar</td>'+
								'<td class="tdClientes"><img style="width:20px; height:20px" onClick="InfoUsuario(\'' + RUT_E + '\')" src="Img/buscar.png" />Info</td>';
                        }
                        //	alert(nombre + " " + fecNaci + " " + telefono + " ");
                        //  document.getElementById('id01').style.display = 'none';


                    }

                });
            });



            //AJAX NUEVO USUARIO CON BICICLETA
            $('#form-new-user_').submit(function (e) {

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: $(this).serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error: " + jqXHR + " +" + textStatus + " +" + errorThrown);
                    },
                    success: function (response) {
                        alert("Usuario creado correctamente");
                        //  document.getElementById('id01').style.display = 'none';

                        document.getElementById("txtRut_").value = "";
                        document.getElementById("txtNombre_").value = "";
                        document.getElementById("txtTelefono").value = "";
                        document.getElementById("cmbSexo").value = "HOMBRE";
                        document.getElementById("cmbNacionalidad").value = "400";
                        document.getElementById("txtEmail").value = "";
                        document.getElementById("txtDireccion").value = "";
                        document.getElementById("cmbComuna").value = "13101";
                        document.getElementById("txtNroUV").value = "";
                        document.getElementById("txtNroTarjeta").value = "";
                        document.getElementById("txtNroTag").value = "";
                        document.getElementById("txtModeloBici").value = "";
                        document.getElementById("subject").value = "";

                    }

                });
            });




            //AJAX NUEVO USUARIO SIN BICICLETA
            $('#form-new-user').submit(function (e) {


                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: $(this).serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error: " + jqXHR + " +" + textStatus + " +" + errorThrown);
                    },
                    success: function (response) {
                        alert("Usuario creado correctamente");

                        document.getElementById("txtRut_").value = "";
                        document.getElementById("txtNombre_").value = "";
                        document.getElementById("txtTelefono").value = "";
                        document.getElementById("cmbSexo").value = "HOMBRE";
                        document.getElementById("cmbNacionalidad").value = "400";
                        document.getElementById("txtEmail").value = "";
                        document.getElementById("txtDireccion").value = "";
                        document.getElementById("cmbComuna").value = "13101";
                        document.getElementById("txtNroUV").value = "";
                        document.getElementById("txtNroTarjeta").value = "";

                    }

                });
            });



            //OBTIENE TAG SCANEADO
            $('#scanerbic').click(function (e) {

                $('#lblEscBic').css('display', 'block');


                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScanner": "1",
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        //        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#tagBic').val(response[0].LECTURA + "");
                            $('#lblEscBic').css('display', 'none');
                        }
                        else {
							swal({title:'Error',text:'No se pudo leer el TAG escaneado, por favor inténtelo nuevamente',type:'error'});
                            //alert('No se pudo leer el TAG escaneado, por favor intentelo nuevamente');
                            $('#lblEscBic').css('display', 'none');
                        }

                    }

                });
            });



            //OBTIENE TAG SCANEADO
            $('#scanerusr').click(function (e) {
                $('#lblEscUsu').css('display', 'block');

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScanner": "1",
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#txtNroTag').val(response[0].LECTURA + "");
                            $('#lblEscUsu').css('display', 'none');
                        }
                        else {
							swal({title:'Error',text:'No se pudo leer el TAG escaneado, por favor intentelo nuevamente',type:'error'});
                            //alert('No se pudo leer el TAG escaneado, por favor intentelo nuevamente');
                            $('#lblEscUsu').css('display', 'none');
                        }

                    }

                });

            });



//OBTIENE CODIGO NFC EN REGISTRO
            $('#scanerusrRegNFC').click(function (e) {
                $('#lblEscUsuRegNFC').css('display', 'block');

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScannerNFC": 1,
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#txtNroTarjeta').val(response[0].LECTURA + "");
                            $('#lblEscUsuRegNFC').css('display', 'none');
                        }
                        else {
							swal({title:'Error',text:'No se pudo leer la tarjeta NFC, por favor intentelo nuevamente',type:'error'});
                            //alert('No se pudo leer la tarjeta NFC, por favor intentelo nuevamente');
                            $('#lblEscUsuRegNFC').css('display', 'none');
                        }
                    }
                });
            });
			
			
			//OBTIENE CODIGO NFC EN ACTUALIZACION
            $('#scanerusrNFC').click(function (e) {
                $('#lblEscUsuNFC').css('display', 'block');

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScannerNFC": 1,
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#txtNroTarjeta_bsc').val(response[0].LECTURA + "");
                            $('#lblEscUsuNFC').css('display', 'none');
                        }
                        else {
                            swal({title:'Error',text:'No se pudo leer la tarjeta NFC, por favor intentelo nuevamente',type:'error'});
                            $('#lblEscUsuNFC').css('display', 'none');
                        }
                    }
                });
            });




        });
