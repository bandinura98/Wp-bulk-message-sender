<?php
include 'header.php'
?>

<?php

include 'config.php';


?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">send bulk msg to grup people </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">documents</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container">
        <div class="row">
            <h3>send bulk message to the persons who is inserted as a selected group members which can be imaged</h3>
        </div>
        <div class="row">
            <h2>GRUP</h2>
        </div>
        <div class="row">
        <select class="form-select" aria-label="Default select example" id="selector">
            <option selected>Select grup</option>
            <?php
                            $sql = "SELECT * FROM new_schema.groups;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                
                                ?>
                                <option value=<?php echo "'". $row["idgroups"] ."'"; ?>><?php echo $row["groupname"]; ?></option>
                                <?php
                                
                              }
                            } else {
                              echo "0 results";
                            }
                            $conn->close();
                        ?>
        </select>
        </div>
        
        
        <div class="row">
        
                    <h2>Image</h2>
        
                    <div class="col-md-2"><img src="'.$image.'" width="150"/></br>
                        <input class="form-check-input" type="checkbox" value="unimaged" id="flexCheckDefault">unimaged</div>
                    
                    <?php
                    $dirname = "images/";
                    $images = glob($dirname."*");
                    
                    foreach($images as $image) {
                        
                        
                        $var = preg_split("#/#", $image); 
                        
                        echo '<div class="col-md-2"><img src="'.$image.'"  id="' . $image . '" width="150"/></br>
                        <input class="form-check-input" type="checkbox" value="' . $image . '" id="' . $image . '">
                        '. $var[1] .'</div>';

                    }

                    ?>
                    
        </div>
        <div class="row">
            <h2>Image</h2>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
        </div>
        
        <button type="button" class="btn btn-success" onclick="sendbulk()" >SEND</button>
    </div>




<script>
    function sendbulk(){
        var array = []
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
        var selectedimage = "";
        
        for (var i = 0; i < checkboxes.length; i++) {
            console.log(checkboxes[i].value);
            selectedimage = checkboxes[i].value;
        }

        var text = document.getElementById("comment").value;
        //console.log(text);
        //http://localhost:8000

        var selectedopt = document.getElementById("selector").value;
        //console.log(selectedopt);

        var datax = {'image':selectedimage, 'grupid':selectedopt, 'message':text};

        $.ajax({
                type : "POST",  //type of method
                url  : "sendbulkmessage.php",  //your page
                contentType: "application/json",
                data : JSON.stringify(datax),// passing the values
                success: function(res){  
                    console.log(res)//do what you want here...
                }
            });




    }
</script>








<?php
include 'footer.php'
?></div>