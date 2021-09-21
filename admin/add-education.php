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
                        <label for="inputEmail4">School </label>
                        <input type="text" name="edu_school" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Department </label>
                        <input type="text" name="edu_departmen" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Description </label>
                        <input type="text" name="edu_desc" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">GPA </label>
                        <input type="text" name="gpa" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Experience Date</label>
                        <input type="date" name="date" class="form-control" id="inputPassword4">
                    </div>




                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Add New Experience</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("INSERT INTO  education SET 
                    edu_school=:edu_school,
                    edu_departmen=:edu_departmen,
                    edu_desc=:edu_desc,
                    gpa=:gpa,
                    date=:date
                    
                      
                 ");
                $ekle->execute([
                    "edu_school" => $_POST['edu_school'],
                    "edu_departmen" => $_POST['edu_departmen'],
                    "edu_desc" => $_POST['edu_desc'],
                    "gpa" => $_POST['gpa'],
                    "date" => $_POST['date']

                ]);

                if ($ekle) {
                    header("location:education.php?status=ok");
                } else {
                    header("location:education.php?status=no");
                }
            }

            ?>


        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>