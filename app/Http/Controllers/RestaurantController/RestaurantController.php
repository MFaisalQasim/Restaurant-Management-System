<?php

namespace App\Http\Controllers\RestaurantController;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
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
        return $request->get('search');
        // $model = str_slug('restaurant','-');
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
            return view('Restaurant.restaurant.index', compact('restaurant'));
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
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('Restaurant.restaurant.create');
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
        $ErrorMsg = "";
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'location' => 'required',
			'ranking' => 'required'
		]);
        try{
            $requestData = $request->all();
            Restaurant::create($requestData);
            return redirect('restaurant')->with('flash_message', 'Restaurant added!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
        }            return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
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
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $restaurant = Restaurant::findOrFail($id);
            // return 'restaurant';
            // restaurant_idauth()->user()->restaurant_id
            return view('Restaurant.restaurant.show', compact('restaurant'));
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
    public function edit_res($id)
    {
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $restaurant = Restaurant::findOrFail($id);
            return view('Restaurant.restaurant.edit_res', compact('restaurant'));
        }
        return response(view('403'), 403);
    }
    public function edit($id)
    {
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $restaurant = Restaurant::findOrFail($id);
            return view('Restaurant.restaurant.edit', compact('restaurant'));
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
        // return "update here";
        // return $request;
        
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
        //     $this->validate($request, [
		// 	'name' => 'required',
		// 	'location' => 'required',
		// 	'ranking' => 'required'
		// ]);
            // $requestData = $request->all();
            try{
                
            $restaurant = Restaurant::findOrFail($id);
            $restaurant->name =  $request->name;
            $restaurant->location =  $request->location;
            $restaurant->ranking =  $request->ranking;
            $restaurant->see_cash_reports_days =  $request->see_cash_reports_days;
            $restaurant->active_for_this_restaurant =  $request->active_for_this_restaurant;
            $restaurant->save();
            // return $restaurant;
             return redirect('restaurant_setting/'.  $id)->with('flash_message', 'Restaurant updated!');
            } catch (\Throwable $th) {
                return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
            }            return redirect()->back()->with('alert', 'You have enter some wrong or  in complete data!');
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
        // return $id;
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Restaurant::destroy($id);
            return redirect('restaurant')->with('flash_message', 'Restaurant deleted!');
        }
        return response(view('403'), 403);

    } public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
