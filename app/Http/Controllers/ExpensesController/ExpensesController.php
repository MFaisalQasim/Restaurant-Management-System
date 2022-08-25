<?php

namespace App\Http\Controllers\ExpensesController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
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

            return view('Expenses.expenses.index', compact('expenses'));
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
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('Expenses.expenses.create');
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
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'for_whom' => 'required',
			// 'sum' => 'required'
		]);
            $requestData = $request->all();
            // return $request;
            // Expense::create($requestData);
            $expenses = new Expense;
            $expenses->for_whom =    $request->for_whom;
            $expenses->restaurant_id =    $request->restaurant_id;
            $employeesalary->date_of_expense =    $request->date;
            $expenses->sum =    $request->sum;
            $expenses->save();
            return redirect('expenses')->with('flash_message', 'Expense added!');
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
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $expense = Expense::findOrFail($id);
            return view('Expenses.expenses.show', compact('expense'));
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
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $expense = Expense::findOrFail($id);
            return view('Expenses.expenses.edit', compact('expense'));
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
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'for_whom' => 'required',
			// 'sum' => 'required'
		]);
            $requestData = $request->all();
            
            $expense = Expense::findOrFail($id);
            if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
                $expense->restaurant_id =     $request->restaurant_id ;
            } else {
                $expense->restaurant_id =     auth()->user()->restaurant_id;
            }
            $expense->date_of_expense =    $request->date;
             $expense->update($requestData);

             return redirect('expenses')->with('flash_message', 'Expense updated!');
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
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Expense::destroy($id);

            return redirect('expenses')->with('flash_message', 'Expense deleted!');
        }
        return response(view('403'), 403);

    }
}
