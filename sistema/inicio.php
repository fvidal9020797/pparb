
<?php	session_start();set_time_limit(5000); ?>

<div align="center" class="div-center">
<br>
 <h1 class="a">BIENVENIDO(A) AL SISTEMA</h1>
 <h1 class="a">
 <?php echo $_SESSION['apellido'];
 $nom = strtoupper($_SESSION['MM_Username']);
 ?></h1>
 
 
 <h1 class="a"></h1>

 <img width="250" src="./images/funcionarios/ini.png" >
 

 
 </div>