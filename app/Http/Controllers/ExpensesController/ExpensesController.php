<?php

namespace App\Http\Controllers\ExpensesController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Expense;
use App\ExpenseFile;
use App\Restaurant;
use App\User;

use App\Helpers\AppHelper;
use Config;

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
    public function create($id)
    {
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $restaurant = Restaurant::findOrFail($id);
            $user = User::where('restaurant_id', '=' , $id)->get();
            return view('Expenses.expenses.create', compact('restaurant', 'user'));
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
        $ErrorMsg = "";
        $itemAttachment = [];
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'for_whom' => 'required',
			// 'file' => 'required'
		]);
            $requestData = $request->all();
           $UploadTourImagesPath = Config::get("Constants.attachment_paths.ExpenseFile");
            $expenses = new Expense;
            $expenses->for_whom =    $request->for_whom;
            $expenses->restaurant_id =    $id;
            $expenses->date_of_expense =    $request->date;
            $expenses->sum =    $request->sum;
            $expenses->name =    $request->name;
            

           if ($ErrorMsg == "") {
               $expenses->save();
           }
           if ($request->file) {
               for ($i = 0; $i < count($request->file); $i++) {
                   $SavedTourAttachment = AppHelper::SaveFileAndGetPath($request->file[$i], $UploadTourImagesPath);
   
                   if ($SavedTourAttachment["reply"] == 1) {
                       $itemAttachment[$i] = $SavedTourAttachment["path"];
                    //    $expensesFile = new ExpenseFile();
                    //    $expensesFile->expenses_id =    $expenses->id;
                    //    $expensesFile->expense_name =    $request->name;
                    //    $expensesFile->date_of_issue =    $request->date;
                    //    $expensesFile->save();

                       ExpenseFile::create([
                        "expenses_id" => $expenses->id,
                        "expense_name" => $request->name,
                           "date_of_issue" =>   $request->date,
                           "file" => $itemAttachment[$i],
                           // "user_id" =>  Auth::User()->id
                       ]);

                   } else {
                       $ErrorMsg = $SavedTourAttachment["msg"];
                   }
               }
           }
        //    else {
        //     return redirect('expenses/' . $id)->with('flash_message', 'We found some error!');
        //    }
            // return redirect('expenses/create/' . $id)->with('flash_message', 'Expense added!');
            return redirect('expenses/' . $id)->with('flash_message', 'Expense added!');
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
            // $expensesFileFind = ExpenseFile::get();
            $expensesFile = ExpenseFile::where('expenses_id', '=', $id)->get();
            return view('Expenses.expenses.show', compact('expense', 'expensesFile'));
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
        // return $request;
        // return $id;
        $model = str_slug('expenses','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			// 'for_whom' => 'required',
			// 'sum' => 'required'
		]);

            $expense = Expense::findOrFail($id);
            if ($expense->status == "not download") {
                $expense->status =    "download";
            } else {
                $expense->status =    "not download";
            }
            $expense->save();
            // $requestData = $request->all();
            // $expense = Expense::findOrFail($id);
            // if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
            //     $expense->restaurant_id =     $request->restaurant_id ;
            // } else {
            //     $expense->restaurant_id =     auth()->user()->restaurant_id;
            // }
            // $expense->date_of_expense =    $request->date;
            //  $expense->update($requestData);

             return redirect('expenses/'. $expense->restaurant_id)->with('flash_message', 'Expense updated!');
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

    } public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
