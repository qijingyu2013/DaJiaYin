<?php

namespace App\Http\Controllers\Admina;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

/**模块->关于大家银
 * Class AboutController
 * @package App\Http\Controllers\Admina
 */
class ProductController extends Controller
{
    /**大圆沥青
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getJmeliqing()
    {
        $product = Product::firstOrCreate(Product::$rules_jmeliqing);
        $productType = 'updateJmeliqing';
        return view('admina.product.product', compact('product', 'productType'));
    }

    /**
     * 修改大圆沥青
     * @return Redirect
     */
    public function postJmeliqing()
    {
        $validator = Validator::make(Input::all(), Product::$rules_update);
        if ($validator->passes()) {
            $product = Product::firstOrNew(Product::$rules_jmeliqing);
            $product->content = Input::get('form_text');
            $product->module = Input::get('form_module');
            $product->save();
            return Redirect::to('admina/product/jmeliqing')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**大圆普洱
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getJmepuer()
    {
        $product = Product::firstOrCreate(Product::$rules_jmepuer);
        $productType = 'updateJmepuer';
        return view('admina.product.product', compact('product', 'productType'));
    }

    /**
     * 修改大圆普洱
     * @return Redirect
     */
    public function postJmepuer()
    {
        $validator = Validator::make(Input::all(), Product::$rules_update);
        if ($validator->passes()) {
            $product = Product::firstOrNew(Product::$rules_jmepuer);
            $product->content = Input::get('form_text');
            $product->module = Input::get('form_module');
            $product->save();
            return Redirect::to('admina/product/jmepuer')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**大圆银
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getJmeyin()
    {
        $product = Product::firstOrCreate(Product::$rules_jmeyin);
        $productType = 'updateJmeyin';
        return view('admina.product.product', compact('product', 'productType'));
    }

    /**
     * 修改大圆银
     * @return Redirect
     */
    public function postJmeyin()
    {
        $validator = Validator::make(Input::all(), Product::$rules_update);
        if ($validator->passes()) {
            $product = Product::firstOrNew(Product::$rules_jmeyin);
            $product->content = Input::get('form_text');
            $product->module = Input::get('form_module');
            $product->save();
            return Redirect::to('admina/product/jmeyin')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

}
