<?php

require_once 'Model/users.php';
require_once 'Framework/Controller.php';

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