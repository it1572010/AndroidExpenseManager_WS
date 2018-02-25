<?php

include_once '../entity/User.php';
include_once '../dao/UserDaoImpl.php';
include_once '../util/PDOUtil.php';

$emailUser = filter_input(INPUT_POST, 'emailUser');
$password = filter_input(INPUT_POST, 'password');
if (isset($emailUser) && isset($password) && !empty($emailUser) && !empty($password)) {
    $userDao = new UserDaoImpl();
    $user = new User();
    $user->setEmailUser($emailUser);
    $user->setPassword($password);
    $userDao->setData($user);
    $result = $userDao->login();
    if (isset($result) && isset($result->name)) {
        $data = array('status' => 1, 'message' => 'Login succes', 'user' => $result);
    } else {
        $data = array('status' => 0, 'message' => 'Invalid email or password', 'user' => NULL);
    }
} else {
    $data=array('status'=>0,'message'=>'Please fill email and passowrd');
}
header('Content-type:application/json');
echo json_encode($data);