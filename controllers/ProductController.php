<?php


namespace app\controllers;


use app\models\records\Product;

class ProductController extends Controller
{
    protected $action = null;
    protected $defaultAction = 'index';
    protected $useLayout = true;
    protected $defaultLayout = 'main';

    public function actionIndex()
    {
        $products = Product::getAll();
        echo $this->render('catalog', ['products' => $products]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        /** @var Product $product */
        $product = Product::getById($id);
        //$product->price = '100';
        //$product->save();
        echo $this->render('card', ['product' => $product]);
    }
}