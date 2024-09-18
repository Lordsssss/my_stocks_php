<?php

require_once 'Model/portfolios.php';
require_once 'Framework/Controller.php';

class ControllerPortfolios extends Controller {

    private $portfolio;

    public function __construct() {
        $this->portfolio = new Portfolio();
    }

    // Displays the list of portfolios
    public function index() {
        $portfolios = $this->portfolio->getAllPortfolios();
        $this->generateView(['portfolios' => $portfolios]);
    }

    // Displays one Portfolio
    public function portfolio(){
        $account_number = $this->request->getParameter("id");
        $portfolio = $this->portfolio->getPortfolio($account_number);
        $this->generateView(['portfolio' => $portfolio]);
    }
}