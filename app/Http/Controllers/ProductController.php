<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/18
 * Time: 23:43
 */

namespace App\Http\Controllers;


use App\Entity\Product;
use App\Entity\Transaction;
use App\Entity\User;
use Image;
use Validator;
use DB;

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

        $productPaginate = $this->setProductsPhotoUrl($productPaginate);

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

        $productPaginate = $this->setProductsPhotoUrl($productPaginate);

        $model = [
            "title" => "product list",
            "productPaginate" => $productPaginate
        ];

        return view("product.productList", $model);
    }

    public function productItem($product_id)
    {
       $product = Product::findOrFail($product_id);

       $product = $this->setProductPhotoUrl($product);

        $model = [
            "title" => "product item",
            "product" => $product
        ];

        return view("product.productItem", $model);
    }

    public function productItemBuy($product_id)
    {
        $input = request()->all();

        $rules = [
            "count" => ["required", "integer", "min:1"]
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails())
        {
            return redirect("/product/".$product_id)
                    ->withErrors($validator)
                    ->withInput();
        }

        try{

            $userId = session()->get("user_id");
            $user = User::findOrFail($userId);

            DB::beginTransaction();

            $product = Product::findOrFail($product_id);
            $count = $input["count"];

            $remainCount = $product -> count - $count;

            if ($remainCount < 0){
                throw new Exception("count < 0");
            }

            $product->count = $remainCount;
            $product->save();

            $totalPrice = $count * $product->price;

            $transaction = [
                "user_id" => $userId,
                "product_id" => $product_id,
                "price" => $product -> price,
                "count" => $count,
                "total_price" => $totalPrice
            ];

            Transaction::create($transaction);

            DB::commit();

            $msg = [
                "msg" => [ "success" ]
            ];

            return redirect()
                    ->to("/product/".$product_id)
                    ->withErrors($msg);

        }catch(Exception $exception){
            DB::rollBack();

            $msg = [
                "msg" => $exception->getMessage()
            ];

            return redirect()
                ->back()
                ->withErrors($msg)
                ->withInput();
        }
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
    private function setProductsPhotoUrl($productPaginate)
    {
        foreach ($productPaginate as &$product) {
            $product = $this->setProductPhotoUrl($product);
        }

        return $productPaginate;
    }

    private function setProductPhotoUrl($product)
    {
        if (!is_null($product->photo)) {
            $product->photo = url($product->photo);
        }

        return $product;
    }
}