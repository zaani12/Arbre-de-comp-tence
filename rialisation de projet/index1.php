


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>gestion compétences</title>
  <link rel="icon" href="Views/assets/vendor/dist/img/OnlyLogo.png" type="image/png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Views/assets/vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="Views/assets/vendor/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Views/assets/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="Views/assets/vendor/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/assets/vendor/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Views/assets/vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="Views/assets/vendor/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="Views/assets/vendor/plugins/summernote/summernote-bs4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
        <a href="#" class="nav-link">Home</a>
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


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light pl-3">Arbre des compétences</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="Views/assets/vendor/dist/img/solicoders.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">solicoders</a>
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
              gestion des compétences
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Views/gestionCompetences/ajouterCompetences.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ajouter compétence</p>
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
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Compétences</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="card-header">
        <h3 class="card-title">management des Compétences</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
           <a class="card-title btn btn-primary" href="Views/gestionCompetences/ajouterCompetences.php"><span>&#43;</span></a>
          </div>
        </div>
      </div>
      <div class="row">
       
     <!-- /.card-header -->
              <div class="card-body  p-0">
                <table class="table table-hover text-nowrap ">
                  <thead>
                    <tr>
                      <th>reference</th>
                      <th>code</th>
                      <th>name</th>
                      <th>action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>C1</td>
                      <td>Maquette</td>
                      <td>Maquetter une application mobile</td>
                      <td>
                        <a class="btn btn-danger"> <i class="bi bi-trash"></i></a>
                        <a class="btn btn-warning"href="Views/gestionCompetences/editerCompetences.php"> <i class="bi bi-pencil-square"></i></a>                 
                    </td>
                    </tr>
                    <tr>
                      <td>C2</td>
                      <td>Base Données</td>
                      <td>Manipuler une base de données - perfectionnement</td>
                      <td>
                        <a class="btn btn-danger"> <i class="bi bi-trash"></i> </a>
                        <a class="btn btn-warning"href="Views/gestionCompetences/editerCompetences.php"> <i class="bi bi-pencil-square"></i></a>                 
                    </td>
                    </tr>
                    <tr>
                      <td>C3</td>
                      <td>back-end</td>
                    
                      <td>Développer la partie back-end d'une application web ou web mobile - perfectionnement</td>
                      <td>
                        <a class="btn btn-danger"> <i class="bi bi-trash"></i></a>
                        <a class="btn btn-warning"href="Views/gestionCompetences/editerCompetences.php"> <i class="bi bi-pencil-square"></i></a>                 
                    </td>
                    </tr>
                    <tr>
                      <td>C4</td>
                      <td>gestion</td>
                    
                      <td>Collaborer à la gestion d’un projet informatique et à l’organisation de<br>l’environnement de développement - perfectionnement</td>
                      <td>
                        <a class="btn btn-danger"> <i class="bi bi-trash"></i></a>
                        <a class="btn btn-warning"href="Views/gestionCompetences/editerCompetences.php"> <i class="bi bi-pencil-square"></i></a>                 
                    </td>
                    </tr>
                    <tr>
                      <td>C5</td>
                      <td>Mobile native</td>
                    
                      <td>Développer une application mobile native, avec Android et React Native</td>
                      <td>
                        <a class="btn btn-danger"> <i class="bi bi-trash"></i></a>
                        <a class="btn btn-warning"href="Views/gestionCompetences/editerCompetences.php"> <i class="bi bi-pencil-square"></i></a>                 
                    </td>
                    </tr>
                    <tr>
                      <td>C6</td>
                      <td>tests</td>
                    
                      <td>Préparer et exécuter les plans de tests d’une application</td>
                      <td>
                        <a class="btn btn-danger"> <i class="bi bi-trash"></i></a>
                        <a class="btn btn-warning"href="Views/gestionCompetences/editerCompetences.php"> <i class="bi bi-pencil-square"></i></a>                 
                    </td>
                    </tr>
                    <tr>
                      <td>C7</td>
                      <td>déploiement</td>
                    
                      <td>Préparer et exécuter le déploiement d’une application web et mobile - perfectionnement</td>
                      <td>
                        <a class="btn btn-danger"> <i class="bi bi-trash"></i></a>
                        <a class="btn btn-warning"href="Views/gestionCompetences/editerCompetences.php"> <i class="bi bi-pencil-square"></i></a>                 
                    </td>
                    </tr>
                  </tbody>
                </table>
              </div>


     
    

      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021-2023 <a href="https://solicode.co/">Solicode.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="Views/assets/vendor/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="Views/assets/vendor/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="Views/assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="Views/assets/vendor/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="Views/assets/vendor/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="Views/assets/vendor/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="Views/assets/vendor/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="Views/assets/vendor/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="Views/assets/vendor/plugins/moment/moment.min.js"></script>
<script src="Views/assets/vendor/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="Views/assets/vendor/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="Views/assets/vendor/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="Views/assets/vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="Views/assets/vendor/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="Views/assets/vendor/dist/js/pages/dashboard.js"></script>
</body>
</html>
