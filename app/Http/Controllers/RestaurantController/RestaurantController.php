<?php

namespace App\Http\Controllers\RestaurantController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

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
                $restaurant = Restaurant::paginate($perPage);
                // $restaurant = Restaurant::paginate($perPage)->orWhere('id'== auth()->user()->restaurant_id);
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
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'location' => 'required',
			'ranking' => 'required'
		]);
            $requestData = $request->all();
            
            Restaurant::create($requestData);
            return redirect('restaurant')->with('flash_message', 'Restaurant added!');
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
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'location' => 'required',
			'ranking' => 'required'
		]);
            $requestData = $request->all();
            
            $restaurant = Restaurant::findOrFail($id);
             $restaurant->update($requestData);

             return redirect('restaurant')->with('flash_message', 'Restaurant updated!');
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
        $model = str_slug('restaurant','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Restaurant::destroy($id);

            return redirect('restaurant')->with('flash_message', 'Restaurant deleted!');
        }
        return response(view('403'), 403);

    }
}
