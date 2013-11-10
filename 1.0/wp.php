	<?php
/* Wordpress Easy Instaler */
/* Version 0.8b */
/* 

Coded By Siddhu arevindh
http://lab.arevindh.com 
Email : siddhu@arevindh.com

*/

/* Get files from wordpress.org */


$root = realpath(dirname(__FILE__));

$page=$_GET['step'];

$source=$root."/wordpress/";
$destination=$root."/";

?>


<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Wordpress Easy Installer By Siddhu Arevindh</title>
        <meta name="description" content="Wordpress Easy Installer By Siddhu Arevindh" />
        <meta name="keywords" content="Wordpress Installer" />
        <meta name="robots" content="noindex,nofollow">
        <meta name="author" content="Siddhu Arevindh" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="http://arevindh.com/installer/css/style.css" />
        <script src="http://arevindh.com/installer/js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(http://arevindh.com/installer/images/bg3.jpg);
			}
		</style>
    </head>
    <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=592357747467093";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <div class="container">
		
	
            </div><!--/ Codrops top bar -->
			
			
			
			<section class="main">
				<form class="form-2">
				


<?php

if (isset($_GET['step'])) { }
else 

{     
         echo '<h1><span class="sign-up"> Wordpress Easy Install </span> </h1> <br />';
	 echo "<b><br /> <br /><a href='wp.php?step=1'> Proceed with Install </a></b>";
	 echo " <br /> <br /> <br /> Script By <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";
}

if ($page==1)
{

	$wpinstall = file_get_contents("http://wordpress.org/latest.zip"); 
	file_put_contents("wp.zip", $wpinstall);

	/* Unzip File */
	echo '<h1><span class="sign-up">File Downoad Complete</span> </h1><br />';
	echo "<br /> <br /><b> <a href='wp.php?step=2'> Next Step (2) </a> </b> ";
	  echo " <br /> <br /> <br /> Script By  <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";

}

else if ($page==2)
{
	$zip = new ZipArchive; 
	$res = $zip->open('wp.zip'); 
	if ($res === TRUE) 
		{
			$zip->extractTo($root); 
			$zip->close(); 
			echo '<h1><span class="sign-up">File Unzip Complete !<span> </h1><br />';
			echo "<br /><b><br /><a href='wp.php?step=3'> Next Step (3) </a></b>";		
			echo " <br /> <br /> <br /> Script By  <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";			
		} 
    

  	
}

/* process file */

else if ($page==3) 
 
{
  recurse_copy($source,$destination);
  echo ' <h1><span class="log-in"> Success </span> <br /> <span class="sign-up"> Next to Delete Temp File and script <span> </h1>';
  echo "<b><br /><a href='wp.php?step=4'> Next Step (4) </a></b>";
  echo " <br /> <br /> <br /> Script By  <a href='http://www.arevindh.com/'> Siddhu Arevindh  </a>";
}

else if ($page==4)

{


$source=$root."/wordpress";
unlink('wp.zip');
echo "<br /> Temp File Removed ";
rrmdir($source);
echo "<br /> Folder Removed ";
unlink(__FILE__);
echo "<br /> Instal Script Removed ";

echo " <br />Done !!!! <br />  <br /><a href='wp-admin/setup-config.php?step=1'> Proceed with Database install </a>";

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

 function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
 }


?>
<div style="clear :both;"> </div>
<h1> </h1> <br />
<div style="clear :both;"> </div>
<div class="fb-like" data-href="https://www.facebook.com/arevindh" data-width="300" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div> <h1></h1>

				</form>​​
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Password' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');    
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});
		</script>
    </body>
</html>
