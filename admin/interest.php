<?php include 'include/header.php'; ?>

<?php

//connecting datas
$data_ex = $db->prepare("SELECT * FROM interest ");
$data_ex->execute();
$row = $data_ex->fetch(PDO::FETCH_OBJ);


?>

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
            <h2>Edit Education -Settings</h2>
            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Interest Title </label>
                        <input type="text" name="title" class="form-control" id="inputEmail4" value="<?php echo $row->title ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Intererst Description </label>
                        <input type="text" name="i_description" class="form-control" id="inputPassword4" value="<?php echo $row->i_description ?>">
                    </div>






                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("UPDATE  interest SET 
                    title=:title,
                    i_description=:i_description
                    
                    
                      
                 ");
                $ekle->execute([
                    "title" => $_POST['title'],
                    "i_description" => $_POST['i_description']


                ]);

                if ($ekle) {
                    header("location:interest.php?status=ok");
                } else {
                    header("location:interest.php?status=no");
                }
            }

            ?>


        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>