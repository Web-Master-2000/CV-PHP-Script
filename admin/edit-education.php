<?php include 'include/header.php'; ?>

<?php
if ($_GET['id']) {
    //connecting datas
    $data_ex = $db->prepare("SELECT * FROM education WHERE id=:id ");
    $data_ex->execute(["id" => $_GET['id']]);
    $row = $data_ex->fetch(PDO::FETCH_OBJ);
}

?>

<!-- Main content -->
<section class="content">
    <div class="col-md-12">
        <div class="row">



            <h2>Edit Education -Settings</h2>
            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">School </label>
                        <input type="text" name="edu_school" class="form-control" id="inputEmail4" value="<?php echo $row->edu_school ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Department </label>
                        <input type="text" name="edu_departmen" class="form-control" id="inputPassword4" value="<?php echo $row->edu_departmen ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Description </label>
                        <input type="text" name="edu_desc" class="form-control" id="inputPassword4" value="<?php echo $row->edu_desc ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">GPA </label>
                        <input type="text" name="gpa" class="form-control" id="inputPassword4" value="<?php echo $row->gpa ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Experience Date</label>
                        <input type="date" name="date" class="form-control" id="inputPassword4" value="<?php echo $row->date ?>">
                    </div>




                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Add New Experience</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("UPDATE  education SET 
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