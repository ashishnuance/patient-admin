<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockInController extends Controller
{
    public function stockin(){
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => __('locale.Company Admin')], ['name' => __('locale.Company Admin').__('locale.List')]];
        
            $pageConfigs = ['pageHeader' => true];
            $pageTitle = 'Stock In';
            $listUrl = 'stock-list';
            $deleteUrl = 'company-admin-delete';
            $editUrl = 'company-admin-edit';

        return view('pages.stockin.stockin',['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs,'pageTitle'=>$pageTitle,'editUrl'=>$editUrl,'deleteUrl'=>$deleteUrl]);
    }
}
