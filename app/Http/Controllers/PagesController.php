<?php

namespace App\Http\Controllers;
use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;



use App\Report;
use App\EmployeeSalary;
use App\Expense;
use App\Restaurant;
use App\Safe;
use App\Supplier;
use App\TotalCash;
use App\ExpenseFile;

use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller
{
    
    public function HomePage()
    {
        return view('frontend.homepage');
    }
    
    public function Dashboard()
    {
        return view('dashboard.index');
    }
    public function generate_report(Request $request)
    {
        $this->validate($request, [
            "from" => "required",
            "to" => "required"
        ]);
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
        $report = Report::whereBetween("created_at", [$startDate, $endDate])
        ->get();
        $total = $report;
        // ->where("payment_status", "paid")
        //return data
        return view("Report.report.show", compact('report', 'total', 'startDate', 'endDate'));;
            return view("Report.report.index")->with([
            "startDate" => $startDate,
            "endDate" => $endDate,
            // "total" => $sales->sum('total_received'),
            "total" => $sales,
            "report" => $sales
        ]);
    }
    public function generate_employee_salary(Request $request)
    {
        $this->validate($request, [
            "from" => "required",
            "to" => "required"
        ]);
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
        $employeesalary = EmployeeSalary::whereBetween("created_at", [$startDate, $endDate])
        ->get();
        $total = $employeesalary;
        // ->where("payment_status", "paid")
        return view("EmployeeSalary.employee-salary.show", compact('employeesalary', 'total', 'startDate', 'endDate'));

        //     return view("EmployeeSalary.employee-salary.index")->with([
        //     "startDate" => $startDate,
        //     "endDate" => $endDate,
        //     "total" => $sales->sum('total_received'),
        //     "total" => $sales,
        //     "employeesalary" => $sales
        // ]);
    }
    public function generate_expenses(Request $request)
    {
        $this->validate($request, [
            "from" => "required",
            "to" => "required"
        ]);
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
        $expenses = Expense::whereBetween("created_at", [$startDate, $endDate])
        ->get();
        $total = $expenses;
        $expensesFile = ExpenseFile::get();
        // $expensesFile = ExpenseFile::where('expenses_id', '=', $id)->get();
        // ->where("payment_status", "paid")
        return view("Expenses.expenses.show", compact('expenses', 'total', 'startDate', 'endDate', 'expensesFile'));

        //     return view("Expenses.expenses.index")->with([
        //     "startDate" => $startDate,
        //     "endDate" => $endDate,
        //     "total" => $sales->sum('total_received'),
        //     "total" => $sales,
        //     "expense" => $sales
        // ]);
    }
    // public function generate_Restaurant(Request $request)
    // {
    //     $this->validate($request, [
    //         "from" => "required",
    //         "to" => "required"
    //     ]);
    //     $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
    //     $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
    //     $safe = Safe::whereBetween("created_at", [$startDate, $endDate])
    //     ->get();
    //     $total = $safe;
    //     // ->where("payment_status", "paid")
    //     return view("Safe.safe.index", compact('safe', 'total', 'startDate', 'endDate'));

    //     //     return view("Safe.safe.index")->with([
    //     //     "startDate" => $startDate,
    //     //     "endDate" => $endDate,
    //     //     "total" => $sales->sum('total_received'),
    //     //     "total" => $sales,
    //     //     "safe" => $sales
    //     // ]);
    // }
    public function generate_safe(Request $request)
    {
        // return 'generate_safe';
        $this->validate($request, [
            "from" => "required",
            "to" => "required"
        ]);
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
         $safe = Safe::whereBetween("created_at", [$startDate, $endDate])
        ->get();
        $total = $safe;
        // ->where("payment_status", "paid")
        return view("Safe.safe.show", compact('safe', 'total', 'startDate', 'endDate'));

        //     return view("Safe.safe.index")->with([
        //     "startDate" => $startDate,
        //     "endDate" => $endDate,
        //     "total" => $sales->sum('total_received'),
        //     "total" => $sales,
        //     "safe" => $sales
        // ]);
    }
    // public function generate_Supplier(Request $request)
    // {
    //     $this->validate($request, [
    //         "from" => "required",
    //         "to" => "required"
    //     ]);
    //     $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
    //     $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
    //     $safe = Safe::whereBetween("created_at", [$startDate, $endDate])
    //     ->get();
    //     $total = $safe;
    //     // ->where("payment_status", "paid")
    //     return view("Safe.safe.index", compact('safe', 'total', 'startDate', 'endDate'));

    //     //     return view("Safe.safe.index")->with([
    //     //     "startDate" => $startDate,
    //     //     "endDate" => $endDate,
    //     //     "total" => $sales->sum('total_received'),
    //     //     "total" => $sales,
    //     //     "safe" => $sales
    //     // ]);
    // }
    // public function generate_TotalCash(Request $request)
    // {
    //     $this->validate($request, [
    //         "from" => "required",
    //         "to" => "required"
    //     ]);
    //     $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
    //     $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
    //     $safe = Safe::whereBetween("created_at", [$startDate, $endDate])
    //     ->get();
    //     $total = $safe;
    //     // ->where("payment_status", "paid")
    //     return view("Safe.safe.index", compact('safe', 'total', 'startDate', 'endDate'));

    //     //     return view("Safe.safe.index")->with([
    //     //     "startDate" => $startDate,
    //     //     "endDate" => $endDate,
    //     //     "total" => $sales->sum('total_received'),
    //     //     "total" => $sales,
    //     //     "safe" => $sales
    //     // ]);
    // }

    public function export(Request $request)
    {
        return Excel::download(new ReportExport($request->from, $request->to), "report.xlsx");
    }
}
