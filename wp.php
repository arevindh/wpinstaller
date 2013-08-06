<?php
/* Wordpress Easy Instaler */
/* Version 0.8b */
/* Coded By Siddhu arevindh
lab.arevindh.com 
Email : siddhu@arevindh.com
*/


/* save files from wordpress.org */


$root = realpath(dirname(__FILE__));

$page=$_GET['step'];

$source=$root."/wordpress/";
$destination=$root."/";

if (isset($_GET['step'])) { }
else 

{     
         echo "<h2> Wordpress Easy Install </h2> <br />";
   echo "<a href='wp.php?step=1'> Proceed with Install </a>";
	 echo " <br /> <br /> <br /> Script By <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";
}

if ($page==1)
{

	$wpinstall = file_get_contents("http://wordpress.org/latest.zip"); 
	file_put_contents("wp.zip", $wpinstall);

	/* Unzip File */
	echo "File Downoad Complete";
	echo "<b> <a href='wp.php?step=2'> Next Step (2) </a> </b>";
	  echo " <br /> <br /> <br /> Script By  <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";

}

else if ($page==2)
{
	$zip = new ZipArchive; $res = $zip->open('wp.zip'); 
	if ($res === TRUE) 
		{
			$zip->extractTo($root); 
			$zip->close(); 
			echo 'File Unzip Complete !';
			echo "<a href='wp.php?step=3'> Next Step (3) </a>";		
			echo " <br /> <br /> <br /> Script By  <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";			
		} 
    

  	
}

/* process file */

else if ($page==3)

{
  recurse_copy($source,$destination);
  echo "Success <br /> Click Next to Delete Temp File and this script";
  echo " <br /><a href='wp.php?step=4'> Next Step (4) </a>";
  echo " <br /> <br /> <br /> Script By  <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";
}

else if ($page==4)

{



unlink('wp.zip');
echo "<br /> Temp File Removed >";
rmdir('wordpress');
echo "<br /> Folder Removed >";
unlink(__FILE__);
echo "<br /> File Removed >";

echo " Done !!!!  <br /><a href='index.php'> Proceed with Database install </a>";

echo " <br /> <br /> <br />Script By  <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";
}



function recurse_copy($src,$dst) 
{ 
	$dir = opendir($src); @mkdir($dst); 
	while(false !== ( $file = readdir($dir)) ) 
	{
		if (( $file != '.' ) && ( $file != '..' )) 
			{ if ( is_dir($src . '/' . $file) ) { recurse_copy($src . '/' . $file,$dst . '/' . $file); 
			} 
		else { copy($src . '/' . $file,$dst . '/' . $file); 
			}
		} 
	} closedir($dir); 
}


?>
