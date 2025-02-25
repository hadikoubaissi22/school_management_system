<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list',$data);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add New Student';
        return view('admin.student.add',$data);
    }
    public function insert(Request $request)
    {
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->cast = trim($request->cast);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move("upload/profile/", $filename);
            $student->profile_pic = $filename;    
            
        }
        
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with("success","Student Successfully Created");
    }
    public function profile($id)
    {
        $data['getRecord'] = User::getSignel($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Student Profile';
            return view('admin.student.profile',$data);
        }else
        {
            abort(404);
        }
        
    }
}
