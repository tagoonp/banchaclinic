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

if($stage == 'add'){
    if(
        (!isset($_REQUEST['month'])) ||
        (!isset($_REQUEST['year'])) ||
        (!isset($_REQUEST['c1'])) ||
        (!isset($_REQUEST['c2'])) ||
        (!isset($_REQUEST['c3'])) ||
        (!isset($_REQUEST['c4']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $mon = mysqli_real_escape_string($conn, $_REQUEST['month']);
    $year = mysqli_real_escape_string($conn, $_REQUEST['year']);
    $c1 = mysqli_real_escape_string($conn, $_REQUEST['c1']);
    $c2 = mysqli_real_escape_string($conn, $_REQUEST['c2']);
    $c3 = mysqli_real_escape_string($conn, $_REQUEST['c3']);
    $c4 = mysqli_real_escape_string($conn, $_REQUEST['c4']);

    $strSQL = "SELECT * FROM bnc_othercost WHERE oc_month = '$mon' AND oc_year = '$year' AND oc_delete = 'N'";
    $resCheck = $db->fetch($strSQL, true, true);
    if(($resCheck) && ($resCheck['count'] > 0)){
        $strSQL = "UPDATE bnc_othercost SET oc_electrticity = '$c1', oc_cellphone = '$c2', oc_salary = '$c3', oc_other = '$c4', oc_udatetime = '$datetime' WHERE oc_month = '$mon' AND oc_year = '$year'";
        $res = $db->execute($strSQL);
        $return['status'] = 'Success';
    }else{

        $ocdate = $year."-".$mon."-30";
        $date = new DateTime($ocdate);
        $date->modify('last day of this month');
        $ocdate = $date->format('Y-m-d');

        
        $strSQL = "INSERT INTO bnc_othercost 
                    (`oc_month`, `oc_year`, `oc_date`, `oc_electrticity`, `oc_cellphone`, `oc_salary`, `oc_other`, `oc_datetime`, `oc_udatetime`)
                   VALUES 
                    ('$mon', '$year', '$ocdate', '$c1', '$c2', '$c3', '$c4', '$datetime', '$datetime')
                  ";
        $res = $db->insert($strSQL, false);
        if($res){
            $return['status'] = 'Success';
            $return['error_stage'] = '0';
        }else{
            $return['status'] = 'Fail';
            $return['error_stage'] = '2';
            $return['error_message'] = $strSQL;
        }
    }
    echo json_encode($return);
    $db->close(); 
    die(); 
}

if($stage == 'delete'){
    if(
        (!isset($_REQUEST['oc_id']))
    ){
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
        echo json_encode($return);
        $db->close(); 
        die(); 
    }

    $oc_id = mysqli_real_escape_string($conn, $_REQUEST['oc_id']);
    $strSQL = "UPDATE bnc_othercost SET oc_delete = 'Y', oc_udatetime = '$datetime' WHERE oc_id = '$oc_id' ";
    $res = $db->execute($strSQL);
    $return['status'] = 'Success';

    echo json_encode($return);
    $db->close(); 
    die(); 
}
?>