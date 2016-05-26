<?php

namespace DaJiaYin\Http\Controllers\Sites;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use DaJiaYin\Models\Award;
use DaJiaYin\Models\Product;
use DaJiaYin\Models\Sider;

//use DaJiaYin\Logic\Article;

class ProductController extends Controller
{
    /**
     * 大圆沥青
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showJmeliqing()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('jmeliqing');
        $product = Product::where('module', '=', 'jmeliqing')->first();
        $type = 'product';
        $productType = 'jme';
        return view('sites.product.product', compact('breadcrumbs', 'product', 'type', 'productType'));
    }

    /**
     * 大圆普洱
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showJmepuer()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('jmepuer');
        $product = Product::where('module', '=', 'jmepuer')->first();
        $type = 'product';
        $productType = 'jme';
        return view('sites.product.product', compact('breadcrumbs', 'product', 'type', 'productType'));
    }

    /**
     * 大圆银
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showJmeyin()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('jmeyin');
        $product = Product::where('module', '=', 'jmeyin')->first();
        $type = 'product';
        $productType = 'jme';
        return view('sites.product.product', compact('breadcrumbs', 'product', 'type', 'productType'));
    }

    /**
     * 湘商e得网
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showXsspehaving()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('xsspehaving');
        $product = Product::where('module', '=', 'xsspehaving')->first();
        $type = 'product';
        $productType = 'xssp';
        return view('sites.product.product', compact('breadcrumbs', 'product', 'type', 'productType'));
    }

    /**
     * 湘商收藏品
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHnxsscp()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('hnxsscp');
        $product = Product::where('module', '=', 'hnxsscp')->first();
        $type = 'product';
        $productType = 'xssp';
        return view('sites.product.product', compact('breadcrumbs', 'product', 'type', 'productType'));
    }

    /**
     * 湘商大宗
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showXsspbulk()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('xsspbulk');
        $product = Product::where('module', '=', 'xsspbulk')->first();
        $type = 'product';
        $productType = 'xssp';
        return view('sites.product.product', compact('breadcrumbs', 'product', 'type', 'productType'));
    }

    /**
     * 金山工业云微盘
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showJsgyCloud()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('jsgyCloud');
        $product = Product::where('module', '=', 'jsgyCloud')->first();
        $type = 'product';
        $productType = 'jsgy';
        return view('sites.product.product', compact('breadcrumbs', 'product', 'type', 'productType'));
    }
}
