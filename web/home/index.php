<?php
$name = "Zane White" ;
?>
<!Doctype html>
    <html lang="en-us">
        <head>
            <!--Meta tag information for page -->
            <meta charset="UTF-8">
            <meta name="author" content="Zane">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <!--Link to bootstrap-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="main.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            
            <title> CS313 | <?php echo $name ?>  </title>  
         
        </head>
        
        <body>
            <main>
            <div class="container-fluid text-center">
                <?php include "modules/header.php" ?>
               <section >
                   <h1><?php echo $name ?></h1>
                   
                   <figure>
                       <img src="img/prof_ZW.jpg" alt="<?php echo $name ?>">
                   </figure> <br> 
                   <p>
                       A little about me: I am Web Design and Development major at BYU-Idaho.
                       <br> 
                       I have learned a few computer languages including: HTML, PHP, JavaScript and CSS.
                       <br> 
                       I am originally from California, I live in Idaho with my wonderful family.
                       <br> 
                       I enjoy watching my one year old daughter, while finishing my education.  
                       
                   </p>
               </section>
               <?php include "modules/footer.php" ?>
            </div>
            </main>
            
            
            
        </body>
        
        
        
        
    </html>
    

