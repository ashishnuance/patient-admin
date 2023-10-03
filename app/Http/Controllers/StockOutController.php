<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockOutController extends Controller
{
    public function stockout(){
        
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => __('locale.Company Admin')], ['name' => __('locale.Company Admin').__('locale.List')]];
        
            $pageConfigs = ['pageHeader' => true];
            $pageTitle = 'Stock Out';
            $listUrl = 'stockout-list';
            $deleteUrl = 'company-admin-delete';
            $editUrl = 'company-admin-edit';

        return view('pages.stockout.stockout',['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs,'pageTitle'=>$pageTitle,'editUrl'=>$editUrl,'deleteUrl'=>$deleteUrl]);
    }
}

?>
