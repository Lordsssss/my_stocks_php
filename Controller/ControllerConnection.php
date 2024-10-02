<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';

/**
 * Controller managing the connection to the site
 * 
 * @author Baptiste Pesquet
 */
class ControllerConnection extends Controller {

    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        $error = $this->request->getSession()->hasAttribute("error") ? $this->request->getSession()->getAttribute("error") : '';
        $this->generateView(['error' => $error]);
    }

    public function login() {
        if ($this->request->hasParameter("login") && $this->request->hasParameter("password")) {
            $login = $this->request->getParameter("login");
            $password = $this->request->getParameter("password");
            if ($this->user->login($login, $password)) {
                $user = $this->user->getUser($login, $password);
                $this->request->getSession()->setAttribute("user", $user);
                // Eliminate any error code
                if ($this->request->getSession()->hasAttribute('error')) {
                    $this->request->getSession()->setAttribute('error', '');
                }
                $this->redirect("ControllerAdminUsers");
            } else {
                $this->request->getSession()->setAttribute('error', 'password');
                $this->redirect('ControllerConnection');
            }
        } else {
            throw new Exception("Action impossible: login or password not defined");
        }
    }

    public function logout() {
        $this->request->getSession()->destroy();
        $this->redirect("");
    }

}