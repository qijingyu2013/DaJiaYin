<?php

namespace DaJiaYin\Http\Controllers\Admina;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use DaJiaYin\Models\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

/**模块->关于大家银
 * Class AboutController
 * @package DaJiaYin\Http\Controllers\Admina
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

    /**湘商E得网
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getXsspehaving()
    {
        $product = Product::firstOrCreate(Product::$rules_xsspehaving);
        $productType = 'updateXsspehaving';
        return view('admina.product.product', compact('product', 'productType'));
    }

    /**
     * 修改湘商E得网
     * @return Redirect
     */
    public function postXsspehaving()
    {
        $validator = Validator::make(Input::all(), Product::$rules_update);
        if ($validator->passes()) {
            $product = Product::firstOrNew(Product::$rules_xsspehaving);
            $product->content = Input::get('form_text');
            $product->module = Input::get('form_module');
            $product->save();
            return Redirect::to('admina/product/xsspehaving')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**湘商大宗
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getXsspbulk()
    {
        $product = Product::firstOrCreate(Product::$rules_xsspbulk);
        $productType = 'updateXsspbulk';
        return view('admina.product.product', compact('product', 'productType'));
    }

    /**
     * 修改湘商大宗
     * @return Redirect
     */
    public function postXsspbulk()
    {
        $validator = Validator::make(Input::all(), Product::$rules_update);
        if ($validator->passes()) {
            $product = Product::firstOrNew(Product::$rules_xsspbulk);
            $product->content = Input::get('form_text');
            $product->module = Input::get('form_module');
            $product->save();
            return Redirect::to('admina/product/xsspbulk')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**湘商收藏品
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHnxsscp()
    {
        $product = Product::firstOrCreate(Product::$rules_hnxsscp);
        $productType = 'updateHnxsscp';
        return view('admina.product.product', compact('product', 'productType'));
    }

    /**
     * 修改湘商收藏品
     * @return Redirect
     */
    public function postHnxsscp()
    {
        $validator = Validator::make(Input::all(), Product::$rules_update);
        if ($validator->passes()) {
            $product = Product::firstOrNew(Product::$rules_hnxsscp);
            $product->content = Input::get('form_text');
            $product->module = Input::get('form_module');
            $product->save();
            return Redirect::to('admina/product/hnxsscp')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**金山云微盘
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getJsgyCloud()
    {
        $product = Product::firstOrCreate(Product::$rules_jsgyCloud);
        $productType = 'updateJsgyCloud';
        return view('admina.product.product', compact('product', 'productType'));
    }

    /**
     * 修改金山云微盘
     * @return Redirect
     */
    public function postJsgyCloud()
    {
        $validator = Validator::make(Input::all(), Product::$rules_update);
        if ($validator->passes()) {
            $product = Product::firstOrNew(Product::$rules_jsgyCloud);
            $product->content = Input::get('form_text');
            $product->module = Input::get('form_module');
            $product->save();
            return Redirect::to('admina/product/jsgyCloud')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }



}
