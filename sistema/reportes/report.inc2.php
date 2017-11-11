<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 //include('../includes/javabridge.php');
 require_once('http://localhost:8080/JavaBridge/java/Java.inc');
java_set_file_encoding("UTF-8");
$Reporte='C://xampp//htdocs//PPARB//sistema//reportes//jasper//'.$japerReport;
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//PPARB//sistema//reportes//tmp//'.$filename; 
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
		if($report_parametro_1){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_1", $report_parametro_1); 
	}
			if($report_parametro_2){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_1", $report_parametro_1); 
	}

			if($report_parametro_2){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_2", $report_parametro_2); 
	}

			if($report_parametro_3){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_3", $report_parametro_3); 
	}
		if($report_parametro_4){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_4", $report_parametro_4); 
	}
		if($report_parametro_5){
    //$Parametro->put('URL_IMG', realpath('mdryt.jpg'));
	$Parametro->put("report_parametro_5", $report_parametro_5); 
	}

	//Funcion de Conexion a mi Base de datos tipo MySql
	//$Conexion= new	JdbcConnection("org.postgresql.Driver","jdbc:postgresql://localhost:5432/dbrestitucion","Administrador","Adabyron52.");
	//Generamos la Exportacion del reporte







// Load the Jasper Report

//$jrxml = new java("net.sf.jasperreports.engine.xml.JRXmlLoader");
//$jasperTemplate = $jrxml->load(realpath("customer.jrxml"));

// Load the Query 

//$_Query = new java("net.sf.jasperreports.engine.design.JRDesignQuery");
//$_Query->setText("select * FROM customers");
//$jasperTemplate->setQuery($_Query);

// Compile the Report after including the Query

$compile = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
//$report = $compile->compileReport($jasperTemplate);
$report=$Reporte;
// Connect to the database

$class = new JavaClass("java.lang.Class");
$class->forName("org.postgresql.Driver");
$mysqlDriver = new JavaClass("java.sql.DriverManager");
$conn = $mysqlDriver->getConnection("jdbc:postgresql://localhost:5432/dbrestitucion?user=postgres&password=Insidei7.");
//Funcion de Conexion a mi Base de datos tipo MySql
	
// Now Fill the Report 
$jasperFill = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
///$params = new Java("java.util.HashMap");
$params=$Parametro;
///$params->put("title", "Customer");
$jasperPrint = $jasperFill->fillReport($report, $params, $conn);

// Now Export the Report to desired format 

$jasperExport = new java("net.sf.jasperreports.engine.JRExporter");

    // Change here to generate report in pdf , excel,docx etc.. 
///$Format = "pdf";
$Format=$caso;
switch ($Format)
{
    case 'xls':
         java_set_file_encoding("ISO-8859-1");   
        $outputPath = realpath(".") . "\\".$filename.".xls";
        $jasperExport = new java("net.sf.jasperreports.engine.export.JRXlsExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRXlsExporterParameter")->IS_ONE_PAGE_PER_SHEET, java("java.lang.Boolean")->TRUE);
        
         $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRCsvExporterParameter")->CHARACTER_ENCODING, "UTF-8");
        
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRXlsExporterParameter")->IS_WHITE_PAGE_BACKGROUND, java("java.lang.Boolean")->FALSE);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRXlsExporterParameter")->IS_REMOVE_EMPTY_SPACE_BETWEEN_ROWS, java("java.lang.Boolean")->TRUE);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
       
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=output.xls");
  
     
        break;
    case 'csv':
        $outputPath = realpath(".") . "\\" .$filename. ".csv";
        $jasperExport = new java("net.sf.jasperreports.engine.export.JRCsvExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRCsvExporterParameter")->FIELD_DELIMITER, ",");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRCsvExporterParameter")->RECORD_DELIMITER, "\n");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRCsvExporterParameter")->CHARACTER_ENCODING, "UTF-8");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=output.csv");
        break;
    case 'docx':
        $outputPath = realpath(".") . "\\" . $filename.".docx";
        $jasperExport = new java("net.sf.jasperreports.engine.export.ooxml.JRDocxExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment; filename=output.docx");
        break;
    case 'html':
        $outputPath = realpath(".") . "\\". $filename. ".html";
        $jasperExport = new java("net.sf.jasperreports.engine.export.JRHtmlExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        break;
    case 'pdf':
        $outputPath = realpath(".") . "\\" .$filename. ".pdf";
        $jasperExport = new java("net.sf.jasperreports.engine.export.JRPdfExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=".$filename.".pdf");
        break;
    case 'ods':
        $outputPath = realpath(".") . "\\" . $filename. ".ods";
        $jasperExport = new java("net.sf.jasperreports.engine.export.oasis.JROdsExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: application/vnd.oasis.opendocument.spreadsheet");
        header("Content-Disposition: attachment; filename=". $filename.".ods");
        break;
    case 'odt':
        $outputPath = realpath(".") . "\\" . $filename.".odt";
        $jasperExport = new java("net.sf.jasperreports.engine.export.oasis.JROdtExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: application/vnd.oasis.opendocument.text");
        header("Content-Disposition: attachment; filename=". $filename.".odt");
        break;
    case 'txt':
        $outputPath = realpath(".") . "\\" . $filename. ".txt";
        $jasperExport = new java("net.sf.jasperreports.engine.export.JRTextExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRTextExporterParameter")->PAGE_WIDTH, 120);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.export.JRTextExporterParameter")->PAGE_HEIGHT, 60);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: text/plain");
        break;
    case 'rtf':
        $outputPath = realpath(".") . "\\" . $filename. ".rtf";
        $jasperExport = new java("net.sf.jasperreports.engine.export.JRRtfExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: application/rtf");
        header("Content-Disposition: attachment; filename=". $filename.".rtf");
        break;
    case 'pptx':
         $outputPath = realpath(".") . "\\" . $filename. ".pptx";
        $jasperExport = new java("net.sf.jasperreports.engine.export.ooxml.JRPptxExporter");
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->JASPER_PRINT, $jasperPrint);
        $jasperExport->setParameter(java("net.sf.jasperreports.engine.JRExporterParameter")->OUTPUT_FILE_NAME, $outputPath);
        header("Content-type: aapplication/vnd.ms-powerpoint");
        header("Content-Disposition: attachment; filename=". $filename.".pptx");
      break;
}
$jasperExport->exportReport();

readfile($outputPath);
unlink($outputPath);
exit();