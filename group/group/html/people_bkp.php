<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ISI Group website, Karma , data integration , data mashups">
    <meta name="author" content="ANIMESH MANGLIK">
<link rel="icon" href="http://www.isi.edu/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://www.isi.edu/favicon.ico" type="image/x-icon" />
    <title>Information Integration Research Group</title>

    <!-- Bootstrap core CSS -->
    <link href="../link/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../link/css/justified-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
		
      	<div class="row">
      	 <div class="col-lg-9 ">
   
  <h1>Information Integration Research Group</h1>
      
  <p><em >
  <a href="http://www.isi.edu">Information Sciences Institute</a>, 
  <a href="http://www.viterbi.usc.edu">Viterbi School of Engineering</a></em></p>
      	 </div>
      	 <div class="col-lg-3" id="logo">
      	 <img class="pull-right visible-lg" src="../link/images/usc-shield-name-black.png">
      	 </div>
      	</div>
        <div class="masthead">
        <ul class="nav nav-justified">
          <li><a href="../">Overview</a></li>
          <li  class="active"><a href="">People</a></li>
          <li><a href="projects.html">Project</a></li>
          <li><a href="publication.html" >Publication</a></li>
          <li><a href="videos.html">Videos</a></li>
          <li><a href="downloads.html">Downloads</a></li>
        </ul>
      </div>


<div id ="Overview">
      <!-- Example row of columns -->
       <h4 class="text-center">Professors</h4>
       
       
       <div class="row">

      <ul class="thumbnails list-unstyled">
       
	<?php
	     $handle = fopen("people/professors.txt", "r");
		 if ($handle)
		 {
		 while (($line = fgets($handle)) !== false)
		 {
		 		$pieces = explode(",", $line);
				echo ' <li class="col-lg-2 col-md-3 col-sm-6 col-xs-12"> ';
				echo ' <div class="thumbnail people_thumb" style="padding: 0" > ';
				echo ' <div id = "image_thumb"style="padding:4px"> ';
				echo ' <a href="'.$pieces[1].'"><img alt="300x200" style="" src="'.$pieces[0].'" onerror="this.src=\'http://isi.edu/integration/img/NoProfilePicture.jpg\';"></a> ';
				echo ' </div> ';
				echo ' <div class="caption"> ';
				echo ' <h5>'.$pieces[2].'</h5> ';
				echo ' <p>'.$pieces[3].'</p> ';
				echo ' </div> ';
				echo ' </div> ';
				echo ' </li> ';
        }
        }
		fclose($handle);
        ?>
       </ul>
    </div>
   	  <h4 class="text-center">Researchers</h4>
   	  <div class="row">
   	  <ul class="thumbnails list-unstyled">
   	  <?php
	     $handle = fopen("people/researchers.txt", "r");
		 if ($handle)
		 {
		 while (($line = fgets($handle)) !== false)
		 {
		 		$pieces = explode(",", $line);
				echo ' <li class="col-lg-2 col-md-3 col-sm-6 col-xs-12"> ';
				echo ' <div class="thumbnail people_thumb" style="padding: 0" > ';
				echo ' <div id = "image_thumb"style="padding:4px"> ';
				echo ' <a href="'.$pieces[1].'"><img alt="300x200" style="" src="'.$pieces[0].'" onerror="this.src=\'http://isi.edu/integration/img/NoProfilePicture.jpg\';"></a> ';
				echo ' </div> ';
				echo ' <div class="caption"> ';
				echo ' <h5>'.$pieces[2].'</h5> ';
				echo ' <p>'.$pieces[3].'</p> ';
				echo ' </div> ';
				echo ' </div> ';
				echo ' </li> ';
        }
        }
		fclose($handle);
        ?>
      </ul>
   	  </div>
   	  
   	  <h4 class="text-center">Graduate Students</h4>
      <div class="row">
   	  <ul class="thumbnails list-unstyled">
   

      
      <?php
	     $handle = fopen("people/graduates.txt", "r");
		 if ($handle)
		 {
		 while (($line = fgets($handle)) !== false)
		 {
		 		$pieces = explode(",", $line);
				echo ' <li class="col-lg-2 col-md-3 col-sm-6 col-xs-12"> ';
				echo ' <div class="thumbnail people_thumb" style="padding: 0" > ';
				echo ' <div id = "image_thumb"style="padding:4px"> ';
				echo ' <a href="'. $pieces[1].'"><img alt="300x200" style="" src="'.$pieces[0].'" onerror="this.src=\'http://isi.edu/integration/img/NoProfilePicture.jpg\';"> </a>';
				echo ' </div> ';
				echo ' <div class="caption"> ';
				echo ' <h5>'.$pieces[2].'</h5> ';
				echo ' <p>'.$pieces[3].'</p> ';
				echo ' </div> ';
				echo ' </div> ';
				echo ' </li> ';
        }
        }
		fclose($handle);
        ?>
       
      </ul>
   	  </div>
   	  <h4 class="text-center">Under-Graduates</h4>
   	  <div class="row">
   	  <ul class="thumbnails list-unstyled">
   	  
      <?php
	     $handle = fopen("people/undergraduates.txt", "r");
		 if ($handle)
		 {
		 while (($line = fgets($handle)) !== false)
		 {
		 		$pieces = explode(",", $line);
				echo ' <li class="col-lg-2 col-md-3 col-sm-6 col-xs-12"> ';
				echo ' <div class="thumbnail people_thumb" style="padding: 0" > ';
				echo ' <div id = "image_thumb"style="padding:4px"> ';
				echo ' <img alt="300x200" style="" src="'.$pieces[0].'" onerror="this.src=\'http://isi.edu/integration/img/NoProfilePicture.jpg\';"> ';
				echo ' </div> ';
				echo ' <div class="caption"> ';
				echo ' <h5>'.$pieces[1].'</h5> ';
				echo ' <p>'.$pieces[2].'</p> ';
				echo ' </div> ';
				echo ' </div> ';
				echo ' </li> ';
        }
        }
		fclose($handle);
        ?>
   	  </ul>
   	  </div>


   	  <h4 class="text-center">Visitors</h4>
   	  <div class="row">
   	  <ul class="thumbnails list-unstyled">
   	  
      <?php
	     $handle = fopen("people/visitors.txt", "r");
		 if ($handle)
		 {
		 while (($line = fgets($handle)) !== false)
		 {
		 		$pieces = explode(",", $line);
				echo ' <li class="col-lg-2 col-md-3 col-sm-6 col-xs-12"> ';
				echo ' <div class="thumbnail people_thumb" style="padding: 0" > ';
				echo ' <div id = "image_thumb"style="padding:4px"> ';
				echo ' <img alt="300x200" style="" src="'.$pieces[0].'" onerror="this.src=\'http://isi.edu/integration/img/NoProfilePicture.jpg\';"> ';
				echo ' </div> ';
				echo ' <div class="caption"> ';
				echo ' <h5>'.$pieces[1].'</h5> ';
				echo ' <p>'.$pieces[2].'</p> ';
				echo ' </div> ';
				echo ' </div> ';
				echo ' </li> ';
        }
        }
		fclose($handle);
        ?>
   	  </ul>
   	  </div>

   	   <h4 class="text-center">Alumni</h4>
      <div class="row">
   	  <ul class="thumbnails list-unstyled">
   	  <?php
	     $handle = fopen("people/alumnis.txt", "r");
		 if ($handle)
		 {
		 while (($line = fgets($handle)) !== false)
		 {
		 		$pieces = explode(",", $line);
				echo ' <li class="col-lg-2 col-md-3 col-sm-6 col-xs-12"> ';
				echo ' <div class="thumbnail people_thumb" style="padding: 0" > ';
				echo ' <div id = "image_thumb"style="padding:4px"> ';
				echo ' <a href="'.$pieces[1].'"><img alt="300x200" style="" src="'.$pieces[0].'" onerror="this.src=\'http://isi.edu/integration/img/NoProfilePicture.jpg\';"> ';
				echo ' </div> ';
				echo ' <div class="caption"> ';
				echo ' <h5>'.$pieces[2].'</h5> ';
				echo ' <p>'.$pieces[3].'</p> ';
				echo ' </div> ';
				echo ' </div> ';
				echo ' </li> ';
        }
        }
		fclose($handle);
        ?>
   	  </ul>
   	  </div>		  
</div>

      <!-- Site footer -->
      <div class="footer">
        <p>&copy;2013 The University of Southern California</p>
      </div>

    </div> <!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</body>
</html>
