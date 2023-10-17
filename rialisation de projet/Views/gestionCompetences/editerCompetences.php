<?php
// include "./loader.php";
// include "./Entities/Stagiaire.php";
// include "./Entities/City.php";
include "./BLL/StagiaireBLO.php";
include "./BLL/CityBLO.php";
if (isset($_GET['Page'])) {
    $ID = $_GET['Page'];


    $StagiairesBLO = new StagiaireBLO;
    $Stagiaires = $StagiairesBLO->getStagiaresById($ID);


    $CityBLO = new CityBLO;
    $Cities = $CityBLO->getAllCity();


    if (isset($_POST['btnUpdate'])) {



        $FullName      = $_POST['FullName'];
        $Email         = $_POST['Email'];
        $PhoneNumber   = $_POST['PhoneNumber'];
        $Address       = $_POST['Address'];
        $City          = $_POST['City'];

        $Stagiaires = new Stagiaire($ID, $FullName, $Email, $PhoneNumber, $Address, $City);
        $StagiairesBLO->UpdateTrainee($Stagiaires);



        if (empty($StagiairesBLO->ErrorMasseg)) {
            header("location:index.php");
        } else {
            $Errors = $StagiairesBLO->ErrorMasseg;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prime review</title>
  <link rel="icon" href="../assets/vendor/dist/img/OnlyLogo.png" type="image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="../assets/vendor/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../assets/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../assets/vendor/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/vendor/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../assets/vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../assets/vendor/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../assets/vendor/plugins/summernote/summernote-bs4.min.css">
    <script src="https://cdn.tiny.cloud/1/d2nq8cur7uv9c3ovyevwee5l5e5k2ym6hodsnpuuy1hyy1yf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


       <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light pl-2">Arbre des compétences</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/vendor/dist/img/user.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Solicoders</a>
                    </div>
                </div>



             <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              gestion compétences
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Les compétences</p>
                </a>
              </li>
            </ul>
          </li>

         <!--  -->
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                gestion des niveaux
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
      
          </li>
                   <!--  -->
                   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                gestion des formateur
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
          </li>


     
        </ul>
      </nav>
            </div>
            <!-- /.sidebar -->
        </aside>






        <div class="content-wrapper">
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">editer competences</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Compétence nom</label>
                    <input type="text"  value="<?php echo $Stagiaires->GetFullName() ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Compétence code</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Compétence description</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Références</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Références">
                  </div>
                 
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">est ce que vous etes sure ?</label>
                  </div>
                </div>

                    <!-- Description -->
                    <div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description"></textarea>
</div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </form>

              
            </div>


        </div>










<!-- FOOTER -->

<footer class="main-footer">
    <strong>Copyright &copy; 2021-2023 <a href="https://solicode.co/">Solicode.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <script>
    tinymce.init({
        selector: 'textarea#description',
        plugins: 'link image code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code',
        menubar: false,
    });
</script>

    </div>

    <script src="../assets/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets/vendor/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton',$.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../assets/vendor/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../assets/vendor/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../assets/vendor/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets/vendor/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets/vendor/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../assets/vendor/plugins/moment/moment.min.js"></script>
    <script src="../assets/vendor/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../assets/vendor/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../assets/vendor/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../assets/vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/vendor/dist/js/adminlte.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../assets/vendor/dist/js/pages/dashboard.js"></script>
</body>

</html>