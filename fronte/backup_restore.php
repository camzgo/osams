<?php require"configuration.php";

	if(isset($_POST['btn_backup'])){
        $reload = 1;
        $dbName = "admire_db";
        $dateDB = date("HisYmd");
        $newDBName = $dbName."_$dateDB".".sql";
        
        $dateNow = date("Y-m-d");
        $timeNow = date("h:i:sa");
        
        $sql = ("INSERT INTO backups() VALUES(NULL, '$newDBName', '$dateNow', '$timeNow', '0')");
        mysqli_query($connection,$sql);
        
        exec("E:/xampp/mysql/bin/mysqldump -u root Admire > E:/xampp/mysql/bin/$newDBName");
        
        $_GET['download_file'] = $newDBName;    
        ignore_user_abort(true);
        set_time_limit(0); // disable the time limit for this script

        $path = "E:/xampp/mysql/bin/"; // change the path to fit your websites document structure
        $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
        $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
        $fullPath = $path.$dl_file;

        if ($fd = fopen ($fullPath, "r")) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "pdf":
                header("Content-type: application/pdf");
                header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
                break;
                // add more headers for other content types here
                default;
                header("Content-type: application/octet-stream");
                header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
                break;
            }
            header("Content-length: $fsize");
            header("Cache-control: private"); //use this to open files directly
            while(!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose($fd);
        header("location: backup_restore.php");
        exit();
    }


    if(isset($_POST['btn_restore'])){
        $dbID = $_POST['txt_dataID'];
        $sql = "SELECT * FROM backups WHERE backup_id ='$dbID'";
        $getDB = mysqli_query($connection, $sql);
        $fetchDB = mysqli_fetch_row($getDB);
        print $restoreDBName = $fetchDB[1];
        
        exec("E:/xampp/mysql/bin/mysql -u root Admire < E:/xampp/mysql/bin/$restoreDBName") or die(error_reporting(E_ALL));

        header("location: backup_restore.php");
        exit();
    }
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from dev.lorvent.com/admire/datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2016 03:46:21 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Data Tables | Admire</title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo1.ico"/>

    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="css/components.css"/>
    <link type="text/css" rel="stylesheet" href="css/custom.css"/>
    <!--end of global styles-->
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="vendors/select2/css/select2.min.css" />
    <link type="text/css" rel="stylesheet" href="vendors/datatables/css/scroller.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="vendors/datatables/css/colReorder.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="vendors/datatables/css/dataTables.bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/pages/dataTables.bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="vendors/hover/css/hover-min.css"/>
    <link type="text/css" rel="stylesheet" href="css/pages/layouts.css" />
    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="css/pages/tables.css" />
    <link type="text/css" rel="stylesheet" href="#" id="skin_change" />
    <!--End of page level styles-->
</head>

<body class="datatable_page">
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="img/loader.gif" style=" width: 40px;" alt="loading...">
    </div>
</div>
	<?php include'header.php'; ?>
<div class="wrapper">
        <div id="left" class="fixed-header_menu">
            <div class="media user-media bg-dark dker">
                <div class="user-media-toggleHover">
                    <span class="fa fa-user"></span>
                </div>
                <div class="user-wrapper bg-dark">
                    <a class="user-link" href="#">
                        <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                             src="img/admin.jpg">
                        <p class="text-white user-info">Welcome <?php echo $_SESSION["user_firstname"]; ?></p>
                    </a>
                    <div class="search_bar col-lg-12">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="search">
                            <span class="input-group-btn">
<button class="btn without_border" type="button"><span class="fa fa-search">
</span></button>
</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #menu -->
            <ul id="menu" class="bg-blue dker">
                <li>
                    <a href="index-2.html">
                        <i class="fa fa-home"></i>
                        <span class="link-title">&nbsp;Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:;">
                        <i class="fa fa-file-o"></i>
                        <span class="link-title">&nbsp; File Maintenance</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="area_maintenance.php">
                                <i class="fa fa-angle-right"></i> &nbsp; Areas
                            </a>
                        </li>
                        <li>
                            <a href="category_maintenance.php">
                                <i class="fa fa-angle-right"></i> &nbsp; Category
                            </a>
                        </li>
                        <li>
                            <a href="icons.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Employee
                            </a>
                        </li>
                        <li>
                            <a href="subcategory_maintenance.php">
                                <i class="fa fa-angle-right"></i> &nbsp; Sub-Category
                            </a>
                        </li>
                        <li>
                            <a href="product_maintenance.php">
                                <i class="fa fa-angle-right"></i> &nbsp; Product
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span class="link-title">&nbsp; Reports</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="widgets.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Widgets1
                            </a>
                        </li>
                        <li>
                            <a href="widgets2.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Widgets2
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-gears"></i>
                        <span class="link-title">&nbsp; Utilities</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                    <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp; Archive
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu sub-submenu">
                                        <li>
                                            <a href="area_archive.php">
                                                <i class="fa fa-angle-right"></i> &nbsp;Areas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="category_archive.php">
                                                <i class="fa fa-angle-right"></i> &nbsp;Category
                                            </a>
                                        </li>
                                        <li>
                                            <a href="employee_archive.php">
                                                <i class="fa fa-angle-right"></i> &nbsp;Employee
                                            </a>
                                            
                                        </li>

                                        <li>
                                            <a href="subcategory_archive.php">
                                                <i class="fa fa-angle-right"></i> &nbsp;Sub-Category
                                            </a>
                                            
                                        </li>
                                        <li>
                                            <a href="product_archive.php">
                                                <i class="fa fa-angle-right"></i> &nbsp;Products
                                            </a>
                                            
                                        </li>
                                    </ul>
                                </li>
                    <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp; Audit Trail
                                    </a>
                               </li>
                    <li>
                                    <a href="backup_restore.php">
                                        <i class="fa fa-angle-right"></i> &nbsp; Backup & Recovery
                                    </a>
                               </li>
<li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp; User Management
                                    </a>
                               </li>
                        
                    </ul>
                </li>
        </div>
        <form method="post">
        <div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page">
                
                <div class="outer">
                    <div class="inner bg-light lter bg-container">
                        <div class="row">
                        
                            <div class="col-xs-12 datatables">
                                <!-- BEGIN EXAMPLE4 TABLE PORTLET-->
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        <i class="fa fa-table"></i> Backup & Recovery
                                    </div>
                                    <div class="card-block p-t-10">
                                        <div class="m-t-25">
                                            <table class="table table-striped table-bordered table-hover" id="sample_6">
                                                <thead>
                                                    <tr>
                                                    	<th>ID</th>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>
                                                        <button type="button" data-toggle="modal" data-target="#confirm-backup" style="border-radius: 5px; text-align:center;" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;New</button> 
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql = "SELECT * FROM backups WHERE backup_isDel = 0";
                                                $result = mysqli_query($connection, $sql);
                                                
                                                if (mysqli_num_rows($result) !=0){
                                                    while($backup = mysqli_fetch_assoc($result)){
                                                
                                            ?>
                                                	<tr>
                                                		<td><?php echo $backup["backup_id"];?></td>
	                                                    <td><?php echo $backup["backup_name"]; ?></td>
	                                                    <td><?php echo $backup["backup_date"]; ?> </td>
	                                                    <td><?php echo $backup["backup_time"]; ?> </td>
                                                		<td class="center" style="width: 15px; text-align: center;">
                                                		
                                                       <a class="hvr-float-shadow" data-toggle="modal" data-target="#confirm-restore" onclick="document.getElementById('txt_dataID').value=<?php echo $backup['backup_id']; ?>" data-placement="top" title="Add"><i class="fa fa-refresh fa-lg text-success"></i></a>&nbsp; &nbsp;

                                                		</td>
                                                	</tr>
                                                	<?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END EXAMPLE4 TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.outer -->
            </div>
            </form>
            <!-- /#content -->
        

        <form method="post">
        <div class="modal fade" id="confirm-backup"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header" >
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title">Confirmation...</h3>
                                        </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to create new backup?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger" name="btn_backup" formaction="backup_restore.php">Yes! I'm Sure!</button>
                                    
                                    <input type="hidden" name="txt_dataID" id="txt_dataID"/>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="modal fade" id="confirm-restore"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header" >
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title">Confirmation...</h3>
                                        </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to restore this database?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" name="btn_restore" formaction="backup_restore.php">Restore</button>
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <input type="hidden" name="txt_dataID" id="txt_dataID"/>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>


        <!--wrapper-->
        <div id="right">
            <div class="right_content">
                <div class="alert alert-success white_txt">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Welcome Micheal
                    <br/></strong> Set Your Skin Here. Checkout Admin Statistics. Good Day!.
                </div>
                <div class="well well-small dark">
                    <div class="xs_skin_hide hidden-sm-up toggle-right"> <i class="fa fa-cog"></i></div>
                    <h4 class="brown_txt">
                    <span class="fa-stack fa-sm">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-paint-brush fa-stack-1x fa-inverse"></i>
                </span>
                    Skins
                </h4>
                    <br/>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('blue_black_skin.html','css')">
                        <div class="skin_blue skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('green_black_skin.html','css')">
                        <div class="skin_green skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('purple_black_skin.html','css')">
                        <div class="skin_purple skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('orange_black_skin.html','css')">
                        <div class="skin_orange skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('red_black_skin.html','css')">
                        <div class="skin_red skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('mint_black_skin.html','css')">
                        <div class="skin_mint skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('brown_black_skin.html','css')">
                        <div class="skin_brown skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skinmulti_btn" onclick="javascript:loadjscssfile('black_skin.html','css')">
                        <div class="skin_black skin_size"></div>
                        <div class="skin_black skin_size"></div>
                    </div>
                    <div class="skin_btn skin_blue" onclick="javascript:loadjscssfile('blue_skin.html','css')"></div>
                    <div class="skin_btn skin_green" onclick="javascript:loadjscssfile('green_skin.html','css')"></div>
                    <div class="skin_btn skin_purple" onclick="javascript:loadjscssfile('purple_skin.html','css')"></div>
                    <div class="skin_btn skin_orange" onclick="javascript:loadjscssfile('orange_skin.html','css')"></div>
                    <div class="skin_btn skin_red" onclick="javascript:loadjscssfile('red_skin.html','css')"></div>
                    <div class="skin_btn skin_mint" onclick="javascript:loadjscssfile('mint_skin.html','css')"></div>
                    <div class="skin_btn skin_brown" onclick="javascript:loadjscssfile('brown_skin.html','css')"></div>
                    <div class="skin_btn skin_black" onclick="javascript:loadjscssfile('black_skin.html','css')"></div>
                </div>
                <div class="well well-small dark">
                    <h4 class="brown_txt margin15_bottom">
                    <img src="img/admin.jpg" width="32" height="32" class="rounded-circle avatar-img" alt="avatar"> &nbsp;Admin
                    Statistics</h4>
                    <br/>
                    <ul class="list-unstyled">
                        <li class="green_txt margin15_bottom">
                            <span class="fa-stack fa-sm">
                    <i class="fa fa-circle fa-stack-2x text-mint"></i>
                    <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                </span> &nbsp; Last Login
                            <span class="inlinesparkline float-xs-right">2hrs Back</span>
                        </li>
                        <li class="warning_txt margin15_bottom">
                            <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-brown"></i>
                      <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                    </span> &nbsp; Pending Tasks
                            <span class="dynamicsparkline float-xs-right">12</span>
                        </li>
                        <li class="primary_txt margin15_bottom">
                            <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                      <i class="fa fa-cloud fa-stack-1x fa-inverse"></i>
                    </span> &nbsp; Weather Today
                            <span class="dynamicbar float-xs-right">Rainy</span>
                        </li>
                        <li class="margin15_bottom">
                            <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-brown"></i>
                      <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                    </span> &nbsp; Events
                            <span class="inlinebar float-xs-right">Team Out</span>
                        </li>
                        <li class="success_txt margin15_bottom">
                            <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-success"></i>
                      <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                    </span> &nbsp; Notifications
                            <span class="inlinebar float-xs-right">5</span>
                        </li>
                    </ul>
                </div>
                <div class="well well-small dark right_progressbar_section">
                    <h4 class="brown_txt">
                    <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-brown"></i>
                      <i class="fa fa-hand-o-down fa-stack-1x fa-inverse"></i>
                    </span>
                    Alerts
                </h4>
                    <br/>
                    <span>Sales Improvement</span>
                    <span class="float-xs-right">
                <small>20%</small>
            </span>
                    <div class="progress xs">
                        <progress class="progress progress-striped progress-primary" value="20" max="100"></progress>
                    </div>
                    <span>Server Load</span>
                    <span class="float-xs-right">
                <small>80%</small>
            </span>
                    <div class="progress xs">
                        <progress class="progress  progress-striped progress-mint" value="80" max="100"></progress>
                    </div>
                    <span>Traffic Improvement</span>
                    <span class="float-xs-right">
                <small>55%</small>
            </span>
                    <div class="progress xs">
                        <progress class="progress  progress-striped progress-danger" value="55" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>
        <!-- # right side -->
    </div>
    <!-- /#wrap -->
    <!-- global scripts-->
    <script type="text/javascript" src="js/components.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
    <!--end of global scripts-->
    <!--plugin scripts-->
    <script type="text/javascript" src="vendors/select2/js/select2.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/pluginjs/dataTables.tableTools.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="vendors/datatables/js/dataTables.scroller.min.js"></script>
    <!-- end of plugin scripts -->
    <!--Page level scripts-->
    <script type="text/javascript" src="js/pages/datatable.js"></script>
    
    <!-- end of global scripts-->
</body>


<!-- Mirrored from dev.lorvent.com/admire/datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2016 03:46:33 GMT -->
</html>