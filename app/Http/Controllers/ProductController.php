<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/18
 * Time: 23:43
 */

namespace App\Http\Controllers;


use App\Entity\Product;
use Image;
use Validator;

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
        $product = $this->getProductByProductId($product_id);

        if (!is_null($product->photo)) {
            $product->photo = url($product->photo);
        }

        $model = [
            "title" => "Edit Product",
            "product" => $product
        ];


        return view("product.productItemEdit", $model);
    }

    public function productItemEditPut($product_id)
    {

        $product = $this->getProductByProductId($product_id);

        if (is_null($product)) {
            return redirect("/");
        }

        $input = request()->all();

        $rules = [
            "status" => ["required", "in:C,S"],
            "name" => ["required", "max:80"],
            "name_en" => ["required", "max:80"],
            "description" => ["required", "max:2000"],
            "description_en" => ["required", "max:2000"],
            "photo" => ["file", "image", "max:10240"], // 10m
            "price" => ["required", "integer", "min:10"],
            "count" => ["required", "integer", "min:0"],
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()){
            return redirect("/product/".$product_id."/edit")
                ->withErrors($validator)
                ->withInput();
        }

        if (isset($input["photo"])){
            $photo = $input["photo"];
            $fileExtension = $photo->getClientOriginalExtension();
            $fineName = uniqid().".".$fileExtension;

            $fileRelativePath = "images/product/".$fineName;
            $filePath = public_path($fileRelativePath);

            $image = Image::make($photo)->fit(450, 300)->save($filePath);

            $input["photo"] = $fileRelativePath;
        }

        $product->update($input);

        return redirect("/product/".$product_id."/edit");
    }

    public function productManageList()
    {
        $rowPerPage = 10;

        $productPaginate = Product::OrderBy("created_at", "desc")
                ->OrderBy("id", "desc")
                ->paginate($rowPerPage);

        $productPaginate = $this->setProductPhotoUrl($productPaginate);

        $model = [
            "title" => "product management",
            "productPaginate" => $productPaginate
        ];

        return view("product.productManage", $model);
    }

    public function productList()
    {
        $rowPerPage = 10;

        $productPaginate = Product::OrderBy("updated_at", "desc")
            ->where("status", "S")
            ->paginate($rowPerPage);

        $productPaginate = $this->setProductPhotoUrl($productPaginate);

        $model = [
            "title" => "product list",
            "productPaginate" => $productPaginate
        ];

        return view("product.productList", $model);
    }

    /**
     * @param $product_id
     * @return mixed
     */
    private function getProductByProductId($product_id)
    {
        return Product::findOrFail($product_id);
    }

    /**
     * @param $productPaginate
     * @return mixed
     */
    private function setProductPhotoUrl($productPaginate)
    {
        foreach ($productPaginate as &$product) {
            if (!is_null($product->photo)) {
                $product->photo = url($product->photo);
            }
        }

        return $productPaginate;
    }

}