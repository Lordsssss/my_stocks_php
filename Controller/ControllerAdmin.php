<?php

require_once 'Framework/Controller.php';

/**
 * Parent class for controllers that require authentication
 *
 * @authored by Baptiste Pesquet
 */
abstract class ControllerAdmin extends Controller {

    private $user;

    public function executeAction($action) {
        // Check if user information is present in the session
        // If yes, the user has already authenticated: the action execution continues normally
        // If no, the user is redirected to the login controller
        if ($this->request->getSession()->hasAttribute("user")) {
            $this->user = $this->request->getSession()->getAttribute("user");
            parent::executeAction($action);
        } else {
            $this->redirect('About');
        }
    }

    public function generateView($viewData = array()) {
        // Add the user in session to the view data
        $viewData['user'] = $this->user;
        parent::generateView($viewData);
    }

}