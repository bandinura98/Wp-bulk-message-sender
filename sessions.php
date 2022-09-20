<?php
include 'config.php';
include 'header.php';




?>






    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">index</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">sessions</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    

    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
        <div class="row g-3">
            <div class="col-md-12">
                <div class="form-floating">
                    <form action="http://localhost:8000/sessions/add" method="post" target="_blank">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default" >Session name</span>
                            </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="id" id="id">
                            </div>
                        <input type="hidden" name="isLegacy" value="false">

                        <button type="submit" class="btn btn-primary" onclick="addfromajax()">CREATE SESSION</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    
    

    <script>
    function addfromajax(){
        var grupid = document.getElementById('id').value;
        

        var datax = {'id':grupid};
        $.ajax({
                type : "POST",  //type of method
                url  : "dbsessionhandler.php",  //your page
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