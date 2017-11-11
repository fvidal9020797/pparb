<?php
function revisar_art5($tipopropiedad, $suptotal, $suptpfp, $idparcela, $supreftpfp,$cn){
    $mensaje="";
    $supreftpfp=$supreftpfp;
    $verde=2;

	if(trim($tipopropiedad)=="Comunidad o TIOC" && $suptpfp>0 ){


          $auxvarref = $supreftpfp;

          $supreftpfp=0;

			$sql_comunidad= "SELECT datocomunidad.nfamilia,datocomunidad.supcomunal FROM  public.parcelabeneficiario,  public.datocomunidad
							WHERE parcelabeneficiario.idpersona = datocomunidad.idpersona and parcelabeneficiario.poblador=0 and parcelabeneficiario.idparcela='".$idparcela."'";
			$comunidad = pg_query($cn,$sql_comunidad);
			$row_comunidad = pg_fetch_array ($comunidad);
			$num_comunidad=pg_num_rows($comunidad);

			$mensaje="";
			$verde=0;
			if($num_comunidad==0 ){
			$mensaje="No Existe Registrado un Beneficiario Juridico que cuente con los Datos de Numero de familias y Superficie Comunal!! Por Favor Verifique que haya Ingresado estos Datos en la Ventana de Identificacion de Predios punto 3. Datos Beneficiario";

			}elseif($num_comunidad>1){
			$mensaje="Existe mas de dos Beneficiarios. Favor Verifique que no haya Ingresado mas de dos Beneficiarios, en Datos en la Ventana de Identificacion de Predios punto 3.Beneficiarios, los miembros de la comunidad deben ser registrados en el punto 3.1 Lista de Miembros de la comunidad";

			}elseif($row_comunidad['nfamilia']==0){
			$mensaje="No Existe Datos de Numero de familias en los datos de la Comunidad!! Por Favor Verifique que haya Ingresado estos Datos en la Ventana de Identificacion de Predios punto 3. Datos Beneficiario";
			}else{
			    $spredio=$suptotal;

			    $sup=$spredio-$row_comunidad['supcomunal'];
				if($sup<=0)
				{ $mensaje="La Superficie Comunal registrada para la Comunidad no puede ser mayor a la Superficie del Predio";
				}else{

					$resultado=round($sup/$row_comunidad['nfamilia'],4);

					if($resultado>50){
						//$supreftpfp=round(floatval($suptpfp/10)*10000)/10000; //B1

             $supreftpfp = $auxvarref;

						 $mensaje="EL PREDIO ES UNA COMUNIDAD CAMPESINA, EN ESTE CASO SE EXIGE LA RESTITUCION DE SEL y DEL 10% EN TPFP, YA QUE LA SUP. CALCULADA POR NUMERO DE FAMILIAS ES: ". $resultado;
				     }else{
						 $supreftpfp=0;
						 $mensaje="YA QUE EL PREDIO ES UNA COMUNIDAD CAMPESINA, NO SE EXIGE LA RESTITUCION DEL 10% EN TPFP LA SUP CALCULADA POR NUMERO DE FAMILIAS ES: ". $resultado; $verde=1;
				     }
				}

			 }

	}
  elseif(substr_compare($tipopropiedad,"Peque�a", 1, 4, true) && $suptpfp>0 && $suptotal<=50 )
  {
		     $supreftpfp=0;	 $verde=1;
			 $mensaje="NO SE EXIGE LA REFORESTACION DEL 10 % EN TPFP";

	 }
   else
   {
	        //$aux=round(floatval($suptpfp/10)*10000)/10000;
          $aux=$supreftpfp;
			if($aux>=$supreftpfp){ $supreftpfp=$aux;}

	 }

	 return array("mensaje"=>$mensaje,"supreftpfp"=>$supreftpfp,"verde"=>$verde);
}

?>
