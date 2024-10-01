<?php

require_once 'Configuration.php';

/**
 * Class modeling a view
 *
 * @version 1.0
 * @authored by Baptiste Pesquet
 */
class View {

    /** Name of the file associated with the view */
    private $file;

    /** Title of the view (defined in the view file) */
    private $title;

    /**
     * Constructor
     * 
     * @param string $action Action to which the view is associated
     * @param string $controller Name of the controller to which the view is associated
     */
    public function __construct($action, $controller = "") {
        // Determine the name of the view file from the action and the controller
        // The naming convention for view files is: views/<$controller>/<$action>.php
        $file = "views/";
        if ($controller != "") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    /**
     * Generates and displays the view
     * 
     * @param array $data Data needed for generating the view
     */
    public function generate($data) {
        echo "<script>console.log('data: " . json_encode($data) . "');</script>";
        // Generate the specific part of the view
        $content = $this->generateFile($this->file, $data);
        // Define a local variable accessible by the view for the web root
        // This is the path to the site on the web server
        // Necessary for URIs of the type controller/action/id
        $webRoot = Configuration::get("webRoot", "/");
        // Generate the common template using the specific part
        $viewData = [
            'title' => $this->title,
            'content' => $content,
            'webRoot' => $webRoot,
        ];
        // Add the user in session if applicable
        if (isset($data['user'])) {
            $viewData['user'] = $data['user'];
        }
        $view = $this->generateFile('views/template.php', $viewData);
        // Return the generated view to the browser
        echo $view;
    }

    /**
     * Generates a view file and returns the produced result
     * 
     * @param string $file Path of the view file to generate
     * @param array $data Data needed for generating the view
     * @return string Result of the view generation
     * @throws Exception If the view file is not found
     */
    private function generateFile($file, $data) {
        if (file_exists($file)) {
            // Make the elements of the $data array accessible in the view
            extract($data);
            // Start output buffering
            ob_start();
            // Include the view file
            // Its result is placed in the output buffer
            require $file;
            // Stop buffering and return the output buffer
            return ob_get_clean();
        } else {
            throw new Exception("File '$file' not found");
        }
    }

    /**
     * Cleans a value inserted into an HTML page
     * Prevents issues with executing undesirable code (XSS) in generated views
     * 
     * @param string $value Value to clean
     * @return string Cleaned value
     */
    private function clean($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

}
?>