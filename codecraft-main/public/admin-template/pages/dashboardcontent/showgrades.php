<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../config/dbcon.php';

$user_id = $_POST['user_id'];
$list = "SELECT * FROM tb_grades WHERE user_id = '$user_id'";
$resultlist = $conn->query($list);


?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Management Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="grades.css">

</head>





<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">

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



    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="#" class="brand-link">
        <img src="https://www.eastbridgecollege.org/admin_ebc/news_image/EAST_BRIDGE_COLLEGE__su_1a.png" style="width: 60px">
        <span class="brand-text font-weight-light">Administration</span>
      </a>


      <div class="sidebar">

        <br>
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>



        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ManageElem.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Manage Content
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

            </li>

            <li class="nav-item">
              <a href="enrollmentsystem.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Enrollment Sytem
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

            </li>

            <li class="nav-item menu-open">
              <a href="class.php" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Class List
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
                            <a href="inbox.php" class="nav-link">
                                <i class="nav-icon fas fa-solid fa-envelope"></i>
                                <p>
                                    Inbox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        </li>
            <li class="nav-item" style="color:white; padding-top: 20px; padding-bottom: 20px;">
              _______________________________

              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#profilepicModal">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Log Out

                </p>
              </a>


            </li>


          </ul>
        </nav>

      </div>

    </aside>


    <div class="content-wrapper">


      <!--MODAL FOR LOGOUT-->
      <div class="modal fade" id="profilepicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
              Are you sure you want to logout?
            </div>
            <div class="modal-footer">
              <a href="../config/logout.php"><button type="button" class="btn btn-primary">Yes</button></a>
            </div>
          </div>

        </div>
      </div>
      <!--End Modal For Log Out-->
      <?php 
      if(isset($_SESSION['grade']))
      {
        echo $_SESSION['grade'];
        unset($_SESSION['grade']);
      }
      ?>


      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Grades</h1>
            </div>
          </div>
        </div>
      </div>




      <section class="content">
        <div class="container-fluid">

         


            <table class="table table-bordered" style="margin-top: 20px;">
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>Instructor</th>
                  <th>Course</th>
                  <th>Year</th>
                  <th>Prelim</th>
                  <th>Midterms</th>
                  <th>Finals</th>
                  <th>Average</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($resultlist->num_rows > 0) {
                  // output data of each row
                  while ($row = $resultlist->fetch_assoc()) {
                    echo '<tr>
                        <form action="" method="POST">
                            <td>'.$row['subject'].'</td>
                            <td>'.$row['instructor'].'</td>
                            <td>'.$row['course'].'</td>
                            <td>'.$row['year'].'</td>
                            <td>'.$row['prelim'].'</td>
                            <td>'.$row['midterm'].'</td>
                            <td>'.$row['finals'].'</td>
                            <td>'.$row['average'].'</td>
                            <td>'.$row['remarks'].'</td>
                            <td><input type="submit" class="btn btn-danger" value="Delete" formaction = "../config/gradedelete.php?id='.$row['grades_id'].'"></td>
                            
                        </form>
                    </tr>';
                  }
                } 
                ?>
              </tbody>


            </table>

          </div>

          <div class="row">

            <section class="col-lg-7 connectedSortable">

            </section>
          </div>

        </div>
      </section>

    </div>

    <footer class="main-footer">
      All rights reserved
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>

  </div>


  <!--Modal LogOut-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!--Modal LogOut-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
</body>

</html>