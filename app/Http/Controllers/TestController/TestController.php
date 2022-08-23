<?php

namespace App\Http\Controllers\TestController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
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
        $model = str_slug('test','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $test = Test::where('test', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $test = Test::paginate($perPage);
            }

            return view('Test.test.index', compact('test'));
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
        $model = str_slug('test','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('Test.test.create');
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
        $model = str_slug('test','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            Test::create($requestData);
            return redirect('test')->with('flash_message', 'Test added!');
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
        $model = str_slug('test','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $test = Test::findOrFail($id);
            return view('Test.test.show', compact('test'));
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
        $model = str_slug('test','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $test = Test::findOrFail($id);
            return view('Test.test.edit', compact('test'));
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
        $model = str_slug('test','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            $test = Test::findOrFail($id);
             $test->update($requestData);

             return redirect('test')->with('flash_message', 'Test updated!');
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
        $model = str_slug('test','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Test::destroy($id);

            return redirect('test')->with('flash_message', 'Test deleted!');
        }
        return response(view('403'), 403);

    }
}
