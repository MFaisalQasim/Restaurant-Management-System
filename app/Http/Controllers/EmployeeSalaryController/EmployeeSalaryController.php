<?php

namespace App\Http\Controllers\EmployeeSalaryController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EmployeeSalary;
use App\Restaurant;
use App\User;
use Auth;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
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

            return view('EmployeeSalary.employee-salary.index', compact('employeesalary'));
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
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $restaurant = Restaurant::findOrFail($id);
            $user = User::where('restaurant_id', '=' , $id)->get();
            $EmployeeSalary = EmployeeSalary::where('restaurant_id', '=' , $id)->get();
            return view('EmployeeSalary.employee-salary.create', compact('restaurant','user', 'EmployeeSalary'));
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
    public function store(Request $request, $id)
    {
        // return $request;
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			// 'name' => 'required',
			// 'restaurant_id' => 'required',
			// 'number_of_hours' => 'required',
			'rate' => 'required',
			'date' => 'required',
			// 'date' => 'required',
			// 'date' => 'required',
			// 'sum' => 'required'
		    ]);
            try{
            // return $request;    
            $requestData = $request->all();
            
            // return $request;
            // EmployeeSalary::create($requestData);
            $bonus_for_what = "Good Will Bonus";
            $bonus_sum = "not paid in cash";
            $employeesalary = new EmployeeSalary;
            $employeesalary->name =  $request->employee_name;
            $employeesalary->restaurant_id =    $id;
            $employeesalary->rate =    $request->rate;
            $employeesalary->number_of_hours =    $request->number_of_hours;
            $employeesalary->start_hour =    $request->start_hour;
            $employeesalary->finish_hour =    $request->finish_hour;
            $employeesalary->date =    $request->date;
            $employeesalary->type =    $request->type;
            $employeesalary->bonus_for_what =    $request->for_what or $bonus_for_what;
            $employeesalary->bonus_sum =    $request->bonus_sum or $bonus_sum or 0;
            $employeesalary->sum =    $request->sum;
            $employeesalary->total_sum =    $request->total_sum or $request->sum;
            if ($request->bonus_sum == null || $request->total_sum) {
                $employeesalary->bonus_sum =    $request->sum;
                $employeesalary->total_sum =    $request->sum;
            }
            
            // return $employeesalary;
            // return "here";
            
            //    if ($ErrorMsg == "") {
                $employeesalary->save();
                // }


                // return redirect('employee-salary/create/'. $id)->with('flash_message', 'EmployeeSalary added!');
                return redirect('employee-salary/'. $id)->with('flash_message', 'EmployeeSalary added!');
                // return view('EmployeeSalary.employee-salary.create', compact('employeesalary'));
            } catch (\Throwable $th) {

                return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
            }            return redirect()->back()->with('alert', 'You have enter some wrong or  in complete    data!');

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
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $employeesalary = EmployeeSalary::findOrFail($id);
            return view('EmployeeSalary.employee-salary.show', compact('employeesalary'));
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
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $employeesalary = EmployeeSalary::findOrFail($id);
            if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
                $user = User::get();
            } else {
                $user = User::where('restaurant_id', '=' , auth()->user()->restaurant_id)->get();
            }
            return view('EmployeeSalary.employee-salary.edit', compact('employeesalary', 'user'));
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
        // return $request; 
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			// 'name' => 'required',
			// 'number_of_hours' => 'required',
			// 'sum' => 'required'
		]);
        
        try{
            $requestData = $request->all();
            
            $employeesalary = EmployeeSalary::findOrFail($id);
            
            // return $request;
            // EmployeeSalary::create($requestData);
            $bonus_for_what = "Good Will Bonus";
            $bonus_sum = "not paid in cash";
            $employeesalary = new EmployeeSalary;
            $employeesalary->name =  $request->employee_name;
            $employeesalary->restaurant_id =    $id;
            $employeesalary->rate =    $request->rate;
            $employeesalary->number_of_hours =    $request->number_of_hours;
            $employeesalary->start_hour =    $request->start_hour;
            $employeesalary->finish_hour =    $request->finish_hour;
            $employeesalary->date =    $request->date;
            $employeesalary->type =    $request->type;
            $employeesalary->bonus_for_what =    $request->for_what or $bonus_for_what;
            $employeesalary->bonus_sum =    $request->bonus_sum or $bonus_sum or 0;
            $employeesalary->sum =    $request->sum;
            $employeesalary->total_sum =    $request->total_sum or $request->sum;
            if ($request->bonus_sum == null || $request->total_sum) {
                $employeesalary->bonus_sum =    $request->sum;
                $employeesalary->total_sum =    $request->sum;
            }
            
            // return $employeesalary;
            // return "here";
            
            //    if ($ErrorMsg == "") {
                $employeesalary->save();
                // }


            // $employeesalary->update($requestData);
            // return $employeesalary;
            //  return redirect('employee-salary')->with('flash_message', 'EmployeeSalary updated!');
             return redirect()->back()->with('flash_message', 'EmployeeSalary updated!');
             
            } catch (\Throwable $th) {
                return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
            }            return redirect()->back()->with('alert', 'You have enter some wrong or  in complete    data!');
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
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            EmployeeSalary::destroy($id);
            // return redirect('employee-salary')->with('flash_message', 'EmployeeSalary deleted!');
            return redirect()->back()->with('flash_message', 'EmployeeSalary deleted!');
        }
        return response(view('403'), 403);

    } public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
