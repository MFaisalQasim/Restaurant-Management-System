<?php

namespace App\Http\Controllers\SafeController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Safe;
use App\User;
use App\Restaurant;
use Illuminate\Http\Request;

class SafeController extends Controller
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
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
                $safe_sum = Safe::sum('sum');
                $perPage = 25;
            if (!empty($keyword)) {
                $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $safe = Safe::paginate($perPage);
            }
            // if (auth()->user()->hasRole('admin') ||
            //  auth()->user()->hasRole('developer')
            // ) {
            // $safe_sum = Safe::sum('sum');
            // }
            //  else {
                // $safe_sum = Safe::sum('sum');
            // }
            return view('Safe.safe.index', compact('safe','safe_sum'));

            // return view('Safe.safe.index', compact('safe'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     $model = str_slug('safe','-');
    //     if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
    //         return view('Safe.safe.create');
    //     }
    //     return response(view('403'), 403);

    // }

    public function create_deposit($id)
    {
        // return 'create_deposit';
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $restaurant = Restaurant::findOrFail($id);
            $user = User::get();
            return view('Safe.safe.create_deposit', compact('restaurant','user'));
        }
        return response(view('403'), 403);

    }
    public function create_payouts($id)
    {
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $restaurant = Restaurant::findOrFail($id);
            $user = User::get();
            return view('Safe.safe.create_payouts', compact('restaurant','user'));
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
    // public function store(Request $request, $restaurant_id)
    // {
    //     $model = str_slug('safe','-');
    //     if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
    //         $this->validate($request, [
	// 		// 'employee_complete_name' => 'required',
	// 		// 'sum' => 'required',
	// 		// 'ty_of_transaction' => 'required',
	// 		'date' => 'required'
	// 	]);
    //         $requestData = $request->all();
    //         // return $request;
    //         // Safe::create($requestData);
    //         $safe = new Safe;
    //         $safe->employee_complete_name =    auth()->user()->name;
    //         $safe->restaurant_id =    $restaurant_id;
    //         $safe->sum =    $request->sum;
    //         $safe->ty_of_transaction =    $request->ty_of_transaction;
    //         $safe->date =    $request->date;
    //         $safe->payment =    $request->deposite;
    //         $safe->paycheck =    $request->payout;
    //         $safe->save();
    //         return redirect('safe/create/'. $restaurant_id)->with('flash_message', 'Safe added!');
    //     }
    //     return response(view('403'), 403);
    // }

    
    public function store_deposit (Request $request, $restaurant_id)
    {
        // return $request;
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			// 'employee_complete_name' => 'required',
			// 'sum' => 'required',
			// 'ty_of_transaction' => 'required',
			// 'date' => 'required'
		]);
            $requestData = $request->all();
            // return $request;
            // Safe::create($requestData);
        // $safe_sum = Safe::where('restaurant_id', '=', $restaurant_id)->sum('sum') ;
        $safe_payment_sum = Safe::where('restaurant_id', '=', $restaurant_id)->sum('payment') ;
        $safe_paycheck_sum = Safe::where('restaurant_id', '=', $restaurant_id)->sum('paycheck') ;
        $safe_sum = $safe_payment_sum -  $safe_paycheck_sum;
            $safe = new Safe;
            $safe->employee_complete_name =     $request->employee_complete_name;
            $safe->restaurant_id =    $restaurant_id;
            $safe->ty_of_transaction =    $request->ty_of_transaction;
            $safe->date =    $request->date;
            $safe->payment =    $request->deposite;
            $safe->paycheck =    $request->payout;
            $safe->sum =    $safe_sum + $request->deposite;
            $safe->save();
            // return redirect('safe/deposit/create/'. $restaurant_id)->with('flash_message', 'Safe added!');
            return redirect('safe/'. $restaurant_id)->with('flash_message', 'Safe added!');
        }
        return response(view('403'), 403);
    }


    
    public function store_payout(Request $request, $restaurant_id)
    {
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			// 'employee_complete_name' => 'required',
			// 'sum' => 'required',
			// 'ty_of_transaction' => 'required',
			// 'date' => 'required'
		]);
        // $safe_sum = Safe::where('restaurant_id', '=', $restaurant_id)->sum('sum') ;
        $safe_payment_sum = Safe::where('restaurant_id', '=', $restaurant_id)->sum('payment') ;
        $safe_paycheck_sum = Safe::where('restaurant_id', '=', $restaurant_id)->sum('paycheck') ;
        $safe_sum = $safe_payment_sum -  $safe_paycheck_sum;
            $requestData = $request->all();
            // return $request;
            // Safe::create($requestData);
            $safe = new Safe;
            $safe->employee_complete_name =    $request->employee_complete_name;
            $safe->restaurant_id =    $restaurant_id;
            $safe->sum =    $safe_sum - $request->payout;
            $safe->ty_of_transaction =    $request->ty_of_transaction;
            $safe->date =    $request->date;
            $safe->payment =    $request->deposite;
            $safe->paycheck =    $request->payout;
            $safe->save();
            // return redirect('safe/payouts/create/'. $restaurant_id)->with('flash_message', 'Safe added!');
            return redirect('safe/'. $restaurant_id)->with('flash_message', 'Safe added!');
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
    // public function show($id)
    // {
    //     $model = str_slug('safe','-');
    //     if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
    //         $safe = Safe::findOrFail($id);
    //         return view('Safe.safe.show', compact('safe'));
    //     }
    //     return response(view('403'), 403);
    // }
    // public function show()
    // {
    //     $model = str_slug('safe','-');
    //     if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
    //         // $safe = Safe::findOrFail($id);
    //         $safe = Safe::get();
    //         return view('Safe.safe.show', compact('safe'));
    //     }
    //     return response(view('403'), 403);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $safe = Safe::findOrFail($id);
            return view('Safe.safe.edit', compact('safe'));
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
        // return  $request;
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			// 'employee_complete_name' => 'required',
			// 'sum' => 'required',
			'date' => 'required'
		]);
            $requestData = $request->all();
            
            $safe = Safe::findOrFail($id);
            $safe->date_of_deposited =    $request->date;
            $safe->payment =    $request->payout;
            $safe->paycheck =    $request->deposite;
            // return $safe->restaurant_id;
             $safe->save();
            //  return redirect()->back();
             return redirect('safe/'. $safe->restaurant_id)->with('flash_message', 'Safe updated!');
            //  return redirect('safe')->with('flash_message', 'Safe updated!');
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
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            $save_restaurant_id = Safe::findOrFail($id)->first("restaurant_id");
            Safe::destroy($id);

            return redirect('safe/'. $save_restaurant_id->restaurant_id)->with('flash_message', 'Safe deleted!');
        }
        return response(view('403'), 403);

    } public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
