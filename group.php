<?php

include 'config.php';

if(isset($_POST["add_name"])){

    $sql = "INSERT INTO new_schema.groups (groupname)
    VALUES ('". $_POST["add_name"] ."')";

    if ($conn->query($sql) === TRUE) {
    
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?>
<?php
include 'header.php'
?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">GROUP</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">wpproject</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">t</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">GROUP</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Contact Us</div>
                    <h1 class="display-6 mb-5">ADD GROUP</h1>
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="add_name" placeholder="Your Name">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary py-2 px-3 me-3">
                                    ADD
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="container">
                    <div class="row">
                        
                        <div class="col-sm">
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Group name
                        </div>
                        <div class="col-sm">
                        </div>
                        
                    </div>
                </div>



                        <?php
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM new_schema.groups;";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                echo "<form action='editgroup.php' method='post'><div class='container'><div class='row'><input name='id' type='hidden' value='".$row["idgroups"]."'>" . "<div class='col-sm'><input name='name' type='hidden' value='".$row["groupname"]."'>". $row["groupname"]. "</div> <div class='col-sm'><button name='hard_edit' type='submit' class='btn btn-primary'><i class='fa fa-book'></i></button><button name='submit' type='submit' class='btn btn-primary'><i class='fa fa-pen'></i></button><button name='delete' type='submit' class='btn btn-primary'><i class='fa fa-window-close'></i></button></div></div></div></form>";
                                
                              }
                            } else {
                              echo "0 results";
                            }
                            $conn->close();
                        ?>

                
                <form id="dynForm" action="http://example.com/" method="post">
                    <input id="dynElem1" type="hidden" name="name" value="">
                    <input id="dynElem1" type="hidden" name="surname" value="">
                    <input id="dynElem1" type="hidden" name="phone" value="">
                    
                </form>
				
                <!--<div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <iframe class="position-relative w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div-->
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php
include 'footer.php'
?>

</html>