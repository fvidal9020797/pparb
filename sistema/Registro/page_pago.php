 <?php
  ///////////////////////////////////////////////////////////////////////////////////
  //////////////obteniendo datos para mostrar en pago////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////

   	// select datos predio///
    $sql_parcela = "select * FROM v_parcela where idregistro=".$_SESSION['idreg'];
	$parcela = pg_query($cn,$sql_parcela);
	$row_parcela = pg_fetch_array ($parcela);

	//monto UFV
	$sql_ufv= "SELECT * FROM valoresufv where fecha_ufv='".date("Y".'-'."m".'-'."d")."'";
	$ufv = pg_query($cn,$sql_ufv);
	$row_ufv = pg_fetch_array ($ufv);
	$num_ufv=pg_num_rows($ufv);

	/// monto pago por tipo de propiedad
	$sql_monprop = "SELECT   ufvtipoprop.tpfpplazos, ufvtipoprop.tpfpcontado,  ufvtipoprop.tumplazos,  ufvtipoprop.tumcontado
					FROM ufvtipoprop, parcelas, registro
     				WHERE  ufvtipoprop.idtipopropiedad = parcelas.idtipoprop AND  parcelas.idparcela = registro.idparcela AND  registro.idregistro =".$_SESSION['idreg'];
	$monprop = pg_query($cn,$sql_monprop);
	$row_monprop = pg_fetch_array ($monprop);
	//$num_parcela=pg_num_rows($parcela);
	///datos sup///
	if(!isset($_SESSION['superficie337'])){
		   $superficie337=new SuperficieRegistro();
		   $superficie337->SuperficieRegistro337($cn, $_SESSION['idreg']);
		   $_SESSION['superficie337']=$superficie337;

		}
	if(!isset($_SESSION['superficie502']) && $_SESSION['Causal']==2){
		$superficie502=new SuperficieRegistro();
		$superficie502->SuperficieRegistro502($cn, $_SESSION['idreg']);
		$_SESSION['superficie502']=$superficie502;

	}

	$sql_TipoPago= "select * FROM codificadores where idclasificador=14";
	$TipoPago = pg_query($cn,$sql_TipoPago);
	$row_TipoPago = pg_fetch_array ($TipoPago);
	$num_TipoPago=pg_num_rows($TipoPago);


   // verificando si ya existe boleta de prelidacion
   $sql_preliquidacion= "SELECT  valoresufv.valor_ufv,
								  pd.*, c.nombrecodificador
								FROM
								  public.planpago pd,
								  public.valoresufv,
								  public.codificadores c
								WHERE
								  pd.idvalorufv = valoresufv.idvalorufv AND
								  pd.idtipopago = c.idcodificadores and pd.idregistro=".$_SESSION['idreg'];
	$preliquidacion = pg_query($cn,$sql_preliquidacion);
	$row_preliquidacion = pg_fetch_array ($preliquidacion);
	$num_preliquidacion=pg_num_rows($preliquidacion);

 	$existe=0;
		if($num_preliquidacion==0){//no hay preliquidacion emitida
		  $existe=0;
		}elseif($num_preliquidacion>0 && isset($_SESSION['datos_pago'])){
		  $existe=2;  //
		}else{
		 $existe=1;   //existe preliquidacion
		}

	///verficamos si existe cuotas
	 if(isset($row_preliquidacion['idplanpago'])&& $row_preliquidacion['idplanpago']!=""){
		 $sql_cuotas= "select * FROM cuota where idplanpago=".$row_preliquidacion['idplanpago']." order by numerocuota asc";
		 $cuotas = pg_query($cn,$sql_cuotas);
		 $row_cuotas = pg_fetch_array ($cuotas);
		 $num_cuotas=pg_num_rows($cuotas);

	 }
	///////////////////////////////////////////////////////////////////////////////////////////////
	//////////////Obteniendo datos para verificar si existe descuento//////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	$mensaje="";
	$sup_defPago=0;
	$_SESSION['sup_defPago']=$sup_defPago;

	if($row_parcela['TipoProp']=="Comunidad o TIOC"){

		$sql_comunidad= "SELECT datocomunidad.nfamilia FROM  public.parcelabeneficiario,  public.datocomunidad
						WHERE parcelabeneficiario.idpersona = datocomunidad.idpersona and parcelabeneficiario.idparcela='".$_SESSION['cod_parcela']."'";
		$comunidad = pg_query($cn,$sql_comunidad);
		$row_comunidad = pg_fetch_array ($comunidad);
		$num_comunidad=pg_num_rows($comunidad);
		if($row_comunidad['nfamilia']!=0){
		  $sup_defPago=$row_comunidad['nfamilia']*20;
		  if(($_SESSION['superficie337']->get_suptotal()-$sup_defPago)<0){$sup_defPago=$_SESSION['superficie337']->get_suptotal(); //no paga nada xq la sup exenta de pago es mas q la sup deforestada
		  	  $mensaje=3;
		  }else{ //hay decuento e multa por unidad familiar
		   	 $mensaje=5;
		  }
		  $_SESSION['sup_defPago']=$sup_defPago;

		}
		else{ $mensaje=1;} // no existe nuero de familias en datos persona de la comunidad
	}elseif($row_parcela['TipoProp']=="Pequeña" && $row_parcela['superficie']<=50 && $_SESSION['superficie337']->get_suptotal()<=20)
	{  $sup_defPago=$_SESSION['superficie337']->get_suptotal();$_SESSION['sup_defPago']=$sup_defPago;
	   $mensaje=2;
	}elseif($row_parcela['TipoProp']=="Pequeña" && $row_parcela['superficie']<=50 && $_SESSION['superficie337']->get_suptotal()>20)
	{  $sup_defPago=20; $_SESSION['sup_defPago']=$sup_defPago;	//hay q restar 20 ha a la sup def ilegal
	   $mensaje=4;
	}


  if ( isset($_SESSION['superficie337']) )
  {
    $aa = $_SESSION['superficie337']->get_suptotal();
  }

  if (isset($_SESSION['superficie502']))
  {
    $bb = $_SESSION['superficie502']->get_suptotal();
  }


  elseif(  $aa < 0  && $bb > 0 )
	{
	   $mensaje=6;
	}
	//print_r($_POST);
    ///////////////////////////////////////////////////////////////
	//////////////////guardando Datos//////////////////////////////
	///////////////////////////////////////////////////////////////
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))
	{ 	$datos_pago=$_POST;
	    $_SESSION['datos_pago']=$datos_pago;
		 if($_SESSION['datos_pago']['TipoPago']==0){
		   trigger_error ("Se Debe Especificar una modalidad de pago", E_USER_ERROR);
		 }else{
			if($_SESSION['datos_pago']['cuota']>1){
			 $montocuota=$_SESSION['datos_pago']['montoxcuota2'];
			}else{
			 $montocuota=0;
			}

			$insertaux=sprintf("select * from f_pago  (%s, %s, %s, %s, %s, %s, %s);",
											 GetSQLValueString($_SESSION['idreg'], "int"),
											 GetSQLValueString($_SESSION['datos_pago']['ufv'], "int"),
											 GetSQLValueString($_SESSION['datos_pago']['montoinicial'], "double"),
											 GetSQLValueString($_SESSION['datos_pago']['montototal'], "double"),
											 GetSQLValueString($_SESSION['datos_pago']['TipoPago'], "int"),
											 GetSQLValueString($_SESSION['datos_pago']['cuota'], "int"),
											 GetSQLValueString($montocuota, "double") //
											 );
			$Result2 = pg_query($cn, $insertaux);
			//echo $insertaux;
			if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
			{
			  echo '<script>parent.document.location.href="Formulario001.php?aux=6&datosguardados=ok";</script>';
			  if(isset($_SESSION['datos_recibo'])){unset($_SESSION['datos_recibo']);}
			}
		}
	}
    //////////////////////////////////////////////////////////////////////////////////////////
	//////////////////Habilitar Parcela ya q no se deb hacer pago//////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////

 if ((isset($_POST["Habilitar"])))
	{
			$causal = pg_query($cn,"select * from habilitarparcela (".$_SESSION['idreg'].",135)");

			$causal = pg_query($cn,"INSERT INTO fechasregistro  VALUES (".$_SESSION['idreg'].",'now()',null,null);");

			//echo $insertaux;
			if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))
			{
			  echo '<script>parent.document.location.href="Formulario001.php?aux=6&datosguardados=ok";</script>';

			}

	}
    ?>
