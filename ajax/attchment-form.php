<?php
include_once('../login/config.php');

// Remember to validate
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$email = $_REQUEST['email'];
$phone_number = $_REQUEST['phone_number'];
$department = $_REQUEST['department'];
$dob = $_REQUEST['dob'];
$sel_class = $_REQUEST['sel_class'];
$alt_phone = $_REQUEST['alt_phone'];
$attached_dep = $_REQUEST['attached_dep'];
$supervisor_no = $_REQUEST['supervisor_no'];
$org_email = $_REQUEST['org_email'];
$org_no = $_REQUEST['org_no'];
$insurance = $_REQUEST['insurance'];
$org_name = $_REQUEST['org_name'];
$start_date = $_REQUEST['start_date'];
$completion_date = $_REQUEST['completion_date'];
$town = $_REQUEST['town'];
// latitude
if (isset($_REQUEST['latitude']) and $_REQUEST['latitude'] != "") {
    $latitude = isset($_REQUEST['latitude']) ? $_REQUEST['latitude'] : 0.000000;
} else {
    $array = [
        'message' => 'Please Select Your Location',
        'status' => 422,
    ];
    $data = $array;
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}
// Longitude
if (isset($_REQUEST['latitude']) and $_REQUEST['latitude'] != "") {
    $longitude = isset($_REQUEST['longitude']) ? $_REQUEST['longitude'] : 0.00000;
} else {
    $array = [
        'message' => 'Please Select Your Location',
        'status' => 422,
    ];
    $data = $array;
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

$remark = $_REQUEST['remark'];

$data = [
    'firstname' => filter_var($firstname, FILTER_SANITIZE_STRING),
    'lastname' => filter_var($lastname, FILTER_SANITIZE_STRING),
    'email' => filter_var($email, FILTER_VALIDATE_EMAIL),
    'phone_number' => $phone_number,
    'dob' => date_format(new DateTime($dob), 'Y-m-d'),
    'department' => $department,
    'class' => $sel_class,
    'alt_phone' => $alt_phone,
    'latitude' => $latitude,
    'longitude' => $longitude,
    'attached_dep' => $attached_dep,
    'supervisor_no' => $supervisor_no,
    'org_email' => $org_email,
    'org_no' => $org_no,
    'insured' => $insurance,
    'org_name' => $org_name,
    'start_date' => date_format(new DateTime($start_date), 'Y-m-d'),
    'completion_date' => date_format(new DateTime($completion_date), 'Y-m-d'),
    'town' => $town,
    'remark' => $remark,
];
// Send Data to DB
$insert        =    $db->insert('tbl_form', $data);

if ($insert) {
    $array = [
        'message' => 'Success,  Record Added',
        'status' => 200,
    ];
    $data = $array;
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 201 Success");
    echo json_encode($data);
    exit;
} else {
    $array = [
        'error_message' => 'Error Addding Record',
        'status' => 500,
    ];
    $data = $array;
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 500 Server Error");
    echo json_encode($data);
    exit;
}
