<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PaymentReport;
use App\Department;
use App\User;
use App\Employee;

class PaymentReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id)
    {   
        $employee = Employee::findOrFail($id);
        
        $payment = new PaymentReport();
        $payment->employee_id = $employee->id;
        $payment->salary = $employee->salary;
        $payment->department = $employee->department;
        $payment->amount_paid = request('amount_paid');
        $payment->paid_by = auth()->user()->id;
        $payment->remark = request('remark');
        $payment->save();
        
        return redirect("/employee")->with("success","$employee->name was paid successfully");
    }

    public function index()
    {
        $departments = Department::all();
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
        return view('report.index',['departments' => $departments,'months' => $months]);
    }

    public function show()
    {
        $departments = Department::all();
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        $employee_id = auth()->user()->id;
        $employee = Employee::find($employee_id);

        $department = request('department') ;
        $start_month = request('start_month');
        $start_year = request('start_year');
        $start_date = $start_year."-".$start_month;


        
        $report = PaymentReport::where('department', "$department")->where('created_at', 'like', "$start_date%")->get();

        $output = '
        
        <div class="table-responsive">
        <table class="table table-bordered">
        <caption class="h4 text-danger" style="caption-side:top">Payment report for '. request('department').' </caption>
          <thead>
            <tr>
              <th scope="col">User</th>
              <th scope="col">Salary</th>
              <th scope="col">Amount Paid</th>
              <th scope="col">Department</th>
              <th scope="col">Remark</th>
              <th scope="col">Paid On</th>
            </tr>
          </thead>
          <tbody>';

          
           foreach($report AS $args):

            $output.='
            <tr>
            <td>'.htmlspecialchars($args->employee->name).'</td>  
            <td>'.htmlspecialchars(config("app.curr").$args->salary).'</td>
            <td>'.htmlspecialchars(config("app.curr").$args->amount_paid).'</td> 
            <td>'.htmlspecialchars($args->department).'</td>
            <td>'.htmlspecialchars($args->remark).'</td>
            <td>'.htmlspecialchars($args->created_at).'</td>
            </tr> ';

           endforeach;

           $output.='
          </tbody>
        </table>
        </div>';


        return view('report.index',['departments' => $departments,'months' => $months,'report' => $report,'output' => $output]);
    }
}
