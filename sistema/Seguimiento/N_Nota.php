<?php
include "../Clases/Nota.php";
session_start();

if(isset($_GET['nuevo'])){
  include "../Registro/destroy_predio.php";
  $_SESSION['habilitar']=0;
}
    include "../cabecera.php";
    include"page_nota.php";

//print_r($_SESSION);
//print_r($_POST);
?>
<HTML>
<HEAD><TITLE>Llenado de Notas</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<LINK href="../css/mdryt.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="../css/button.css"/>
<script language="JavaScript" src="../scripts/funciones.js">
</script>
<script language="JavaScript">

function lanzarSubmenu1()
	{window.open("N_Carpeta.php","Elegir Carpetas","width=1200,height=500,scrollbars=yes,toolbar=no,status=no");}

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
  <div align="center">

    <?php
    if  (isset($_SESSION['idnot']) && $_SESSION['idnot']!="")
    {
    ?>
        <div align="center" class="texto">
            <b><big>EDITAR NOTA</big></b>
        </div>
    <?php
  } else {
    ?>
          <div align="center" class="texto">
              <b><big>NUEVA NOTA</big></b>
          </div>
    <?php
      }
    ?>


          <form action="N_Nota.php" method="POST" name="formulario" enctype="multipart/form-data" onSubmit="return valida(this);">
          <table width="95%" border="0" class='taulaA' align="center" cellspacing="0">

            <tr class="texto_normal">
              <td colspan="2" id='blau'><span class="taulaH">1. Datos Generales Registro de nota:</span></td>
            </tr>
            <tr class="texto_normal">
              <td colspan="2" id='blau6'><table width="100%" class="taulaA" border="1"  cellspacing="0">

                <tr>
                  <td  id="blau3">Unidad  Destino:</td>
                  <td ><select name="idunidad" class="combos" id="idunidad">
                    <option value="0">ELEGIR ...</option>
                    <?php
					$sql_clasificador ="Select * From codificadores Where idclasificador=32  Order by orden asc";
					$clasificador = pg_query($cn,$sql_clasificador) ;
					$row_clasificador = pg_fetch_array ($clasificador);

					do {   ?>
                    <option value="<?php echo $row_clasificador['idcodificadores'] ?>"
                <?php  if($_SESSION['nota']->get_idunidad()==$row_clasificador['idcodificadores']){
											echo " selected"; }?>
                 > <?php echo $row_clasificador['orden'].'.-'.$row_clasificador['nombrecodificador'] ?>
                 </option>
                    <?php } while ($row_clasificador = pg_fetch_assoc($clasificador));	?>
                  </select>
				  </td>

                  <td  id="blau3">Numero de Nota:</td>
                  <td><input name="nota" type="text" class="boxBusqueda" id="nota" onChange="document.forms[0].submit()" value="<?php echo trim($_SESSION['nota']->getnnota());?>" ></td>
                  <td  id="blau">Fecha de Registro al Sistema: </td>
                  <td>

                    <?php
                    if  (isset($_SESSION['idnot']) && $_SESSION['idnot']!="")
                     {
                        echo $_SESSION['nota']->get_fecharegnota();
                     }
                    ?>


                  </td>

				  <input type="hidden" name="idregistrador" id="idregistrador" value="<?php echo $_SESSION['MM_UserId'];?>" >

                </tr>
                <tr>
                  <td  id="blau">De:</td>
                  <td colspan="3" ><select name="idremitente" class="combos" id="idremitente">
                    <option value=0>ELEGIR ...</option>
                    <?php
					$sql_funcionario ="Select idfuncionario,nombre1,apellidopat
					From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores and persona.idpersona>0 where funcionario.estadofun = 'A' ORDER BY nombre1";
					$funcionario = pg_query($cn,$sql_funcionario) ;
					$row_funcionario = pg_fetch_array ($funcionario);

					do {   ?>
                    <option value="<?php echo $row_funcionario['idfuncionario']?>"
						<?php  if( $_SESSION['nota']->get_idremitente()== $row_funcionario['idfuncionario']){
                                            echo " selected";
                        }

                        ?>
                 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                    <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                  </select></td>
                  <td  id="blau">Fecha de Nota: </td>
                  <td><select name="diaIni" class="combos" id="diaIni" onChange="return dia_mes_ano('diaIni','mesIni','annoIni');" >
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
			  $anno = 2012;
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
} while ($anno < 2017);
			   ?>
</select></td>
                </tr>


                <tr>
                  <td width="20%"  id="blau">Via: </td>
                  <td width="13%" ><select name="idvia" class="combos" id="idvia">
                    <option value=0>ELEGIR ...</option>
                    <?php
					$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores and persona.idpersona>0 where funcionario.estadofun = 'A' ORDER BY nombre1";
					$funcionario = pg_query($cn,$sql_funcionario) ;
					$row_funcionario = pg_fetch_array ($funcionario);

					do {   ?>
                    <option value="<?php echo $row_funcionario['idfuncionario']?>"
                <?php  if( $_SESSION['nota']->get_idvia()== $row_funcionario['idfuncionario']){
											echo " selected";
					    }

						?>
                 > <?php echo $row_funcionario['nombre1']." ".$row_funcionario['apellidopat'] ?></option>
                    <?php } while ($row_funcionario = pg_fetch_assoc($funcionario));	?>
                  </select></td>
                  <td width="12%"  id="blau">Derivado A:</td>
                  <td width="26%"><select name="iddestinatario" class="combos" id="iddestinatario">
                    <option value=0>ELEGIR ...</option>
                    <?php
					$sql_funcionario ="Select idfuncionario,nombre1,apellidopat From persona INNER JOIN funcionario ON persona.idpersona=funcionario.idpersona INNER JOIN codificadores ON funcionario.cargo=codificadores.idcodificadores and persona.idpersona>0 where funcionario.estadofun = 'A' ORDER BY nombre1";
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
                  <td width="11%"  id="blau">Fecha de Recepcion:</td>
                  <td width="18%"><?php echo $_SESSION['nota']->get_fecharecepcionado(); ?></td>
                </tr>



              </table>
              <br></td>
            </tr>
            <tr class="texto_normal">
              <td width="17%" id='blau'><span class="taulaH">2. Listado de  Carpetas </span>  </td>
              <td width="83%" id='blau'><span class="celdaVerde">
              <?php if(isset($mensaje) ){ ?>
                 <?php echo $mensaje;?></span> <a href="ListadoNotas.php" class="boton">Retornar a Lista</a>
                     <?php }  ?></td>
            </tr>


            <tr>
              <td height="38" colspan="2">
                <table width="100%" height="63" border="0">

                <tr>
                  <td colspan="7"  id="blau"><hr></td>
                </tr>
                  <tr>
                  <td height="17" colspan="2"> <table width="100%" height="68" border="0">
                    <tr>
                    <?php if(isset($_SESSION['habilitar']) && $_SESSION['habilitar']<1  ){ ?>
                      <td width="15%" height="30" align="right" class="taulaA" id='blau2'><span class="borderLBRgris">Agregar Carpetas
                      <input type='image' src='../images/reg_adm.gif' alt='carpetas' border='1' onClick='lanzarSubmenu1();return false;'>
                      </span></td>
                     <?php }?>
                <td width="80%" rowspan="2" ><table width="95%" id="segui" border="1" class="taulaA">
                          <tr class="cabecera2" align="center">
                            <td width="2%"></td>
                            <td width="25%">NOMBRE PREDIO</td>
                            <td width="13%">CODIGO PARCELA</td>
                            <td width="13%">Estado Actual</td>
                            <td width="50%">OBSERVACIONES</td>
                          </tr>
		<?php
             if(isset($_SESSION['datos_nota']['conteo']))
             {$num=$_SESSION['datos_nota']['conteo'];}
             else
             {$num=$totalRows_carpetas;}

		 for ($i = 1; $i <=$num ; $i++) {
		 if(isset($_SESSION['datos_nota']['idreg'.$i]) || isset($row_carpetas['idparcela'])){

   ?>
                          <tr >
                            <td height="24"><input type="checkbox" name="chk"/></td>

                            <td><input name="<?php echo 'nombre'.$i; ?>" type="text" readonly class="boxBusqueda"  value="<?php echo isset($_SESSION['datos_nota']['nombre'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['nombre'.$i]) : trim($row_carpetas['nombre']) ;?> "></td>

                            <td><input name="<?php echo 'idparcela'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota']['idparcela'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['idparcela'.$i]) : trim($row_carpetas['idparcela']) ?>"></td>

                            <td><input name="<?php echo 'estado'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota']['estado'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['estado'.$i]) : trim($row_carpetas['estado']) ?>"></td>

                            <td >
                            <textarea class="CSSTextArea" name="<?php echo 'observacionesr'.$i; ?>" id="<?php echo 'observacionesr'.$i; ?>" cols="55" rows="4"><?php echo isset($_SESSION['datos_nota']['observacionesr'.$i]) ? htmlspecialchars(trim($_SESSION['datos_nota']['observacionesr'.$i])) : trim($row_carpetas['obs']);?></textarea>
                             </td>

							 <td style="display:none"><input  name="<?php echo 'idreg'.$i; ?>" id="<?php echo 'idreg'.$i; ?>" type="text" class="boxBusqueda2" readonly value="<?php echo isset($_SESSION['datos_nota']['idreg'.$i]) ? htmlspecialchars($_SESSION['datos_nota']['idreg'.$i]) : trim($row_carpetas['idregistro']) ?>"   ></td >


                      </tr>

                          <?php if(!isset($_SESSION['datos_nota']['conteo']) && isset($row_carpetas)){$row_carpetas = pg_fetch_assoc($carpetas);}
		 }} ?>
                      </table>

                      <input type="hidden" name="conteo" id="conteo" value="<?php echo isset($_SESSION['datos_nota']['conteo']) ? htmlspecialchars($_SESSION['datos_nota']['conteo']) : $totalRows_carpetas ?>">

					 </td>


                    </tr>
                    <tr>
                     <?php if(isset($_SESSION['habilitar']) && $_SESSION['habilitar']<1  ){ ?>
                      <td align="right" class="taulaA" id='blau2'><p>
                          <input name="submit3" type="button" class='cabecera2' value="Eliminar Carpetas" onClick="deleteRow('segui')">
                      </p></td>
                      <?php } ?>
                    </tr>
                  </table>                    </td>
                  </tr>
                  <tr>
                  <td width="10%"> <p><span class="taulaH">3. Observaciones:</span></p>
                    <p>&nbsp;</p> </td>
                  <td width="90%"><textarea class="CSSTextArea2" name="RObservacion" id="RObservacion" cols="110" rows="4"><?php echo trim($_SESSION['nota']->get_obsnota());?></textarea></td>
                  </tr>
              </table>
                <table width="19%" border="0" align="center">
                  <tr>
                    <?php if(isset($mensaje) ){ ?>
                    <td width="61%"> <?php echo $mensaje;?> <a href="ListadoNotas.php" class="boton">Retornar al Listado de Notas</a></td>
                     <?php }

					elseif(isset($_SESSION['habilitar']) && $_SESSION['habilitar']>0  ){ ?>
                    <td width="61%"><input name='submit2' type='submit' class='cabecera2' value='Recepcionar Nota'></td>
                      <?php }

					elseif(isset($_SESSION['habilitar']) && $_SESSION['habilitar']==0 ){ ?>
                      <td width="39%">
					  <input type="hidden" name="MM_insert" value="form1" />
            <input name='submit' type='submit' class='boton verde formaBoton' value='Guardar' >
					  </td>
                      <?php }


					if(isset($mensaje2)){ ?>
                    <td width="61%"> <?php echo $mensaje2;?> </td>
                      <?php }  ?>



                  </tr>







                </table>                <p align="center">&nbsp;</p>              </td>
             </tr>
          </table>
</form>
<p><br>
            <br><br>
            <br>
          </p>

        </div>
<?php include "../foot.php";?>
</BODY></HTML>
