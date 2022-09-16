<?php

include 'header.php';

?>
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="docs.php" class="nav-item nav-link">Documents</a>
                    <a href="person.php" class="nav-item nav-link">Persons</a>
                    <a href="group.php" class="nav-item nav-link">Groups</a>
                    <a href="group.php" class="nav-item nav-link">Send Message</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">index</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">index</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <form action="http://localhost:8000/sessions/add" method="POST">
        <input type="hidden" name="id" value="john">
        <input type="hidden" name="isLegacy" value="false">


        <button type="submit" class="btn btn-primary">CREATE SESSION</button>
    </form>
    <!--<button type="button" class="btn btn-danger">DELETE SESSION</button>
    <button type="button" class="btn btn-warning">FIND SESSION</button>
    <button type="button" class="btn btn-info">CREDITS</button>-->
    
    <script>
        function creatificationOfTheSession(){
            var datax = {'id':'john2', 'isLegacy':'false'};

            $.ajax({
                    type : "POST",  //type of method
                    url  : "localhost:8000/sessions/add",  //your page
                    contentType: "application/json",
                    data : JSON.stringify(datax),// passing the values
                    success: function(res){  
                        console.log(res)//do what you want here...
                    }
                });
        }
    </script>

<?php

include 'footer.php';

?>