<?php

namespace App\Http\Controllers\EmployeeSalaryController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EmployeeSalary;
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
    public function create()
    {
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('EmployeeSalary.employee-salary.create');
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
    public function store(Request $request)
    {
        return $request;

        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			// 'restaurant_id' => 'required',
			// 'number_of_hours' => 'required',
			'rate' => 'required',
			'date' => 'required',
			'date' => 'required',
			'date' => 'required',
			// 'sum' => 'required'
		]);
            $requestData = $request->all();
            
            // return $request;
            // EmployeeSalary::create($requestData);
            $employeesalary = new EmployeeSalary;
            $employeesalary->name =    $request->name;
            $employeesalary->restaurant_id =    $request->restaurant_id or Auth::User()->restaurant_id;
            $employeesalary->rate =    $request->rate;
            $employeesalary->number_of_hours =    $request->number_of_hours;
            $employeesalary->start_hour =    $request->start_hour;
            $employeesalary->finish_hour =    $request->finish_hour;
            $employeesalary->date =    $request->date;
            $employeesalary->type =    $request->type;
            $employeesalary->for_what =    $request->for_what;
            $employeesalary->bonus_sum =    $request->bonus_sum;
            $employeesalary->sum =    $request->sum;
            $employeesalary->save();
            return redirect('employee-salary')->with('flash_message', 'EmployeeSalary added!');
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
            return view('EmployeeSalary.employee-salary.edit', compact('employeesalary'));
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
        $model = str_slug('employeesalary','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			// 'number_of_hours' => 'required',
			// 'sum' => 'required'
		]);
            $requestData = $request->all();
            
            $employeesalary = EmployeeSalary::findOrFail($id);
            if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
                $employeesalary->restaurant_id =     $request->restaurant_id ;
            } else {
                $employeesalary->restaurant_id =     auth()->user()->restaurant_id;
            }
            $employeesalary->update($requestData);

             return redirect('employee-salary')->with('flash_message', 'EmployeeSalary updated!');
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

            return redirect('employee-salary')->with('flash_message', 'EmployeeSalary deleted!');
        }
        return response(view('403'), 403);

    } public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
