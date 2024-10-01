<?php

require_once 'Model/User.php';
require_once 'Controller/ControllerAdmin.php';

class ControllerAdminUsers extends ControllerAdmin {

    private $user;
    private $userUpdate;
    public function __construct() {
        $this->user = new User();
        $this->userUpdate = new User();
    }

    // Displays the list of stocks
    public function index() {
        $users = $this->user->getAllUsers();
        $this->generateView(['users' => $users]);
    }
    public function updateUser(){
        $account_number = $this->request->getParameter("id");
        $userUpdate = $this->userUpdate->getUserByAccountNumber($account_number);
        $this->generateView(['userUpdate' => $userUpdate]);
    }

    public function update() {
        $username = $this->request->getParameter('username');
        $email = $this->request->getParameter('email');
        $account_number = $this->request->getParameter('id');
        $this->user->updateUser($account_number, $username,$email);
        $this->executeAction('index');
    }
}