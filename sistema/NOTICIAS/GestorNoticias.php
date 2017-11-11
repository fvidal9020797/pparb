<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codificadores
 *
 * @author jesus escobar
 */

class GestorNoticias {
	protected $cn;
    //put your code here
	function __construct() {
		require_once APPPATH.'/config/Conexion.php';
		$this->cn = Conexion::create();
	}

 function guardarNoticias( $inid,    $intitulo ,    $indecripcion,    $infecha,    $inimagen,    $infecha_noticia,    $intipo ,    $innivel ,    $inestado){
 $sql="select save_noticias(
	".$inid.",
    '".$intitulo."' ,
    '".$indecripcion."',
    '".$infecha."',
    '".$inimagen."',
    '".$infecha_noticia."',
    ".$intipo.",
    ".$innivel.",
    ".$inestado." 
    ) as id";
	return $this->cn->ejecutarSql($sql);
}
 function guardarimagen($noticias_id, $fileName, $extension, $hoy,$estado)
 {
 	$sql="INSERT INTO noticia_imagen(
            nombre, extencion, noticias_id, estado)
    VALUES ('".$fileName."','".$extension."',".$noticias_id.",".$estado.")";
      //  echo "guardarofot=".$sql;
	return $this->cn->ejecutarSql($sql);
 }
function borrarImagen($id,$nombredocumento ){
	$sql="DELETE FROM noticia_imagen
 WHERE noticias_id=".$id." and nombre='".$nombredocumento."'";
	return $this->cn->ejecutarSql($sql);
}
function eliminarNoticias($id ){
    $sql="update noticias set estado=0
 WHERE id=".$id;
    return $this->cn->ejecutarSql($sql);
}

function getDataNoticias( $id ,$table){
	$sql="SELECT *FROM ".$table." where id=".$id;
return $this->cn->ejecutarSql($sql);
}
function getDataNoticia( $id ,$table){
    $sql="SELECT *FROM ".$table." where estado=1 and id=".$id;
return $this->cn->ejecutarSql($sql);
}


 	function listarNoticias($limit){
    $sql="SELECT *FROM noticias where estado=1 order by nivel asc ,fecha_noticia desc limit ".$limit;
return $this->cn->ejecutarSql($sql);
}
    function listarImagenes($id ,$limit){
    $sql="SELECT *FROM noticia_imagen where estado=1 and noticias_id=".$id." order by id asc limit ".$limit;
return $this->cn->ejecutarSql($sql);
}



function listarfuncionariosucab(){
    $sql="select f.idfuncionario,p.nombre1,p.nombre2,p.apellidopat,p.apellidomat,f.nombrecargo 
	from funcionario f join persona p on p.idpersona=f.idpersona where f.idfuncionario<>171 and f.idfuncionario<>51 and  f.estadofun='A'  and financiamiento='UCAB' order by p.nombre1 asc ; ";
return $this->cn->ejecutarSql($sql);
}

function listarfuncionariosvdra(){
    $sql="select f.idfuncionario,p.nombre1,p.nombre2,p.apellidopat,p.apellidomat,f.nombrecargo 
	from funcionario f join persona p on p.idpersona=f.idpersona where f.idfuncionario<>54 and  f.estadofun='A'  and financiamiento='VDRA' order by p.nombre1 asc; ";
return $this->cn->ejecutarSql($sql);
}

function listarfuncionariosabt(){
    $sql="select f.idfuncionario,p.nombre1,p.nombre2,p.apellidopat,p.apellidomat,f.nombrecargo 
	from funcionario f join persona p on p.idpersona=f.idpersona where f.idfuncionario<>80 and f.estadofun='A'  and financiamiento='ABT' order by p.nombre1 asc; ";
return $this->cn->ejecutarSql($sql);
}

 
function buscarreg($_id){
    
    $sql = " select * from registro as r full join fechasregistro as fr on r.idregistro = fr.idregistro
             join parcelas  p on p.idparcela=r.idparcela join codificadores cl on cl.idcodificadores=p.idclasificacion    where r.idparcela ='".$_id."';";
   // echo " consulta=".$sql;
return $this->cn->ejecutarSql($sql);
}

function buscarreg2($_id){
    
      $sql = "SELECT r.idregistro, fecharegistro, fechasuscripcion
					FROM parcelas as p inner join registro as r on p.idparcela = r.idparcela inner join fechasregistro as fr on fr.idregistro = r.idregistro
					where p.idparcela = '".$_id."'";
  
return $this->cn->ejecutarSql($sql);
}


    
}
?>
