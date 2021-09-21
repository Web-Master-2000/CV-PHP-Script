<?php include 'include/header.php'; ?>

<?php

//connecting datas
$about = $db->prepare("SELECT * FROM about ");
$about->execute();
$row = $about->fetch(PDO::FETCH_OBJ);



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
            <h2>About-Settings</h2>
            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">About Title</label>
                        <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="<?php echo $row->title ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Address </label>
                        <input type="text" name="address" class="form-control" id="inputPassword4" placeholder="<?php echo $row->address ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Description About You</label>
                        <input type="text" name="description" class="form-control" id="inputPassword4" placeholder="<?php echo $row->description ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Linkedin Address (please enter the link)</label>
                        <input type="text" name="linkedin" class="form-control" id="inputPassword4" placeholder="<?php echo $row->linkedin ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Instagram Address (please enter the link)</label>
                        <input type="text" name="instagram" class="form-control" id="inputPassword4" placeholder="<?php echo $row->instagram ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Eposta Address (please enter the link)</label>
                        <input type="eposta" name="eposta" class="form-control" id="inputPassword4" placeholder="<?php echo $row->eposta ?>">
                    </div>


                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("UPDATE about SET title=:title,
                    address=:address,
                    description=:description,
                    linkedin=:linkedin,
                    instagram=:instagram,
                    eposta=:eposta  WHERE id=:id
                 ");
                $ekle->execute([
                    "title" => $_POST['title'],
                    "address" => $_POST['address'],
                    "description" => $_POST['description'],
                    "linkedin" => $_POST['linkedin'],
                    "instagram" => $_POST['instagram'],
                    "eposta" => $_POST['eposta'],
                    "id" => 1
                ]);

                if ($ekle) {
                    header("location:about.php?status=ok");
                } else {
                    header("location:about.php?status=no");
                }
            }

            ?>


        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>