<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getSql
 *
 * @author INF-ABT
 */

class sqlConsulta {

    private $cn;
    public $report_general = "select * from report_general where \"ID REGISTRO\"<>0 ";
    public $report_superficies = "select * from report_superficies where \"SUP TOTAL\">0 ";
    public $report_predios = "select * from report_predios where \"ID REGISTRO\"<>0 ";
    public $report_emitidas_inra = "select * from report_remitidas_inra where \"ID REGISTRO\"<>0 ";
    public $report_devueltas_inra = "select * from report_devueltas_inra where \"ID REGISTRO\"<>0 ";
    public $report_presentaron_rcia = "select * from monitoreo.report_presentaron_rcia  where \"ID REGISTRO\"<>0 ";
    public $report_no_presentaron_rcia = "select * from monitoreo.report_no_presentaron_rcia  where \"ID REGISTRO\"<>0 ";

    public $report_pagos = "select * from report_pagos where \"ID REGISTRO\"<>0 ";
      public $report_estado_cuentas = "select    \"ID PARCELA\",    \"NOMBRE PREDIO\",
    \"DEPARTAMENTO\",    \"PROVINCIA\",    \"MUNICIPIO\",    \"ACTIVIDAD\",
    \"TIPO PROPIEDAD\",    \"SITUACION JURIDICA\",    \"OFICINA\",    \"ASESORAMIENTO\",
    \"FECHA REGISTRO\",    \"ESTADO\",    \"SUP TOTAL\",
    \"SUP DEFORESTADA ILEGAL\" from report_estado_cuentas where \"ID REGISTRO\"<>0 ";
    public $report_estado_cuentas1 = "select    \"MONTO INICIAL(ufv)\",  \"CUOTAS\",
    \"MONTO CUOTA(ufv)\",    \"MONTO TOTAL(ufv)\",  \"MONTO CANCELADO(bs)\",
     \"MONTO CANCELADO(ufv)\",    \"MONTO POR PAGAR(ufv)\",    \"MONTO EXEDENTE(ufv)\",
     \"PROXIMA CUOTA\" from report_estado_cuentas where \"ID REGISTRO\"<>0 ";
    public $report_cultivos = "select * from report_cultivos where \"ID REGISTRO\"<>0 ";
    public $report_preliquidacion = "select * from report_preliquidacion where \"ID REGISTRO\"<>0 ";
    public $report_especiesrestituir = "select * from report_especiesrestituir where \"ID REGISTRO\"<>0 ";
    public $report_prodganadera = "select * from report_prodganadera where \"ID REGISTRO\"<>0 ";
    public $report_sistemaprodganadera = "select * from report_sistemaprodganadera where \"ID REGISTRO\"<>0 ";
    public $report_representante = "select * from report_representante where \"REPRESENTANTE NOMBRE\"<>NULL ";
    public $report_funcionario_abt = "select * from report_funcionario_abt where \"REGISTRADOR ABT NOMBRE\"<>NULL ";
    public $report_funcionario_vdra = "select * from report_funcionario_vdra where \"REGISTRADOR VDRA NOMBRE\"<>NULL ";

    public $report_resumen ="select*from report_resumen";



    public $r_generalFilter = "select municipio as \"MUNICIPIO\",\"Clasificacion\" as \"ACTIVIDAD\", \"TipoProp\" as \"TIPO PROPIEDAD\",
\"SitJur\" as \"SITUACION JURIDICA\", \"Oficina\" as \"OFICINA\" ,fecharegistro as \"FECHA REGISTRO\",
 estado as \"ESTADO\"
 from r_general where idregistro<>0 ";

    //put your code here
    function __construct() {
        require_once '../reportes/Conexion.php';
        $this->cn = Conexion::create();
    }
    function ejecutarSql($sql) {
        $result="";
        $resultados = pg_query($this->cn->getConexion(), $sql);

        if ($resultados > 0) {
            $result=$resultados;
       }
       return $result;
    }
    function getSelect($caso) {
        $return = "select ";

        $decoded = $_POST;
        foreach ($decoded as $nombre => $valor) {
            if (isset($valor)) {
                $t = explode(",", $valor);
                // list($t, $dato) = split('[,]', $valor);
                if ($t[0] == "select") {
                    $return.=" \"" . $t[1] . "\",";
                }
            }
        }
        $return = trim($return, ",");
        $return.=" From " . $caso;
//   echo $return;
//   exit();
        return $return;
    }
   function getSelecttemplate($caso) {
        $return = "select ";

        $decoded = $_POST;
        foreach ($decoded as $nombre => $valor) {
            if (isset($valor)) {
                $t = explode(",", $valor);
                // list($t, $dato) = split('[,]', $valor);
                if ($t[0] == "select") {
                       $return.=" \"" . $t[1] . "\",";
                }
            }
        }
        $return = trim($return, ",");
        $return.=" From ";
//   echo $return;
//   exit();
        return $return;
    }
    function getcosultaByCaso($caso) {
        $sql = $this->getSelect($caso);
        $sql2 = $this->getSelect($caso);
        switch ($caso) {

            case 'report_estado_cuentas':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                    if (isset($_POST['19'])) {//estado
                    $t = $_POST['19'];
                    if ($t != "") {
                    list($id, $dato) = split('[,]', $t);
                    if ($id ==137) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                 $sql.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    } elseif ($id ==138) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                $sql.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    }
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }

                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA REGISTRO\"";
                break;
                case 'report_general':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                $sql2 .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                        $sql2.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                        $sql2.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                        $sql2.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                        $sql2.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                        $sql2.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                        $sql2.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                        $sql2.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                    if (isset($_POST['19'])) {//estado
                    $t = $_POST['19'];
                    if ($t != "") {
                    list($id, $dato) = split('[,]', $t);
                    if ($id ==137) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                 $sql.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                                 $sql2.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    } elseif ($id ==138) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                $sql.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                                $sql2.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    }
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                        $sql2.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                        $sql2.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }

                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";

                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA REGISTRO\"";
                //$sql.="order by \"FECHA DE REGISTRO PAGO\"";
                break;


            case 'report_preliquidacion':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['14'])) {//tipo pago
                    $estado = $_POST['14'];
                    if ($estado != "") {
                        $sql.="and \"TIPO PAGO\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }
                if (isset($_POST['inicio1'])) {//fecharegistro
                    $inicio = $_POST['inicio1'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA PRELIQUIDACION\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin1'])) {//
                            $fin = $_POST['fin1'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA PRELIQUIDACION\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }
                $sql.="order by \"FECHA REGISTRO\"";
                break;
            case 'report_pagos':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO PREDIO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO PREDIO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }
                if (isset($_POST['inicio1'])) {//fecharegistro PREDIO
                    $inicio = $_POST['inicio1'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA DEPOSITO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin1'])) {//
                            $fin = $_POST['fin1'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA DEPOSITO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }
                if (isset($_POST['inicio2'])) {//fecha registro PAGO
                    $inicio = $_POST['inicio2'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA DE REGISTRO PAGO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin2'])) {//
                            $fin = $_POST['fin2'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA DE REGISTRO PAGO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }
             //   $sql.="order by \"FECHA DE REGISTRO PAGO\"";
                break;
            case 'report_especiesrestituir':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                if (isset($_POST['17'])) {//TIPO DE RESTITUCION
                    $tiporesti = $_POST['17'];
                    if ($tiporesti != "") {
                        $sql.="and \"TIPO RESTITUCION\"='" . $tiporesti . "' ";
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA REGISTRO\"";
                break;
            case 'report_especies':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA REGISTRO\"";
                break;
            case 'report_prodganadera':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['13'])) {//estado
                    $estado = $_POST['13'];
                    if ($estado != "") {
                        $sql.="and \"TIPO DE SISTEMA\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA REGISTRO\"";
                break;
            case 'report_sistemaprodganadera':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }
                if (isset($_POST['21'])) {//estado
                    $estado = $_POST['21'];
                    if ($estado != "") {
                        $sql.="and \"ESTADO\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['13'])) {//estado
                    $estado = $_POST['13'];
                    if ($estado != "") {
                        $sql.="and \"TIPO DE SISTEMA\"='" . $estado . "' ";
                    }
                }
                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";


                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA REGISTRO\"";
                break;
            case 'report_resumen':
                $select=$this->getSelecttemplate($caso);
               $sql =" ";
               $sql2 = " ";
               $sql3 = " ";

                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                        $sql2.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                        $sql3.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                        $sql2.="and \"PROVINCIA\"='" . $dato . "' ";
                        $sql3.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                        $sql2.="and \"MUNICIPIO\"='" . $dato . "' ";
                        $sql3.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
               if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                        $sql2.="and \"OFICINA\"='" . $oficina . "' ";
                        $sql3.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }



                if (isset($_POST['inicio']))
                 {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp3 = "";
                        $sqltemp2 = "and cast(\"FECHA DE REGISTRO PAGO\" as date) between '" . $inicio . "' and '" . $inicio . "'   and cast(\"FECHA DE ANULACION\" as date) IS  NULL ";
                        $sqltemp2 = "and cast(\"FECHA PRELIQUIDACION\" as date) between '" . $inicio . "' and '" . $inicio . "' ";
                        $sqltemp  = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";



                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {

                                $sqltemp3 = "and cast(\"FECHA PRELIQUIDACION\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                                $sqltemp2 = "and cast(\"FECHA DE REGISTRO PAGO\" as date) between '" . $inicio . "' and '" . $fin . "'   and cast(\"FECHA DE ANULACION\" as date) IS  NULL ";
                                $sqltemp  = "and cast(\"FECHA REGISTRO\" as date) between '" . $inicio . "' and '" . $fin . "' ";

                            }
                        }

                        if ($sqltemp != "") {
                            $sql2 =$sql.$sqltemp2;
                            $sql3 =$sql.$sqltemp3;
                            $sql.=$sqltemp;

                        }
                    }
                }

                $sql1=$this->templateResumen($select,$sql,$sql2,$sql3);
                 $sql=$sql1;
                break;

            case 'report_remitidas_inra':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                $sql2 .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                        $sql2.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                        $sql2.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                        $sql2.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                        $sql2.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                        $sql2.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"CLASIFICACION\"='" . $actividad . "' ";
                        $sql2.="and \"CLASIFICACION\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                        $sql2.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                    if (isset($_POST['19'])) {//estado
                    $t = $_POST['19'];
                    if ($t != "") {
                    list($id, $dato) = split('[,]', $t);
                    if ($id ==137) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                 $sql.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                                 $sql2.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    } elseif ($id ==138) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                $sql.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                                $sql2.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    }
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                        $sql2.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }


                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA ENVIO NOTA\" as date) between '" . $inicio . "' and '" . $inicio . "' ";

                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA ENVIO NOTA\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA ENVIO NOTA\"";
                //$sql.="order by \"FECHA DE REGISTRO PAGO\"";
                break;


                  case 'report_devueltas_inra':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                $sql2 .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                        list($id, $dato) = split('[,]', $dpto);
                        $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                        $sql2.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                        $sql2.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                        $sql2.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                        $sql2.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                        $sql2.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"CLASIFICACION\"='" . $actividad . "' ";
                        $sql2.="and \"CLASIFICACION\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                        $sql2.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                    if (isset($_POST['19'])) {//estado
                    $t = $_POST['19'];
                    if ($t != "") {
                    list($id, $dato) = split('[,]', $t);
                    if ($id ==137) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                 $sql.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                                 $sql2.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    } elseif ($id ==138) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                $sql.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                                $sql2.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    }
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                        $sql2.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }


                if (isset($_POST['inicio2'])) {//fecharegistro
                    $inicio = $_POST['inicio2'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA NOTA RECIBIDA\" as date) between '" . $inicio . "' and '" . $inicio . "' ";

                        if (isset($_POST['fin2'])) {//
                            $fin = $_POST['fin2'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA NOTA RECIBIDA\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA NOTA RECIBIDA\"";
                //$sql.="order by \"FECHA DE REGISTRO PAGO\"";
                break;

                 case 'monitoreo.report_presentaron_rcia':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                $sql2 .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {

                            list($id, $dato) = split('[,]', $dpto);
                            $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                            $sql2.="and \"DEPARTAMENTO\"='" . $dato . "' ";

                    }
                }
                 if (isset($_POST['anio'])) {
                    $anio = $_POST['anio'];
                    if ($anio != "") {
                         if (strlen ($anio) >3) {
                          //  list($id, $dato) = split('[,]', $anio);
                            $sql.="and \"ANO RCIA\"='" . $anio . "' ";
                            $sql2.="and \"ANO RCIA\"='" . $anio . "' ";
                        }
                    }
                }

                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                        $sql2.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                        $sql2.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                        $sql2.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                        $sql2.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"CLASIFICACION\"='" . $actividad . "' ";
                        $sql2.="and \"CLASIFICACION\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                        $sql2.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                    if (isset($_POST['19'])) {//estado
                    $t = $_POST['19'];
                    if ($t != "") {
                    list($id, $dato) = split('[,]', $t);
                    if ($id ==137) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                 $sql.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                                 $sql2.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    } elseif ($id ==138) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                $sql.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                                $sql2.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    }
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                        $sql2.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }


                if (isset($_POST['inicio'])) {//fecharegistro
                    $inicio = $_POST['inicio'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA RCIA RECEPCIONADO\" as date) between '" . $inicio . "' and '" . $inicio . "' ";

                        if (isset($_POST['fin'])) {//
                            $fin = $_POST['fin'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA RCIA RECEPCIONADO\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA RCIA RECEPCIONADO\"";
                //$sql.="order by \"FECHA DE REGISTRO PAGO\"";
                break;


                  case 'monitoreo.report_no_presentaron_rcia':

                $sql .= " where \"ID REGISTRO\"<>0 ";
                $sql2 .= " where \"ID REGISTRO\"<>0 ";
                if (isset($_POST['dpto'])) {
                    $dpto = $_POST['dpto'];
                    if ($dpto != "") {
                            list($id, $dato) = split('[,]', $dpto);
                            $sql.="and \"DEPARTAMENTO\"='" . $dato . "' ";
                            $sql2.="and \"DEPARTAMENTO\"='" . $dato . "' ";

                    }
                }
                 if (isset($_POST['anio'])) {
                    $anio = $_POST['anio'];
                    if ($anio != "") {
                         if (strlen ($anio) >3) {
                          //  list($id, $dato) = split('[,]', $anio);
                            $sql.="and \"ANO RCIA\"='" . $anio . "' ";
                            $sql2.="and \"ANO RCIA\"='" . $anio . "' ";
                        }
                    }
                }

                if (isset($_POST['prov'])) {
                    $prov = $_POST['prov'];
                    if ($prov != "") {
                        list($id, $dato) = split('[,]', $prov);
                        $sql.="and \"PROVINCIA\"='" . $dato . "' ";
                        $sql2.="and \"PROVINCIA\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['mun'])) {
                    $mun = $_POST['mun'];
                    if ($mun != "") {
                        list($id, $dato) = split('[,]', $mun);
                        $sql.="and \"MUNICIPIO\"='" . $dato . "' ";
                        $sql2.="and \"MUNICIPIO\"='" . $dato . "' ";
                    }
                }
                if (isset($_POST['1'])) {//tipo
                    $tipo = $_POST['1'];
                    if ($tipo != "") {
                        $sql.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                        $sql2.="and \"TIPO PROPIEDAD\"='" . $tipo . "' ";
                    }
                }
                if (isset($_POST['2'])) {//situacion juridica
                    $sitjur = $_POST['2'];
                    if ($sitjur != "") {
                        $sql.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                        $sql2.="and \"SITUACION JURIDICA\"='" . $sitjur . "' ";
                    }
                }
                if (isset($_POST['8'])) {//actividad
                    $actividad = $_POST['8'];
                    if ($actividad != "") {
                        $sql.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                        $sql2.="and \"ACTIVIDAD\"='" . $actividad . "' ";
                    }
                }
                if (isset($_POST['16'])) {//asesoramiento
                    $asesoramineto = $_POST['16'];
                    if ($asesoramineto != "") {
                        $sql.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                        $sql2.="and \"ASESORAMIENTO\"='" . $asesoramineto . "' ";
                    }
                }
                    if (isset($_POST['19'])) {//estado
                    $t = $_POST['19'];
                    if ($t != "") {
                    list($id, $dato) = split('[,]', $t);
                    if ($id ==137) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                 $sql.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                                 $sql2.="and \"REGISTRADOR VDRA NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    } elseif ($id ==138) {
                        if (isset($_POST['register'])) {//estado
                            $register = $_POST['register'];
                            if ($register != "") {
                            list($idregister, $datoregister) = split('[,]', $register);
                            if ($datoregister != "") {
                                $sql.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                                $sql2.="and \"REGISTRADOR ABT NOMBRE\"='" . $datoregister . "' ";
                            }
                            }
                        }
                    }
                    }
                }
                if (isset($_POST['20'])) {//oficina
                    $oficina = $_POST['20'];
                    if ($oficina != "") {
                        $sql.="and \"OFICINA\"='" . $oficina . "' ";
                        $sql2.="and \"OFICINA\"='" . $oficina . "' ";
                    }
                }


                if (isset($_POST['inicio2'])) {//fecharegistro
                    $inicio = $_POST['inicio2'];
                    if ($inicio != "") {
                        $sqltemp = "";
                        $sqltemp = "and cast(\"FECHA SUSCRIPCION\" as date) between '" . $inicio . "' and '" . $inicio . "' ";

                        if (isset($_POST['fin2'])) {//
                            $fin = $_POST['fin2'];
                            if ($fin != "") {
                                $sqltemp = "and cast(\"FECHA SUSCRIPCION\" as date) between '" . $inicio . "' and '" . $fin . "' ";
                            }
                        }
                        if ($sqltemp != "") {
                            $sql.=$sqltemp;
                        }
                    }
                }

                $sql.="order by \"FECHA SUSCRIPCION\"";
                //$sql.="order by \"FECHA DE REGISTRO PAGO\"";
                break;


                default:

                break;
        }
        return $sql;
    }

    function getCulumnaNames($caso) {

        $return = "";
        switch ($caso) {
            case 'report_general':
                $resultado = pg_query($this->cn->getConexion(), $this->report_general);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;

                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.="   <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> ";
                }

                break;

            case 'report_pagos':
                $resultado = pg_query($this->cn->getConexion(), $this->report_pagos);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_estado_cuentas':
                $resultado = pg_query($this->cn->getConexion(), $this->report_estado_cuentas);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

   case 'report_estado_cuentas1':
                $resultado = pg_query($this->cn->getConexion(), $this->report_estado_cuentas1);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_preliquidacion':
                $resultado = pg_query($this->cn->getConexion(), $this->report_preliquidacion);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_cultivos':
                $resultado = pg_query($this->cn->getConexion(), $this->report_cultivos);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_especiesrestituir':
                $resultado = pg_query($this->cn->getConexion(), $this->report_especiesrestituir);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_prodganadera':
                $resultado = pg_query($this->cn->getConexion(), $this->report_prodganadera);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;
            case 'report_sistemaprodganadera':


                $resultado = pg_query($this->cn->getConexion(), $this->report_sistemaprodganadera);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_predios':
                $resultado = pg_query($this->cn->getConexion(), $this->report_predios);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;


            case 'report_superficies':
                $resultado = pg_query($this->cn->getConexion(), $this->report_superficies);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_representante':
                $resultado = pg_query($this->cn->getConexion(), $this->report_representante);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;

                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_funcionario_abt':
                $resultado = pg_query($this->cn->getConexion(), $this->report_funcionario_abt);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;

                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td>  <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

            case 'report_funcionario_vdra':
                $resultado = pg_query($this->cn->getConexion(), $this->report_funcionario_vdra);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;

                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.="<tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

                 case 'report_resumen':
                     $resultado = pg_query($this->cn->getConexion(),  $this->templateResumen($select="", $parm="",$parm2="",$parm3=""));
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;

                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                  //  if("Monto Total Recaudado en Bolivianos"==$nombre){
                   //     $return.="  <tr><td style='height:13px;' > </td></tr> ";
                   // }
                    $return.="  <tr><td>  <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr> ";
                }
                $return.=" </table> ";
                break;


               case 'report_emitidas_inra':
                $resultado = pg_query($this->cn->getConexion(), $this->report_emitidas_inra);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;

                case 'report_devueltas_inra':
                $resultado = pg_query($this->cn->getConexion(), $this->report_devueltas_inra);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table align='left' >  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;


               case 'report_presentaron_rcia':
                $resultado = pg_query($this->cn->getConexion(), $this->report_presentaron_rcia);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table>  ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;


               case 'report_no_presentaron_rcia':
                $resultado = pg_query($this->cn->getConexion(), $this->report_no_presentaron_rcia);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;
                $tabla="";
                $tabla=" <Table align='left'>   ";
                $return.=$tabla;
                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=" <tr><td> <strong>" . $nombre . " </strong> <input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\"> </td></tr>";
                }
                $return.=" </table> ";
                break;


            default:
                break;
        }
        return $return;
    }

    function getCulumnaFilter($caso) {
////        $hostname_mdryt = "localhost";
////        $port = 5432;
////        $database_mdryt = "dbrestitucion";
////        $users = "Administrador";
////        $p = "Adabyron52.";
//        $cn = pg_connect("host={$hostname_mdryt} port={$port} dbname={$database_mdryt} user={$users} password={$p}") or trigger_error("Nombre de Usuario o Contrase�a  no v�lidos.", FATAL);
//        $return = "";
        switch ($caso) {
            case 'report_general':


                $resultado = pg_query($this->cn->getConexion(), $this->r_generalFilter);
                $num_fields = pg_num_fields($resultado);
                $info_offset1 = 1;
                $info_columns1 = 0;

                while ($info_offset1 <= $num_fields) {
                    $nombre = pg_field_name($resultado, $info_columns1);
                    $info_offset1++;
                    $info_columns1++;
                    $return.=$nombre . "<input type=\"checkbox\" name=\"" . $nombre . "\" value=\"select," . $nombre . "\">";
                }
                break;

            default:
                break;
        }
        return $return;
    }


    public function templateResumen($select,$parm,$parm2,$parm3) {
        if ($select=="") {
            $sql="select * from ";
    }else{
        $sql=$select;
    }
       // echo "<hr>";
        //echo "consulta2:".$sql;
        $sql.="
            (select r.*,r1.*,r2.*,r3.*, r36.*, r37.*, r4.*,r5.*,r6.*,r7.*,r8.*,r9.*,r10.*,r11.*,r12.*,r13.*,r14.*,r15.*,r16.*,r17.*,r18.*,r19.*,r20.*,r21.*,r22.*,r23.*, r40.*,r24.*,r25.*,
            r26.*,r27.*,r28.*,r29.*, r30.*,r31.*,r32.*,r33.*,r34.*, r38.*, r39.* ,r35.* from
(select count(\"ESTADO\") as \"TOTAL PREDIOS REGISTRADOS\" from
report_general where \"ID REGISTRO\" <> '0' ".$parm."
)as r,

(select count(\"ESTADO\") as \"TOTAL PREDIOS HABILITADOS\" from
report_general
where \"ID REGISTRO\" <> '0'and ( \"ESTADO\"='HABILITADO' or \"ESTADO\"='Habilitado para Modificar')  ".$parm.")r1,

(select count(\"ESTADO\") as \"TOTAL PREDIOS RECHAZADO\" from
report_general
where \"ID REGISTRO\" <> '0' and \"ESTADO\"='RECHAZADO' ".$parm.")as r2,

(
 select sum(evalua.prediosevaluacion) as \"TOTAL PREDIOS EN EVALUACION\" from(
 select count(\"ESTADO\") as prediosevaluacion from
report_general
where \"ID REGISTRO\" <> '0' and \"ESTADO\"='EN EVALUACION' ".$parm."
 union
 select count(\"ESTADO\") as prediosevaluacion from
report_general
where \"ID REGISTRO\" <> '0' and \"ESTADO\"='Boleta Preliquidacion Generada' ".$parm."
)as evalua
)as r3,

(select sum(\"SUP TOTAL\") as \"SUPERFICIE TOTAL PREDIOS REGISTRADOS (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r4,


(select count(\"ID REGISTRO\") as \"CARPETAS REMITIDAS AL INRA\" from
report_nota_gen where idunidad = 253 ".$parm." )as r36,


(select count(\"ID REGISTRO\") as \"CARPETAS DEVUELTAS DEL INRA\" from
report_nota_gen where idunidad = 255 ".$parm.")as r37,



(select sum(\"SUP DEFORESTADA ILEGAL\") as \"TOTAL SUPERFICIE DE DESMONTE SIN AUTORIZACION 1996-2011 (ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r5,

(select sum(\"SUP TPFP\") as \"SUPERFICIE TOTAL DESMONTE EN TPFP  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r6,

(select sum(\"SUP TUM\") as \"SUPERFICIE TOTAL DESMONTE EN TUM  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r7,

(select sum(\"SUP REFORESTAR TPFP\") as \"SUPERFICIE RESTITUIR TPFP 10%  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r8,

(select  round((sum(\"SUP REFORESTAR TUM\"))::numeric(15,4), 4) as \"SUPERFICIE RESTITUIR TUM  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r9,

(select sum(\"SUP SELS TPFP REFORESTAR\") as \"SUPERFICIE SELS A RESTITUIR EN TPFP  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r10,


(select sum(\"SUP SELS TUM REFORESTAR\") as \"SUPERFICIE SELS A RESTITUIR EN TUM  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r11,

(select sum(\"SUP SELS TPFP CONSERVAR\") as \"SUPERFICIE SELS A CONSERVAR EN TPFP  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r12,

(select sum(\"SUP SELS TUM CONSERVAR\") as \"SUPERFICIE SELS A CONSERVAR EN TUM  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r13,

(select sum(\"SUP PAS\") as \"TOTAL SUPERFICIE DE DESMONTE CON PAS 1996-2011  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r14,

(select sum(\"SUP TPFP PAS\") as \"SUPERFICIE TOTAL DESMONTE EN TPFP PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r15,

(select sum(\"SUP TUM PAS\") as \"SUPERFICIE TOTAL DESMONTE EN TUM PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r16,

(select sum(\"SUP REFORESTAR TPFP PAS\") as \"TOTAL DE SUPERFICIES RESTITUIR TPFP 10% PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r17,

(select sum(\"SUP REFORESTAR TUM PAS\") as \"TOTAL DE SUPERFICIES RESTITUIR TUM PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r18,

(select sum(\"SUP SELS TPFP REFORESTAR PAS\") as \"SUPERFICIES SELS RESTITUIR EN TPFP PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r19,

(select sum(\"SUP SELS TUM REFORESTAR PAS\") as \"SUPERFICIES SELS RESTITUIR EN TUM PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r20,


(select sum(\"SUP SELS TPFP CONSERVAR PAS\") as \"SUPERFICIES SELS CONSERVAR EN TPFP PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r21,

(select sum(\"SUP SELS TUM CONSERVAR PAS\") as \"SUPERFICIES SELS CONSERVAR EN TUM PAS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r22,

( SELECT (
  round((sum(\"SUP DEFORESTADA ILEGAL\"))::numeric(15,4), 4) +
  round((sum(\"SUP PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL SUPERFICIE DE DESMONTE INSCRITA AL PPARB 1996-2011   (Ha)\"
  FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r23,

( SELECT (
  round((sum(\"SUP REFORESTAR TPFP\"))::numeric(15,4), 4) +
  round((sum(\"SUP REFORESTAR TPFP PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL GENERAL SUPERFICIE A RESTITUCION TPFP 10 %  (Ha)\"
  FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r24,

( SELECT (
  round((sum(\"SUP REFORESTAR TUM\"))::numeric(15,4), 4) +
  round((sum(\"SUP REFORESTAR TUM PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL GENERAL SUPERFICIE A RESTITUCION TUM  (Ha)\"
  FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r25,

( SELECT (
  round((sum(\"SUP SELS TPFP REFORESTAR\"))::numeric(15,4), 4) +
  round((sum(\"SUP SELS TPFP REFORESTAR PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL GENERAL SUPERFICIE SELS A RESTITUIR EN TPFP  (Ha)\"
  FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r26,

( SELECT (
  round((sum(\"SUP SELS TUM REFORESTAR\"))::numeric(15,4), 4) +
  round((sum(\"SUP SELS TUM REFORESTAR PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL GENERAL SUPERFICIE SELS A RESTITUIR EN TUM  (Ha)\"
  FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r27,

( SELECT (
  round((sum(\"SUP REFORESTAR TPFP\"))::numeric(15,4), 4) +
  round((sum(\"SUP REFORESTAR TPFP PAS\"))::numeric(15,4), 4)+
  round((sum(\"SUP REFORESTAR TUM\"))::numeric(15,4), 4) +
  round((sum(\"SUP REFORESTAR TUM PAS\"))::numeric(15,4), 4)+
   round((sum(\"SUP SELS TPFP REFORESTAR\"))::numeric(15,4), 4)+
    round((sum(\"SUP SELS TPFP REFORESTAR PAS\"))::numeric(15,4), 4)+
       round((sum(\"SUP SELS TUM REFORESTAR\"))::numeric(15,4), 4)+
     round((sum(\"SUP SELS TUM REFORESTAR PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL SUPERFICIE COMPROMETIDA A RESTITUCION  (Ha)\" FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r28,

( SELECT (
  round((sum(\"SUP SELS TPFP CONSERVAR\"))::numeric(15,4), 4) +
  round((sum(\"SUP SELS TPFP CONSERVAR PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL GENERAL SUPERFICIES SELS CONSERVAR EN TPFP  (Ha)\"
  FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r29,

( SELECT (
  round((sum(\"SUP SELS TUM CONSERVAR\"))::numeric(15,4), 4) +
  round((sum(\"SUP SELS TUM CONSERVAR PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL GENERAL SUPERFICIES SELS CONSERVAR EN TUM  (Ha)\"
  FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r30,

( SELECT (
  round((sum(\"SUP SELS TPFP CONSERVAR\"))::numeric(15,4), 4) +
  round((sum(\"SUP SELS TPFP CONSERVAR PAS\"))::numeric(15,4), 4)+
  round((sum(\"SUP SELS TUM CONSERVAR\"))::numeric(15,4), 4) +
  round((sum(\"SUP SELS TUM CONSERVAR PAS\"))::numeric(15,4), 4)
  )
  AS \"TOTAL SUPERFICIE COMPROMETIDA A CONSERVACION  (Ha)\" FROM report_general where \"ID REGISTRO\" <> '0'  ".$parm." )as r31,

(select sum(\"SUP PRODUCCION ALIMENTO\") as \"SUPERFICIE COMPROMETIDA A LA PRODUCCION DE ALIMENTOS  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r32,



(select sum(\"SUP AGRICOLA\") as \"SUPERFICIE PRODUCCION AGRICOLA  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.") as r33,


(select sum(\"SUP GANADERA\") as \"SUPERFICIE PRODUCCION GANADERA  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r34,

(select sum(\"SUP BARBECHO\") as \"SUPERFICIE BARBECHO  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r38,

(select sum(\"SUP DESCANSO\") as \"SUPERFICIE DESCANSO  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r39,

(select sum(\"SUP RECHAZADA\") as \"SUPERFICIE RECHAZADA  (Ha)\" from
report_general
where \"ID REGISTRO\" <> '0' ".$parm.")as r40,


(
select mt1.*,mt2.*,
mt2.\"Monto A Recaudar en Bolivianos\" - mt1.\"Monto Total Recaudado en Bolivianos\" as \"Monto Por Recaudar en Bolivianos\"
from
(
SELECT
  sum(\"MONTO DEPOSITO\") AS \"Monto Total Recaudado en Bolivianos\"
FROM report_pagos
where \"ID REGISTRO\" <> '0' ".$parm2.")as mt1,
(
SELECT
  sum(\"MONTO TOTAL(bs)\") AS \"Monto A Recaudar en Bolivianos\"
FROM report_preliquidacion
where \"ID REGISTRO\" <> '0' ".$parm3.")as mt2
) as r35)as report_resumen;
";
        return $sql;
    }
}
