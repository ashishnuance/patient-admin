<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaitentController extends Controller
{
    public function paitent(){
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => __('locale.Company Admin')], ['name' => __('locale.Company Admin').__('locale.List')]];
        
            $pageConfigs = ['pageHeader' => true];
            $pageTitle = 'Paitent Schedule';
            $listUrl = 'paitent-list';
            $deleteUrl = 'company-admin-delete';
            $editUrl = 'company-admin-edit';

        return view('pages.paitent.paitent',['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs,'pageTitle'=>$pageTitle,'editUrl'=>$editUrl,'deleteUrl'=>$deleteUrl]);
    }
}

?>

