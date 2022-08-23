<?php

namespace App\Http\Controllers\SafeController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Safe;
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
            $perPage = 25;

            if (!empty($keyword)) {
                $safe = Safe::where('employee_complete_name', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $safe = Safe::paginate($perPage);
            }

            return view('Safe.safe.index', compact('safe'));
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
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('Safe.safe.create');
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
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'employee_complete_name' => 'required',
			'sum' => 'required'
		]);
            $requestData = $request->all();
            // return $request;
            // Safe::create($requestData);
            $safe = new Safe;
            $safe->employee_complete_name =    $request->employee_complete_name;
            $safe->restaurant_id =    $request->restaurant_id;
            $safe->sum =    $request->sum;
            $safe->save();
            return redirect('safe')->with('flash_message', 'Safe added!');
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
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $safe = Safe::findOrFail($id);
            return view('Safe.safe.show', compact('safe'));
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
        $model = str_slug('safe','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'employee_complete_name' => 'required',
			'sum' => 'required'
		]);
            $requestData = $request->all();
            
            $safe = Safe::findOrFail($id);
             $safe->update($requestData);

             return redirect('safe')->with('flash_message', 'Safe updated!');
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
            Safe::destroy($id);

            return redirect('safe')->with('flash_message', 'Safe deleted!');
        }
        return response(view('403'), 403);

    }
}
