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

if($stage == 'check'){
    // $strSQL = "SELECT * FROM ";
}

if($stage == 'generate_sync_session'){
    $sid = date('U');
    $strSQL = "INSERT INTO bnc_sync_log (`slog_datetime`, `slog_syncid`) VALUES ('$datetime', '$sid')";
    $res = $db->insert($strSQL, false);
    if($res){
        $return['status'] = 'Success';
        $return['data'] = $sid;
    }else{
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
    }
    echo json_encode($return);
    $db->close(); 
    die(); 
}

if($stage == 'get_current_syncid'){
    $strSQL = "SELECT slog_syncid FROM bnc_sync_log WHERE 1 ORDER BY ID DESC LIMIT 1";
    $res = $db->fetch($strSQL, false);
    if($res){
        $return['status'] = 'Success';
        $return['data'] = $res;
    }else{
        $return['status'] = 'Fail';
        $return['error_stage'] = '1';
    }
    echo json_encode($return);
    $db->close(); 
    die(); 
}