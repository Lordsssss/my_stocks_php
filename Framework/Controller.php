<?php

require_once 'Request.php';
require_once 'View.php';

/**
 * Abstract class Controller
 * Provides common services to derived Controller classes
 * 
 * @version 1.0
 * @author Baptiste Pesquet
 */
abstract class Controller {

    /** Action to be executed */
    private $action;

    /** Incoming request */
    protected $request;

    /**
     * Sets the incoming request
     * 
     * @param Request $request Incoming request
     */
    public function setRequest(Request $request) {
        $this->request = $request;
    }

    /**
     * Executes the action to be performed.
     * Calls the method with the same name as the action on the current Controller object
     * 
     * @throws Exception If the action does not exist in the current Controller class
     */
    public function executeAction($action) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $controllerClass = get_class($this);
            throw new Exception("Action '$action' not defined in class $controllerClass");
        }
    }

    /**
     * Abstract method corresponding to the default action
     * Forces derived classes to implement this default action
     */
    public abstract function index();

    /**
     * Generates the view associated with the current controller
     * 
     * @param array $viewData Data needed for generating the view
     */
    protected function generateView($viewData = array()) {
        // Determine the name of the view file from the current controller name
        $controllerClass = get_class($this);
        $controller = str_replace("Controller", "", $controllerClass);
        // Check if there is a message to display
        $message = '';
        if ($this->request->getSession()->hasAttribute("message")) {
            $message = $this->request->getSession()->getAttribute("message");
            $this->request->getSession()->setAttribute("message", ''); // Display the message only once
        }
        $viewData['message'] = $message;

        // Instantiate and generate the view
        $view = new View($this->action, $controller);
        $view->generate($viewData);
    }

    /**
     * Redirects to a specific controller and action
     * 
     * @param string $controller Controller
     * @param string $action Action
     */
    protected function redirect($controller = null, $action = null) {
        $webRoot = Configuration::get("webRoot", "/");
        // Redirect to the URL /web_root/controller/action
        if ($controller != null) {
            header("Location:" . $webRoot . $controller . "/" . $action);
        } else {
            header("Location:" . $webRoot);
        }
    }

}