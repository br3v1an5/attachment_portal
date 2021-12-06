<?php
include_once('../login/config.php');
if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
    $array = [
        'message' => 'Please Log In to Continue',
        'status' => 401,
    ];
    $data = $array;
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 401 Invalid Data");
    echo json_encode($data);
    exit;
}

$attachments = $db->getAllRecords('tbl_form');
$array = [
    'all_attachments' => $attachments,
];
$data = $array;
header('Content-Type: application/json; charset=utf-8');
header("HTTP/1.1 200 success");
echo json_encode($data);
exit;
