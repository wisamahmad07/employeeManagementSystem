<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\employee;
use App\Models\submittedtask;
use App\Models\task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\formMail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function dashboard()
    {
        Session::put('page', 'dashboard');

        return view('admin.dashboard');
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();

            $rules = [
                'email' => 'required | email | max: 255',
                'password' => 'required | max: 30'
            ];

            $customMessages = [
                'email.required' => "Email is required",
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessages);
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'type' => $data['type']])) {
                return redirect("admin/dashboard");
            } else {
                return redirect()->back()->with("error_message", "Invalid email or password");
            }
        }
        return view('admin.login');
    }



    public function viewEmployee()
    {
        Session::put('page', 'viewEmployee');
        return view('admin.crudEmployees.viewEmployee', ['employeeData' => employee::get()]);
    }

    public function addEmployee()
    {
        return view('admin.crudEmployees.addEmployee');
    }

    public function storeEmployee(Request $request)
    {
        $admin = new admin;
        $employee = new employee;
        $task = new task;
        $user = new User;

        if (isset($request->image)) {

            $image = $request->image;
            $extension = $image->getClientOriginalName();
            $imageName = uniqid() . '.' . $extension;
            $request->image->move(public_path('admin/images/photos/'), $imageName);
        }
        if (!empty($imageName)) {

            $admin->name = $request->name;
            $admin->maritalstatus = $request->maritalstatus;
            $admin->gender = $request->gender;
            $admin->address = $request->address;
            $admin->email = $request->email;
            $password = $request->password;
            $admin->password = Hash::make($password);
            $admin->dateofbirth = $request->dateofbirth;
            $admin->mobilenumber = $request->mobilenumber;
            $admin->image = $imageName;
            $admin->type = $request->type;
            $admin->status = $request->status;
            $admin->attendance = $request->attendance;
            $admin->salary = $request->salary;
            $admin->position = $request->position;

            $admin->save();

            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->save();
        } else {
            $admin->name = $request->name;
            $admin->maritalstatus = $request->maritalstatus;
            $admin->gender = $request->gender;
            $admin->address = $request->address;
            $admin->email = $request->email;
            $password = $request->password;
            $admin->password = Hash::make($password);
            $admin->dateofbirth = $request->dateofbirth;
            $admin->mobilenumber = $request->mobilenumber;
            $admin->type = $request->type;
            $admin->status = $request->status;
            $admin->attendance = $request->attendance;
            $admin->salary = $request->salary;
            $admin->position = $request->position;

            $admin->save();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->save();
        }
        ////////////////////////////
        if (isset($request->image)) {

            $image = $request->image;
            $extension = $image->getClientOriginalName();
            $imageName = uniqid() . '.' . $extension;
            // $request->image->move(public_path('employee/images/'), $imageName);
        }
        if (!empty($imageName)) {

            $employee->name = $request->name;
            $employee->maritalstatus = $request->maritalstatus;
            $employee->gender = $request->gender;
            $employee->address = $request->address;
            $employee->email = $request->email;
            $password = $request->password;
            $employee->password = Hash::make($password);
            $employee->dateofbirth = $request->dateofbirth;
            $employee->mobilenumber = $request->mobilenumber;
            $employee->image = $imageName;
            $employee->type = $request->type;
            $employee->status = $request->status;
            $employee->attendance = $request->attendance;
            $employee->salary = $request->salary;
            $employee->position = $request->position;

            $employee->save();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->save();
        } else {
            $employee->name = $request->name;
            $employee->maritalstatus = $request->maritalstatus;
            $employee->gender = $request->gender;
            $employee->address = $request->address;
            $employee->email = $request->email;
            $password = $request->password;
            $employee->password = Hash::make($password);
            $employee->dateofbirth = $request->dateofbirth;
            $employee->mobilenumber = $request->mobilenumber;
            $employee->type = $request->type;
            $employee->status = $request->status;
            $employee->attendance = $request->attendance;
            $employee->salary = $request->salary;
            $employee->position = $request->position;

            $employee->save();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->save();
        }


        return redirect('admin/viewEmployee')->withSucess('Employee Added Successfully!');
    }
    public function editEmployee($id)
    {
        $admin = admin::find($id + 1);
        $employee = employee::find($id);
        $task = task::find($id);

        if ($employee->email == $admin->email) {
            return view('admin.crudEmployees.editEmployee', ['data' => $employee]);
        } else {
            return redirect('admin.crudEmployees.viewEmployee')->withError('Employee does not exists');
        }
    }
    public function updateEmployee(Request $request, $id)
    {
        $admin = admin::where('id', $id)->first();
        $employee = employee::where('id', $id)->first();
        $task = task::where('id', $id)->first();

        ////////////////////////////
        if (isset($request->image)) {

            $image = $request->image;
            $extension = $image->getClientOriginalName();
            $imageName = uniqid() . '.' . $extension;
            // $request->image->move(public_path('employee/images/'), $imageName);
        }
        if (!empty($imageName)) {

            $employee->name = $request->name;
            $employee->maritalstatus = $request->maritalstatus;
            $employee->gender = $request->gender;
            $employee->address = $request->address;
            //  $employee->email = $request->email;
            $password = $request->password;
            $employee->password = Hash::make($password);
            $employee->dateofbirth = $request->dateofbirth;
            $employee->mobilenumber = $request->mobilenumber;
            $employee->image = $imageName;
            $employee->type = $request->type;
            $employee->status = $request->status;
            $employee->attendance = $request->attendance;
            $employee->salary = $request->salary;
            $employee->position = $request->position;

            $employee->save();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();
        } else {
            $employee->name = $request->name;
            $employee->maritalstatus = $request->maritalstatus;
            $employee->gender = $request->gender;
            $employee->address = $request->address;
            //      $employee->email = $request->email;
            $password = $request->password;
            $employee->password = Hash::make($password);
            $employee->dateofbirth = $request->dateofbirth;
            $employee->mobilenumber = $request->mobilenumber;
            $employee->type = $request->type;
            $employee->status = $request->status;
            $employee->attendance = $request->attendance;
            $employee->salary = $request->salary;
            $employee->position = $request->position;

            $employee->save();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();
        }
        /////////////////////////////////////
        if (isset($request->image)) {

            $image = $request->image;
            $extension = $image->getClientOriginalName();
            $imageName = uniqid() . '.' . $extension;
            $request->image->move(public_path('admin/images/photos/'), $imageName);
        }
        if (!empty($imageName)) {

            $admin->name = $request->name;
            $admin->maritalstatus = $request->maritalstatus;
            $admin->gender = $request->gender;
            $admin->address = $request->address;
            //     $admin->email = $request->email;
            $password = $request->password;
            $admin->password = Hash::make($password);
            $admin->dateofbirth = $request->dateofbirth;
            $admin->mobilenumber = $request->mobilenumber;
            $admin->image = $imageName;
            $admin->type = $request->type;
            $admin->status = $request->status;
            $admin->attendance = $request->attendance;
            $admin->salary = $request->salary;
            $admin->position = $request->position;

            $admin->save();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();
        } else {
            $admin->name = $request->name;
            $admin->maritalstatus = $request->maritalstatus;
            $admin->gender = $request->gender;
            $admin->address = $request->address;
            //   $admin->email = $request->email;
            $password = $request->password;
            $admin->password = Hash::make($password);
            $admin->dateofbirth = $request->dateofbirth;
            $admin->mobilenumber = $request->mobilenumber;
            $admin->type = $request->type;
            $admin->status = $request->status;
            $admin->attendance = $request->attendance;
            $admin->salary = $request->salary;
            $admin->position = $request->position;

            $admin->save();
            $task->name = $request->name;
            $task->email = $request->email;
            $task->save();
        }


        return redirect('admin/viewEmployee')->withSucess('Employee Added Successfully!');
    }

    public function deleteEmployee($id)
    {
        $admin = admin::where('id', $id + 1)->first();
        $admin->delete();
        $employee = employee::where('id', $id)->first();
        $employee->delete();
        $task = task::where('id', $id)->first();
        $task->delete();

        return redirect('admin/viewEmployee')->withSucess('Employee deleted Successfully!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function updatePassword(Request $request)
    {
        Session::put('page', 'updatePassword');
        if ($request->isMethod('post')) {
            $data = $request->all();
            // Check if current password is correct
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                // Check if new password and confirm password are matching
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    // Update new password
                    admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    return redirect()->back()->with('success_message', 'Password has been updated Successlly!');
                } else {
                    return redirect()->back()->with('error_message', 'New Passord and Retype Password not match!');
                }
            } else {
                return redirect()->back()->with('error_message', 'Your current password is incorrect');
            }
        }
        return view('admin.updatePassword');
    }

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateDetails(Request $request)
    {
        Session::put('page', 'updateDetails');
        if ($request->isMethod('post')) {

            $data = $request->all();

            $rules = [
                'adminName' => 'required | max: 255',
                'adminMobile' => 'required | digits:11',
                'dateofbirth' => 'required ',
                'gender' => 'required ',
                'maritalstatus' => 'required ',
                //   'adminImage' => 'image',
            ];

            $customMessages = [
                'adminName.required' => "valid Name is required",
                'adminName.max' => "valid Name is required",
                'adminMobile.required' => 'Valid or new Mobile is required  11 digits number',
                'adminMobile.digits' => 'Valid or new Mobile is required 11 digits number',
                'dateofbirth.required' => 'kindly Enter date of birth',
                'maritalstatus.required' => 'kindly Enter your marital status',
                'gender.required' => 'kindly Enter your gender',
                // 'adminImage.image' => 'Valid Image is required',

            ];
            $this->validate($request, $rules, $customMessages);

            // Upload Admin Image

            if (isset($request->adminImage)) {

                $image = $data['adminImage'];
                $extension = $image->getClientOriginalName();
                $imageName = uniqid() . '.' . $extension;
                $request->adminImage->move(public_path('admin/images/photos'), $imageName);
            }
            if (!empty($imageName)) {

                admin::where('email', Auth::guard('admin')->user()->email)->update([
                    'name' => $data['adminName'], 'mobilenumber' => $data['adminMobile'], 'image' => $imageName,
                    'maritalstatus' => $data['maritalstatus'], 'gender' => $data['gender'],
                    'dateofbirth' => $data['dateofbirth'], 'address' => $data['address'],
                ]);
            } else {
                admin::where('email', Auth::guard('admin')->user()->email)->update([
                    'name' => $data['adminName'], 'mobilenumber' => $data['adminMobile'],
                    'maritalstatus' => $data['maritalstatus'], 'gender' => $data['gender'],
                    'dateofbirth' => $data['dateofbirth'], 'address' => $data['address'],
                ]);
            }


            return redirect()->back()->with("success_message", "Details has been updated");
        }

        return view('admin.updateDetails');
    }

    public function viewTask()
    {
        Session::put('page', 'viewTask');
        return view('admin.crudTasks.viewTask', ['taskData' => task::get()], ['submitData' => submittedTask::get()]);
    }

    public function addTask($id)
    {
        $employee = employee::find($id);
        $task = task::find($id);

        if ($employee->email == $task->email) {
            return view('admin.crudTasks.addTask', ['data' => $task]);
        }
    }

    public function storeTask(Request $request, $id)
    {
        $task = task::find($id);
        $task->name = $request->name;
        $task->email = $task->email;
        $task->description = $request->description;
        $task->date = $request->date;
        /* $file = $request->file;
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $extension;
        $request->file->move(public_path('admin/images/files'), $fileName);
        $task->file = $fileName; */
        $task->save();
        return redirect('admin/viewTask')->withSucess('Task Added Successfully!');
    }
    public function deleteTask($id)
    {
        $task = task::where('id', $id)->first();
        $task->delete();

        return redirect('admin/viewTask')->withSucess('Task deleted Successfully!');
    }
    public function viewSubmittedTask()
    {
        Session::put('page', 'viewSubmittedTask');
        return view('admin.crudTasks.viewSubmittedTasks', ['taskData' => submittedtask::get()]);
    }

    public function fileView($id)
    {
        $file = submittedtask::find($id);

        return view('admin.crudTasks.viewFile', ['file' => $file]);
    }
    public function fileDownload($file)
    {
        return response()->download(public_path('submittedFile/' . $file));
    }

    public function mailForm()
    {
        return view('admin.mail.mailForm');
    }
    public function sendMail(Request $req)
    {
        $employeeEmails = employee::all(['email']);
        $details = [
            'subject' => $req->get('subject'),
            'body' => $req->get('details')
        ];
        foreach ($employeeEmails as $emails) {
            Mail::to($emails['email'])->send(new formMail($details));
        }
        return redirect('admin/dashboard')->with('status', "Email Sent Successfully!");
    }


    /* public function viewEmployeeCompanyDetail()
    {
        Session::put('page', 'addEmployeeCompanyDetail');

        return view('admin.crudEmployees.viewEmployeeCompanyDetail', ['employeeCompanyData' => employeedetail::get()]);
    }
    public function addEmployeeCompanyDetail()
    {
        Session::put('page', 'addEmployeeCompanyDetail');
        return view('admin.crudEmployees.addEmployeeCompanyDetail');
    }
    public function storeEmployeeCompanyDetail(Request $request)
    {
        $employeeDetails = new employeedetail;
        $employeeDetails->salary = $request->salary;
        $employeeDetails->attendance = $request->attendance;
        $employeeDetails->position = $request->position;
        $employeeDetails->save();
        return redirect('admin/viewEmployeeCompanyDetail')->withSucess('Employee Added Successfully!');
    }
    public function deleteEmployeeCompanyDetail($id)
    {
        $employeeCompanyData = employeedetail::where('id', $id)->first();
        $employeeCompanyData->delete();

        return redirect('admin/viewEmployeeCompanyDetail')->withSucess('deleted Successfully!');
    }

    public function editEmployeeCompanyDetail($id)
    {
        Session::put('page', 'addEmployeeCompanyDetail');
        $employeeCompanyData = employeedetail::where('id', $id)->first();
        $employeeData = employee::where('id', $id)->first();

        return view('admin.crudEmployees.editEmployeeCompanyDetail', ['employeeCompanyData' => $employeeCompanyData, 'employeeData' => $employeeData]);
    }
    public function updateEmployeeCompanyDetail(Request $request,  $id)
    {

        $employeeCompanyData = employeedetail::where('id', $id)->first();
        $employeeData = employee::where('id', $id)->first();
        $employeeData->name = $request->name;
        $employeeCompanyData->name = $request->name;
        $employeeCompanyData->position = $request->position;
        $employeeCompanyData->attendance = $request->attendance;
        $employeeCompanyData->salary = $request->salary;

        $employeeData->save();
        $employeeCompanyData->save();

        return redirect('admin/viewEmployeeCompanyDetail')->with('success', 'Updated Successfully!');
    } */
}
