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
class Codificadores {
    protected $cn2;
    //put your code here
    function __construct() {
         require_once APPPATH.'/config/Conexion.php';
        $this->cn2 = Conexion::create();
    }
 function getByIdCodificador($idCodificador) {
          $sql_list2= 'select idcodificadores,idclasificador,nombrecodificador from codificadores
          where idcodificadores='.$idCodificador.'order by idcodificadores asc';
         return $list2 = pg_query($this->cn2->getConexion(), $sql_list2);     
          
    }










 function getByClasificador($idClasificador, $requiere) {
          $sql_list= 'select idclasificador,nombreclasificador from clasificador
          where idclasificador='.$idClasificador;
          $list = pg_query($this->cn2->getConexion(), $sql_list);
          $row = pg_fetch_array($list);
          $sql_list2= 'select idcodificadores,nombrecodificador from codificadores
          where idclasificador='.$idClasificador.'order by idcodificadores asc';
          $list2 = pg_query($this->cn2->getConexion(), $sql_list2);
          //$row_list= pg_fetch_array ($list);
            $select_tipo = 
          $select_tipo = "<div class='left-text' >". $row['nombreclasificador'] ."</div>";
         
          $select_tipo.="<div class='right-text'><select id='".$idClasificador."' name='".$idClasificador."' ".$requiere."='".$requiere."'  >";

          $a=htmlspecialchars(@$_SESSION['ctform'][$row['idclasificador']]);
                  // $select_tipo.= @$_SESSION['ctform'][$row['id_clasificador']];
          $select_tipo.="<option value=''></option>";
           while ($row2 = pg_fetch_array($list2)) {
            if ($a==$row2['idcodificadores']) {
             $select_tipo.="<option selected='true' value='" . $row2['idcodificadores'] . "'>".$row2['nombrecodificador'] . "</option>";
            }else{
              $select_tipo.="<option value='" . $row2['idcodificadores'] . "'>" . $row2['nombrecodificador']. "</option>";
            }
          }
          $select_tipo.='</select></div>';
          /* fin select estado */
          return $select_tipo;
    }
	
function getByClasificadordos($idClasificador, $requiere) {
             $sql_list= 'select idclasificador,nombreclasificador from clasificador
             where idclasificador='.$idClasificador;
             $list = pg_query($this->cn2->getConexion(), $sql_list);
             $row = pg_fetch_array($list);
             $sql_list2= 'select idcodificadores,nombrecodificador from codificadores
             where orden <> 0 and idclasificador='.$idClasificador.'order by idcodificadores asc';
             $list2 = pg_query($this->cn2->getConexion(), $sql_list2);
             //$row_list= pg_fetch_array ($list);
               $select_tipo =
             $select_tipo = "<div class='left-text' >". $row['nombreclasificador'] ."</div>";

             $select_tipo.="<div class='right-text'><select id='".$idClasificador."' name='".$idClasificador."' ".$requiere."='".$requiere."'  >";

             $a=htmlspecialchars(@$_SESSION['ctform'][$row['idclasificador']]);
                     // $select_tipo.= @$_SESSION['ctform'][$row['id_clasificador']];
             $select_tipo.="<option value=''></option>";
              while ($row2 = pg_fetch_array($list2)) {
               if ($a==$row2['idcodificadores']) {
                $select_tipo.="<option selected='true' value='" . $row2['idcodificadores'] . "'>".$row2['nombrecodificador'] . "</option>";
               }else{
                 $select_tipo.="<option value='" . $row2['idcodificadores'] . "'>" . $row2['nombrecodificador']. "</option>";
               }
             }
             $select_tipo.='</select></div>';
             /* fin select estado */
             return $select_tipo;
       }
    

 function getByClasificadorName($idClasificador, $requiere, $name) {
  
          $sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
          where id_clasificador='.$idClasificador;
          $list = pg_query($this->cn2->getConexion(), $sql_list);
          $row = pg_fetch_array($list);
          $sql_list2= 'select id_codificadores,nombre_codificador from codificadores
          where id_clasificador='.$idClasificador.'order by id_codificadores asc';
          $select_tipo="";
          $list2 = pg_query($this->cn2->getConexion(), $sql_list2);
        $select_tipo.="<select id='".$idClasificador.$name."' name='".$idClasificador.$name."' ".$requiere."='".$requiere."' >";
      
          $a=htmlspecialchars(@$_SESSION['ctform'][$row['id_clasificador'].$name]);
          $select_tipo.="<option value=''></option>";
          while ($row2 = pg_fetch_array($list2)) {
             if ($a==$row2['id_codificadores']) {
               $select_tipo.="<option selected='true' value='" . $row2['id_codificadores'] . "'>" . $row2['nombre_codificador'] . "</option>";
              }else{
               $select_tipo.="<option value='" . $row2['id_codificadores'] . "'>" . $row2['nombre_codificador'] . "</option>";
              }
          }
        
          $select_tipo.='</select>';
          /* fin select estado */
          return $select_tipo;
    }
    function getByClasificadorNameMultiple($idClasificador, $requiere, $name) {
  
          $sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
          where id_clasificador='.$idClasificador;
          $list = pg_query($this->cn2->getConexion(), $sql_list);
          $row = pg_fetch_array($list);
          $sql_list2= 'select id_codificadores,nombre_codificador from codificadores
          where id_clasificador='.$idClasificador.'order by id_codificadores asc';
          $select_tipo="";

          $list2 = pg_query($this->cn2->getConexion(), $sql_list2);
        $select_tipo.="<select multiple='multiple' id='".$idClasificador.$name."' name='".$idClasificador.$name."[]' ".$requiere."='".$requiere."' onchange=\"console.log($(this).children(':selected').length)\" class='testsel' >";
                   $select_tipo.= @$_SESSION['ctform'][$row['id_clasificador']];
          while ($row2 = pg_fetch_array($list2)) {
               $select_tipo.="<option value='" . $row2['id_codificadores'] . "'>" . $row2['nombre_codificador'] . "</option>";
          }
          $select_tipo.='</select>';
          /* fin select estado */
          return $select_tipo;
    }

function getByClasificadorbloque($idClasificador, $requiere) {
 $sql_list= 'select id_clasificador,nombre_clasificador from clasificadores where id_clasificador='.$idClasificador; 
 $list = pg_query($this->cn2->getConexion(), $sql_list); $row = pg_fetch_array($list);

 $sql_list2= 'select id_codificadores,nombre_codificador from codificadores where id_clasificador='.$idClasificador;
 $list2 = pg_query($this->cn2->getConexion(), $sql_list2);

  $sql_list3= 'select id_codificadores,nombre_codificador,codigo from codificadores where id_clasificador= 45 order by id_codificadores asc'; 
  $list3 = pg_query($this->cn2->getConexion(), $sql_list3); 
  /*$array_auxiliar=array();
  while ($row3 = pg_fetch_array($list3)) { 
    $array_auxiliar = array_push($array_auxiliar,$row3['id_codificadores'] =>$row3['codigo']."-".$row3['nombre_codificador']  );
  }*/
  $array_auxiliar=array(261=>"1-Inferior",262=>"2-Medio",263=>"3-Superior");

$lista_clasificador=""; $select_tipo =""; $i=0; 
while ($row2 = pg_fetch_array($list2)) {
 $lista_clasificador.=$row2['id_codificadores']."-"; 
 $select_tipo .= "<div class='left-title'><h2>". $row2['nombre_codificador'] ."</h2></div>"; 

    $select_tipo.=" <div class='left-1'> <p> <label for='".$row2['nombre_codificador']."a'></label>";
    
     $select_tipo.="<select id='".$row2['id_codificadores']."a' name='".$row2['id_codificadores']."a' >";
 
         $a=htmlspecialchars(@$_SESSION['ctform'][$row2['id_codificadores'].'a']);
          $select_tipo.="<option value=''></option>";
           foreach ($array_auxiliar as $k => $v) { 

              if ($a==$k) { 
                $select_tipo.="<option selected='true' value='" . $k . "'>" . $v . "</option>"; 
              }else{ 
                $select_tipo.="<option value='" . $k . "'>" . $v . "</option>";  } 
           } 
   $select_tipo.="</select>


   </p> </div>";

$select_tipo.=" <div class='left-1'> <p> <label for='".$row2['nombre_codificador']."b'></label>";
   

     $select_tipo.="<select id='".$row2['id_codificadores']."b' name='".$row2['id_codificadores']."b' >";

         $a=htmlspecialchars(@$_SESSION['ctform'][$row2['id_codificadores'].'b']);
          $select_tipo.="<option value=''></option>";
           foreach ($array_auxiliar as $k => $v) { 

              if ($a==$k) { 
                $select_tipo.="<option selected='true' value='" . $k . "'>" . $v . "</option>"; 
              }else{ 
                $select_tipo.="<option value='" . $k . "'>" . $v . "</option>";  } 
           } 
   $select_tipo.="</select>

   </p> </div>";


$select_tipo.=" <div class='left-1'> <p> <label for='".$row2['nombre_codificador']."c'></label>";
    $select_tipo.="<select id='".$row2['id_codificadores']."c' name='".$row2['id_codificadores']."c' >";

         $a=htmlspecialchars(@$_SESSION['ctform'][$row2['id_codificadores'].'c']);
          $select_tipo.="<option value=''></option>";
           foreach ($array_auxiliar as $k => $v) { 

              if ($a==$k) { 
                $select_tipo.="<option selected='true' value='" . $k . "'>" . $v . "</option>"; 
              }else{ 
                $select_tipo.="<option value='" . $k . "'>" . $v . "</option>";  } 
           }  
   $select_tipo.="</select>

   </p> </div>";



$select_tipo.=" <div class='left-1'> <p> <label for='".$row2['nombre_codificador']."d'></label>";
    $select_tipo.="<select id='".$row2['id_codificadores']."d' name='".$row2['id_codificadores']."d' >";

         $a=htmlspecialchars(@$_SESSION['ctform'][$row2['id_codificadores'].'d']);
          $select_tipo.="<option value=''></option>";
          foreach ($array_auxiliar as $k => $v) { 

              if ($a==$k) { 
                $select_tipo.="<option selected='true' value='" . $k . "'>" . $v . "</option>"; 
              }else{ 
                $select_tipo.="<option value='" . $k . "'>" . $v . "</option>";  } 
           } 
   $select_tipo.="</select>

   </p> </div>";



$select_tipo.=" <div class='left-1'> <p> <label for='".$row2['nombre_codificador']."e'></label>";
     $select_tipo.="<select id='".$row2['id_codificadores']."e' name='".$row2['id_codificadores']."e' >";

         $a=htmlspecialchars(@$_SESSION['ctform'][$row2['id_codificadores'].'e']);
          $select_tipo.="<option value=''></option>";
           foreach ($array_auxiliar as $k => $v) { 

              if ($a==$k) { 
                $select_tipo.="<option selected='true' value='" . $k . "'>" . $v . "</option>"; 
              }else{ 
                $select_tipo.="<option value='" . $k . "'>" . $v . "</option>";  } 
           } 
   $select_tipo.="</select>

   </p> </div>";



$select_tipo.=" <div class='left-1'> <p> <label for='".$row2['nombre_codificador']."f'></label>";
     $select_tipo.="<select id='".$row2['id_codificadores']."f' name='".$row2['id_codificadores']."f' >";

         $a=htmlspecialchars(@$_SESSION['ctform'][$row2['id_codificadores'].'f']);
          $select_tipo.="<option value=''></option>";
           foreach ($array_auxiliar as $k => $v) { 

              if ($a==$k) { 
                $select_tipo.="<option selected='true' value='" . $k . "'>" . $v . "</option>"; 
              }else{ 
                $select_tipo.="<option value='" . $k . "'>" . $v . "</option>";  } 
           } 
   $select_tipo.="</select>

   </p> </div>";

$select_tipo.="<div class='line'> </div>"; $i=$i++; 
} 


$select_tipo.=" <input type='hidden' name='action2' value='".$lista_clasificador."' />";

/* fin select estado */ return $select_tipo; 

}


function getByClasificadorbloqueRadio($idClasificador, $requiere) {
          $sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
          where id_clasificador='.$idClasificador;
          $list = pg_query($this->cn2->getConexion(), $sql_list);
          $row = pg_fetch_array($list);

          $sql_list2= 'select id_codificadores,nombre_codificador from codificadores
          where id_clasificador='.$idClasificador;
          $list2 = pg_query($this->cn2->getConexion(), $sql_list2);
          
             $select_tipo ="";
            while ($row2 = pg_fetch_array($list2)) {
               
                $select_tipo .= "<div class='left-title'><h2>". $row2['nombre_codificador'] ."</h2></div>";
                $select_tipo.="   
                 <div class='left-1'>
                  <p>
                      <label for='".$row2['nombre_codificador']."a'></label>";
                      $select_tipo.="<input  id='".$row2['nombre_codificador']."a' name='".$row['id_clasificador']."a' type='radio'  
                         
                           value='". htmlspecialchars($row2['id_codificadores'])."'";
                         if(isset($_SESSION["ctform"][$row2['id_codificadores'].'a'])){
                              $select_tipo.=" checked";
                          }

                         $select_tipo.=" />
                 
 
                  </p>
                </div>";
                $select_tipo.="   
                <div class='left-1'>
                  <p>
                      <label for='".$row2['nombre_codificador']."b'></label>";
                      $select_tipo.="<input  id='".$row2['nombre_codificador']."b' name='".$row['id_clasificador']."b' type='radio'   
                         value='". htmlspecialchars($row2['id_codificadores'])."'";
                         if(isset($_SESSION["ctform"][$row2['id_codificadores'].'b'])){
                              $select_tipo.=" checked";
                          }

                         $select_tipo.=" />
                  </p>
                </div>";
                $select_tipo.="   
                <div class='left-1'>
                  <p>
                      <label for='".$row2['nombre_codificador']."c'></label>";
                      $select_tipo.="<input  id='".$row2['nombre_codificador']."c' name='".$row['id_clasificador']."c' type='radio'  
                        value='". htmlspecialchars($row2['id_codificadores'])."'";
                         if(isset($_SESSION["ctform"][$row2['id_codificadores'].'c'])){
                              $select_tipo.=" checked";
                          }

                         $select_tipo.=" />
                  </p>
                </div>";
                $select_tipo.="   
                <div class='left-1'>
                  <p>
                      <label for='".$row2['nombre_codificador']."d'></label>";
                      $select_tipo.="<input  id='".$row2['nombre_codificador']."d' name='".$row['id_clasificador']."d' type='radio'  
                         value='". htmlspecialchars($row2['id_codificadores'])."'";
                         if(isset($_SESSION["ctform"][$row2['id_codificadores'].'d'])){
                              $select_tipo.=" checked";
                          }

                         $select_tipo.=" />
                  </p>
                </div>";
                $select_tipo.="   
                <div class='left-1'>
                  <p>
                      <label for='".$row2['nombre_codificador']."e'></label>";
                      $select_tipo.="<input  id='".$row2['nombre_codificador']."e' name='".$row['id_clasificador']."e' type='radio'   
                          value='". htmlspecialchars($row2['id_codificadores'])."'";
                         if(isset($_SESSION["ctform"][$row2['id_codificadores'].'e'])){
                              $select_tipo.=" checked";
                          }

                         $select_tipo.=" />
                  </p>
                </div>";
                $select_tipo.="   
                <div class='left-1'>
                  <p>
                      <label for='".$row2['nombre_codificador']."f'></label>";
                      $select_tipo.="<input  id='".$row2['nombre_codificador']."f' name='".$row2['id_codificadores']."f' type='radio'   
                          value='". htmlspecialchars($row2['id_codificadores'])."'";
                         if(isset($_SESSION["ctform"][$row2['id_codificadores'].'f'])){
                              $select_tipo.=" checked";
                          }

                         $select_tipo.=" />
                  </p>
                </div>";
                      

                 $select_tipo.="<div class='line'> </div>";
    
               }
            
         
            

          /* fin select estado */
          return $select_tipo;
    }





function getRadioByClasificador($idClasificador, $requiere) {

$sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
where id_clasificador='.$idClasificador;
$list = pg_query($this->cn2->getConexion(), $sql_list);
$row = pg_fetch_array($list);

$sql_list2= 'select id_codificadores,nombre_codificador from codificadores
where id_clasificador='.$idClasificador;
$list2 = pg_query($this->cn2->getConexion(), $sql_list2);
//$row_list= pg_fetch_array ($list);
$select_tipo ='<div class="left-title"><h2>' . $row['nombre_clasificador'] . '</h2></div >';
$i=1;
while ($row2 = pg_fetch_array($list2)) {
  $select_tipo.='   
  <div class="left-1">
    <p>
        <label>
        ' . $row2['nombre_codificador'] . '
      </label>
      <input type="radio" value="' . $row2['id_codificadores'] . '" id="'.$idClasificador.'-'.$i.'" name="'.$idClasificador.'" '.$requiere.'="'.$requiere.'">
  </p>
</div>';
$i++;
}
/* fin select estado */
return $select_tipo;
    }


    
function getRadioSingleByClasificador($idClasificador, $requiere) {

$sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
where id_clasificador='.$idClasificador;
$list = pg_query($this->cn2->getConexion(), $sql_list);
$row = pg_fetch_array($list);

$sql_list2= 'select id_codificadores,nombre_codificador from codificadores
where id_clasificador='.$idClasificador;
$list2 = pg_query($this->cn2->getConexion(), $sql_list2);
//$row_list= pg_fetch_array ($list);
//$select_tipo ='<div class="left-title"><h2>' . $row['nombre_clasificador'] . '</h2></div >';
$select_tipo ="";
$i=1;
while ($row2 = pg_fetch_array($list2)) {
  $select_tipo.='   
  <div class="left-radio">
    <p>
        <label>
        ' . $row2['nombre_codificador'] . '
      </label>
      <input type="radio" value="' . $row2['id_codificadores'] . '" id="'.$idClasificador.'-'.$i.'" name="'.$idClasificador.'" '.$requiere.'="'.$requiere.'">
  </p>
</div>';
$i++;
}
/* fin select estado */
return $select_tipo;
    }



    function getCheckboxByClasificador($idClasificador, $requiere) {

$sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
where id_clasificador='.$idClasificador;
$list = pg_query($this->cn2->getConexion(), $sql_list);
$row = pg_fetch_array($list);

$sql_list2= 'select id_codificadores,nombre_codificador from codificadores
where id_clasificador='.$idClasificador;
$list2 = pg_query($this->cn2->getConexion(), $sql_list2);
//$row_list= pg_fetch_array ($list);
$select_tipo ='<div class="left-title"><h2>' . $row['nombre_clasificador'] . '</h2></div >';
$i=1;
while ($row2 = pg_fetch_array($list2)) {
  $select_tipo.='   
  <div class="left-1">
    <p>
        <label>
        ' . $row2['nombre_codificador'] . '
      </label>
      <input type="checkbox" value="' . $row2['id_codificadores'] . '" id="'.$idClasificador.'-'.$i.'" name="'.$idClasificador.'[]" '.$requiere.'="'.$requiere.'">
  </p>
</div>';
$i++;
}
/* fin select estado */
return $select_tipo;
    }
  

 function getCheckboxSingleByClasificador($idClasificador, $requiere,$name) {

$sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
where id_clasificador='.$idClasificador;
$list = pg_query($this->cn2->getConexion(), $sql_list);
$row = pg_fetch_array($list);

$sql_list2= 'select id_codificadores,nombre_codificador from codificadores
where id_clasificador='.$idClasificador;
$list2 = pg_query($this->cn2->getConexion(), $sql_list2);
//$row_list= pg_fetch_array ($list);
$select_tipo ='<div class="line-2"><h2>' . $row['nombre_clasificador'] . '</h2></div >';
$i=1;
$b[]="null";
  $a= @$_SESSION['ctform'][$row['id_clasificador'].$name]=="" ? $b : $_SESSION['ctform'][$row['id_clasificador'].$name];

while ($row2 = pg_fetch_array($list2)) {
 
  if (in_array($row2['id_codificadores'] , $a)) {

  $select_tipo.='   
  <div class="left-1">
    <p>
        <label>
        ' . $row2['nombre_codificador'] . '
      </label>
      <input type="checkbox" checked="checked" value="' . $row2['id_codificadores'] . '" id="'.$idClasificador.$name.'-'.$i.'" name="'.$idClasificador.$name.'[]" '.$requiere.'="'.$requiere.'">
  </p>
</div>';
 }else{
 $select_tipo.='   
  <div class="left-1">
    <p>
        <label>
        ' . $row2['nombre_codificador'] . '
      </label>
      <input type="checkbox" value="' . $row2['id_codificadores'] . '" id="'.$idClasificador.$name.'-'.$i.'" name="'.$idClasificador.$name.'[]" '.$requiere.'="'.$requiere.'">
  </p>
</div>';
 }


$i++;
}
/* fin select estado */
return $select_tipo;
    }




    function getByClasificadorbloqueA($idClasificador, $requiere,$nombre_bloque) {
$sql_list= 'select id_clasificador,nombre_clasificador from clasificadores
where id_clasificador='.$idClasificador;
$list = pg_query($this->cn2->getConexion(), $sql_list);
$row = pg_fetch_array($list);
$sql_list2= 'select id_codificadores,nombre_codificador,codigo from codificadores
where id_clasificador='.$idClasificador.'order by id_codificadores asc';
$list2 = pg_query($this->cn2->getConexion(), $sql_list2);
//$row_list= pg_fetch_array ($list);
$select_tipo="";
$select_tipo.="<select id='".$nombre_bloque."' name='".$nombre_bloque."' ".$requiere."='".$requiere."' >";

$a=htmlspecialchars(@$_SESSION['ctform'][$nombre_bloque]);
// $select_tipo.= @$_SESSION['ctform'][$row['id_clasificador']];
$select_tipo.="<option value=''></option>";
while ($row2 = pg_fetch_array($list2)) {
if ($a==$row2['id_codificadores']) {
$select_tipo.="<option selected='true' value='" . $row2['id_codificadores'] . "'>" . $row2['codigo']."-".$row2['nombre_codificador'] . "</option>";
}else{
$select_tipo.="<option value='" . $row2['id_codificadores'] . "'>" . $row2['codigo']."-". $row2['nombre_codificador']. "</option>";
}
}
$select_tipo.='</select>';
/* fin select estado */
return $select_tipo;
}
 


 function getDeptoByPais($idPais, $name,$requiere) {
        $sql_list3 = 'SELECT p2.idpolitico as iddepartamento, p2.nombrepolitico as Departamento from politico p1,politico p2
where 
p2.idpadre = p1.idpolitico
and p1.idpolitico=' . $idPais . ';';
        $list3 = pg_query($this->cn2->getConexion(), $sql_list3);
//$row_list= pg_fetch_array ($list);
        $select_dpto = '<label for="dpto">DEPARTAMENTO:</label>';
        $select_dpto.= '<select id="dpto'.$name.'" name="dpto'.$name.'" class="'.$requiere.'" >';
        $select_dpto.='<option value=""></option>';
        while ($row3 = pg_fetch_array($list3)) {
            $select_dpto.='<option value="' . $row3['iddepartamento'] .',' . $row3['departamento'] . '">' . $row3['departamento'] . '</option>';
        }
        $select_dpto.='</select>';
        return $select_dpto;
    } 
	

	 function getByClasificadorlabel($idClasificador, $requiere) {
          $sql_list= 'select idclasificador,nombreclasificador from clasificador
          where idclasificador='.$idClasificador;
          $list = pg_query($this->cn2->getConexion(), $sql_list);
          $row = pg_fetch_array($list);
          $sql_list2= 'select idcodificadores,nombrecodificador from codificadores
          where idclasificador='.$idClasificador.'order by idcodificadores asc';
          $list2 = pg_query($this->cn2->getConexion(), $sql_list2);
          //$row_list= pg_fetch_array ($list);
            $select_tipo = 
          $select_tipo = "<label for='".$idClasificador."' >". $row['nombreclasificador'] ."</label>";
         
          $select_tipo.="<select id='".$idClasificador."' name='".$idClasificador."' ".$requiere."='".$requiere."'  >";

          $a=htmlspecialchars(@$_SESSION['ctform'][$row['idclasificador']]);
                  // $select_tipo.= @$_SESSION['ctform'][$row['id_clasificador']];
          $select_tipo.="<option value=''></option>";
           while ($row2 = pg_fetch_array($list2)) {
            if ($a==$row2['idcodificadores']) {
             $select_tipo.="<option selected='true' value='" . $row2['idcodificadores'] . "'>".$row2['nombrecodificador'] . "</option>";
            }else{
              $select_tipo.="<option value='" . $row2['idcodificadores'] . "'>" . $row2['nombrecodificador']. "</option>";
            }
          }
          $select_tipo.='</select>';
          /* fin select estado */
          return $select_tipo;
    }

 
}