<?php
include_once "../../config/database.php";
include_once "../../config/user.php";
$database = new DataBase();
$db_connection = $database->set_connection();

$user = new User();
$user->set_connection($db_connection);

$data = json_decode(file_get_contents('php://input'), true);

$user->set_login($data['password']);
$user->set_email($data['email']);
$result = $user->login_user_by_email();

if($result)
{
    http_response_code(200);
    echo json_encode(array("message"=>$result));
    return true;
}
else
{
    http_response_code(400);
    echo json_encode(array("message"=>"Wrong login or email"));
    return true;
}