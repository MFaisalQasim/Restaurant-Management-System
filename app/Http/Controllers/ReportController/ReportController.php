<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use App\Report;
use App\Supplier;
use App\TotalCash;
use Illuminate\Http\Request;

use App\Expense;
use App\EmployeeSalary;
use App\Restaurant;
use App\User;
use Carbon;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
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

            return view('Report.report.index', compact('report'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        // return "here";
        $model = str_slug('report','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            // $supplier = Supplier::get();
            $supplier = Supplier::where('restaurant_id','=',$id)->get();
            $total_cash = TotalCash::get();
            $restaurant = Restaurant::findOrFail($id);
            $user = User::where('restaurant_id', '=' , $id)->get();

             $expense_today = Expense::whereRaw('Date(created_at) = CURDATE()')->sum('sum');

             $employee_salary_paid_today = EmployeeSalary::whereRaw('Date(created_at) = CURDATE()')->where('type', '=' ,"Paid in cash")->sum('sum');
            
            // return [$expense_today, $employee_salary_paid_today];
             
            return view('Report.report.create', compact('supplier','total_cash', 'expense_today', 'employee_salary_paid_today', 'restaurant','user'));
        }
        return response(view('403'), 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request,$id)
    {
        // return $request;
        $ErrorMsg = "";
        $model = str_slug('report','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'date' => 'required',
			'total_income' => 'required',
			'card_transactions' => 'required',
			'sales_volume_supplier' => 'required',
			'total_bank_note_sum' => 'required',
			'cash' => 'required',
		]);
        try {
            $requestData = $request->all();
            $report= new Report;
            $report->total_income =  $request->total_income;
            $report->card_transactions =  $request->card_transactions;
            $report->canceled_sale =  $request->canceled_sale;
            $report->supplier_cash =  $request->sales_volume_supplier;
            $report->bank_cash_total =  $request->total_bank_note_sum;
            $report->expense_today =  $request->expense_today;
            $report->employee_salary_paid_today =  $request->employee_salary_paid_today;
            $report->cash =  $request->cash;
            $report->date =  $request->date;
            $report->status =  $request->total_bank_note_sum - $request->cash ;
            $report->restaurant_id =  $id;
            $report->report_handler =   $request->name;
            // if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
            //     $report->restaurant_id =     $request->restaurant_id ;
            // } else {
            //     $report->restaurant_id =     auth()->user()->restaurant_id;
            // }
           if ($ErrorMsg == "") {
            $report->save();
            }
            return redirect('report/'. $id)->with('flash_message', 'Report added!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
        }
        return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('report','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $report = Report::findOrFail($id);
            return view('Report.report.show', compact('report'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('report','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $report = Report::findOrFail($id);
            return view('Report.report.edit', compact('report'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('report','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			// 'restaurant_id' => 'required'
		]);
        try {
            $requestData = $request->all();
            
            $report = Report::findOrFail($id);

             if ($ErrorMsg == "") {
                $report->update($requestData);
              }
              return redirect('report/'. $id)->with('flash_message', 'Report updated!');
          } catch (\Throwable $th) {
              return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
          }
          return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('report','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Report::destroy($id);

            return redirect('report')->with('flash_message', 'Report deleted!');
        }
        return response(view('403'), 403);

    }
     public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
