<div class="navbar-container main-menu-content" data-menu="menu-container">
    <!-- include ../../../includes/mixins-->
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="filled" style="font-size: 18px; color: #000 !important;">
        <li class="nav-item <?php if($page_id == 0){ echo "active"; } ?>"><a class="nav-link" href="./"><i class="menu-livicon" data-icon="home"></i><span data-i18n="Dashboard">หน้าหลัก</span></a>   </li>
        <li class="nav-item mr-1 <?php if($page_id == 1){ echo "active"; } ?>"><a class="nav-link" href="app-cashing.php"><i class="menu-livicon" data-icon="coins"></i><span data-i18n="Dashboard">คิดเงิน</span></a>   </li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="hammer"></i><span data-i18n="Apps">การจัดการ</span></a>
            <ul class="dropdown-menu">
                <li data-menu="" class="<?php if($page_id == 3){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-patient.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">ข้อมูลผู้ป่วย</span></a></li>
                <li data-menu="" class="<?php if($page_id == 4){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-drug.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Chat">ข้อมูลยา</span></a></li>
            </ul>
        </li>
        <li class="nav-item <?php if($page_id == 5){ echo "active"; } ?>" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="app-stock.php"><i class="menu-livicon" data-icon="box"></i><span data-i18n="UI">คลังยา</span></a></li>
        <li class="nav-item <?php if($page_id == 16){ echo "active"; } ?>" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="app-othercost.php"><i class="menu-livicon" data-icon="calculator"></i><span data-i18n="UI">ค่าใช้จ่ายอื่น ๆ</span></a></li>
        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="file-import"></i><span data-i18n="Apps">รายงาน</span></a>
            <ul class="dropdown-menu">
                <li data-menu="" class="<?php if($page_id == 10){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-2.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงานชื่อการค้า</span></a></li>
                <li data-menu="" class="<?php if($page_id == 11){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-3.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงานราคายา</span></a></li>
                <li data-menu="" class="<?php if($page_id == 12){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-4.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงานการใช้ยา</span></a></li>
                <li data-menu="" class="<?php if($page_id == 14){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-6.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงานสรุปยอด</span></a></li>
                <li data-menu="" class="<?php if($page_id == 6){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-1.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงานประจำวัน</span></a></li>
                <li data-menu="" class="<?php if($page_id == 15){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-7.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงานงบดุล</span></a></li>
                <li data-menu="" class="<?php if($page_id == 17){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-8.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงาน Check</span></a></li>
                <li data-menu="" class="<?php if($page_id == 19){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-10.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงาน Check รายไตรมาส</span></a></li>
                <li data-menu="" class="<?php if($page_id == 18){ echo "active"; } ?>"><a class="dropdown-item align-items-center" href="app-report-9.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i><span data-i18n="Email">รายงานนัดหมาย</span></a></li>

            </ul>
        </li>
        <li class="nav-item <?php if($page_id == 9){ echo "active"; } ?>" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="app-bill-list.php"><i class="menu-livicon" data-icon="us-dollar"></i><span data-i18n="UI">บิล/Check</span></a></li>
        <li class="nav-item <?php if($page_id == 7){ echo "active"; } ?>" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="app-calendar.php"><i class="menu-livicon" data-icon="calendar"></i><span data-i18n="UI">การนัดหมาย</span></a></li>

        <!-- <li class="nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="JavaScript:app.syncro()"><i class="menu-livicon" data-icon="upload"></i><span data-i18n="UI">ซิงโครนัสข้อมูล</span></a></li> -->
    </ul>
</div>