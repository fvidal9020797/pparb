<?php
$output_dir = "uploads/";
if(isset($_POST["op"]) && $_POST["op"] == "done" && isset($_POST['name']))
{
	$fileName =$_POST['name'];
	$filePath = $output_dir. $fileName;
	if (file_exists($filePath)) 
	{
        unlink($filePath);
    }
	echo "save File ".$fileName."<br>";
}

?>