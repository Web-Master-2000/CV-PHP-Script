<?php include 'include/header.php'; ?>



<!-- Main content -->
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <?php
            if (@$_GET["status"] == "ok") { ?>
                <div class="alert alert-success" role="alert">
                    Güncelleme İşlemi Başarılı Bir Şekilde Yapıldı
                </div>
            <?php  }
            if (@$_GET["status"] == "no") { ?>
                <div class="alert alert-danger" role="alert">
                    Güncelleme İşleminde Bir Hata Oluştu
                </div>
            <?php  }  ?>



            <h2>Add New-Experience -Settings</h2>
            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputEmail4">Awarts </label>
                        <input type="text" name="awarts" class="form-control" id="inputEmail4">
                    </div>







                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Add New Awarts</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("INSERT INTO  awarts SET 
                    awarts=:awarts
                    
                    
                      
                 ");
                $ekle->execute([
                    "awarts" => $_POST['awarts']


                ]);

                if ($ekle) {
                    header("location:awarts.php?status=ok");
                } else {
                    header("location:awarts.php?status=no");
                }
            }

            ?>


        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>