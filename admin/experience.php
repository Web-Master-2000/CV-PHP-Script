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
            <h2>All Experiences</h2>
            <a href="add-experience.php" type="button" class="btn btn-primary">Add New Experience</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Sub-Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Experiment Date</th>
                        <th scope="col">Settings</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    //connecting datas
                    $experience = $db->query("SELECT * FROM experience ")->fetchAll(PDO::FETCH_OBJ);

                    foreach ($experience as  $row) {

                    ?>

                        <tr>
                            <th scope="row"><?php echo $row->id ?></th>
                            <td><?php echo $row->title ?></td>
                            <td><?php echo $row->sub_title ?></td>
                            <td><?php echo $row->description ?></td>
                            <td><?php echo $row->exp_date ?></td>
                            <td><a href="edit-experience.php?id=<?php echo $row->id ?>" class="btn btn-primary">Edit</a></td>
                        </tr>

                    <?php }  ?>
                </tbody>
            </table>





        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>