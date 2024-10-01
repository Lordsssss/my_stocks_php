<?php

require_once 'Model/User.php';
require_once 'Controller/ControllerUsers.php';

class ControllerUsers extends Controller {

    private $user;
    public function __construct() {
        $this->user = new User();
    }

    // Displays the list of stocks
    public function index() {
        $users = $this->user->getAllUsers();
        $this->generateView(['users' => $users]);
    }

}