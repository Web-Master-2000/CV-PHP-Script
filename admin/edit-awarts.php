<?php include 'include/header.php'; ?>

<?php
if ($_GET['id']) {
    //connecting datas
    $data_ex = $db->prepare("SELECT * FROM awarts WHERE id=:id ");
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
                    <div class="form-group col-md-8">
                        <label for="inputEmail4">Awarts </label>
                        <input type="text" name="awarts" class="form-control" id="inputEmail4" value="<?php echo $row->awarts ?>">
                    </div>





                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Edit New Awarts</button>
                    </div>
                </div>







            </form>


            <?php

            if ($_POST) {

                $ekle = $db->prepare("UPDATE  awarts SET 
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