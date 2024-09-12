<?php

require_once 'Configuration.php';
require_once 'Controller.php';
require_once 'Request.php';
require_once 'View.php';

/*
 * Class for routing incoming requests.
 * 
 * Inspired by Nathan Davison's PHP framework
 * (https://github.com/ndavison/Nathan-MVC)
 * 
 * @version 1.0
 * @author Baptiste Pesquet
 */

class Router {

    /**
     * Main method called by the front controller
     * Examines the request and executes the appropriate action
     */
    public function routeRequest() {
        try {
            // Merge GET and POST parameters of the request
            // Allows uniform handling of these two types of HTTP requests
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->executeAction($action);
        } catch (Exception $e) {
            $this->handleError($e);
        }
    }

    /**
     * Instantiates the appropriate controller based on the received request
     * 
     * @param Request $request Received request
     * @return Instance of a controller
     * @throws Exception If the controller creation fails
     */
    private function createController(Request $request) {
        // Thanks to redirection, all incoming URLs are of the type:
        // index.php?controller=XXX&action=YYY&id=ZZZ
        $defaultController = Configuration::get("default");
        $controller = $defaultController;  // Default controller
        if ($request->hasParameter('controller')) {
            $controller = $request->getParameter('controller');
            // First letter in uppercase
            $controller = ucfirst(strtolower($controller));
        }
        // Create the controller file name
        // The naming convention for controller files is: Controller/Controller<$controller>.php
        $controllerClass = $controller;
        $controllerFile = "Controller/" . $controllerClass . ".php";
        if (file_exists($controllerFile)) {
            // Instantiate the controller appropriate for the request
            require($controllerFile);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        } else {
            throw new Exception("File '$controllerFile' not found");
        }
    }

    /**
     * Determines the action to execute based on the received request
     * 
     * @param Request $request Received request
     * @return string Action to execute
     */
    private function createAction(Request $request) {
        $action = "index";  // Default action
        if ($request->hasParameter('action')) {
            $action = $request->getParameter('action');
        }
        return $action;
    }

    /**
     * Handles an execution error (exception)
     * 
     * @param Exception $exception Exception that occurred
     */
    private function handleError(Exception $exception) {
        $view = new View('error');
        $error = $exception->getMessage();
        $view->generate(array('errorMsg' => $error));
    }

}