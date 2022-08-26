<?php

namespace App\Http\Controllers\SuppliersController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
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
        $model = str_slug('suppliers','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $suppliers = Supplier::where('name', 'LIKE', "%$keyword%")
                ->orWhere('sum', 'LIKE', "%$keyword%")
                ->orWhere('date_of_order', 'LIKE', "%$keyword%")
                ->orWhere('date_of_delivery', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $suppliers = Supplier::paginate($perPage);
            }

            return view('Suppliers.suppliers.index', compact('suppliers'));
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
        $model = str_slug('suppliers','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('Suppliers.suppliers.create');
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
        $model = str_slug('suppliers','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'sum' => 'required',
			'date_of_order' => 'required'
		]);
            $requestData = $request->all();
            // Supplier::create($requestData);
            $supplier = new Supplier;
            $supplier->name =  $request->name;
            $supplier->sum =  $request->sum;
            $supplier->date_of_order =  $request->date_of_order;
            $supplier->date_of_delivery =  $request->date_of_delivery;
            // $supplier->name =  $request->name;
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
            $supplier->restaurant_id =     $request->restaurant_id ;
        } else {
            $supplier->restaurant_id =     auth()->user()->restaurant_id;
        }
        $supplier->save();
            return redirect('suppliers')->with('flash_message', 'Supplier added!');
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
        $model = str_slug('suppliers','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $supplier = Supplier::findOrFail($id);
            return view('Suppliers.suppliers.show', compact('supplier'));
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
        $model = str_slug('suppliers','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $supplier = Supplier::findOrFail($id);
            return view('Suppliers.suppliers.edit', compact('supplier'));
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
        $model = str_slug('suppliers','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'sum' => 'required',
			'date_of_order' => 'required'
		]);
            $requestData = $request->all();
            
            $supplier = Supplier::findOrFail($id);
            if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('developer')) {
                $supplier->restaurant_id =     $request->restaurant_id ;
            } else {
                $supplier->restaurant_id =     auth()->user()->restaurant_id;
            }
             $supplier->update($requestData);

             return redirect('suppliers')->with('flash_message', 'Supplier updated!');
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
        $model = str_slug('suppliers','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Supplier::destroy($id);

            return redirect('suppliers')->with('flash_message', 'Supplier deleted!');
        }
        return response(view('403'), 403);

    } public function callAction($method, $parameters)
    {
        return parent::callAction($method, array_values($parameters));
    }
}
