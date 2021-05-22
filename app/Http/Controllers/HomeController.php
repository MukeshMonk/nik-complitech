<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Father;
use App\Models\Mother;
use Exception;

class HomeController extends Controller
{
    public function index()
    {
        $userData = User::paginate(5);
        return view('welcome',["userData"=>$userData]);
    }
    public function showDetail(User $user)
    {
        return view('detail', [
            "user" => $user, 
            "father" => $user->fatherDetails(),
            "mother" => $user->motherDetails(),
            "childs" => $user->childDetails(),
        ]);
    }
    public function storeData(Request $request)
    {
     
        $fullName = $request->fullname;
        $dob = $request->dob;

        $chkFather = $request->chkfather;
        $fAadhar = $request->faadhar;
        $fatherName = $request->fathername;
        
        $chkMother = $request->chkmother;
        $mAadhar = $request->maadhar;
        $motherName = $request->mothername;

        $chkChild = $request->chkchild;
        $cAadhar = $request->caadhar;
        $childName = $request->childname;
        $generateAadharCard = rand(111111111111,999999999999);
        $chkGender = $request->chkgender;
        $user=User::create([
            'name' => $fullName,
            'aadhar' => $generateAadharCard,
            'birthday' => $dob,
            'father_name' =>$fatherName,
            'mother_name' => $motherName,
            'children_name' => $childName
        ]);

        if($chkFather=="yes_f")
        {
            $fatherDetail = User::where("aadhar",$fAadhar)->first();
           // dd($fatherDetail);
            if (!$fatherDetail) {
                $user->delete();
                toastr()->error('Father aadhar number is invalid!'); 
                return redirect('/');    
            }
            Father::create([
                'parent_id' => $fatherDetail->id,
                'child_id' => $user->id,
            ]);
        }
        
        if($chkChild=="yes_c")
        {
            $childDetail = User::where("aadhar",$cAadhar)->first();

            if (!$childDetail) {
                $user->delete();
                toastr()->error('Child aadhar number is invalid!'); 
                return redirect('/');    
            }
            if ($chkGender == 'male') {
                Father::create([
                    'parent_id' =>$user->id,
                    'child_id' => $childDetail->id,
                ]);
            } else if ($chkGender == 'female') {
                Mother::create([
                    'parent_id' =>$user->id,
                    'child_id' => $childDetail->id,
                ]);
            }
        }

        if($chkMother=="yes_m")
        {
            $motherDetail = User::where("aadhar",$mAadhar)->first();
            if (!$motherDetail) {
                $user->delete();
                toastr()->error('Mother aadhar number is invalid!'); 
                return redirect('/');    
            }
            Mother::create([
                'parent_id' => $motherDetail->id,
                'child_id' => $user->id,
            ]);
        }
        toastr()->success('Added Successfully!!...');
        return redirect('/');    
        
    }
}
