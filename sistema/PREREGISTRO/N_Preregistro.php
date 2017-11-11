<?php
 session_start();

//print_r($_SESSION);

if(isset($_GET['nuevo'])){
  include "../Registro/destroy_predio.php";
  $_SESSION['habilitar']=0;
}
include "../cabecera.php";
include "page_preregistro.php";

?>
<HTML>
<HEAD><TITLE>UCAB - PPARB</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js"></script>
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
 <script src="../libraries/jquery-1.10.3/jquery-1.10.2.min.js"></script>
<script src="../libraries/jquery-1.10.3/jquery-1.10.3.ui.min.js"></script>

<script language="JavaScript">
function lanzarSubmenu(campo)
	{window.open("../registro/personas.php?c=" + campo + "","Elegir Beneficiario O Representante Legal","width=550,height=500,scrollbars=yes,toolbar=no,status=no");}

    $(function() {
        $("#fecharec").datepicker({
            changeMonth: true,
            changeYear: true,
            /*  minDate: 0,*/
            maxDate: "+5y +1M +10D",
            dateFormat: "yy-mm-dd"
        });

    });
</script>


<style type="text/css">
#principal
	{ 	position:relative;
		margin:10px auto;
	}
#derecha
	{   position:relative;
		color:#FFFFFF;
		z-index:200;
		top:300;
		width:250;
		background-color:#000000;
	}
</style>

</HEAD>
<?php
include_once('../scripts/body_handler.inc.php');
?>

<BODY>

<div align="center">

  <?php
  if  (isset($_SESSION['idprereg']) && $_SESSION['idprereg']!="")
  {
  ?>
      <div align="center" class="texto">
          <b><big>EDITAR CARPETA DE PREREGISTRO</big></b>
      </div>
  <?php
} else {
  ?>
        <div align="center" class="texto">
            <b><big>NUEVA CARPETA DE PREREGISTRO</big></b>
        </div>
  <?php
    }
  ?>


<form action="N_Preregistro.php" method="POST" name="formulario" enctype="multipart/form-data" autocomplete="off" onSubmit="return valida(this);">


<table width="90%" border="0" class='taulaA' align="center" cellspacing="0">

		<tr >
			  <td height="14" colspan="4" id='blau'><span class="taulaH">1. Datos Generales del Predio</span></td>
		</tr>
		<tr><td colspan="4"><hr></td></tr>
		<tr >
				<td id='blau'>
						<table width="100%" cellspacing="0"   border="0">
								<tr class="taulaA">
										<td width="28%" height="23" align="right" id='blau3'>Número de Preregistro:</td>
							  		<td width="60%" id='blau'><input name="Codigo" type="text" class="boxRojo"  id="Codigo"
                       value="<?php if(isset($_SESSION['idprereg']) && $_SESSION['idprereg']!="") {echo $_SESSION['idprereg'];}else{echo "";}?> " maxlength="50" readonly>
                     </td>
                </tr>

                                                        <tr class="taulaA">
								  <td align="right" id='blau3'>Codigo Preregistro Regional:</td>
								  <td colspan="3"  align="left" id='blau3'><input   name="codPreregistroRegional"  type="text" class="boxBusqueda" id="codPreregistroRegional" value="<?php echo isset($_SESSION['datos_prediopre']['codPreregistroRegional']) ? htmlspecialchars($_SESSION['datos_prediopre']['codPreregistroRegional']) : "" ?>"></td>
							</tr>
								<tr class="taulaA">
										<td width="28%" height="23" align="right" id='blau3'>Municipio:</td>
										<td colspan="3"  align="left" id='blau3'>
													<select name="Departamento" class="combos"  id="Departamento" <?php if((isset($_SESSION['cod_parcela']) && $_SESSION['cod_parcela'] != "")){ echo 'disabled';} ?> >
														<option value=0>ELEGIR ...</option>
															<?php
															$sql_politico ="Select * From \"v_politico\" Order by \"comp\"";
															$politico = pg_query($cn,$sql_politico) ;
															$row_politico = pg_fetch_array ($politico);

															do {   ?>
															<option value="<?php echo $row_politico['cod']?>"
																<?php  if(isset($_SESSION['datos_prediopre']['Departamento']) &&$_SESSION['datos_prediopre']['Departamento']== $row_politico['cod']){
																			echo " selected";
															}elseif(isset($_SESSION['Departamento']) &&$_SESSION['Departamento']== $row_politico['cod']){
																			echo " selected";
															}elseif(isset($row_predio['municipio']) && $row_predio['municipio']== $row_politico['cod']){	echo " selected"; $Departamento=$row_predio['municipio'];   $_SESSION['Departamento']=$Departamento;} ?>
																 > <?php echo $row_politico['comp']?></option>
															<?php } while ($row_politico = pg_fetch_assoc($politico));	?>
													</select>
													<input type="hidden" name="estado" id="estado" value="">
										</td>
								</tr>

								<tr class="taulaA">
								  <td align="right" id='blau3'>Nombre del Predio:</td>
								  <td colspan="3"  align="left" id='blau3'><input required="required" name="NombrePredio"  type="text" class="boxBusqueda" id="NombrePredio" value="<?php echo isset($_SESSION['datos_prediopre']['NombrePredio']) ? htmlspecialchars($_SESSION['datos_prediopre']['NombrePredio']) : "" ?>"></td>
								</tr>

								<tr class="taulaA">
									<td align="right" id='blau3'>Sup. Total del Predio (ha):</td>
									<td colspan="3"  align="left" id='blau3'><input required="required" name="Superficie" type="text" class="boxBusqueda2" id="Superficie"   maxlength="10" value="<?php echo isset($_SESSION['datos_prediopre']['Superficie']) ? htmlspecialchars($_SESSION['datos_prediopre']['Superficie']) : "" ?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" ></td>
								</tr>

								<tr class="taulaA">
									<td align="right" id='blau3'>Sup. Deforestada Ilegal (ha):</td>
									<td colspan="3"  align="left" id='blau3'><input name="Superficiedef" type="text" class="boxBusqueda2" id="Superficiedef"   maxlength="10" value="<?php echo isset($_SESSION['datos_prediopre']['Superficiedef']) ? htmlspecialchars($_SESSION['datos_prediopre']['Superficiedef']) : ""?>" onKeyUp="extractNumber(this,4,false);" onKeyPress="return blockNonNumbers(this, event, true, false);" ></td>
								</tr>

								<tr class="taulaA" id='blau3'>
										<td align="right" id='blau3'>Tipo de Propiedad :</td>
										<td width="17%"  align="left" id='blau3'><select name="TipoPredio" class="combos" id="TipoPredio" onChange="<?php echo 'HabilitarComunidad(this)'; ?>">
										<option value=0>ELEGIR ...</option>
										<?php
												$sql_clasificador ="Select * From codificadores Where idclasificador=1 Order by nombrecodificador";
												$clasificador = pg_query($cn,$sql_clasificador) ;
												$row_clasificador = pg_fetch_array ($clasificador);

												do {   ?>
													<option value="<?php echo $row_clasificador['idcodificadores']?>"
														<?php  if(isset($_SESSION['datos_prediopre']['TipoPredio']) && $_SESSION['datos_prediopre']['TipoPredio']== $row_clasificador['idcodificadores']){
																	echo " selected";
													}elseif(isset($row_predio['tipopropiedad']) && $row_predio['tipopropiedad']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
														 > <?php echo $row_clasificador['nombrecodificador']?></option>
													<?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
												</select>
									 </td>
								</tr>

								<tr class="taulaA"  id='blau3'>
												<td align="right" id='blau3'>Actividad del Predio :</td>
												<td align="left" id='blau3'><select name="Actividad" class="combos" id="Actividad">
													<option value=0>ELEGIR ...</option>
													<?php
												$sql_clasificador ="Select * From codificadores Where idclasificador=8 Order by nombrecodificador";
												$clasificador = pg_query($cn,$sql_clasificador) ;
												$row_clasificador = pg_fetch_array ($clasificador);
												$Actividad=0;
												 do { ?>
													<option value="<?php echo $row_clasificador['idcodificadores']?>"
														<?php  if(isset($_SESSION['datos_prediopre']['Actividad']) && $_SESSION['datos_prediopre']['Actividad']== $row_clasificador['idcodificadores']){ $Actividad=$row_clasificador['nombrecodificador']; echo " selected";
													}elseif(isset($row_predio['clasificacion']) && $row_predio['clasificacion']== $row_clasificador['idcodificadores']){ $Actividad=$row_clasificador['nombrecodificador'];	echo " selected";} ?>
														 > <?php echo $row_clasificador['nombrecodificador']?></option>
													<?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	$_SESSION['Actividad']=$Actividad;?>
												</select></td>
								</tr>

								<tr class="taulaA"  id='blau3'>
										<td align="right" id="blau3">Asesoramiento :</td>
										<td align="left" id="blau3"><select name="Asesoramiento" class="combos" id="Asesoramiento">
											<option value=0>ELEGIR ...</option>
											<?php
													$sql_clasificador ="Select * From codificadores Where idclasificador=16 Order by nombrecodificador";
													$clasificador = pg_query($cn,$sql_clasificador) ;
													$row_clasificador = pg_fetch_array ($clasificador);

													do {   ?>
														<option value="<?php echo $row_clasificador['idcodificadores']?>"
															<?php  if(isset($_SESSION['datos_prediopre']['Asesoramiento']) && $_SESSION['datos_prediopre']['Asesoramiento']== $row_clasificador['idcodificadores']){
																		echo " selected";
														}elseif(isset($row_predio['asesoramiento']) && $row_predio['asesoramiento']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
															 > <?php echo $row_clasificador['nombrecodificador']?></option>
														<?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
													</select>
											</td>
								</tr>

								<tr class="taulaA"  id='blau3'>
										<td align="right" id="blau3">Fecha de Recepcion:</td>
										<td colspan="3"  align="left" id='blau3'>
												<input id="fecharec" name="fecharec" type="text"
                        <?php
                        if(isset($_SESSION['idprereg']) && $_SESSION['idprereg']!="")
                        {
                         ?>
                         readonly
                         <?php
                       }
                         ?>
												required="required" placeholder="" autofocus="" title=""
												value="<?php echo isset($_SESSION['datos_prediopre']['fecharec']) ? htmlspecialchars($_SESSION['datos_prediopre']['fecharec']) : "";?>"/>

										</td>
								</tr>
						</table>
				</td>
		</tr>

		<tr><td colspan="4"><hr></td></tr>

		<tr >
				<td height="14" colspan="4" id='blau'><span class="taulaH">2. Datos del Representante Legal y/o Propietario</span></td>
		</tr>
		<tr><td colspan="4"><hr></td></tr>


    <?php
    if ($sistema == 1) // ANTIGUO SISTEMA
    {
    ?>
		<tr >
			<td id='blau'>
					<table width="100%" cellspacing="0"   border="0">
							<tr class="taulaA">
							<td width="15%" align="right" id='blau'>Nombres y Apellidos :</td>
							<td width="37%"><input required="required" name="nombeneficiario" type="text" class="boxBusqueda" id="nombeneficiario" value="<?php echo isset($_SESSION['datos_prediopre']['nombeneficiario']) ? htmlspecialchars($_SESSION['datos_prediopre']['nombeneficiario']) : trim($row_representanteant['nombreapellido']) ?>" ></td>
							</tr>

							<tr class="taulaA">
							<td width="15%" align="right" id='blau'>Tipo de Documento:</td>
							<td width="37%"><input name="tipodoc" type="text" class="boxBusqueda" id="tipodoc" value="<?php echo isset($_SESSION['datos_prediopre']['tipodoc']) ? htmlspecialchars($_SESSION['datos_prediopre']['tipodoc']) : trim($row_representanteant['tipodedocumento']) ?>" ></td>
              </tr>




							<tr class="taulaA">
							<td width="15%" align="right" id='blau'>Número de Documento:</td>
							<td width="37%"><input required="required" name="numdoc" type="text" class="boxBusqueda" id="numdoc" value="<?php echo isset($_SESSION['datos_prediopre']['numdoc']) ? htmlspecialchars($_SESSION['datos_prediopre']['numdoc']) : trim($row_representanteant['numerodocumento']) ?>" ></td>
							</tr>
							<tr class="taulaA">
							<td width="15%" align="right" id='blau'>Telefono:</td>
							<td width="37%"><input required="required" name="telefono" type="text" class="boxBusqueda" id="telefono" value="<?php echo isset($_SESSION['datos_prediopre']['telefono']) ? htmlspecialchars($_SESSION['datos_prediopre']['telefono']) : trim($row_representanteant['telefono']) ?>" ></td>
							</tr>
							<tr class="taulaA">
							<td width="15%" align="right" id='blau'>Correo Electronico:</td>
							<td width="37%"><input required="required" name="email" type="text" class="boxBusqueda" id="email" value="<?php echo isset($_SESSION['datos_prediopre']['email']) ? htmlspecialchars($_SESSION['datos_prediopre']['email']) : trim($row_representanteant['email']) ?>" ></td>
							</tr>
					</table>
			</td>
		</tr>
    <?php
    }
    elseif ( $sistema == 2  ) // NUEVO SISTEMA
    {
    ?>
    <tr >
      <td id='blau'>
          <table width="100%" cellspacing="0"   border="0">

              <tr class="taulaA" >
              <td  colspan= "4" id='blau' align = "middle"><span class="borderLblau">Agregar Beneficiario <input type='image' onClick="lanzarSubmenu('ReprLegal');return false;" src='../images/reg_adm.gif' alt='Agregar Persona' border='1'></span></td>
              </tr>
              <tr class="taulaA" >
                <td width="15%" align="right" id='blau'>Nombre Completo :</td>
                <td width="37%"><input name="ReprLegal" type="text" class="boxBusqueda" id="ReprLegal" value="<?php echo isset($_SESSION['datos_prediopre']['ReprLegal']) ? htmlspecialchars($_SESSION['datos_prediopre']['ReprLegal']) : "";?>" readonly></td>
                <td width="12%" align="right" id='blau'>Direcci&oacute;n Domicilio:</td>
                <td><input name="Direccion" type="text" class="boxBusqueda" id="Direccion" value="<?php echo isset($_SESSION['datos_prediopre']['Direccion']) ? htmlspecialchars($_SESSION['datos_prediopre']['Direccion']) : "";?>" readonly>
                  <input type="hidden" name="IdRepLegal" id="IdRepLegal" value="<?php echo isset($_SESSION['datos_prediopre']['IdRepLegal']) ? htmlspecialchars($_SESSION['datos_prediopre']['IdRepLegal']) : ""; ?>"></td>
              </tr>

              <tr class="taulaA" >
              <td align="right" id="blau">Correo Electr&oacute;nico Para Notificacion:</td>
              <td><input name="Email" type="text" class="boxBusqueda3m" id="Email" value="<?php echo isset($_SESSION['datos_prediopre']['Email']) ? htmlspecialchars($_SESSION['datos_prediopre']['Email']) : "";?>" readonly></td>
              <td id="blau" align="right">Tel&eacute;fono y/o celular:</td>
              <td><input name="Telefono" type="text" class="boxBusqueda2" id="Telefono" value="<?php echo isset($_SESSION['datos_prediopre']['Telefono']) ? htmlspecialchars($_SESSION['datos_prediopre']['Telefono']) : "";?>" readonly></td>
              </tr>


          </table>
      </td>
    </tr >
    <?php
    }
    ?>


		<tr><td colspan="4"><hr></td></tr>

		<tr >
				<td id='blau' colspan="">
						<table width="100%" border="0">
							<tr>
									<td width="34%"><span class="taulaH">3. Requisitos Presentados: </span>
											<table width="98%" border="0" class='taulaA' cellspacing="0" cellpadding="0">

                        <tr id='blau2'>
														<td align="center" width="60%" height="20">Documentacion de Derecho Propietario</td>
                            <td align="left" id="blau16">
                            <select name="docddpp" class="combos" id="docddpp">

                              <?php
                               if(isset($_SESSION['datos_prediopre']['docddpp']) )
                               {
                               ?>
                                 <option value="0" <?php if( $_SESSION['datos_prediopre']['docddpp']=="0"){echo 'selected' ;}?>>NO </option>
                                 <option value="1" <?php if( $_SESSION['datos_prediopre']['docddpp']=="1"){echo 'selected' ;}?>>SI</option>
                              <?php
                               }
                                else
                                {
                                ?>
                                    <option value=0 >NO</option>
                                    <option value=1 >SI</option>
                               <?php
                                }
                               ?>

              						  </select>
                          </td>
												</tr>

												<tr id='blau2'>
														<td align="center" width="60%" height="20">Plano</td>
                            <td align="left" id="blau16">
                            <select name="plano" class="combos" id="plano">
                              <?php
                               if(isset($_SESSION['datos_prediopre']['plano']) )
                               {
                               ?>
                                 <option value="0" <?php if( $_SESSION['datos_prediopre']['plano']=="0"){echo 'selected' ;}?>>NO </option>
                                 <option value="1" <?php if( $_SESSION['datos_prediopre']['plano']=="1"){echo 'selected' ;}?>>SI</option>
                              <?php
                               }
                                else
                                {
                                ?>
                                    <option value=0 >NO</option>
                                    <option value=1 >SI</option>
                               <?php
                                }
                               ?>
                            </select>
                            </td>
												</tr>


												<tr id='blau2'>
														<td align="center" width="60%" height="20">Informacion Digital (CD)</td>
                            <td align="left" id="blau16">
                            <select name="cd" class="combos" id="cd">
                              <?php
                               if(isset($_SESSION['datos_prediopre']['cd']) )
                               {
                               ?>
                                 <option value="0" <?php if( $_SESSION['datos_prediopre']['cd']=="0"){echo 'selected' ;}?>>NO </option>
                                 <option value="1" <?php if( $_SESSION['datos_prediopre']['cd']=="1"){echo 'selected' ;}?>>SI</option>
                              <?php
                               }
                                else
                                {
                                ?>
                                    <option value=0 >NO</option>
                                    <option value=1 >SI</option>
                               <?php
                                }
                               ?>
                            </select>
                            </td>
												</tr>

												<tr id='blau2'>
														<td align="center" width="60%" height="20">Formulario de Registro</td>
                            <td align="left" id="blau16">
                            <select name="formulario" class="combos" id="formulario">
                              <?php
                               if(isset($_SESSION['datos_prediopre']['formulario']) )
                               {
                               ?>
                                 <option value="0" <?php if( $_SESSION['datos_prediopre']['formulario']=="0"){echo 'selected' ;}?>>NO </option>
                                 <option value="1" <?php if( $_SESSION['datos_prediopre']['formulario']=="1"){echo 'selected' ;}?>>SI</option>
                              <?php
                               }
                               else
                               {
                               ?>
                                   <option value=0 >NO</option>
                                   <option value=1 >SI</option>
                              <?php
                               }
                              ?>

                            </select>
                            </td>
												</tr>

											</table>
									</td>

									<td width="39%" rowspan="2"><span class="taulaH">4.Informacion de Registro: </span>
											<table width="98%"  border="0" cellpadding="0"  cellspacing="0" class='taulaA'>

                        <tr>
                          <td width="31%" height="45"  id="blau10">Reg. Agente Auxiliar: </td>
                          <td width="69%" ><select name="Auxiliar" class="combos" id="Auxiliar">
                              <option value=0>ELEGIR ...</option>
                              <?php
              	$sql_auxiliar ="Select * from agenteauxiliar ORDER BY nombreaa asc";
              	$auxiliar = pg_query($cn,$sql_auxiliar) ;
              	$row_auxiliar = pg_fetch_array ($auxiliar);

              	do {   ?>
                              <option value="<?php echo $row_auxiliar['numregprof']?>"
                              <?php  if(isset($_SESSION['datos_prediopre']['Auxiliar']) && trim($_SESSION['datos_prediopre']['Auxiliar'])== trim($row_auxiliar['numregprof'])){
              											echo " selected";
              					    }elseif(isset($row_predio['agenteaux']) && trim($row_predio['agenteaux'])== trim($row_auxiliar['numregprof'])){	echo " selected";} ?>
                               > <?php echo $row_auxiliar['numregprof']." ".$row_auxiliar['nombreaa'] ?></option>
                              <?php }while ($row_auxiliar = pg_fetch_assoc($auxiliar));	?>
                          </select></td>
                        </tr>

												<tr>
														<td height="45"  id='blau10'>Registrado Por:</td>
														<td ><select name="RespVDRA" class="combos" id="RespVDRA">
															<option value=0>ELEGIR ...</option>
																		<?php
															$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores Where estadofun='A' and idfuncionario > 0 ORDER BY nombre1";
															$funcionario = pg_query($cn,$sql_funcionario) ;
															$row_funcionario = pg_fetch_array ($funcionario);

															do {   ?>
															<option value="<?php echo $row_funcionario['idfuncionario']?>"
                                <?php  if(isset($_SESSION['datos_prediopre']['RespVDRA']) && $_SESSION['datos_prediopre']['RespVDRA']== $row_funcionario['idfuncionario']){
                                      echo " selected";
                              }elseif(isset($row_predio['funcionario']) && $row_predio['funcionario']== $row_funcionario['idfuncionario']){	echo " selected";} ?>
															 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
															<?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
														</select></td>
												</tr>

												<tr>
														<td height="45"  id='blau10'>Oficina de Registro :</td>
														<td ><select name="OfRegistro" class="combos" id="OfRegistro">
															<option value=0>ELEGIR ...</option>
															<?php
															$sql_clasificador ="Select * From codificadores Where idclasificador=20 Order by nombrecodificador";
															$clasificador = pg_query($cn,$sql_clasificador) ;
															$row_clasificador = pg_fetch_array ($clasificador);

															do {   ?>
															<option value="<?php echo $row_clasificador['idcodificadores']?>"
                                <?php  if(isset($_SESSION['datos_prediopre']['OfRegistro']) && $_SESSION['datos_prediopre']['OfRegistro']== $row_clasificador['idcodificadores']){
                											echo " selected";
                					    }elseif(isset($row_predio['oficina']) && $row_predio['oficina']== $row_clasificador['idcodificadores']){	echo " selected";} ?>
															 > <?php echo $row_clasificador['nombrecodificador']?></option>
															<?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
														</select></td>
												</tr>


											</table>
									</td>


							</tr>
						</table>

				</td>
		</tr>

    <tr><td colspan="4"><hr></td></tr>




</table>

<input type="hidden" name="MM_insert" value="form1" />
<input name="submit" type="submit" class='boton verde formaBoton' value="Guardar">

</form>
</div>
<?php include "../foot.php";?>

</BODY></HTML>
