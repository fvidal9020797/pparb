<?php
include_once('../../../config/Conexion.php');
class f_predio{
	public $cod;
	public $idpol;
	public $nompredio;
	public $sup;
	public $tipop;
	public $sit;  
	public $act; 
    public $asesora;
    public $idrep;
    public $dirnot;
    public $numpod;
    public $aaux;
    public $respabt;
    public $respvdra;
    public $esta;
    public $idof;
    public $obser;
    public $idreg;
    public $productivo;
    public $social;
 	public $act2;
 	public $idpre;
	function guardar(f_predio $_f_predio){
		$Con = Conexion::create();
		$cn=$Con->getConexion();
		$Sql="select f_predio('".$_f_predio->cod."',".$_f_predio->idpol.",'".$_f_predio->nompredio."','".$_f_predio->sup."',".$_f_predio->tipop.",".$_f_predio->sit.",".$_f_predio->act.",".$_f_predio->asesora.",".$_f_predio->idrep.",'".$_f_predio->dirnot."','".$_f_predio->numpod."','".$_f_predio->aaux."',".$_f_predio->respabt.",".$_f_predio->respvdra.",".$_f_predio->esta.",".$_f_predio->idof.",'".$_f_predio->obser."',".$_f_predio->idreg.",".$_f_predio->productivo.",".$_f_predio->social.",".$_f_predio->act2.",".$_f_predio->idpre.")";
		$Result=pg_query($cn,$Sql);
		$_f_predio=new f_predio();
		while ($row = pg_fetch_row($Result)) {
			$_f_predio->cod=$row[0];
		}
		return $_f_predio;
	}
}
?>