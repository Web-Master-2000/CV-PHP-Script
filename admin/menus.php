<?php include 'include/header.php'; ?>

<?php

//connecting datas
$menu = $db->prepare("SELECT * FROM header ");
$menu->execute();
$row = $menu->fetch(PDO::FETCH_OBJ);



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
            <h2>Menu - Navbar -Settings</h2>
            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Menu 1</label>
                        <input type="text" name="menu1" class="form-control" id="inputEmail4" placeholder="<?php echo $row->menu1 ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Menu 2</label>
                        <input type="text" name="menu2" class="form-control" id="inputPassword4" placeholder="<?php echo $row->menu2 ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Menu 3</label>
                        <input type="text" name="menu3" class="form-control" id="inputPassword4" placeholder="<?php echo $row->menu3 ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Menu 4</label>
                        <input type="text" name="menu4" class="form-control" id="inputPassword4" placeholder="<?php echo $row->menu4 ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Menu 5</label>
                        <input type="text" name="menu5" class="form-control" id="inputPassword4" placeholder="<?php echo $row->menu5 ?>">
                    </div>


                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("UPDATE header SET menu1=:menu1,
                    menu2=:menu2,
                    menu3=:menu3,
                    menu4=:menu4,
                    menu5=:menu5  WHERE id=:id
                 ");
                $ekle->execute([
                    "menu1" => $_POST['menu1'],
                    "menu2" => $_POST['menu2'],
                    "menu3" => $_POST['menu3'],
                    "menu4" => $_POST['menu4'],
                    "menu5" => $_POST['menu5'],
                    "id" => 1
                ]);

                if ($ekle) {
                    header("location:menus.php?status=ok");
                } else {
                    header("location:menus.php?status=no");
                }
            }

            ?>


        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>