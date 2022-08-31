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
        // return 'here';
        // return 'generate_safe';
        // $this->validate($request, [
        //     "from" => "required",
        //     "to" => "required"
        // ]);
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
         $safe = Safe::whereBetween("created_at", [$startDate, $endDate])
        ->get();
        $total = $safe;
        if (auth()->user()->hasRole('admin') ||
         auth()->user()->hasRole('developer')
        ) {
            
        $safe_sum = Safe::sum('sum');
        } else {
            $safe_sum = Safe::sum('sum');
        }
        
        // ->where("payment_status", "paid")
        return view("Safe.safe.show", compact('safe', 'total', 'startDate', 'endDate', 'safe_sum'));

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


    public function restaurant(Request $request)
    {
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
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
                $restaurant_find = Restaurant::get();
                // return Auth::User()->restaurant_id;
                // return $restaurant_here = Restaurant::Where( 'id' , '=' , Auth::User()->restaurant_id )->get();
                foreach ($restaurant_find as $key => $value) {
                    $restaurant = (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) ? Restaurant::paginate($perPage) : Restaurant::Where( 'id' , '=' , auth()->user()->restaurant_id )->paginate($perPage) ;
                    // $restaurant = Restaurant::Where( 'id' , '=' , auth()->user()->restaurant_id )->paginate($perPage);
                 }
            }
            return view('Restaurant.restaurant.show', compact('restaurant'));
        }
        return response(view('403'), 403);
    }
    public function safe(Request $request)
    {
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
            if (!empty($keyword)) {
                $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $safe = Safe::paginate($perPage);
            }
            if (auth()->user()->hasRole('admin') ||
             auth()->user()->hasRole('developer')
            ) {
            $safe_sum = Safe::sum('sum');
            } else {
                $safe_sum = Safe::sum('sum');
            }
            return view('Safe.safe.show', compact('safe','safe_sum'));
        }
        return response(view('403'), 403);

    }

    public function safe_deposit(Request $request)
    {
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
            if (!empty($keyword)) {
                $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $safe = Safe::paginate($perPage);
            }
            if (auth()->user()->hasRole('admin') ||
             auth()->user()->hasRole('developer')
            ) {
            $safe_sum = Safe::sum('sum');
            } else {
                $safe_sum = Safe::sum('sum');
            }
            return view('Safe.safe.show_deposit', compact('safe','safe_sum'));
        }
        return response(view('403'), 403);

    }
    public function safe_payouts(Request $request)
    {
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;
            if (!empty($keyword)) {
                $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $safe = Safe::paginate($perPage);
            }
            if (auth()->user()->hasRole('admin') ||
             auth()->user()->hasRole('developer')
            ) {
            $safe_sum = Safe::sum('sum');
            } else {
                $safe_sum = Safe::sum('sum');
            }
            return view('Safe.safe.show_payouts', compact('safe','safe_sum'));
        }
        return response(view('403'), 403);

    }
    public function total_cash(Request $request)
    
    {
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $totalcash = TotalCash::where('bank_note', 'LIKE', "%$keyword%")
                ->orWhere('pieces', 'LIKE', "%$keyword%")
                ->orWhere('together_bank_note_pieces', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $totalcash = TotalCash::paginate($perPage);
            }

            return view('TotalCash.total-cash.show', compact('totalcash'));
        }
        return response(view('403'), 403);

    }

    public function expenses(Request $request)
    {
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
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
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
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
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
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

            return view('Report.report.show', compact('report'));
        }
        return response(view('403'), 403);

    }

    public function export(Request $request)
    {
        return Excel::download(new ReportExport($request->from, $request->to), "report.xlsx");
    }
}
