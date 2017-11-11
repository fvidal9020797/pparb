<?php

 require_once('http://localhost:8080/JavaBridge/java/Java.inc');
include_once 'conexionBD';
class jasperReport {
    
public function iniciar(){ 
    $this->javaOutputStream = new java("java.io.ByteArrayOutputStream");
}


public function rellenarReporte($reporte, $direccionReporte, $parametros){
    $this->reporteC = $reporteC;
$Conn = new java("org.altic.jasperReports.JdbcConnection");
$Conn->setDriver("com.mysql.jdbc.Driver");
$Conn->setConnectString("jdbc:mysql://127.0.0.1/encuestas");
$Conn->setUser("root");
$Conn->setPassword("");
$class = new JavaClass("java.lang.Class");
$class->forName("org.postgresql.Driver");
$mysqlDriver = new JavaClass("java.sql.DriverManager");
$conn = $mysqlDriver->getConnection("jdbc:postgresql://localhost:5432/dbrestitucion?user=Administrador&password=Adabyron52.");

if (is_string($reporte)) { $this->reportC = $reporte;
$reporte = $direccionReporte . "/". $reporte . ".jasper";
} $parametrosMap = new Java("java.util.HashMap");
$parametrosMap->put("parameter1", new Java('java.lang.String', "$parametros" ));
$objRellenar = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
$salida = $objRellenar->fillReport($reporte, $parametrosMap, $Conn->getConnection());
return $salida;

}


//funcion para el formato pdf

public function formatoPDF($reporte) { java_set_file_encoding("UTF-8");
$exportador = new java("net.sf.jasperreports.engine.export.JRPdfExporter");
$parametrosExportados = java("net.sf.jasperreports.engine.JRExporterParameter");
$exportador->setParameter($parametrosExportados->JASPER_PRINT, $reporte);
$exportador->setParameter($parametrosExportados->OUTPUT_STREAM, $this->javaOutputStream);
$exportador->exportReport(); 
//Este código sirve para abrir el archivo generado desde el explorador 
header('Content-Type: application/pdf'); 
header('Content-disposition: attachment; filename="'.$this->reportC.'.pdf"');
////forzar almacenar o abrir automaticamente 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache"); header("Expires: 0");
echo java_cast($this->javaOutputStream->toByteArray(),"S");
////se escribe en el formato la informacion del reporte 
}
//funcion para el formato docx

public function formatoWord($reporte) { java_set_file_encoding("UTF-8");
$exportador = new java("net.sf.jasperreports.engine.export.JRRtfExporter"); 
//libreria para rtf documentos word 
$parametrosExportados = java("net.sf.jasperreports.engine.JRExporterParameter"); 
$exportador->setParameter($parametrosExportados->JASPER_PRINT, $reporte); 
$exportador->setParameter($parametrosExportados->OUTPUT_STREAM, $this->javaOutputStream); 
$exportador->exportReport(); 
//Este código sirve para abrir el archivo generado desde el explorador 
header('Content-Type: application/rtf');
//tipo de archivo 
header('Content-disposition: attachment; filename="'.$this->reportC.'.rtf"');
//como mostrarlo
 header("Cache-Control: no-store, no-cache, must-revalidate"); 
 header("Cache-Control: post-check=0, pre-check=0", false); 
 header("Pragma: no-cache"); header("Expires: 0"); 
 echo java_cast($this->javaOutputStream->toByteArray(),"S");
//se escribe en el formato la informacion del reporte 
}


//funcion para el formato excel

public function formatoExcel($reporte) { java_set_file_encoding("UTF-8");
$exportador = new java("net.sf.jasperreports.engine.export.JExcelApiExporter");
$parametrosExportados = java("net.sf.jasperreports.engine.JRExporterParameter");
$exportadorParametrosExcel = java("net.sf.jasperreports.engine.export.JRXlsExporterParameter");
$exportador->setParameter($parametrosExportados->JASPER_PRINT, $reporte);
$exportador->setParameter($parametrosExportados->OUTPUT_STREAM, $this->javaOutputStream);
$exportador->setParameter($exportadorParametrosExcel->IS_ONE_PAGE_PER_SHEET, true);
$exportador->setParameter($exportadorParametrosExcel->IS_DETECT_CELL_TYPE, true);
$exportador->exportReport();
//Este código sirve para abrir el archivo generado desde el explorador 
header('Content-Type: application/xls'); 
header('Content-Transfer-Encoding: binary');
header('Content-disposition: attachment; filename="'.$this->reportC.'.xls"'); 
header("Pragma: no-cache"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Expires: 0"); echo java_cast($this->javaOutputStream->toByteArray(),"S");
//se escribe en el formato la informacion del reporte 
}


//funcion para el formato html

public function formatoHtml($reporte) { java_set_file_encoding("UTF-8");
$exportador = new java("net.sf.jasperreports.engine.export.JRHtmlExporter"); 
//libreria para html 
$parametrosExportados = java("net.sf.jasperreports.engine.JRExporterParameter"); 
$exportador->setParameter($parametrosExportados->JASPER_PRINT, $reporte); 
$exportador->setParameter($parametrosExportados->OUTPUT_STREAM, $this->javaOutputStream);
$exportador->exportReport(); 
////Este código sirve para abrir el archivo generado desde el explorador
 header('Content-Type: application/html');
 header('Content-disposition: attachment; filename="'.$this->reportC.'.html"'); 
 header("Pragma: no-cache"); header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
 header("Expires: 0"); echo java_cast($this->javaOutputStream->toByteArray(),"S");
 ////se escribe en el formato la informacion del reporte
  }
//funcion para el formato CSV (formato en donde los valores son separados por comas)

public function formatoCsv($reporte) { java_set_file_encoding("UTF-8");
$exportador = new java("net.sf.jasperreports.engine.export.JRCsvExporter");
//libreria para rtf documentos word 
$parametrosExportados = java("net.sf.jasperreports.engine.JRExporterParameter"); 
$exportador->setParameter($parametrosExportados->JASPER_PRINT, $reporte); 
$exportador->setParameter($parametrosExportados->OUTPUT_STREAM, $this->javaOutputStream); 
$exportador->exportReport(); 
//Este código sirve para abrir el archivo generado desde el explorador 
header('Content-Type: application/csv'); header('Content-disposition: attachment; filename="'.$this->reportC.'.csv"'); 
header("Pragma: no-cache"); header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Expires: 0"); echo java_cast($this->javaOutputStream->toByteArray(),"S");
////se escribe en el formato la informacion del reporte 
}
//funcion para el formato texto plano

public function formatoTextoPlano($reporte) { java_set_file_encoding("UTF-8");
$exportador = new java("net.sf.jasperreports.engine.export.JRTextExporter"); 
////libreria para rtf documentos word 
$parametrosExportados = java("net.sf.jasperreports.engine.JRExporterParameter"); 
$exportadorParametrosTxt = java("net.sf.jasperreports.engine.export.JRTextExporterParameter"); 
$exportador->setParameter($parametrosExportados->JASPER_PRINT, $reporte); 
$exportador->setParameter($parametrosExportados->OUTPUT_STREAM, 
        $this->javaOutputStream); $exportador->setParameter($exportadorParametrosTxt->CHARACTER_WIDTH, 5); 
        $exportador->setParameter($exportadorParametrosTxt->CHARACTER_HEIGHT, 5);
        $exportador->exportReport();
        //Este código sirve para abrir el archivo generado desde el explorador 
        header('Content-Type: application/txt'); 
        header('Content-disposition: attachment; filename="'.$this->reportC.'.txt"');
        header("Pragma: no-cache"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); header("Expires: 0"); 
        echo java_cast($this->javaOutputStream->toByteArray(),"S");
        ////se escribe en el formato la informacion del reporte 
        }
//funcion para el formato xml

public function formatoXml($reporte) { 
//utililiza la libreria DTD para generar reportes en XML 
    java_set_file_encoding("UTF-8"); 
    $exportador = new java("net.sf.jasperreports.engine.export.JRXmlExporter");
//libreria para reportes en xml 
$parametrosExportados = java("net.sf.jasperreports.engine.JRExporterParameter");
$exportador->setParameter($parametrosExportados->JASPER_PRINT, $reporte);
$exportador->setParameter($parametrosExportados->OUTPUT_STREAM, $this->javaOutputStream); 
$exportador->exportReport(); 
//Este código sirve para abrir el archivo generado desde el explorador 
header('Content-Type: application/jrpxml'); 
header('Content-disposition: attachment; filename="'.$this->reportC.'.xml"'); 
header("Pragma: no-cache"); header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Expires: 0"); echo java_cast($this->javaOutputStream->toByteArray(),"S");
//se escribe en el formato la informacion del reporte
}
}
?>
