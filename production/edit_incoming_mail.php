<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ./login.php");
  exit;
};

include("./config/config.php");

$id_surat = $_SESSION["user_id"];
// echo "<script>console.log('$id_surat')</script>";
$sql = "SELECT * FROM surat_masuk WHERE id=$id_surat";
$result = mysqli_query($connect, $sql);

while ($data_surat_masuk = mysqli_fetch_array($result)) {
    $data_admin = $data_surat_masuk['_admin'];
    $data_topic = $data_surat_masuk['topic'];
    $data_entry_date = $data_surat_masuk['entry_date'];
    $data_sender = $data_surat_masuk['sender'];
    $data_receiver = $data_surat_masuk['receiver'];
    $admin_id = $data_surat_masuk['admin_id'];
    $id_surat_masuk = $data_surat_masuk['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pendataan Surat | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Pendataan Surat</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Selamat Datang,</span>
                            <h2><?php echo $data_admin ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                                    <!-- <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                      <li><a href="index2.php">Dashboard2</a></li>
                      <li><a href="index3.php">Dashboard3</a></li>
                    </ul> -->
                                </li>
                                <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="form_advanced.php">Advanced Components</a></li> -->
                                        <li><a href="add_admin.php">Tambah Admin</a></li>
                                        <li><a href="add_incoming_mail.php">Tambah Surat Masuk</a></li>
                                        <li><a href="add_outgoing_mail.php">Tambah Surat Keluar</a></li>
                                    </ul>


                                </li>
                                <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="general_elements.php">General Elements</a></li>
                                        <li><a href="media_gallery.php">Media Gallery</a></li>
                                        <li><a href="typography.php">Typography</a></li>
                                        <li><a href="icons.php">Icons</a></li>
                                        <li><a href="glyphicons.php">Glyphicons</a></li>
                                        <li><a href="widgets.php">Widgets</a></li>
                                        <li><a href="invoice.php">Invoice</a></li>
                                        <li><a href="inbox.php">Inbox</a></li>
                                        <li><a href="calendar.php">Calendar</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="table_admin.php">Admin</a></li>
                                        <li><a href="table_surat_masuk.php">Surat Masuk</a></li>
                                        <li><a href="table_surat_keluar.php">Surat Keluar</a></li>

                                    </ul>

                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php echo $data_nama ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="edit_profile.php"> Profile</a></li>
                                    <li>
                                        <a href="change_password.php">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>Bambang Seno</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>Bambang Seno</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>Bambang Seno</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>Bambang Seno</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Surat Masuk</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Masukkan Data Surat Masuk</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Admin <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name"  name="admin_name" value="<?php echo $data_admin ?>" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Topic <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" value="<?php echo $data_topic ?>" id="first-name" name="topic" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Tanggal Masuk <span class="required">*</span>
                                            </label>
                                            <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-8 style="margin-bottom: 0" xdisplay_inputx form-group has-feedback">
                                <input type="text" value="<?php echo $data_entry_date ?>" class="form-control has-feedback-left" id="single_cal4" placeholder="Entry Date" name="entry_date" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sender">Pengirim <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" value="<?php echo $data_sender ?>" id="sender" name="sender" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="receiver">Penerima <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="receiver" value="<?php echo $data_receiver ?>" name="receiver" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <input type="hidden"  name="id_surat_masuk" value="<?php echo $id_surat_masuk ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button class="btn btn-primary" type="button">Cancel</button>
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" name="submited" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /page content -->

                    <!-- footer content -->
                    <footer>
                        <div class="pull-right">
                            Gentelella Alela Template by <a href="https://colorlib.com">Colorlib</a>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            </div>

            <!-- jQuery -->
            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="../vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="../vendors/nprogress/nprogress.js"></script>
            <!-- bootstrap-progressbar -->
            <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
            <!-- iCheck -->
            <script src="../vendors/iCheck/icheck.min.js"></script>
            <!-- bootstrap-daterangepicker -->
            <script src="../vendors/moment/min/moment.min.js"></script>
            <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
            <!-- bootstrap-wysiwyg -->
            <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
            <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
            <script src="../vendors/google-code-prettify/src/prettify.js"></script>
            <!-- jQuery Tags Input -->
            <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
            <!-- Switchery -->
            <script src="../vendors/switchery/dist/switchery.min.js"></script>
            <!-- Select2 -->
            <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
            <!-- Parsley -->
            <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
            <!-- Autosize -->
            <script src="../vendors/autosize/dist/autosize.min.js"></script>
            <!-- jQuery autocomplete -->
            <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
            <!-- starrr -->
            <script src="../vendors/starrr/dist/starrr.js"></script>
            <!-- Custom Theme Scripts -->
            <script src="../build/js/custom.min.js"></script>




            <?php 
            include_once("./config/config.php");

            if (isset($_POST["submited"])) {
              $topic = $_POST['topic'];
              $entry_date = $_POST['entry_date'];
              $sender = $_POST['sender'];
              $receiver = $_POST['receiver'];
              $admin_name = $_POST['admin_name'];
              $admin_id = $admin_id;
              $sql = "UPDATE `surat_masuk` SET `topic`='$topic', `entry_date`='$entry_date', `sender`='$sender', `receiver`='$receiver' ,`_admin`='$admin_name', `admin_id`='$admin_id' WHERE id='$id_surat_masuk' ";
              mysqli_query($connect, $sql);
              echo "<script>location.href='table_surat_masuk.php'</script>";
            };



            ?>
</body>

</html> 