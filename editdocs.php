<?php
if(isset($_POST["edit"])){

}

if(isset($_POST["delete"])){ 
    $file_pointer = $_POST["image"];
    
    // Use unlink() function to delete a file
    if (!unlink($file_pointer)) {
        echo ("$file_pointer cannot be deleted due to an error");
    }
    else {
        echo ("$file_pointer has been deleted");
    }
    header('Location: docs.php');  
}

if(isset($_POST["editted"])){
    $dir = getcwd();
    $var = preg_split("#/#", $_POST["image_orj"]);

    $var2 = $var[0] . "\\" . $_POST["image_edit"];

    echo $dir . "\\" . $var[0] . "\\" . $_POST["image_edit"],$dir . "\\" . $var2;

    rename ($dir . "\\" . $var[0] . "\\" . $var[1],$dir . "\\" . $var2);

    header('Location: docs.php');  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ChariTeam - Free Nonprofit Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>



<body>
    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
        <h1 class="display-12 mb-12">DELETE PERSON</h1>
        <form method="post">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <img src=<?php echo "'" . $_POST["image"] . "'" ?>>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                    <input type="text" class="form-control" name="image_edit" placeholder="Your Name" value=<?php 
                    $var = preg_split("#/#", $_POST["image"]);
                    echo "'" . $var[1] . "'"?>>
                    <input type="hidden" class="form-control" name="image_orj" placeholder="Your Name" value=<?php echo "'" .  $_POST["image"] . "'"?>>
                    </div>
                </div>

                <button type="submit" name="editted" class="btn btn-primary">Submit</button>
                
            </div>
        </form>
    </div>












    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>