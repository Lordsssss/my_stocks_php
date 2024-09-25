<?php


require_once 'Framework/Controller.php';

class ControllerAbout extends Controller {

    // Displays the list of stocks
    public function index() {
        $this->generateView();
    }
}