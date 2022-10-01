<?php 
require('../configuration/local.inc.php');
require('../configuration/configuration.php');
require('../configuration/database.php'); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new Database();
$conn = $db->conn();

$return = array();

$stage = '';
if(!isset($_GET['stage'])){ 
    $return['status'] = 'Fail';
    $return['error_stage'] = '0';
    echo json_encode($return);
    $db->close(); 
    die(); 
}

$stage = mysqli_real_escape_string($conn, $_GET['stage']);

if($stage == 'info'){

}

if($stage == 'delete_patient'){
    if(
        (!isset($_REQUEST['pid']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $pid = mysqli_real_escape_string($conn, $_REQUEST['pid']);

    $strSQL = "UPDATE bcn_patient SET patient_delete = '1' WHERE patient_id = '$pid'";
    $res = $db->execute($strSQL);

    $return['status'] = 'Success';
    echo json_encode($return);
    $db->close(); 
    die(); 
}

if($stage == 'check_recent'){
    if(
        (!isset($_REQUEST['pid'])) ||
        (!isset($_REQUEST['date']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }
}

if($stage == 'updatepatient'){
    if(
        (!isset($_REQUEST['hn'])) ||
        (!isset($_REQUEST['rid'])) ||
        (!isset($_REQUEST['fname']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $hn = mysqli_real_escape_string($conn, $_REQUEST['hn']);
    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $pid = mysqli_real_escape_string($conn, $_REQUEST['pid']);
    $rid = mysqli_real_escape_string($conn, $_REQUEST['rid']);

    $strSQL = "UPDATE bcn_patient SET patient_fname = '$fname', patient_lname = '$lname', patient_hn = '$hn', patient_pid = '$pid' WHERE patient_id = '$rid'";
    $res = $db->execute($strSQL);
    $return['status'] = 'Success';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
}

if($stage == 'new'){
    if(
        (!isset($_REQUEST['hn'])) ||
        (!isset($_REQUEST['fname']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $hn = mysqli_real_escape_string($conn, $_REQUEST['hn']);
    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $dd = mysqli_real_escape_string($conn, $_REQUEST['dd']);
    $mm = mysqli_real_escape_string($conn, $_REQUEST['mm']);
    $yy = mysqli_real_escape_string($conn, $_REQUEST['yy']);
    $pid = mysqli_real_escape_string($conn, $_REQUEST['pid']);

    if($pid != ''){
        $strSQL = "SELECT * FROM bcn_patient WHERE patient_pid = '$pid' AND patient_delete = '0'";
        $res = $db->fetch($strSQL, false);
        if($res){
            $return['status'] = 'Fail';
            $return['error_stage'] = '2';
		$return['command'] = $strSQL;
            echo json_encode($return);
            $db->close(); 
            die(); 
        }
    }

    $strSQL = "SELECT * FROM bcn_patient WHERE patient_fname = '$fname' AND patient_lname = '$lname' AND patient_delete = '0'";
    $res = $db->fetch($strSQL, false);
    if($res){
        $return['status'] = 'Duplicate';
        $return['error_stage'] = '4';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $dob = '';

    if($yy != ''){
        $dob = $yy."-01-01";
    }

    if(($yy != '') && ($mm != '') && ($dd != '')){
        $dob = $yy."-".$mm."-".$dd;
    }

    
    

    $strSQL = "INSERT INTO bcn_patient (`patient_fname`, `patient_lname`, `patient_hn`, `patient_regdatetime`, `patient_dob`, `patient_pid`) 
               VALUES 
               (
                '$fname', '$lname', '$hn', '$datetime', '$dob', '$pid'
               )
              ";
    $res_patient = $db->insert($strSQL, true);
    if($res_patient){
        $strSQL = "INSERT INTO bnc_patient_log (`pl_ip`, `pl_datetime`, `pl_activity`, `pl_info`, `pl_by`, `pl_patient_id`)
                   VALUES ('$ip', '$datetime', 'ขึ้นทะเบียนผู้ป่วย', 'ขึ้นทะเบียนผู้ป่วย HN : $hn ($fname $lname)', '".$_SESSION['bnc_uid']."', '$res_patient')
                  ";
        $res_patient = $db->insert($strSQL, false);
        $return['status'] = 'Success';
    }else{
        $return['status'] = 'Fail';
        $return['error_stage'] = '3';
        $return['error_command'] = $strSQL;
    }
    echo json_encode($return);
    $db->close(); 
    die(); 
}

if($stage == 'force_new'){
    if(
        (!isset($_REQUEST['hn'])) ||
        (!isset($_REQUEST['fname']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $hn = mysqli_real_escape_string($conn, $_REQUEST['hn']);
    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $dd = mysqli_real_escape_string($conn, $_REQUEST['dd']);
    $mm = mysqli_real_escape_string($conn, $_REQUEST['mm']);
    $yy = mysqli_real_escape_string($conn, $_REQUEST['yy']);
    $pid = mysqli_real_escape_string($conn, $_REQUEST['pid']);

    if($pid != ''){
        $strSQL = "SELECT * FROM bcn_patient WHERE patient_pid = '$pid' AND patient_delete = '0'";
        $res = $db->fetch($strSQL, false);
        if($res){
            $return['status'] = 'Fail';
            $return['error_stage'] = '2';
            echo json_encode($return);
            $db->close(); 
            die(); 
        }
    }
    
    $dob = '';

    if($yy != ''){
        $dob = $yy."-01-01";
    }

    if(($yy != '') && ($mm != '') && ($dd != '')){
        $dob = $yy."-".$mm."-".$dd;
    }

    $strSQL = "INSERT INTO bcn_patient (`patient_fname`, `patient_lname`, `patient_hn`, `patient_regdatetime`, `patient_dob`, `patient_pid`) 
               VALUES 
               (
                '$fname', '$lname', '$hn', '$datetime', '$dob', '$pid'
               )
              ";
    $res_patient = $db->insert($strSQL, true);
    if($res_patient){
        $strSQL = "INSERT INTO bnc_patient_log (`pl_ip`, `pl_datetime`, `pl_activity`, `pl_info`, `pl_by`, `pl_patient_id`)
                   VALUES ('$ip', '$datetime', 'ขึ้นทะเบียนผู้ป่วย', 'ขึ้นทะเบียนผู้ป่วย HN : $hn ($fname $lname)', '".$_SESSION['bnc_uid']."', '$res_patient')
                  ";
        $res_patient = $db->insert($strSQL, false);
        $return['status'] = 'Success';
    }else{
        $return['status'] = 'Fail';
        $return['error_stage'] = '3';
        $return['error_command'] = $strSQL;
    }
    echo json_encode($return);
    $db->close(); 
    die(); 
}

if($stage == 'search'){
    if(
        (!isset($_REQUEST['fname']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);

    $strSQL = "SELECT * FROM bcn_patient WHERE patient_fname LIKE '$fname%' OR patient_lname LIKE '$fname%'  AND patient_delete = '0'";
    $res = $db->fetch($strSQL, true, true);
    if(($res) && ($res['count'] > 0)){
        $return['status'] = 'Success';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }else{
        $return['status'] = 'Fail';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }
}

if($stage == 'addApp'){
    if(
        (!isset($_REQUEST['puid'])) ||
        (!isset($_REQUEST['dateapp'])) ||
        (!isset($_REQUEST['timeapp'])) ||
        (!isset($_REQUEST['placeapp'])) ||
        (!isset($_REQUEST['infoapp']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $puid = mysqli_real_escape_string($conn, $_REQUEST['puid']);
    $dateapp = mysqli_real_escape_string($conn, $_REQUEST['dateapp']);
    $timeapp = mysqli_real_escape_string($conn, $_REQUEST['timeapp']);
    $placeapp = mysqli_real_escape_string($conn, $_REQUEST['placeapp']);
    $infoapp = mysqli_real_escape_string($conn, $_REQUEST['infoapp']);

    $strSQL = "UPDATE bnc_appointment SET app_status = 'N' WHERE app_date = '$dateapp' AND app_time = '$timeapp ' AND app_patient_id = '$puid'";
    $res = $db->execute($strSQL);

    $strSQL = "INSERT INTO bnc_appointment (`app_date`, `app_time`, `app_patient_id`, `app_place`, `app_info`, `app_create_datetime`) 
               VALUES ('$dateapp', '$timeapp:00', '$puid', '$placeapp', '$infoapp', '$datetime')
              ";
    $res = $db->insert($strSQL, false);


    if($res){
        $return['status'] = 'Success';
    }else{
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
    }

    echo json_encode($return);
    $db->close(); 
    die(); 
}

if($stage == 'update'){
    
}

if($stage == 'delete'){
    
}

if($stage == 'history'){
    
}

if($stage == 'appointment'){
    
}