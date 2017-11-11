<?php session_start();set_time_limit(5000); //require_once("../phpGrid/conf.php"); ISO-8859-1 ?>
<HTML>
<HEAD><TITLE>listado</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<BODY>
<br>
<br>
<table width="98%" cellpadding="2" cellspacing="1" class="taulaA" border="1" align="center">
<tr><td>logo bolivia</td><td>logo mdryt</td><td>logo abt</td></tr>
<tr><td>&nbsp;</td><td>FORM. 001/2013</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>REGISTRO Y COMPROMISO DE PRODUCCION DE ALIMENTOS Y RESTITUCION DE BOSQUES</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>I. INFORMACION GENERAL</td><td>&nbsp;</td></tr>
<?php 
include "../Valid.php";
$buscar=trim(strtoupper($buscar));
$rs=pg_query($cn,"Select parcelas.idparcela,registro.idregistro FROM parcelas INNER JOIN registro ON parcelas.idparcela=registro.idparcela Where parcelas.idparcela='$idp'");
$res=pg_fetch_array($rs);
$idp=$res[0];$idreg=$res[1];
// ********************************** Seccion 1 ********************************
echo "<tr><td>1. UBICACION GEOGRAFICA</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>Departamento</td><td>Provincia</td><td>Municipio</td></tr>";
$rs=pg_query($cn,"Select nombrepolitico,nommunicipio FROM politico INNER JOIN parcelas ON parcelas.idpolitico=politico.idpolitico Where idparcela='$idp'");
$res=pg_fetch_array($rs);
echo "<tr><td>Departamento</td><td>".$res[0]."</td><td>".$res[1]."</td></tr>";
// ********************************** Seccion 2 ********************************
echo "<tr><td>2. BENEFICIARIOS</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>Nombre</td><td>Tipo Juridico</td><td>Municipio</td></tr>";
$rs_docs=pg_query($cn,"Select * FROM persona INNER JOIN parcelabeneficiario ON persona.idpersona=parcelabeneficiario.idpersona WHERE idparcela='$idp'");
while ($res_docs=pg_fetch_array($rs_docs))
	{echo "<tr><td>".$res_docs["nombre1"]." ".$res_docs["nombre2"]." ".$res_docs["apellidopat"]." ".$res_docs["apellidomat"]."</td></tr>";}
// ********************************** Seccion 3 ********************************
echo "<tr><td>3. REPRESENTANTE LEGAL</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>Nombre</td><td>Direccion</td><td>Telefono</td><td>E-mail</td><td>Notificacion</td><td>Nro Poder</td></tr>";
$rs=pg_query($cn,"Select (nombre1 || ' ' || apellidopat || ' ' || apellidomat) AS rep_legal,direcciondom,telefono,email,direccionnotificacion,numdocpoder FROM parcelas INNER JOIN registro ON parcelas.idparcela=registro.idparcela LEFT JOIN representante ON parcelas.idparcela=representante.idparcela LEFT JOIN persona ON persona.idpersona=representante.idpersona Where parcelas.idparcela='$idp'");
$res=pg_fetch_array($rs);
echo "<td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td><td>".$res[4]."</td><td>".$res[5]."</td>";
// ********************************** Seccion 4 ********************************
echo "<tr><td>4. DATOS DEL PREDIO</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
echo "<tr><td>Nombre</td><td>Direccion</td><td>Telefono</td><td>E-mail</td><td>Notificacion</td><td>Nro Poder</td></tr>";
$rs=pg_query($cn,"Select parcelas.idparcela,superficie,nombre,nombrecodificador as TipoPropiedad,fecharegistro,registro.idregistro FROM parcelas INNER JOIN codificadores ON parcelas.idtipoprop=codificadores.idcodificadores INNER JOIN registro ON parcelas.idparcela=registro.idparcela Where parcelas.idparcela='$idp'");
$res=pg_fetch_array($rs);
echo "<tr>";
$tam=pg_num_fields($rs)-1;
for ($c=0;$c<$tam;$c++)
 	{echo "<td>".$res[$c]."</td>";}
// *****************
echo "<tr><td>4.1 CAUSALES DE RECHAZO</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
$rs_docs=pg_query($cn,"Select * FROM causalesrechazo INNER JOIN codificadores ON codificadores.idcodificadores=causalesrechazo.idrechazo WHERE idregistro='$idreg'");
while ($res_docs=pg_fetch_array($rs_docs))
	{echo "<tr><td>".$res_docs["nombrecodificador"]."</td></tr>";}
// ********************************** Seccion 5 ********************************
echo "<tr><td>Documentos Presentados</td></tr>";
echo "<tr><td><ul>";
$rs_docs=pg_query($cn,"Select * FROM docpresentados INNER JOIN codificadores ON codificadores.idcodificadores=docpresentados.idtipodedocumento WHERE idparcela='$idp'");
while ($res_docs=pg_fetch_array($rs_docs))
	{echo "<li> ".$res_docs["nombrecodificador"];}
echo "</ul></td></tr>";
// ********************************** Seccion 6 ********************************

// ********************************** Seccion 7 ********************************
echo "<tr><td>Actividad</td><td>Situacion Juridica</td><td>Asesoramiento</td></tr>";	
$rs_1=pg_query($cn,"Select * FROM parcelas INNER JOIN codificadores ON codificadores.idcodificadores=parcelas.idclasificacion WHERE idparcela='$idp'");
$res_1=pg_fetch_array($rs_1);
echo "<tr><td>".$res_1["nombrecodificador"]."</td>";
$rs_1=pg_query($cn,"Select * FROM parcelas INNER JOIN codificadores ON codificadores.idcodificadores=parcelas.idsituacionjuridica WHERE idparcela='$idp'");
$res_1=pg_fetch_array($rs_1);
echo "<td>".$res_1["nombrecodificador"]."</td>";
$rs_1=pg_query($cn,"Select * FROM parcelas INNER JOIN codificadores ON codificadores.idcodificadores=parcelas.idasesoramiento WHERE idparcela='$idp'");
$res_1=pg_fetch_array($rs_1);
echo "<td>".$res_1["nombrecodificador"]."</td></tr>";

// ********************************** Seccion 8 Nueva ********************************
echo "<tr><td colspan='3'>11. Responsables Registro</td></tr>";
$rs_docs=pg_query($cn,"Select * FROM persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN funcionarioregistro ON funcionarioregistro.idfuncionario=funcionario.idfuncionario WHERE idregistro='$idreg'");
while ($res_docs=pg_fetch_array($rs_docs))
	{echo "<tr><td>".$res_docs["nombre1"]." ".$res_docs["nombre2"]." ".$res_docs["apellidopat"]." ".$res_docs["apellidomat"]."</td></tr>";}
?>
</table>
</BODY>
