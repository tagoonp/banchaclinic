<?php 

require('../../../configuration/local.inc.php');
require('../../../configuration/configuration.php');
require('../../../configuration/database.php'); 

$db = new Database();
$conn = $db->conn();

require('../../../configuration/user.inc.php'); 

$page_id = 16;
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['app_title']; ?></title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/dragula.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../node_modules/preload.js/dist/css/preload.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/widgets.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-analytics.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <!-- END: Page CSS-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css?v=<?php echo filemtime('../../../assets/css/style.css'); ?>">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-static 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-static-top bg-success navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.php">
                        <div class="brand-logo"><img class="logo" src="../../../app-assets/images/logo/logo-light.png"></div>
                        <h2 class="brand-text mb-0">Bancha Clinic</h2>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu mr-auto"><a class="nav-link nav-menu-main menu-toggle" href="javascript:void(0);"><i class="bx bx-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.php" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon bx bx-calendar-alt"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right d-flex align-items-center">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search pt-2"><i class="ficon bx bx-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                                <input class="input" type="text" placeholder="ค้นหาผู้ป่วยด้วยรหัส ชื่อ หรือนามสกุล ..." tabindex="-1" data-search="template-search">
                                <div class="search-input-close"><i class="bx bx-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                                <div class="user-nav d-lg-flex d-none"><span class="user-status">Welcome,</span><span class="user-name"><?php echo $user['fullname']; ?></span></div><span><img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href="page-user-profile.php"><i class="bx bx-user mr-50"></i> Edit Profile</a>
                                <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="../../../controller/authen.php?stage=closesession"><i class="bx bx-power-off mr-50"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-sticky navbar-light navbar-without-dd-arrow" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header d-xl-none d-block">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php">
                        <div class="brand-logo">
                            <svg class="logo" width="26px" height="26px" viewbox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>icon</title>
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="50%" y1="0%" x2="50%" y2="100%">
                                        <stop stop-color="#5A8DEE" offset="0%"></stop>
                                        <stop stop-color="#699AF9" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop stop-color="#FDAC41" offset="0%"></stop>
                                        <stop stop-color="#E38100" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Sprite" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="sprite" transform="translate(-69.000000, -61.000000)">
                                        <g id="Group" transform="translate(17.000000, 15.000000)">
                                            <g id="icon" transform="translate(52.000000, 46.000000)">
                                                <path id="Combined-Shape" d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"></path>
                                                <path id="Combined-Shape" d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5378966 4.74673291,13.1939746 4.7846258,12.8556254 L8.55057141,12.8560055 C8.48653249,13.1896162 8.45300462,13.5340745 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.529522,8.45300462 13.180715,8.48740462 12.8430777,8.55306931 L12.8426531,4.78608796 C13.1851829,4.7472336 13.5334422,4.72727273 13.8863636,4.72727273 Z" fill="#4880EA"></path>
                                                <path id="Combined-Shape" d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z" fill="url(#linearGradient-1)"></path>
                                                <rect id="Rectangle" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                                                <rect id="Rectangle" fill="url(#linearGradient-2)" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h2 class="brand-text mb-0">Bancha Clinic</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <?php 
        require('./componants/topmenu.php');
        ?>
        <!-- /horizontal menu content-->
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0 text-dark" style="font-size: 28px;">ค่าใช้จ่ายอื่น ๆ</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block" style="padding-top: 10px;">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item">การจัดการ</li>
                                <li class="breadcrumb-item active">ค่าใช้จ่ายอื่น ๆ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!--Success theme Modal -->
            <div class="modal fade text-left" id="modalStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title white" id="myModalLabel110"><i class="bx bx-plus"></i> เพิ่มยาเข้าคลัง</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="resetNewform();">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                        <form id="newdrugForm" onsubmit="return false;">
                            <div class="modal-body">
                                <div class="form-group dn">
                                    <label for="" style="font-size: 18px !important;">รหัสยา : <span class="text-danger">*</span>  </label>
                                    <input type="text" class="form-control" id="txtDrugId" name="txtDrugId">
                                    <!-- <div class="text-muted" style="font-size: 0.8em; padding-top: 1px;">* หากเว้นว่าง จะเป็นการให้ระบบออกรหัสให้อัตโนมัติ</div> -->
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-size: 18px !important;">Trade name : <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="txtDrugTrade" name="txtDrugTrade" readonly>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="" style="font-size: 18px !important;">จำนวนในคลัง : <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" id="txtDrugQ" name="txtDrugQ" readonly>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="" style="font-size: 18px !important;">จำนวนที่เพิ่ม : <span class="text-danger">*</span> </label>
                                        <input type="number" class="form-control" id="txtNewQ" name="txtNewQ" min="0">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-size: 18px !important;">จำนวนที่จะมีในคลัง : <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="txtNewTotal" name="txtNewTotal" readonly>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal" onclick="resetNewform();">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">ยกเลิก</span>
                                </button>

                                <button type="button" class="btn btn-success ml-1" id="btnSaveStock" onclick="saveStock()">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">บันทึก</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade text-left" id="modaleditStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title white" id="myModalLabel110"><i class="bx bx-plus"></i> แก้ไขจำนวนยาในคลัง</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="resetNewform();">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                        <form id="newdruguForm" onsubmit="return false;">
                            <div class="modal-body">
                                <div class="form-group dn">
                                    <label for="" style="font-size: 18px !important;">รหัสยา : <span class="text-danger">*</span>  </label>
                                    <input type="text" class="form-control" id="txtDrugIdu" name="txtDrugIdu">
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-size: 18px !important;">Trade name : <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="txtDrugTradeu" name="txtDrugTradeu">
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-size: 18px !important;">GENERIC NAME : <span class="text-danger">*</span>  </label>
                                    <input type="text" class="form-control" id="txtDrugGeneric" name="txtDrugGeneric">
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-size: 18px !important;">DOSE : <span class="text-danger">*</span>  </label>
                                    <input type="text" class="form-control" id="txtDrugDose" name="txtDrugDose">
                                </div>

                                <div class="row">
                                    <div class="form-group col-12 col-sm-6">
                                        <label for="" style="font-size: 18px !important;">ราคาทุน : <span class="text-danger">*</span> </label>
                                        <input type="number" class="form-control" id="txtDrugCost" name="txtDrugCost" step="0.01">
                                    </div>

                                    <div class="form-group col-12 col-sm-6">
                                        <label for="" style="font-size: 18px !important;">ราคาขาย : <span class="text-danger">*</span> </label>
                                        <input type="number" class="form-control" id="txtDrugPrice" name="txtDrugPrice" step="0.01">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" style="font-size: 18px !important;">จำนวนที่จะมีในคลัง : <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="txtNewTotalu" name="txtNewTotalu">
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-dismiss="modal" onclick="resetNewform();">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">ยกเลิก</span>
                                </button>

                                <button type="button" class="btn btn-danger ml-1" id="btnSaveStocku" onclick="editStock()">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">บันทึก</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="content-body row">
                <div class="col-12">
                    
                    <div class="row">
                        <div class="col-12 col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4>เพิ่ม/แก้ไขข้อมูลรายจ่ายยอื่น ๆ</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" id="costForm" onsubmit="return false;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                เดือน : <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select name="txtMonth" id="txtMonth" class="form-control">
                                                        <option value="">-- เลือกเดือน --</option>
                                                        <option value="01">ม.ค.</option>
                                                        <option value="02">ก.พ.</option>
                                                        <option value="03">มึ.ค.</option>
                                                        <option value="04">เม.ย.</option>
                                                        <option value="05">พ.ค.</option>
                                                        <option value="06">มิ.ย.</option>
                                                        <option value="07">ก.ค.</option>
                                                        <option value="08">ส.ค.</option>
                                                        <option value="09">ก.ย.</option>
                                                        <option value="10">ต.ค.</option>
                                                        <option value="11">พ.ย.</option>
                                                        <option value="12">ธ.ค.</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                ปี : <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select name="txtYear" id="txtYear" class="form-control">
                                                        <option value="">-- เลือกปี --</option>
                                                        <?php 
                                                        for ($i=date('Y'); $i >= (date('Y') - 10) ; $i--) { 
                                                            ?>
                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                ค่าไฟฟ้า : <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" id="txtC1" class="form-control" name="txtC1" placeholder="">
                                                </div>
                                                <div class="col-md-4">
                                                ค่าโทรศัพท์ : <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" id="txtC2" class="form-control" name="txtC2" placeholder="">
                                                </div>
                                                <div class="col-md-4">
                                                เงินเดือนพนักงาน : <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" id="txtC3" class="form-control" name="txtC3" placeholder="">
                                                </div>
                                                <div class="col-md-4">
                                                ค่าใช้จ่ายเบ็ดเตล็ด : <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" id="txtC4" class="form-control" name="txtC4" placeholder="">
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary mr-1">บันทึก</button>
                                                    <button type="reset" class="btn btn-light-secondary">ล้างฟอร์ม</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors mt-0" style="width: 100%;">
                                            <thead class="thead-dark">
                                                <!-- <tr style="background: #4a5751; font-weight: 400; color: #fff;"> -->
                                                <tr style="font-weight: 400;">
                                                <td style="width: 100px;">ปี/เดือน</td>
                                                    <!-- <td style="width: 100px;" class="pl-1 pr-1">เดือน</td>                                                     -->
                                                    <td>ค่าไฟฟ้า</td>
                                                    <td>ค่าโทรศัพท์</td>
                                                    <td>เงินเดือนหนักงาน</td>
                                                    <td>ค่าใช้จ่ายเบ็ดเตล็ด</td>
                                                    <td style="width: 40px;"></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $strSQL = "SELECT * FROM bnc_othercost WHERE oc_delete = 'N' ORDER BY oc_date DESC";
                                            $result = $db->fetch($strSQL, true);
                                            if($result['status']){
                                                $c = 1;
                                                foreach ($result['data'] as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo substr($row['oc_date'], 0,7);?></td>
                                                        <!-- <td class="pl-1 pr-1"><a href="Javascript:void(0)" class=""><?php echo $row['oc_month'];?></a></td> -->
                                                        <td><?php echo number_format($row['oc_electrticity'], 2, '.', ',');?></td>
                                                        <td><?php echo number_format($row['oc_cellphone'], 2, '.', ',');?></td>
                                                        <td>
                                                            <?php echo number_format($row['oc_salary'], 2, '.', ',');?>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($row['oc_other'], 2, '.', ',');?>
                                                        </td>
                                                        <td style="vertical-align: top;" class="text-right pr-1">
                                                                <button class="btn btn-icon rounded-circle btn-success" style="height: 40px; width: 40px; padding-top: 1px; margin-bottom: 3px;" id="btnUpdateDrugStock" onclick="updateCost('<?php echo $row['oc_month']; ?>', '<?php echo $row['oc_year'];?>', '<?php echo $row['oc_electrticity'];?>', '<?php echo $row['oc_cellphone'];?>', '<?php echo $row['oc_salary'];?>', '<?php echo $row['oc_other'];?>')"><i class="bx bx-pencil" style="font-size: 1.3em;"></i></button>
                                                                <button class="btn btn-icon rounded-circle btn-danger" style="height: 40px; width: 40px; padding-top: 1px; margin-bottom: 3px;" id="btnEditDrugStock" onclick="deleteCost('<?php echo $row['oc_id']; ?>')"><i class="bx bxs-trash" style="font-size: 1.3em;"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- demo chat-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../../../node_modules/preload.js/dist/js/preload.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/scripts/configs/horizontal-menu.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <script src="../../../app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../assets/js/banchaclinic/core.js?v=<?php echo filemtime('../../../assets/js/banchaclinic/core.js'); ?>"></script>
    <script src="../../../assets/js/banchaclinic/drug.js?v=<?php echo filemtime('../../../assets/js/banchaclinic/drug.js'); ?>"></script>
    <script src="../../../assets/js/banchaclinic/app.js?v=<?php echo filemtime('../../../assets/js/banchaclinic/app.js'); ?>"></script>
    <!-- END: Page JS-->

    <script>

        $(document).ready(function(){
            preload.hide()
            $('#DataTables_Table_0_filter').addClass('mt-0')
        })

        $(function(){
            $('#costForm').submit(function(){
                $check = 0;
                $('.form-control').removeClass('is-invalid')
                if($('#txtMonth').val() == ''){ $check++ ; $('#txtMonth').addClass('is-invalid'); }
                if($('#txtYear').val() == ''){ $check++ ; $('#txtYear').addClass('is-invalid'); }
                if($('#txtC1').val() == ''){ $check++ ; $('#txtC1').addClass('is-invalid'); }
                if($('#txtC2').val() == ''){ $check++ ; $('#txtC2').addClass('is-invalid'); }
                if($('#txtC3').val() == ''){ $check++ ; $('#txtC3').addClass('is-invalid'); }
                if($('#txtC4').val() == ''){ $check++ ; $('#txtC4').addClass('is-invalid'); }
                if($check != 0){ return ; }
                var param = {
                    month: $('#txtMonth').val(),
                    year: $('#txtYear').val(),
                    c1: $('#txtC1').val(),
                    c2: $('#txtC2').val(),
                    c3: $('#txtC3').val(),
                    c4: $('#txtC4').val()
                }
                console.log(param);
                // return ;
                preload.show()
                var jxr = $.post(authen_api + 'cost.php?stage=add', param, function(){}, 'json')
                   .always(function(snap){
                       console.log(snap);
                       if(snap.status == 'Success'){
                        preload.hide()
                            Swal.fire({
                                title: 'สำเร็จ',
                                text: "ข้อมูลถูกบันทึกเรียบร้อย",
                                icon: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'รีโหลดข้อมูล',
                                cancelButtonText: 'กลับไปตรวจสอบ',
                                confirmButtonClass: 'btn btn-danger mr-1',
                                cancelButtonClass: 'btn btn-secondary',
                                buttonsStyling: false,
                            }).then(function (result) {
                                if (result.value) {
                                    window.location.reload()
                                }
                            })
                       }else{
                            preload.hide()
                            Swal.fire({
                                title: "ขออภัย",
                                text: "ไม่สามารถเพิ่ม/แก้ไขข้อมูลได้",
                                icon: "error",
                                confirmButtonClass: 'btn btn-danger',
                                confirmButtonText: 'รับทราบ',
                                buttonsStyling: false,
                            });
                            return false;
                       }
                   })
            })
        })

        function updateCost(m, y, c1, c2, c3, c4){
            $('#txtMonth').val(m)
            $('#txtYear').val(y)
            $('#txtC1').val(c1)
            $('#txtC2').val(c2)
            $('#txtC3').val(c3)
            $('#txtC4').val(c4)
        }

        function deleteCost(id){
            Swal.fire({
                title: 'คำเตือน',
                text: "ท่านต้องการลบรายการนี้หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonClass: 'btn btn-danger mr-1',
                cancelButtonClass: 'btn btn-secondary',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    preload.show()
                    var jxr = $.post(authen_api + 'cost.php?stage=delete', {oc_id: id}, function(){}, 'json')
                               .always(function(snap){
                                   if(snap.status == 'Success'){
                                        window.location.reload()
                                   }else{
                                       preload.hide()
                                       Swal.fire({
                                            title: "เกิดข้อผิดพลาด",
                                            text: "ไม่สามารถลบข้อมูลได้",
                                            icon: "error",
                                            confirmButtonClass: 'btn btn-danger',
                                            confirmButtonText: 'ลองใหม่',
                                            buttonsStyling: false,
                                        });
                                        return false;
                                   }
                               })
                }
            })
        }
    </script>

</body>
<!-- END: Body-->

</html>