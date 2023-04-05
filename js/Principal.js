

document.getElementById('id01').style.display = 'none';
document.getElementById('id02').style.display = 'none';
document.getElementById('id03').style.display = 'none';
document.getElementById('fondoAvisoCorrecto').style.display = 'none';

document.getElementById("limpBuscar").addEventListener("click", function() {
LimpiarformBuscar();
});


function LimpiarformBuscar()
{
	
   document.getElementById("txtRut_bsc").value = "";
   document.getElementById("txtNombre_bsc").value = "";
   document.getElementById("txtTelefono_bsc").value = "";
   document.getElementById("cmbSexo_bsc").value = "";
   document.getElementById("txtEmail_bsc").value = "";
   document.getElementById("txtDireccion_bsc").value = "";
   document.getElementById("cmbComuna_bsc").value = 13101;
   document.getElementById("txtNroUV_bsc").value = "";
   document.getElementById("txtNroTarjeta_bsc").value = "";
   
   
}



  setInterval(function()
  { 
	
	var opcionTablaVisitas = ($('input:radio[name=rbCiclistas]:checked').val());
	console.log(opcionTablaVisitas);
	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"txtTablaVisitas":opcionTablaVisitas},
    error: function (jqXHR, textStatus, errorThrown) {

    },
    success: function (response) {
	
    var len = response.length;
	$("#tblEventos").empty();
	  
	  
	if(opcionTablaVisitas == "0")
	{		
		document.getElementById("tblEventos").insertRow(-1).innerHTML = '<td>N°</td><td>RUT</td><td>NOMBRE</td><td>HORA ENTRADA</td><td>HORA SALIDA</td>'
		for (var i = 0; i < len; i++) 
		{
		
			var RUT_CIC = response[i].CIC_RUT,
			NOMBRE = response[i].CIC_NOMBRE,
			ENTRADA = response[i].HORA_ENTRADA,
			SALIDA = response[i].HORA_SALIDA;
			document.getElementById("tblEventos").insertRow(-1).innerHTML = 
			'<td>' + (i+1) +
			'</td><td>' + RUT_CIC +
			'</td><td>' + NOMBRE.toUpperCase() +
			'</td><td>' + ENTRADA +
			'</td><td>' + (SALIDA == ENTRADA? '' : SALIDA) +
		//	'</td><td>' + (SALIDA == null? '' : SALIDA) + // PARA BICICLETAS
			'</td>';
						
		}
		
		
	}
	else if(opcionTablaVisitas == "1")
	{
		document.getElementById("tblEventos").insertRow(-1).innerHTML = '<td>N°</td><td>RUT</td><td>NOMBRE</td><td>U-LOCK</td><td>N° BICICLETA</td><td>HORA ENTRADA</td><td>HORA SALIDA</td>'
		for (var i = 0; i < len; i++) 
		{
		
			var RUT_CIC = response[i].CIC_RUT,
			NOMBRE = response[i].CIC_NOMBRE,
			CANDADO = response[i].CND_NUMERO,
			BICICLETA = response[i].BIC_ID,
			ENTRADA = response[i].HORA_ENTRADA,
			SALIDA = response[i].HORA_SALIDA;
			document.getElementById("tblEventos").insertRow(-1).innerHTML = 
			'<td>' + (i+1) +
			'</td><td><a href="EditarUsuario.php?rut='+ RUT_CIC +'"> ' + RUT_CIC + '</a>' +
			'</td><td>' + NOMBRE.toUpperCase() +
			'</td><td>' + (CANDADO == null? '' : '<div id="divNumeroCandado" name="divNumeroBicicleta" onClick="opcionCandado(' + CANDADO +', \''+ RUT_CIC +'\')">' + CANDADO + '</div>') +
			'</td><td>' + BICICLETA +
			'</td><td>' + (ENTRADA == null? '' : ENTRADA) +
			'</td><td>' + (SALIDA == null? '' : SALIDA) +
		//	'</td><td>' + (SALIDA == null? '' : SALIDA) + // PARA BICICLETAS
			'</td>';

						
		}
	}

    }
    });
	//alert("Hello"); 
  
  }, 5000);


function opcionCandado(idCandadoVinc, rutCicCnd)
{
	
swal({ 
 title: "U-LOCK", 
 text: "Desea desvincular el candado al usuario?", 
 type: "warning", 
 showCancelButton: true,
 confirmButtonColor: "#DD6B55", 
 confirmButtonText: "ACEPTAR",
 cancelButtonColor: "#DD6B55", 
 cancelButtonText: "CANCELAR", 
  
 closeOnConfirm: false }, 

 function(){
	DesvincularCandado(idCandadoVinc, rutCicCnd);
	swal("¡Hecho!", 
	"U-LOCK desviculado del usuario", 
	"success"); 
 });
	
}

function DesvincularCandado(idCandadoVinc, rutCiclistaCnd)
{
    $.ajax({
        type: 'GET',
        url: 'funciones.php',
        dataType: 'json',
        data: {"idCandVinc": idCandadoVinc, "rutCicCnd": rutCiclistaCnd },
		success: function (response) 
		{
			
		},
		
    });
}

function mensajeOk(mensaje)
{
	$("#textCuadroOk").empty();
    $("#textCuadroOk").append(mensaje);
	$('#fondoAvisoCorrecto').css('display', 'block');
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







 //AJAX AGREGAR BICICLETA
$('#form-add-bic').submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: 'GET',
        url: 'funciones.php',
        data: $(this).serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error" + jqXHR + " *" + textStatus + " *" + errorThrown);
        },
        success: function (response) {
            alert("Bicicleta agregada correctamente");


            document.getElementById("rutCic").value = "";
            document.getElementById("tagBic").value = "";
            document.getElementById("modeloBic").value = "";
            document.getElementById("descBic").value = "";

            document.getElementById('id03').style.display = 'none';
        }
    });
});







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
		swal({title:'Error',text:'RUT no es correcto',type:'error'});
	}
	
}

function checkearRutCic(rut, tipoRevision)
{
	
	
	
//	var rut = document.querySelector("#txtRut_");
	var valido = checkDV2A(rut.value);
	if(valido ==false)
	{
		rut.value= "";
		swal({title:'Error',text:'RUT no es correcto',type:'error'});
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
				//alert("El usuario " + nombre + " ya se encuentra registrado");
				swal({title:'Error',text:'El usuario ' + nombre + ' ya se encuentra registrado',type:'error'});
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

function buscarBicicletas(rut)
{
	$("#tblBicCic").empty();
	  
	document.getElementById("tblBicCic").insertRow(-1).innerHTML = '<tr><td>ID BIC</td><td>TAG NRO</td><td>MODELO BICICLETA</td><td>DESCRIPCION</td>';
	var res = checkearRutCic(rut, 1);
	
	
		var nroRut = rut.value;
		
		
	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"rutObtBic":nroRut},
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
		'<td>' + BIC_ID +
		'</td><td>' + NRO_TAG +
		'</td><td>' + MODELO +
		'</td><td>' + DESCR +
		'</td>';
                     
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

        //AJAX BUSCAR USUARIO
        function mostrar(rutSeleccionado) {
            document.getElementById("txtRut_bsc").value = "";
            document.getElementById("txtNombre_bsc").value = "";
            document.getElementById("txtTelefono_bsc").value = "";
            document.getElementById("cmbSexo_bsc").value = "";
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

                document.getElementById("ActualizarCliente").disabled = true;
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
                
			alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {
                        alert("Usuario actualizado correctamente");
                        LimpiarformBuscar();
			// document.getElementById('id01').style.display = 'none';
                        document.getElementById("ActualizarCliente").disabled = false;

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
                        alert("Error");
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
                                '<td class="tdClientes"><img style="width:20px; height:20px" onClick="mostrar(\'' + RUT_E + '\')" src="Img/editar.png" /></td>';
                        }
                        //	alert(nombre + " " + fecNaci + " " + telefono + " ");
                        //  document.getElementById('id01').style.display = 'none';


                    }

                });
            });



            //AJAX NUEVO USUARIO CON BICICLETA
            $('#form-new-user_').submit(function (e) {
              document.getElementById("botondeenvio").disabled=true;

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
              document.getElementById("botondeenvio").disabled=true;

                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: $(this).serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error: " + jqXHR + " +" + textStatus + " +" + errorThrown);
                    },
                    success: function (response) {
                        //alert("Usuario creado correctamente");
						swal({title:'Exito',text:'Usuario creado correctamente',type:'success'});

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
                            //alert('No se pudo leer el TAG escaneado, por favor intentelo nuevamente');
                            swal({title:'Error',text:'No se pudo leer el TAG escaneado, por favor intentelo nuevamente',type:'error'});
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
                            alert('No se pudo leer el TAG escaneado, por favor intentelo nuevamente');
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
                            alert('No se pudo leer la tarjeta NFC, por favor intentelo nuevamente');
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
                            alert('No se pudo leer la tarjeta NFC, por favor intentelo nuevamente');
                            $('#lblEscUsuNFC').css('display', 'none');
                        }
                    }
                });
            });




        });
