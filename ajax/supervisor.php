<?php
include_once('../login/config.php');

// Remember to validate

// latitude
if (isset($_REQUEST['firstname'])) {
    $firstname = filter_var($_REQUEST['firstname'], FILTER_SANITIZE_STRING);
} else {
    $data = [
        'message' => 'We need to know your first name',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

if (isset($_REQUEST['lastname'])) {
    $lastname = filter_var($_REQUEST['lastname'], FILTER_SANITIZE_STRING);
} else {
    $data = [
        'message' => 'Provide your last name',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

if (isset($_REQUEST['email'])) {
    $email = filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL);
} else {
    $data = [
        'message' => 'Email Is required',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

if (isset($_REQUEST['phone_number'])) {
    $phone_number = filter_var($_REQUEST['phone_number'], FILTER_SANITIZE_STRING);
} else {
    $data = [
        'message' => 'Provide your phone number',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

if (isset($_REQUEST['department'])) {
    $department = filter_var($_REQUEST['department'], FILTER_SANITIZE_STRING);
} else {
    $data = [
        'message' => 'Please Select Department',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

if (isset($_REQUEST['dob'])) {
    $dob = date_format(new DateTime($_REQUEST['dob']), 'Y-m-d');
} else {
    $data = [
        'message' => 'Date of Birth Is Required',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

if (isset($_REQUEST['class_name'])) {
    $class_name = filter_var($_REQUEST['class_name'], FILTER_SANITIZE_STRING);
} else {
    $data = [
        'message' => 'Please Select a valid Class',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}

if (isset($_REQUEST['alt_phone'])) {
    $alt_phone = filter_var($_REQUEST['alt_phone'], FILTER_SANITIZE_STRING);
} else {
    $data = [
        'message' => 'Please Provide your alternative form number',
        'status' => 422,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 422 Invalid Data");
    echo json_encode($data);
    exit;
}






$clean_data = [
    'firstname' => $firstname,
    'lastname' => $lastname,
    'email' => $email,
    'phone_number' => $phone_number,
    'department' => $department,
    'dob' => $dob,
    'class_name' => $class_name,
    'alt_phone' => $alt_phone,
];
// Send Data to DB


try {
    $db->insert('tbl_supervisors', $clean_data);
    $data = [
        'message' => 'Success,  Record Added',
        'status' => 200,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 201 Success");
    echo json_encode($data);
    exit;
} catch (\Throwable $th) {
    $data = [
        'message' => 'Error Occured Trying to create supervisor',
        'status' => 500,
    ];
    header('Content-Type: application/json; charset=utf-8');
    header("HTTP/1.1 500 Server Error");
    echo json_encode($data);
    exit;
}
