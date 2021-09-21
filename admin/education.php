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
            <h2>All Education</h2>
            <a href="add-education.php" type="button" class="btn btn-primary">Add New Education</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">School</th>
                        <th scope="col">Department</th>
                        <th scope="col">Description</th>
                        <th scope="col">GPA</th>
                        <th scope="col">Date</th>
                        <th scope="col">Settings</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    //connecting datas
                    $education = $db->query("SELECT * FROM education ")->fetchAll(PDO::FETCH_OBJ);

                    foreach ($education as  $row) {

                    ?>

                        <tr>
                            <th scope="row"><?php echo $row->id ?></th>
                            <td><?php echo $row->edu_school ?></td>
                            <td><?php echo $row->edu_departmen ?></td>
                            <td><?php echo $row->edu_desc ?></td>
                            <td><?php echo $row->gpa ?></td>
                            <td><?php echo $row->date ?></td>
                            <td><a href="edit-education.php?id=<?php echo $row->id ?>" class="btn btn-primary">Edit</a></td>
                        </tr>

                    <?php }  ?>
                </tbody>
            </table>





        </div>
    </div>

</section>
<!-- /.content -->
<?php include 'include/footer.php'; ?>