<?php 
if(isset($_FILES['dosya'])){
      $hatalar= array();
      echo $_FILES['dosya']['name'];
      $dosya_adi= $_FILES['dosya']['name'];
      $dosya_boyutu=$_FILES['dosya']['size'];
      $gecici_yol=$_FILES['dosya']['tmp_name'];
      $dosta_tipi=$_FILES['dosya']['type'];
      $uzanti=strtolower(end(explode('.',$_FILES['dosya']['name'])));
      
      $tip= array("jpeg","jpg","png");
      
      if(in_array($uzanti,$tip)=== false){
         $hatalar[]="Sadece JPEG ve PNG türünde dosyalar yükleyebilirsiniz.";
      }
      
      if($file_size > 2097152){
         $hatalar[]='Maksimum Dosya Boyutu 2 MB olmalıdır.';
      } 
      
      if(empty($errors)==true){
         move_uploaded_file($gecici_yol,"images/".$file_name);
         echo "Başarılı";
      }else{
         print_r($errors);
      }
   }
include 'header.php';
?>


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">documents</h1>
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


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Documents</div>
                    <h1 class="display-6 mb-5">ADD DOCUMENT</h1>
                    
                    <form action="yukle.php" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
                </div>
				<div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Contact Us</div>
                    <h1 class="display-6 mb-5">EDIT DOCUMENT</h1>
                    
                    <?php
                    $dirname = "images/";
                    $images = glob($dirname."*");

                    foreach($images as $image) {
                        
                        
                        $var = preg_split("#/#", $image); 
                        
                        echo '<img src="'.$image.'" width="150"/><br />';


                        echo $var[1] . "</br>";
                        ?><form method="post" action="editdocs.php"><input type="hidden" name="image" <?php echo "value='" . $image . "'"?>><?php
                        echo "<button name='edit' type='submit' class='btn btn-primary'><i class='fa fa-pen'></i></button>";
                        echo "<button name='delete' type='submit' class='btn btn-primary'><i class='fa fa-window-close'></i></button>";
                        ?></form><?php
                    }

                    ?>
                    
                </div>
				
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

include 'footer.php';

?>
</body>

</html>