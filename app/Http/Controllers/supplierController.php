<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function supplier(){
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => __('locale.Company Admin')], ['name' => __('locale.Company Admin').__('locale.List')]];
        
            $pageConfigs = ['pageHeader' => true];
            $pageTitle = 'Supplier Master';
            $listUrl = 'supplier-list';
            $deleteUrl = 'company-admin-delete';
            $editUrl = 'company-admin-edit';

        return view('pages.supplier.supplier',['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs,'pageTitle'=>$pageTitle,'editUrl'=>$editUrl,'deleteUrl'=>$deleteUrl]);
    }
}
