<?php require_once "admin/include/db.php";    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Resume - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php

    //connecting datas
    $menu = $db->prepare("SELECT * FROM header ");
    $menu->execute();
    $menu_row = $menu->fetch(PDO::FETCH_OBJ);



    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Clarence Taylor</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about"><?php echo $menu_row->menu1 ?></a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience"><?php echo $menu_row->menu2 ?></a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education"><?php echo $menu_row->menu3 ?></a></li>

                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests"><?php echo $menu_row->menu4 ?></a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards"><?php echo $menu_row->menu5 ?></a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <?php

        //connecting datas
        $about = $db->prepare("SELECT * FROM about ");
        $about->execute();
        $about_row = $about->fetch(PDO::FETCH_OBJ);



        ?>
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    <?php echo $about_row->title ?>

                </h1>
                <div class="subheading mb-5">
                    <?php echo $about_row->address ?>

                </div>
                <p class="lead mb-5"><?php echo $about_row->description  ?></p>
                <div class="social-icons">
                    <a class="social-icon" href="<?php echo $about_row->linkedin   ?>"><i class="fab fa-linkedin-in"></i></a>

                    <a class="social-icon" href="<?php echo $about_row->instagram   ?>"><i class="fab fa-instagram"></i></a>
                    <a class="social-icon" href="<?php echo $about_row->eposta   ?>"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->

        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Experience</h2>
                <?php

                //connecting datas
                $exp = $db->query("SELECT * FROM experience ")->fetchAll(PDO::FETCH_OBJ);

                foreach ($exp as  $exp_row) {


                ?>
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo $exp_row->title ?></h3>
                            <div class="subheading mb-3"><?php echo $exp_row->sub_title ?></div>
                            <p><?php echo $exp_row->description ?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php echo $exp_row->exp_date ?></span></div>
                    </div>


                <?php } ?>



            </div>
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Education</h2>

                <?php

                //connecting datas
                $edu = $db->query("SELECT * FROM education ")->fetchAll(PDO::FETCH_OBJ);

                foreach ($edu as  $edu_row) {


                ?>

                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0"><?php echo $edu_row->edu_school ?></h3>
                            <div class="subheading mb-3"><?php echo $edu_row->edu_departmen ?></div>
                            <div><?php echo $edu_row->edu_desc ?></div>
                            <p>GPA: <?php echo $edu_row->gpa ?></p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary"><?php echo $edu_row->date ?></span></div>
                    </div>

                <?php } ?>



            </div>
        </section>
        <hr class="m-0" />


        <!-- Interests-->
        <section class="resume-section" id="interests">
            <div class="resume-section-content">
                <h2 class="mb-5">Interests</h2>
                <?php

                //connecting datas
                $interest = $db->prepare("SELECT * FROM interest ");
                $interest->execute();
                $interest_row = $interest->fetch(PDO::FETCH_OBJ);



                ?>

                <p><?php echo $interest_row->title ?></p>
                <p class="mb-0"><?php echo $interest_row->i_description ?></p>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Awards-->
        <section class="resume-section" id="awards">
            <div class="resume-section-content">
                <h2 class="mb-5">Awards & Certifications</h2>
                <ul class="fa-ul mb-0">
                    <li>
                        <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                        Google Analytics Certified Developer
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                        Mobile Web Specialist - Google Certification
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                        1
                        <sup>st</sup>
                        Place - University of Colorado Boulder - Emerging Tech Competition 2009
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                        1
                        <sup>st</sup>
                        Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                        2
                        <sup>nd</sup>
                        Place - University of Colorado Boulder - Emerging Tech Competition 2008
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                        1
                        <sup>st</sup>
                        Place - James Buchanan High School - Hackathon 2006
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
                        3
                        <sup>rd</sup>
                        Place - James Buchanan High School - Hackathon 2005
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>