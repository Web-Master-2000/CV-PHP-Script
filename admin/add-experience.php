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
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Experience Title</label>
                        <input type="text" name="title" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Experience Sub-title </label>
                        <input type="text" name="sub_title" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Description </label>
                        <input type="text" name="description" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Experience Date</label>
                        <input type="date" name="exp_date" class="form-control" id="inputPassword4">
                    </div>




                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Add New Experience</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("INSERT INTO  experience SET title=:title,
                    sub_title=:sub_title,
                    description=:description,
                    exp_date=:exp_date
                    
                      
                 ");
                $ekle->execute([
                    "title" => $_POST['title'],
                    "sub_title" => $_POST['sub_title'],
                    "description" => $_POST['description'],
                    "exp_date" => $_POST['exp_date']


                ]);

                if ($ekle) {
                    header("location:experience.php?status=ok");
                } else {
                    header("location:experience.php?status=no");
                }
            }

            ?>


        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>