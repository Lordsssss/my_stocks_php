<?php

require_once 'Framework/Model.php';

class Portfolio extends Model {

    /**
     * Retrieves all stocks
     * 
     * @return PDOStatement Query results
     */
    public function getAllPortfolios() {
        $sql = 'SELECT * FROM user_portfolio';
        $portfolios = $this->executeQuery($sql);
        return $portfolios;
    }

        /**
     * Retrieve one portfolio
     * 
     * @return PDOStatement Query results
     */
    public function getPortfolio($account_number) {
        $sql = 'SELECT * FROM user_portfolio WHERE account_number=?';
        $portfolio = $this->executeQuery($sql,[$account_number]);
        return $portfolio;
    }
}