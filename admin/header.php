<?php ob_start(); 
include 'db.php';
// session_start();
$id=$_SESSION['userid'];
$sql="SELECT * from user_register where id=".$id;
$res=mysqli_query($con,$sql);
$cnt=mysqli_num_rows($res);
if($cnt==0)
{
  header("location:logout.php");
}
$data1=mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
      <li class="nav-item">
        <a href="logout.php" class="nav-link">
           <i class="nav-icon fas fa-power-off"></i>
           Logout
        </a>
      </li>
       <li class="nav-item">
        <a href="update_password.php" class="nav-link">
          <i class="nav-icon fas fa-key"></i>
           change password
        </a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <img src="image/admin/<?php echo $data1['a_image'] ?>" alt="Image"></td>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $data1['name'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            
            </ul>
          </li>       
         
          <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Admin</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
           <i class="nav-icon far fa-edit"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_slider.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_slider.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Offer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_offer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Offer</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_offer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Offer</p>
                </a>
              </li>
            </ul>
          </li>
          </li>
          </li>
           <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-quote-right"></i>
              <p>
                What Other Saying
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_whatother.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add What Other Saying</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_whatother.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View What Other Saying</p>
                </a>
              </li>
            </ul>
          </li>
           </li>
           <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_blog.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blog</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_blog.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Blog</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_services.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Services</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_services.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Services</p>
                </a>
              </li>
            </ul>
          </li>
             <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Comment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_comment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Comment</p>
                </a>
              </li>
            </ul>
          </li>
               <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                About
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_about.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add About</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_about.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View About</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_cat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_cat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contact
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_contact.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
            </ul>
          </li>

          
         
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>