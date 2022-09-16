<?php

include 'config.php';

if(isset($_POST["new_name"])){
    $sql = "UPDATE new_schema.groups SET groupname='" . $_POST["new_name"] ."' WHERE idgroups=" . $_POST["id"];

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

    header('Location: group.php');  
}

if(isset($_POST["delete"])){
    $sql = "DELETE FROM new_schema.groups WHERE idgroups=" . $_POST["id"];

    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
    header('Location: group.php');  
}

if(isset($_POST["hard_edit"])){

}




if(isset($_POST["id_add"])){
    $sql = "INSERT INTO persongroup (groupid,personid)
    VALUES (". $_POST["id_group"] .", ". $_POST["id_add"] .")";

    if ($conn->query($sql) === TRUE) {
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_POST["id_remove"])){
    $sql = "DELETE FROM new_schema.persongroup WHERE personid=" . $_POST["id_remove"] . " and groupid=" . $_POST["id_group"];
    
    if ($conn->query($sql) === TRUE) {
    } else {
    echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
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
    
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-black-50 row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        
        

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="docs.php" class="link-primary"> Documents </a>
                    <a href="person.php" class="link-primary"> Persons </a>
                    <a href="group.php" class="link-primary"> Groups </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <div class="row"></div> <div class="row"></div> <div class="row"></div> <div class="row"></div> <div class="row"></div> 
    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s"><!--1-->
        
            
        <form method="post">
            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input id="thisid" class="form-control" name="new_name" <?php
                        if(isset($_POST["hard_edit"])){
                            echo "type='hidden'";
                        }
                        
                        ?> placeholder="Your Name" value=""> 
                        



                        <input type="hidden" class="form-control" name="id" placeholder="Your Name" value="">
                    </div>
                </div>
                
                <div class="col-12"<?php
                        if(isset($_POST["hard_edit"])){
                            echo 'style="display: none"';
                        }
                        
                        ?>>
                    <button id="butid" name="edit" class="btn btn-primary py-2 px-3 me-3">
                        Edit
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </button>
                </div>
            </div>
        </form>
        
            <div class="row">
                    
                <div class='col-md-6'><h2>ALL LIST</h2><select size="30" id='alinabilir' class='form-select' multiple aria-label='multiple select example' ondblclick ='aktar()'></select></div>
                
                
                
                
                <input type="hidden" id="gurupId" value=<?php echo "'" . $_POST["id"] . "'" ?>>
                
                
                
                <div class='col-md-6'><h2>GROUP LIST</h2><select size="30" id='selectid' class='form-select' multiple aria-label='multiple select example' ondblclick ='cikar()' ></select></div>
            </div>
                
                
               
    </div>







<script>// language="Javascript"
                    

    function aktar(){
        var alinabilir = document.getElementById("selectid");
        let xhr = new XMLHttpRequest();

        var opt = document.getElementById('alinabilir')
        
        var personid = opt.options[opt.selectedIndex].value;
        
        var grupid = document.getElementById('gurupId').value;


        var selected = [];
        for (var option of document.getElementById('alinabilir').options){
            if (option.selected) {
                selected.push(option);
            }
        }
        console.log(selected);
        for(let i = 0; i < selected.length; i++){
            var datax = {'personid':selected[i].value, 'grupid':grupid};
            console.log("data : " + datax);
            console.log("alttaki" + selected[i].value);
            
            $.ajax({
                type : "POST",  //type of method
                url  : "insertgrup.php",  //your page
                contentType: "application/json",
                data : JSON.stringify(datax),// passing the values
                success: function(res){  
                    console.log(res)//do what you want here...
                }
            });
        }
        
        
    }

    function cikar(){//bunu çıkar yapıcaz
        var alinabilir = document.getElementById("alinabilir");
        let xhr = new XMLHttpRequest();

        var opt = document.getElementById('selectid')
        
        var personid = opt.options[opt.selectedIndex].value;
        
        var grupid = document.getElementById('gurupId').value;


        var selected = [];
        for (var option of document.getElementById('selectid').options){
            if (option.selected) {
                selected.push(option);
            }
        }
        console.log(selected);

        for(let i = 0; i < selected.length; i++){
            var datax = {'personid':selected[i].value, 'grupid':grupid};
            console.log("data : " + datax);
            console.log("alttaki");
            
            $.ajax({
                type : "POST",  //type of method
                url  : "cikargrup.php",  //your page
                contentType: "application/json",
                data : JSON.stringify(datax),// passing the values
                success: function(res){  
                    console.log(res)//do what you want here...
                }
            });
        }
        


    }
    
    revle1();
    revle2();
    function revle1(){
        var grupid = document.getElementById('gurupId').value;
        summary_icerik = document.getElementById("alinabilir");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                summary_icerik.innerHTML = res;
            }
        };
        xmlhttp.open("GET", "ajaxgetaddables.php?id="+grupid , true);
        xmlhttp.send();
    }

    function revle2(){
        var grupid = document.getElementById('gurupId').value;
        summary_icerik2 = document.getElementById("selectid");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                console.log(this.responseText);
                summary_icerik2.innerHTML = res;
            }
        };
        xmlhttp.open("GET", "ajaxgetremovables.php?id="+grupid , true);
        xmlhttp.send();
    }
    var myVar = setInterval(revle1, 1000);
    var myVar2 = setInterval(revle2, 1000);

</script>
                




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