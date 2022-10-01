<?php

namespace App\Http\Controllers\EmployeeController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        $model = str_slug('employee','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
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

            return view('Employee.employee.index', compact('employee'));
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
        $model = str_slug('employee','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('Employee.employee.create');
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
        $model = str_slug('employee','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'date_of_employment' => 'required',
			'telephone' => 'required'
		]);
            $requestData = $request->all();
            
            Employee::create($requestData);
            return redirect('employee')->with('flash_message', 'Employee added!');
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
        $model = str_slug('employee','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $employee = Employee::findOrFail($id);
            return view('Employee.employee.show', compact('employee'));
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
        $model = str_slug('employee','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $employee = Employee::findOrFail($id);
            return view('Employee.employee.edit', compact('employee'));
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
        $model = str_slug('employee','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'date_of_employment' => 'required',
			'telephone' => 'required'
		]);
            $requestData = $request->all();
            
            $employee = Employee::findOrFail($id);
             $employee->update($requestData);

             return redirect('employee')->with('flash_message', 'Employee updated!');
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
        $model = str_slug('employee','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Employee::destroy($id);

            return redirect('employee')->with('flash_message', 'Employee deleted!');
        }
        return response(view('403'), 403);

    }
}
