<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/18
 * Time: 23:43
 */

namespace App\Http\Controllers;


use App\Entity\Product;

class ProductController extends Controller
{
    public function productCreate()
    {

        $data = [
            "status" => "C",
            "name" => "",
            "name_en" => "",
            "description" => "",
            "description_en" => "",
            "photo" => null,
            "price" => 0,
            "count" => 0,
        ];

        $product = Product::create($data);

        return redirect("/product/" . $product->id . "/edit");
    }

    public function productItemEdit($product_id)
    {
        $product = Product::findOrFail($product_id);

        if (!is_null($product->photo)) {
            $product->photo = url($product->photo);
        }

        $model = [
            "title" => "Edit Product",
            "product" => $product
        ];


        return view("product.productItemEdit", $model);
    }
}