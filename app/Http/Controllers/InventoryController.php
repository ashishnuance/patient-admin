<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventory(){
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => __('locale.Company Admin')], ['name' => __('locale.Company Admin').__('locale.List')]];
        
            $pageConfigs = ['pageHeader' => true];
            $pageTitle = 'Inventory Master';
            $listUrl = 'Inventory-list';
            $deleteUrl = 'company-admin-delete';
            $editUrl = 'company-admin-edit';

        return view('pages.inventory.inventory',['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs,'pageTitle'=>$pageTitle,'editUrl'=>$editUrl,'deleteUrl'=>$deleteUrl]);
    }
}
 
 ?>