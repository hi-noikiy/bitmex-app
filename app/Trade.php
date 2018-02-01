<?php

namespace App;

use \ccxt\Bitmex;
/**
 * Class Trade
 */
class Trade{

    function __construct()
    {
        date_default_timezone_set ('UTC');
        $this->formView();

        $checkPostRequest = ( (isset($_POST['currency-symbol']) && $_POST['currency-symbol'])
                           && (isset($_POST['order-quantity']) && $_POST['order-quantity'])
                           && (isset($_POST['price']) && $_POST['price']) );

        if($checkPostRequest) {

            $this->exchange = new Bitmex();
            $this->exchange->apiKey = 'TSG8GU6KNjrzyUzEKbltGTgf';
            $this->exchange->secret = 'rbHSzS3iuZ0wuAtU2NrqwO43HohAaoK7T_J6-lBOUsOZzo2c';

            try {
                $res = $this->createOrder();
                echo '<pre>';
                print_r($res);
                die;
            } catch(\Exception $e){
                echo $e->getMessage();
            }
        }
    }

    public function fetchOrder(){

        /*echo '<pre>';
        print_r( ($this->exchange->fetch_order_book ('BTC/USD', array (
            'count' => 10, // up to ten order on each side for example
        ))));
        die;*/
    }

    /**
     * Create Order
     * @return array|void
     */
    public function createOrder(){

          $currencySymbol = $_POST['currency-symbol'];
          $orderQuantity = $_POST['order-quantity'];
          $price =  $_POST['price'];
          $response = $this->exchange->create_order($currencySymbol,'Market','Buy',$orderQuantity,$price);
          return $response;
    }

    /**
     * Form View
     */
    public function formView(){
        require_once 'view/form.php';
    }
}