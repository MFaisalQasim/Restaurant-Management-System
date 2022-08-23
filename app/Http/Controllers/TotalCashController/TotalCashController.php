<?php

namespace App\Http\Controllers\TotalCashController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\TotalCash;
use Illuminate\Http\Request;

class TotalCashController extends Controller
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
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $totalcash = TotalCash::where('bank_note', 'LIKE', "%$keyword%")
                ->orWhere('pieces', 'LIKE', "%$keyword%")
                ->orWhere('together_bank_note_pieces', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $totalcash = TotalCash::paginate($perPage);
            }

            return view('TotalCash.total-cash.index', compact('totalcash'));
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
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('TotalCash.total-cash.create');
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
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'bank_note' => 'required',
			'together_bank_note_pieces' => 'required'
		]);
            $requestData = $request->all();
            
            // TotalCash::create($requestData);
            $totalcash = new TotalCash;
            $totalcash->bank_note =    $request->bank_note;
            $totalcash->restaurant_id =    $request->restaurant_id;
            $totalcash->together_bank_note_pieces =    $request->together_bank_note_pieces;
            $totalcash->save();
            return redirect('total-cash')->with('flash_message', 'TotalCash added!');
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
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $totalcash = TotalCash::findOrFail($id);
            return view('TotalCash.total-cash.show', compact('totalcash'));
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
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $totalcash = TotalCash::findOrFail($id);
            return view('TotalCash.total-cash.edit', compact('totalcash'));
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
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'bank_note' => 'required',
			'together_bank_note_pieces' => 'required'
		]);
            $requestData = $request->all();
            
            $totalcash = TotalCash::findOrFail($id);
             $totalcash->update($requestData);

             return redirect('total-cash')->with('flash_message', 'TotalCash updated!');
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
        $model = str_slug('totalcash','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            TotalCash::destroy($id);

            return redirect('total-cash')->with('flash_message', 'TotalCash deleted!');
        }
        return response(view('403'), 403);

    }
}
