<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\{Country, State, City};
use App\Models\{User,Role,Patient_schedule};
use App\Models\Company;
use App\Models\CompanyUserMapping;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Exports\AdminExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Permission;
use Helper;

class PaitentController extends Controller
{
    public function index(Request $request)
    {
       // echo"index";die;

        $userType = auth()->user()->role()->first()->name;
        $listUrl = 'company-admin-list';
        $deleteUrl = 'company-admin-delete';
        $perpage = config('app.perpage');
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => __('locale.patient_schedule')], ['name' => __('locale.patient_schedule_list')]];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
        $pageTitle = 'Patient schedule';
        // $usersResult = User::whereHas(
        //     'role', function($q){
        //         $q->where('name', 'company-admin');
        //     }
        // )->select(['id','name','email','phone','address1','image','website_url','blocked'])->orderBy('id','DESC');
        $roles=Role::get(["id","name"]);
        $patientscheduleResult = Patient_schedule::with(['patientname','carername','alternatecarername','role'])->select(['patient_schedule.id','patient_id','date','time','carer_code','carer_assigned_by','alternate_carer_code'])->orderBy('id','DESC');
       //echo"<pre>";print_r($patientscheduleResult);die;
        $editUrl = 'company-admin-edit';
        if($request->ajax()){
            // $patientscheduleResult = $patientscheduleResult->when($request->seach_term, function($q)use($request){
            //     $q->where('id', 'like', '%'.$request->seach_term.'%')
            //                 ->orWhere('name', 'like', '%'.$request->seach_term.'%');
                            
            // })->paginate($perpage);
            $patientscheduleResult = $patientscheduleResult->whereHas('patientname', function($q)use($request){
                $q->where('id', 'like', '%'.$request->seach_term.'%')
                            ->orWhere('name', 'like', '%'.$request->seach_term.'%');
                            
            })->paginate($perpage);//search in laravel through relationship
                        
            return view('pages.patient.patient-list-ajax', compact('patientscheduleResult','editUrl','deleteUrl'))->render();
        }

        $patientscheduleResult = $patientscheduleResult->paginate($perpage);
        
        return view('pages.patient.patient-list', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs,'patientscheduleResult'=>$patientscheduleResult,'pageTitle'=>$pageTitle,'userType'=>$userType,'editUrl'=>$editUrl,'deleteUrl'=>$deleteUrl,'roles'=>$roles]);
    }

    public function create($id='')
    {
        //echo"hi patient schedule form";die;
        //echo auth()->user()->id;die;
        $userType = auth()->user()->role()->first()->name;
        $formUrl = 'company-admin-create';
        $user_result=$states=$cities=false;
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => __('locale.patient schedule')], ['name' => (($id!='') ? __('locale.Edit') : __('locale.Create') )]];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
        $patient = User::where('typeselect','=','Patient')->get(["name", "id"]);
        $carer = User::where('typeselect','=','Carer')->get(["name", "id"]);
        $roles=Role::get(["id","name"]);
        //$companyCode = Helper::setNumber();
        $pageTitle = __('locale.Patient schedule name'); 
        if($id!=''){
            $permission_arr = [];
            $user_result = User::with(['company','permission'])->find($id);
            if($user_result->permission->count()>0){
                foreach($user_result->permission as $permission_val){
                    $permission_arr[$permission_val->name][] = $permission_val->guard_name;
                }
            }
            $user_result->permission = $permission_arr;
            // echo '<pre>';print_r($user_result);exit();
            if($user_result){
            $states = State::where('country_id',$user_result->country)->get(["name", "id"]);
            $cities = City::where('state_id',$user_result->state)->get(["name", "id"]);
            }
            $formUrl = 'company-admin-update';
        }
        // dd($user_result);
        return view('pages.patient.patient-create', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs,'patient'=>$patient,'pageTitle'=>$pageTitle,'user_result'=>$user_result,'states'=>$states,'cities'=>$cities,'userType'=>$userType,'formUrl'=>$formUrl,'carer'=>$carer,'roles'=>$roles]);
    }

    public function store(Request $request){
        
       // echo '<pre>';print_r($request->all()); exit();

        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|max:250',
            //'email' => 'required|unique:users|max:250',
            'carer_code' => 'required|max:20',
            'alternate_carer_code'=>'required|max:20'
            
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        // $role = Role::where('name','=',$request['typeselect'])->first();
        // $random_password = Str::random(6);
        // $request['password'] = Hash::make($random_password);
        unset($request['_token']);
        unset($request['action']);
        $patientschedule = Patient_schedule::create($request->all());
        
        //$id = $user->id;
        //echo $role->id;die;
       // $user->company()->attach($request->company);
       // $user->role()->attach($role->id);
        // if($request->has('permission_allow')){
        //     $i=0;
        //     $permissionInsert = [];
        //     foreach($request->input('permission_allow') as $key => $permissionVal){
        //         // echo '<pre>';print_r($permissionVal['guard_name']);
        //         if(isset($permissionVal['guard_name'])){
        //             for($g=0;$g<count($permissionVal['guard_name']);$g++){
        //                 $permissionInsert[$i]['user_id'] = $id;
        //                 $permissionInsert[$i]['name'] = $key;
        //                 $permissionInsert[$i]['guard_name'] = $permissionVal['guard_name'][$g];
        //                 $i++;
        //             }
        //         }
        //     }
        //     if(!empty($permissionInsert)){
        //         Permission::where('user_id',$user->id)->delete();
        //         Permission::insert($permissionInsert);
        //     }
        // }
        
        return redirect()->route('patient-schedule-list')->with('success',__('locale.patient_schedule_create_success'));
    }


}

?>

