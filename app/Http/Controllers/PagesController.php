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
use App\Employee;


use Auth;
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
        $perPage =25;
        try{
        $model = str_slug('restaurant','-');
            // $restaurant = Restaurant::paginate($perPage);
                    
                        $restaurant = Restaurant::all();
                      foreach ($restaurant as $item) {
                        // return "$item->id";
                        $report_total_income = Report::where('restaurant_id',$item->id)->sum("total_income");
                        $report_cash = Report::where('restaurant_id',$item->id)->sum("cash");
                        $report_expense_today = Report::where('restaurant_id',$item->id)->sum("expense_today");
                        
                        $report_avg_salaries = Report::where('restaurant_id',$item->id)->sum("employee_salary_paid_today");
                        $salaries_total_income = EmployeeSalary::where('restaurant_id',$item->id)->sum("number_of_hours");
                        
                        //  $salaries_total_income_count = EmployeeSalary::where('restaurant_id',$item->id)->get("number_of_hours");
                         $salaries_number_of_hours_sum_count = EmployeeSalary::get();

                        $report_total_income_sum[] = $report_total_income;
                        $report_cash_sum[] = $report_cash;
                        $report_avg_salaries_sum[] = $report_avg_salaries;
                        $salaries_number_of_hours_sum[] = $salaries_total_income;
                        $report_expense_today_sum[] = $report_expense_today;
                        
                      }


                    // $supplier = Supplier::get();
                    // $report = Report::get();
                    // $employee = Employee::get();
                    // $users = User::get();
            return view('dashboard.index', compact('restaurant', 'report_total_income_sum','report_cash_sum','report_avg_salaries_sum', 'salaries_number_of_hours_sum','salaries_number_of_hours_sum_count','report_expense_today_sum'));
                    // } 
                    // else {
                        // $restaurant = Restaurant::where('restaurant_id', '=', auth()->user()->restaurant_id )->paginate($perPage);
                        // return view('Restaurant.restaurant.index');
                    
                        // $supplier = Supplier::where('restaurant_id', '=', auth()->user()->restaurant_id )->get();
                        // $report_total_income = Report::where('restaurant_id', '=', auth()->user()->restaurant_id )->sum('total_income');
                        // $employee = Employee::where('restaurant_id', '=', auth()->user()->restaurant_id )->get();
                        // $users = User::where('restaurant_id', '=', auth()->user()->restaurant_id )->get();
                    // }

            // return view('dashboard.index', compact('restaurant','supplier', 'report','employee', 'users'));
    } catch (\Throwable $th) {
        $restaurant = Restaurant::paginate($perPage);
        // $supplier = Supplier::get();
        // $report = Report::get();
        // $employee = Employee::get();
        // $user = User::get();
        // return view('Restaurant.restaurant.show', compact('restaurant','supplier', 'report','employee', 'user'))->with('flash_message', 'Dashboard access fail!');
        return view('Restaurant.restaurant.index', compact('restaurant'))->with('flash_message', 'Dashboard access fail!');
    }
        return response(view('403'), 403);
    }
    public function generate_report(Request $request)
    {
        // return "here";
        if (Auth::user()->hasRole('admin') ||
            Auth::user()->hasRole('developer')){
            
            $model = str_slug('restaurant','-');
            if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $keyword = $request->get('search');
                $perPage = 25;

                // if (!empty($keyword)) {
                //     $restaurant = Restaurant::where('name', 'LIKE', "%$keyword%")
                //     ->orWhere('location', 'LIKE', "%$keyword%")
                //     ->orWhere('ranking', 'LIKE', "%$keyword%")
                //     ->orWhere('description', 'LIKE', "%$keyword%")
                //     ->orWhere('focalperson', 'LIKE', "%$keyword%")
                //     ->orWhere('details', 'LIKE', "%$keyword%")
                //     ->paginate($perPage);
                // } 
                // else {
                    $this->validate($request, [
                        "from" => "required",
                        "to" => "required"
                     ]);
                    $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
                    $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
                    $report = Report::whereBetween("created_at", [$startDate, $endDate])
                    ->get();
                    $supplier = Supplier::get();
                    
                    $total = $report;
                    return view("Report.report.show", compact('report', 'total', 'startDate', 'endDate','supplier' ));
                // }
            }
        }
        
        else {
            $restaurant = Restaurant::where('id', '=' , Auth::User()->restaurant_id)->first();
            $report = Report::where( 'created_at', '>=', Carbon::now()->subDays($restaurant->see_cash_reports_days))
            ->get();
                $supplier = Supplier::get();
                $total = $report;
                return view("Report.report.show", compact('report', 'total','supplier' ));
        }
        return response(view('403'), 403);
    }

    public function generate_deposite_report(Request $request)
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
    public function generate_payout_report(Request $request)
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
        ->orderBy('date_of_expense', 'DESC')->get();
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
    public function generate_safe(Request $request, $id)
    {
        // return 'here';
        $from_date_cont = $request->from_date;
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
         $safe = Safe::whereBetween("created_at", [$startDate, $endDate])
        ->orderBy('created_at', 'DESC')->get();
        $total = $safe;
            
        $safe_sum = Safe::where('restaurant_id', '=', $id)->sum('sum') ;
        $safe_payment_sum = Safe::where('restaurant_id', '=', $id)->sum('payment') ;
        $safe_paycheck_sum = Safe::where('restaurant_id', '=', $id)->sum('paycheck') ;
        // return $get_restaurant_id = Safe::where('restaurant_id', '=', $id)->get('restaurant_id', 'sum');
       
        
        return view("Safe.safe.show", compact('safe', 'total', 'startDate', 'endDate', 'safe_sum', 'from_date_cont', 'safe_payment_sum', 'safe_paycheck_sum'));
    }

    public function generate_safe_fetch(Request $request)
    {
        
        $safe = Safe::orderBy('created_at', 'DESC')->get();
        return response()->json([
            'safe'=>  $safe,
        ]);
    }
    public function generate_employee_salary_fetch(Request $request)
    {
        
        $employee_salary = EmployeeSalary::orderBy('created_at', 'DESC')->get();
        return response()->json([
            'employee_salary'=>  $employee_salary,
        ]);
    }
    public function generate_employee_user_salary_fetch(Request $request)
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return response()->json([
            'users'=>  $users,
        ]);
    }
    public function generate_expenses_fetch(Request $request)
    {
        $expenses = Expense::orderBy('created_at', 'DESC')->get();
        $expenseFile = ExpenseFile::get();
        return response()->json([
            'expenses'=>  $expenses,
            'expenseFile'=>  $expenseFile,
        ]);
    }
    public function generate_expensesFile_fetch(Request $request)
    {
        $expenseFile = ExpenseFile::get();
        return response()->json([
            'expenseFile'=>  $expenseFile,
        ]);
    }
    
    public function generate_report_fetch(Request $request ,$id)
    {
            $restaurant_find = Restaurant::where('id', '=', $id)->first();
            $see_cash_reports_days = $restaurant_find->see_cash_reports_days;

        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
            $report = Report::orderBy('created_at', 'DESC')->get();
            $supplier = Supplier::get();
        } else{        
            $startDate = date("Y-m-d");
            $startDate = date('Y-m-d', strtotime($startDate. '+ 1 days'));
            $endDate = date('Y-m-d', strtotime($startDate. ' - '.$see_cash_reports_days.' days'));
            $supplier = Supplier::where('restaurant_id', '=', $id)->get();

            $report = Report::whereBetween("created_at", [$endDate, $startDate])->orderBy('created_at', 'DESC')->get();
        }


        // $report = Report::orderBy('created_at', 'DESC')->get();
        // $restaurant = Restaurant::get();
        return response()->json([
            'report'=>  $report,
            'supplier'=>  $supplier,
            'restaurant_find'=>  $restaurant_find,
        ]);
    }
    
    // public function generate_employee(Request $request)
    // {
    //     return $request;
    //     $this->validate($request, [
    //         "from" => "required",
    //         "to" => "required"
    //     ]);
    //     $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
    //     $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
    //     $employee = Employee::whereBetween("created_at", [$startDate, $endDate])
    //     ->get();
    //     $supplier = Supplier::get();
        
    //     $total = $employee;
    //     // ->where("payment_status", "paid")
    //     return view("Employee.employee.show", compact('employee', 'total', 'startDate', 'endDate','supplier'));

    //     //     return view("Employee.employee.index")->with([
    //     //     "startDate" => $startDate,
    //     //     "endDate" => $endDate,
    //     //     "total" => $sales->sum('total_received'),
    //     //     "total" => $sales,
    //     //     "employee" => $sales
    //     // ]);
    // }

    public function restaurant(Request $request)
    {
        $model = str_slug('restaurant','-');
        if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
            if (!empty($keyword)) {
                $restaurant = Restaurant::where('name', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('ranking', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('focalperson', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $restaurant = Restaurant::paginate($perPage);
            }
                        
                    $supplier = Supplier::get();
                    $employee = Employee::get();
                    $users = User::get();
            return view('Restaurant.restaurant.index', compact('restaurant'));
            return view('Restaurant.restaurant.show', compact('restaurant','supplier','employee', 'users'));
        }
        return response(view('403'), 403);
    }

    public function generate_restaurant_fetch(Request $request)
    {
        $restaurant = Restaurant::orderBy('id', 'DESC')->get();
        $user = User::orderBy('id', 'DESC')->get();
        return response()->json([
            'restaurant'=>  $restaurant,
            'user'=>  $user,
        ]);
    }
    public function restaurant_setting(Request $request, $id)
    {
        $model = str_slug('restaurant','-');
        if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
                $restaurant_find = Restaurant::get();
                    $restaurant = Restaurant::findOrFail($id);
                    // if (Auth::user()->hasRole('admin') ||
                    // Auth::user()->hasRole('developer')){
                    // $supplier = Supplier::get();
                    // }
                    // else {
                    //     $supplier = Supplier::where('restaurant_id' , '=', Auth::User()->restaurant_id)->get();
                    // }
                    $supplier = Supplier::where('restaurant_id' , '=', $id)->get();
                    $employee = Employee::get();
                    $user = User::get();
                   $users = User::where('restaurant_id' ,'=', $id)->get();
            return view('Restaurant.restaurant.edit', compact('restaurant','supplier','employee', 'users','user'));
        }
        return response(view('403'), 403);
    }
    public function safe(Request $request)
    {
        // return "here";
        $model = str_slug('safe','-');
        if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
            // $safe_sum = Safe::sum('sum');
            if (!empty($keyword)) {
                $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $safe = Safe::paginate($perPage);
            }
            // if (Auth::user()->hasRole('admin') ||
            //  Auth::user()->hasRole('developer')
            // ) {
            // $safe_sum = Safe::sum('sum');
            // } else {
            //     $safe_sum = Safe::sum('sum');
            // }
            return view('Safe.safe.show', compact('safe'));
        }
        return response(view('403'), 403);
    }
    // public function safe_deposit(Request $request)
    // {
    //     $model = str_slug('safe','-');
    //     if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
    //         $keyword = $request->get('search');
    //         $perPage = 25;
            
    //         $safe_sum = Safe::sum('sum');
    //         if (!empty($keyword)) {
    //             $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
    //             ->orWhere('sum', 'LIKE', "%$keyword%")
    //             ->paginate($perPage);
    //         } else {
    //             $safe = Safe::paginate($perPage);
    //         }
    //         // if (Auth::user()->hasRole('admin') ||
    //         //  Auth::user()->hasRole('developer')
    //         // ) {
    //         // $safe_sum = Safe::sum('sum');
    //         // } else {
    //         //     $safe_sum = Safe::sum('sum');
    //         // }
    //         return view('Safe.safe.show_deposit', compact('safe','safe_sum'));
    //     }
    //     return response(view('403'), 403);

    // }
    // public function safe_payouts(Request $request)
    // {
    //     $model = str_slug('safe','-');
    //     if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
    //         $keyword = $request->get('search');
    //         $perPage = 25;
    //         $safe_sum = Safe::sum('sum');
    //         if (!empty($keyword)) {
    //             $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
    //             ->orWhere('sum', 'LIKE', "%$keyword%")
    //             ->paginate($perPage);
    //         } else {
    //             $safe = Safe::paginate($perPage);
    //         }
    //         // if (Auth::user()->hasRole('admin') ||
    //         //  Auth::user()->hasRole('developer')
    //         // ) {
    //         // $safe_sum = Safe::sum('sum');
    //         // } else {
    //         //     $safe_sum = Safe::sum('sum');
    //         // }
    //         return view('Safe.safe.show_payouts', compact('safe','safe_sum'));
    //     }
    //     return response(view('403'), 403);

    // }

    // public function total_cash(Request $request)
    // {
    //     $model = str_slug('totalcash','-');
    //     if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
    //         $keyword = $request->get('search');
    //         $perPage = 25;

    //         if (!empty($keyword)) {
    //             $totalcash = TotalCash::where('bank_note', 'LIKE', "%$keyword%")
    //             ->orWhere('pieces', 'LIKE', "%$keyword%")
    //             ->orWhere('together_bank_note_pieces', 'LIKE', "%$keyword%")
    //             ->paginate($perPage);
    //         } else {
    //             $totalcash = TotalCash::paginate($perPage);
    //         }

    //         return view('TotalCash.total-cash.show', compact('totalcash'));
    //     }
    //     return response(view('403'), 403);

    // }

    public function expenses(Request $request)
    {
        $model = str_slug('expenses','-');
        if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
            if (!empty($keyword)) {
                $expenses = Expense::where('for_whom', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $expenses = Expense::paginate($perPage);
            }
            return view('Expenses.expenses.show', compact('expenses'));
        }
        return response(view('403'), 403);
    }
    public function employee_salary(Request $request)
    {
        $model = str_slug('employeesalary','-');
        if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
            if (!empty($keyword)) {
                $employeesalary = EmployeeSalary::where('name', 'LIKE', "%$keyword%")
                ->orWhere('number_of_hours', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->orWhere('rate', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $employeesalary = EmployeeSalary::paginate($perPage);
            }
            return view('EmployeeSalary.employee-salary.show', compact('employeesalary'));
        }
        return response(view('403'), 403);

    }
    public function report(Request $request)
    {
        // return 'here';
        $model = str_slug('report','-');
        if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $report = Report::where('total_income', 'LIKE', "%$keyword%")
                ->orWhere('card_transactions', 'LIKE', "%$keyword%")
                ->orWhere('canceled_sale', 'LIKE', "%$keyword%")
                ->orWhere('supplier_cash', 'LIKE', "%$keyword%")
                ->orWhere('bank_cash_total', 'LIKE', "%$keyword%")
                ->orWhere('restaurant_id', 'LIKE', "%$keyword%")
                ->orWhere('report_handler', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $report = Report::paginate($perPage);
            }
                $report = Report::paginate($perPage);
            $supplier = Supplier::get();
            return view('Report.report.show', compact('report', 'supplier'));
        }
        return response(view('403'), 403);
    }

    public function employee(Request $request)
    {
        $model = str_slug('employee','-');
        if(Auth::user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $employee = Employee::where('name', 'LIKE', "%$keyword%")
                ->orWhere('date_of_employment', 'LIKE', "%$keyword%")
                ->orWhere('end_of_work_date', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('restaurant_id', 'LIKE', "%$keyword%")
                ->orWhere('salary', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $employee = Employee::paginate($perPage);
            }

            return view('Employee.employee.show', compact('employee'));
        }
        return response(view('403'), 403);

    }
    // public function suppliers(Request $request)
    // {
    //     $model = str_slug('suppliers','-');
    //     if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
    //         $keyword = $request->get('search');
    //         $perPage = 25;

    //         if (!empty($keyword)) {
    //             $suppliers = Supplier::where('name', 'LIKE', "%$keyword%")
    //             ->orWhere('sum', 'LIKE', "%$keyword%")
    //             ->orWhere('date_of_order', 'LIKE', "%$keyword%")
    //             ->orWhere('date_of_delivery', 'LIKE', "%$keyword%")
    //             ->paginate($perPage);
    //         } else {
    //             $suppliers = Supplier::paginate($perPage);
    //         }

    //         return view('Suppliers.suppliers.index', compact('suppliers'));
    //     }
        
    //     return response(view('403'), 403);
    // }
    // public function export(Request $request)
    // {
    //     return Excel::download(new ReportExport($request->from, $request->to), "report.xlsx");
    // }
    public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
