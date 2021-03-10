<?php


namespace app\controllers;


use app\models\records\Product;

class BasketController extends Controller
{
    protected $action = null;
    protected $defaultAction = 'index';
    protected $useLayout = true;
    protected $defaultLayout = 'main';
    protected $basket = [];

    public function actionIndex()
    {
        if (!empty($_SESSION['basket'])) {
            $productIds = array_filter(
                array_keys($_SESSION['basket']),
                function ($element) {
                    return is_int($element);
                }
            );

            $products = Product::getAll();
            foreach ($products as $product) {
                $basket[] = [
                    'product' => $product,
                    'qty' => $_SESSION['basket'][$product['id']]
                ];
            }
        }
        echo $this->render('basket', ['basket' => $products]);
    }

    public function actionAdd()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['product_id'];
            $productQty = $_POST['qty'];

            if(isset($_SESSION['basket'][$productId])) {
                $_SESSION['basket'][$productId] += $productQty;
            } else {
                $_SESSION['basket'][$productId] = $productQty;
            }
        }
        echo json_encode(['status' => 'success', 'message' => 'товар успешно добавлен в корзину']);
    }

    public function actionRemove()
    {
        if(isset($_GET['id'])){
            $productId = $_GET['id'];
            if(isset($_SESSION['basket'][$productId])){
                unset($_SESSION['basket'][$productId]);
            }
        }
    }
}