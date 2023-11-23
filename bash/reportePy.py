# -*- coding: utf-8 -*-
#!/usr/bin/python
#server.set_debuglevel(1)

import smtplib
from email.mime.text import MIMEText
import mysql.connector
import sys




prm_fecha = sys.argv[1]
print (prm_fecha)

mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        password="Fr4nc1sc0*1+Ñw",
        database="bd_sb_sube",
        auth_plugin="mysql_native_password")


mydb.set_charset_collation('utf8mb4', 'utf8mb4_general_ci')

mycursor = mydb.cursor()


textoMensaje = ""

ciclistasHoy = "SELECT COUNT(DISTINCT(CIC_RUT)) FROM TB_MOV_MOVIMIENTO WHERE MOV_HORA between '"+ prm_fecha +"' and ADDDATE('" + prm_fecha  +"', interval 1 day)"


nuevosRegistros = "SELECT COUNT(*) as 'cantidad' FROM TB_CIC_CICLISTA WHERE CAST(CIC_FECHA_INSCRIPCION AS DATE) = '" + prm_fecha +"'"
totalRegistros = "SELECT COUNT(*) as 'cantidad' FROM TB_CIC_CICLISTA"
totalMujeres = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS MUJERES FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_SEXO = 'MUJER' AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"
totalHombres = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'HOMBRES' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_SEXO = 'HOMBRE' AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"
totalExtranjeros = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'EXTRANJEROS' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE PA_ID <> 400 AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"

usuSetenta = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '50 Y 59' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE('" + prm_fecha +"', INTERVAL -80 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE('" + prm_fecha +"', INTERVAL -70 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"


usuSesenta = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '50 Y 59' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE('" + prm_fecha +"', INTERVAL -70 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE('" + prm_fecha +"', INTERVAL -60 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"



usuCincuenta = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '50 Y 59' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE('" + prm_fecha +"', INTERVAL -60 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE('" + prm_fecha +"', INTERVAL -50 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"



usuaCincuenta = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'MAS 50' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC_FECHA_NACIMIENTO <= ADDDATE('"+ prm_fecha  +"', INTERVAL -50 YEAR) AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"
usuCuarenta = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '40 Y 49' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE('" + prm_fecha +"', INTERVAL -50 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE('" + prm_fecha +"', INTERVAL -40 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"
usuTreinta = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '30 Y 39' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE('" + prm_fecha +"', INTERVAL -40 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE('" + prm_fecha +"', INTERVAL -30 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"
usuVeinte = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '20 Y 29' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE(CURDATE(), INTERVAL -30 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE(CURDATE(), INTERVAL -20 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha + "'"
usuDiez = "SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'MENOS 20' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE('" + prm_fecha +"', INTERVAL -20 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE('" + prm_fecha +"', INTERVAL -10 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = '" + prm_fecha +"'"

registroNovedades = "SELECT LIB.LIB_DESCRIPCION, LIB.LIB_HORA, OPR.OPR_NOMBRE FROM TB_LIB_LIBRO_NOVEDADES LIB INNER JOIN TB_OPR_OPERADOR OPR ON OPR.OPR_ID = LIB.OPR_ID WHERE  CAST(LIB_HORA AS DATE) = '" + prm_fecha + "'"
observacionesCiclistas = "SELECT OBS_ID, CIC.CIC_RUT, CIC.CIC_NOMBRE,(SELECT COUNT(*) FROM TB_OBS_OBSERVACIONES_CICLISTA OBS2 WHERE OBS2.CIC_RUT = CIC.CIC_RUT) AS 'CANTIDAD OBSERVACIONES', CASE WHEN OBS_TIPO = 1 THEN 'LEVE' WHEN OBS_TIPO = 2 THEN 'MEDIO' ELSE 'GRAVE' END AS TIPO, OBS_HORA, OBS_DESCRIPCION FROM TB_OBS_OBSERVACIONES_CICLISTA OBS INNER JOIN TB_CIC_CICLISTA CIC ON OBS.CIC_RUT = CIC.CIC_RUT WHERE CAST(OBS_HORA AS DATE) = '" + prm_fecha +"'"


sql = "SELECT * FROM TB_CIC_CICLISTA limit 10"



mycursor.execute(nuevosRegistros)
myresult = mycursor.fetchall()
cantRegistradosHoy =""

for x in myresult:
        cantRegistradosHoy += str(x[0])


mycursor.execute(totalRegistros)
myresult = mycursor.fetchall()
totalCiclistas = ""

for x in myresult:
        totalCiclistas += str(x[0])


mycursor.execute(ciclistasHoy)
myresult = mycursor.fetchall()
totalCiclistasHoy = ""

for x in myresult:
	totalCiclistasHoy += str(x[0])



mycursor.execute(totalMujeres)
myresult = mycursor.fetchall()
totalMujeres = ""

for x in myresult:
        totalMujeres += str(x[0])



mycursor.execute(totalHombres)
myresult = mycursor.fetchall()
totalHombres = ""

for x in myresult:
        totalHombres += str(x[0])





mycursor.execute(totalExtranjeros)
myresult = mycursor.fetchall()
cantidadExtranjeros = ""

for x in myresult:
        cantidadExtranjeros += str(x[0])


mycursor.execute(usuSetenta)
myresult = mycursor.fetchall()
cantidadSetentas = ""

for x in myresult:
        cantidadSetentas +=  str(x[0])





mycursor.execute(usuSesenta)
myresult = mycursor.fetchall()
cantidadSesentas = ""

for x in myresult:
        cantidadSesentas +=  str(x[0])




mycursor.execute(usuCincuenta)
myresult = mycursor.fetchall()
cantidadCincuenta = ""

for x in myresult:
        cantidadCincuenta += str(x[0])




mycursor.execute(usuCuarenta)
myresult = mycursor.fetchall()
cantidadCuarenta = ""

for x in myresult:
        cantidadCuarenta += str(x[0])





mycursor.execute(usuTreinta)
myresult = mycursor.fetchall()
cantidadTreinta = ""

for x in myresult:
        cantidadTreinta +=  str(x[0])







mycursor.execute(usuVeinte)
myresult = mycursor.fetchall()
cantidadVeinte = ""

for x in myresult:
        cantidadVeinte += str(x[0])
	





mycursor.execute(usuDiez)
myresult = mycursor.fetchall()
cantidadDiez = ""

for x in myresult:
        cantidadDiez +=  str(x[0])






mycursor.execute(registroNovedades)
myresult = mycursor.fetchall()


tablaNovedades = "<center><table style='width:80%; border-collapse: collapse; border: 1px solid black; '><tr><td style='border: 1px solid black;'><center><b>OPERADOR</b></center></td><td style='border: 1px solid black;'><center><b>HORA</b></center></td><td style='border: 1px solid black;'><center><b>DESCRIPCION</b></center></td></tr>"

for x in myresult:
	tablaNovedades = tablaNovedades + "<tr>"
	tablaNovedades = tablaNovedades + "<td style='border: 1px solid black;'>"+str(x[2])+"</td><td style='border: 1px solid black;'>"+str(x[1]).replace(prm_fecha,"")+"</td><td style='border: 1px solid black;'>"+str(x[0])+"</td>"
	tablaNovedades = tablaNovedades + "</tr>"


tablaNovedades = tablaNovedades + "</table></center>"


mycursor.execute(observacionesCiclistas)
myresult = mycursor.fetchall()


tablaAnotaciones = "<center><table style='width:80%; border-collapse: collapse; border: 1px solid black; '><tr><td style='border: 1px solid black;'><center><b>RUT CICLISTA</b></center></td><td style='border: 1px solid black;'><center><b>NOMBRE</b></center></td><td style='border: 1px solid black;'><center><b>TOTAL OBS.</b></center></td><td style='border: 1px solid black;'><center><b>TIPO</b></center></td><td style='border: 1px solid black;'><center><b>HORA</b></center></td><td style='border: 1px solid black;'><center><b>DESCRIPCION</b></center></td></tr>"

for x in myresult:
	tablaAnotaciones = tablaAnotaciones + "<tr>"
	tablaAnotaciones = tablaAnotaciones + "<td style='border: 1px solid black;'>"+str(x[1])+"</td><td style='border: 1px solid black;'>"+str(x[2])+"</td><td style='border: 1px solid black;'>"+str(x[3])+"</td><td style='border: 1px solid black;'>"+str(x[4])+"</td><td style='border: 1px solid black;'>"+str(x[5]).replace(prm_fecha,"")+"</td><td style='border: 1px solid black;'>"+(x[6])+"</td>"
	tablaAnotaciones = tablaAnotaciones + "</tr>"



tablaAnotaciones = tablaAnotaciones + "</table></center>"





tablaDetalleGeneral = "<table>"
tablaDetalleGeneral += "<tr><td><b>Total de ciclistas hoy en SUBE</b></td>"
tablaDetalleGeneral += "<td>:"+ totalCiclistasHoy  +"</td></tr>"
tablaDetalleGeneral += "<tr><td><b>Nuevos ciclistas registrados hoy</b></td>"
tablaDetalleGeneral += "<td>:"+ cantRegistradosHoy  +"</td></tr>"
tablaDetalleGeneral += "<tr><td><b>Total de ciclistas registrados</b></td>"
tablaDetalleGeneral += "<td>:"+ totalCiclistas  +"</td>"
tablaDetalleGeneral += "</tr>"
tablaDetalleGeneral += "</table>"


tablaDetalleHoy = "<table>"
tablaDetalleHoy += "<tr><td><b>Mujeres</b></td><td>:" + totalMujeres + "</td></tr>"
tablaDetalleHoy += "<tr><td><b>Hombres</b></td><td>:" + totalHombres  + "</td></tr>"
tablaDetalleHoy += "<tr><td><b>Extranjeros</b></td><td>:"+ cantidadExtranjeros  +"</td></tr>"
tablaDetalleHoy += "<tr><td><b>Entre 70 y 80 años</b></td><td>:"+ cantidadSetentas  +"</td></tr>"
tablaDetalleHoy += "<tr><td><b>Entre 60 y 69 años</b></td><td>:"+ cantidadSesentas  +"</td></tr>"
tablaDetalleHoy += "<tr><td><b>Entre 50 y 59 años</b></td><td>:"+ cantidadCincuenta  +"</td></tr>"
tablaDetalleHoy += "<tr><td><b>Entre 40 y 49 años</b></td><td>:"+ cantidadCuarenta  +"</td></tr>"
tablaDetalleHoy += "<tr><td><b>Entre 30 y 39 años</b></td><td>:"+ cantidadTreinta  +"</td></tr>"
tablaDetalleHoy += "<tr><td><b>Entre 20 y 29 años</b></td><td>:"+ cantidadVeinte  +"</td></tr>"
tablaDetalleHoy += "<tr><td><b>Menores de 20 años</b></td><td>:"+ cantidadDiez  +"</td></tr>"
tablaDetalleHoy += "</table>"

asunto = "Reporte diario -SUBE-" + prm_fecha

mensajito = " <h1>Estimado(a) </h1>  <h2>a continuaci&oacute;n el reporte diario <b><i>SUBE</i></b></h2></br>" +str(tablaDetalleGeneral)  + "<hr/> <h4>Detalle Ingresos hoy </h4> " + str(tablaDetalleHoy) + "  <br/>  <center><h2>Novedades del d&iacute;a</h2></center>" + (tablaNovedades)+ "<br/>" + (tablaAnotaciones) + "<br/>  <img src='https://www.fomentolaflorida.cl/app/images/Logo-SUBE.png'  style='width:150px; height:105px'/>   </br></br><p>Por favor no responda a este correo, ya que se envia desde un proceso automatizado usando una cuenta no monitoreada.</p>"


servidor_smtp = 'smtp.office365.com'
puerto_smtp = 25
correo_emisor = 'sube.bellavista.lf@hotmail.com'
contrasena_emisor = '$op0rTe_sube'

conexion_smtp = smtplib.SMTP(servidor_smtp, puerto_smtp)
conexion_smtp.starttls()
conexion_smtp.login(correo_emisor, contrasena_emisor)


mensaje = MIMEText(mensajito, 'html', 'utf-8')
mensaje['From'] = 'SUBE BELLAVISTA LA FLORIDA <sube.bellavista.lf@hotmail.com>'
mensaje['Bcc'] = 'fjmoragase@gmail.com, jose_lavadoss@hotmail.com, sube1@fomentolaflorida.cl, abenavente@laflorida.cl, falfaro@laflorida.cl, fco.moraga.s90@gmail.com'
mensaje['Subject'] = asunto
mensaje.set_payload(mensajito.encode('utf-8'))

conexion_smtp.sendmail(correo_emisor, ['fjmoragase@gmail.com','jose_lavadoss@hotmail.com','sube1@fomentolaflorida.cl','abenavente@laflorida.cl','falfaro@laflorida.cl','fco.moraga.s90@gmail.com'], mensaje.as_string())


conexion_smtp.quit()







