<?php 
include "../Clases/Nota.php";
session_start();

    include "../cabecera.php";
    include"page_nota.php";
    
//	print_r($_SESSION);

?>
<HTML>
<HEAD><TITLE>Llenado de Datos Contratos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<script language="JavaScript" src="../scripts/funciones.js">
</script>
<script language="JavaScript"> 

function lanzarSubmenu1()
	{window.open("N_Carpeta.php","Elegir Carpetas","width=900,height=500,scrollbars=yes,toolbar=no,status=no");}  

</script> 

<style type="text/css">
.demo {
	-moz-border-radius: 0px 0px 10px 10px;
	-webkit-border-radius: 0px 0px 10px 10px;
	border-radius: 0px 0px 10px 10px;
	}
</style>

</HEAD>
<?php 
include_once('../scripts/body_handler.inc.php');
?>
<body>

          <table width="90%" align="center" border="0">
            <tr>
              <td width="92%" class="texto" align="center"><b><big>Seguimimiento</big></b> <br></td>
              <td width="8%" align="">&nbsp;</td>
            </tr>
          </table>
          <form action="N_Nota.php" method="POST" name="formulario" enctype="multipart/form-data" onSubmit="return valida(this);">
          <table width="90%" border="0" class='taulaA' align="center" cellspacing="0">
            <tr>
              <td width="100%" height="14"><hr></td>
            </tr>
            
            
            <tr class="texto_normal">
              <td id='blau'><span class="taulaH">1. Datos Generales Registro de nota:</span></td>
            </tr>
            <tr class="texto_normal">
              <td id='blau6'><table width="100%" class="taulaA" border="1"  cellspacing="0">
                
                <tr>
                  <td  id="blau3">Estado:</td>
                  <td ><select name="idunidad" class="combos" id="idunidad">
                    <option value=0>ELEGIR ...</option>
                    <?php 
					$sql_clasificador ="Select * From codificadores Where idclasificador=2 and idcodificadores>230 Order by nombrecodificador";
					$clasificador = pg_query($cn,$sql_clasificador) ;
					$row_clasificador = pg_fetch_array ($clasificador);
					
					do {   ?>
                    <option value="<?php echo $row_clasificador['idcodificadores']?>"
                <?php  if($_SESSION['nota']->get_idunidad()==$row_clasificador['idcodificadores']){
											echo " selected";
					    }?>
                 > <?php echo $row_clasificador['nombrecodificador']?></option>
                    <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
                  </select></td>
                  <td  id="blau3">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td  id="blau">Fecha de Registro: </td>
                  <td><?php echo $_SESSION['nota']->get_fecharegnota(); ?></td>
                </tr>
                <tr>
                  <td  id="blau">Num. de Nota/Hoja de Ruta:</td>
                  <td colspan="3" ><input type="text" name="nota" id="nota" class="boxBusqueda" onChange="document.forms[0].submit()" value="<?php echo $_SESSION['nota']->getnnota();?>"  ></td>
                  <td  id="blau">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              
                
                <tr>
                  <td width="21%"  id="blau">Derivado a:</td>
                  <td width="15%" ><select name="iddestinatario" class="combos" id="iddestinatario">
                    <option value=0>ELEGIR ...</option>
                    <?php 
					$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores and persona.idpersona>0  ORDER BY nombre1";
					$funcionario = pg_query($cn,$sql_funcionario) ;
					$row_funcionario = pg_fetch_array ($funcionario);
					
					do {   ?>
                    <option value="<?php echo $row_funcionario['idfuncionario']?>"
                <?php  if( $_SESSION['nota']->get_iddestinatario()== $row_funcionario['idfuncionario']){
											echo " selected";
					    } ?>
                 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                    <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                  </select></td>
                  <td width="14%"  id="blau">Remitido por: </td>
                  <td width="17%"><select name="idremitente" class="combos" id="idremitente">
                    <option value=0>ELEGIR ...</option>
                    <?php 
					$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores and persona.idpersona>0 ORDER BY nombre1";
					$funcionario = pg_query($cn,$sql_funcionario) ;
					$row_funcionario = pg_fetch_array ($funcionario);
					
					do {   ?>
                    <option value="<?php echo $row_funcionario['idfuncionario']?>"
                <?php  if( $_SESSION['nota']->get_idremitente()== $row_funcionario['idfuncionario']){
											echo " selected";
					    }elseif($_SESSION['nota']->get_idremitente()==$_SESSION['MM_UserId']){
							echo " selected";
						}
						
						?>
                 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                    <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                  </select></td>
                  <td width="15%"  id="blau">Fecha de Nota: </td>
                  <td width="18%"><select name="diaIni" class="combos" id="diaIni" onChange="return dia_mes_ano('diaIni','mesIni','annoIni');" >
                    <?php			 
			  $dia = 0;
			  if($_SESSION['nota']->get_dianota()>0){
			  	$nacimiento_dia = $_SESSION['nota']->get_dianota();
			  } else{
			    $nacimiento_dia=date("d");
			  }
			  do {  
					$dia++;
			   ?>
                    <option value="<?php echo $dia?>"
			  	<?php 
				  if(isset($nacimiento_dia)) {
					  if($nacimiento_dia == $dia){
			  			echo " selected";
						}
					}?>><?php echo $dia?></option>
                    <?php
				 } while ($dia < 31);
			   ?>
                  </select>
/
<select name="mesIni" class="combos"  id="mesIni"  onChange="return dia_mes_ano('diaIni','mesIni','annoIni');">
  <?php 
			  $meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
			  $mes = 0;
			  if($_SESSION['nota']->get_mesnota()>0){
			  	$nacimiento_mes = $_SESSION['nota']->get_mesnota();
			  } else{
			    $nacimiento_mes=date("m");
			  }
			 do {  $mes++;
			   ?>
  <option value="<?php echo $mes?>"
			  	<?php 
				  if(isset($nacimiento_mes)) {
					  if($nacimiento_mes == $mes){
			  			echo " selected";
						}
					}?>><?php echo $meses[$mes-1]?></option>
  <?php
				 } while ($mes < 12);
			   ?>
</select>
/
<select name="annoIni" class="combos"  id="annoIni" onChange="return dia_mes_ano('diaIni','mesIni','annoIni');">
  <?php
			  $anno = 1920;
			   if($_SESSION['nota']->get_annonota()>0){
			  	$nacimiento_anno = $_SESSION['nota']->get_annonota();
			  } else{
			    $nacimiento_anno=date("Y");
			  }
			 do {  
					$anno++;
			   ?>
  <option value="<?php echo $anno?>"
			  	<?php 
				  if(isset($nacimiento_anno)) {
					  if($nacimiento_anno == $anno){
			  			echo " selected";
						}
					}?>><?php echo $anno?></option>
  <?php
				 } while ($anno < 2014);
			   ?>
</select></td>
                </tr>
                
                
             
              </table>
              <br></td>
            </tr>
            <tr class="texto_normal">
              <td id='blau'><span class="taulaH">2. Seleccionar la Carpetas </span></td>
            </tr>
            
            
            <tr>
              <td height="38">
                <table width="100%" height="63" border="0">
                
                <tr>
                  <td colspan="7"  id="blau"><hr></td>
                </tr>
                  <tr>
                  <td height="17" colspan="2"> <table width="100%" height="68" border="0">
                    <tr>
                      <td width="11%" height="30" align="right" class="taulaA" id='blau2'><span class="borderLBRgris">Agregar Carpetas
                      <input type='image' src='../images/reg_adm.gif' alt='carpetas' border='1' onClick='lanzarSubmenu1();return false;'>
                      </span></td>
                <td width="89%" rowspan="2"><table width="95%" id="segui" border="1" class="taulaA">
                          <tr class="cabecera2" align="center">
                            <td width="2%"></td>
                            <td width="29%">NOMBRE PREDIO</td>
                            <td width="13%">CODIGO PARCELA</td>
                            <td width="13%">Estado Actual</td>
                            <td width="56%">OBSERVACIONES</td>
                          </tr>
		<?php 
             if(isset($_SESSION['datos_nota']['conteo']))
             {$num=$_SESSION['datos_nota']['conteo'];}
             else
             {$num=$totalRows_carpetas;}
		
		 for ($i = 1; $i <=$num ; $i++) { 
		 if(isset($_SESSION['datos_nota']['idreg'.$i]) || isset($row_carpetas['idpersona'])){
   ?>
                          <tr >
                            <td height="24"><input type="checkbox" name="chk"/></td>
                            <td><input name="<?php echo 'nombre'.$i; ?>" type="text" readonly class="boxBusqueda"  value="<?php echo isset($_SESSION['datos_nota']['nombre'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['nombre'.$i]) : trim($row_carpetas['nombre']) ;?> "></td>
                            <td><input name="<?php echo 'idparcela'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota']['idparcela'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['idparcela'.$i]) : trim($row_carpetas['idparcela']) ?>"></td>
                            <td><input name="<?php echo 'estado'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota']['estado'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['estado'.$i]) : trim($row_carpetas['idparcela']) ?>"></td>
                             
                            <td>
                            
                              <p>
                                <textarea name="<?php echo 'observacionesr'.$i; ?>" id="<?php echo 'observacionesr'.$i; ?>" cols="55" rows="4"><?php echo isset($_SESSION['datos_nota']['observacionesr'.$i]) ? htmlspecialchars(trim($_SESSION['datos_nota']['observacionesr'.$i])) : trim($row_carpetas['observacionesr']) ?></textarea>
</p>
                              <p>
                                <input type="hidden" name="<?php echo 'idreg'.$i; ?>" id="<?php echo 'idreg'.$i; ?>" value="<?php echo isset($_SESSION['datos_nota']['idreg'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['idreg'.$i]) : trim($row_carpetas['idregistro']) ?>">
                              </p></td>
                      </tr>
                          
                          <?php if(!isset($_SESSION['datos_nota']['conteo']) && isset($row_carpetas)){$row_carpetas = pg_fetch_assoc($carpetas);}
		 }} ?>
                      </table>
                      
                      <input type="hidden" name="conteo" id="conteo" value="<?php echo isset($_SESSION['datos_nota']['conteo']) ? htmlspecialchars($_SESSION['datos_nota']['conteo']) : $totalRows_carpetas ?>"></td>
                    </tr>
                    <tr>
                      <td align="right" class="taulaA" id='blau2'><p>
                          <input name="submit3" type="button" class='cabecera2' value="Eliminar Carpetas" onClick="deleteRow('segui')">
                      </p></td>
                    </tr>
                  </table>                    </td>
                  </tr>
                  <tr>
                  <td width="10%"> <p><span class="taulaH">3. Observaciones:</span></p>
                    <p>&nbsp;</p> </td>
                  <td width="90%"><textarea name="RObservacion" id="RObservacion" cols="110" rows="4"><?php echo $_SESSION['nota']->get_obsnota();?></textarea></td>
                  </tr>
              </table>
                <p align="center">
                  <input type="hidden" name="MM_insert" value="form1" />
               
                 <input name='submit' type='submit' class='cabecera2' value='Guardar'>
             
                </p>
                   </td>
            
             </tr>
          </table>   </form>    
<p><br>
            <br><br>
            <br>
          </p>
        
        </div>
<?php include "../foot.php";?>
</BODY></HTML>