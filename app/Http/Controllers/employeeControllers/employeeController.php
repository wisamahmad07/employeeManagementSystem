<?php

namespace App\Http\Controllers\employeeControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\employee;
use App\Models\employeedetail;
use App\Models\submittedtask;
use App\Models\task;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class employeeController extends Controller
{
    public function employeeDashboard()
    {
        Session::put('page', 'dashboard');
        return view('employee.employeeDashboard');
    }
    public function viewTask()
    {
        Session::put('page', 'checkTasks');

        return view('employee.crudTasks.viewEmployeeTasks', ['taskData' => task::get()]);
    }

    public function storeEmployeeTask(Request $request, $id)
    {
        $task = task::find($id);
        $submittedTask = new submittedtask;
        $this->validate($request, [
            'file' => 'required|file|mimes:pdf|max:4096', // Adjust the mime types and size as needed
        ]);

        $submittedTask->name = $task->name;
        $submittedTask->email = $task->email;
        $submittedTask->description = $task->description;
        $submittedTask->date = $task->date;
        if ($request->hasFile('file')) {
            $file = $request->file('file'); // Retrieve the file from the request
            $fileName = uniqid() . '.' . $file->getClientOriginalName(); // Generate a unique file name
            // Move the uploaded file to the desired location
            $file->move(public_path('submittedFile'), $fileName);
            // Assign the file name to the submitted task's 'file' attribute
            $task->file = $fileName;
            $submittedTask->file = $fileName;
        }
        $task->save();
        $submittedTask->save();

        return redirect('employee/viewTask');
    }

    public function loginEmployee(Request $request)
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
            // dd(Auth::guard('employee')->attempt(['email' => $data['email'], 'password' => $data['password']]));
            if (Auth::guard('employee')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect("employee/employeeDashboard");
            } else {
                return redirect()->back()->with("error_message", "Invalid why email or password");
            }
        }
        return view('employee.login');
    }

    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect('employee/loginEmployee');
    }
    public function viewEmployeeDetail()
    {
        Session::put('page', 'viewEmployeeDetail');

        return view('employee.crudTasks.viewEmployeeDetail', ['employeeData' => employee::get()]);
    }
}
