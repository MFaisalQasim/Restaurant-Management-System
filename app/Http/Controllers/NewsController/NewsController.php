<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('news','-');

        // dd($model);
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null){
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $news = News::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $news = News::paginate($perPage);
            }

            return view('news.news.index', compact('news'));
        }
        return response(view('403'), 403);

    }

    
    public function create()
    {
        $model = str_slug('news','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('news.news.create');
        }
        return response(view('403'), 403);

    }

    
    public function store(Request $request)
    {
        $model = str_slug('news','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'image' => 'required'
		]);
            $requestData = $request->all();

            // dd(APP_URL);
               
            if($request->hasFile("image")){
                $fileNameWithExt    = $request->file("image")->getClientOriginalName();
                $filename           = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension          = $request->file("image")->getClientOriginalExtension();
                $testingImage       = $filename."_".time().".".$extension;
                $path               = $request->file("image")->storeAs("public/NewsImages", $testingImage);
            }else{
                $testingImage = "default.jpg";
            }

            // dd($testingImage);
            $que = new News();
            $que->title = $request->title;
            $que->description =  $request->description;
            $que->image = $testingImage;
            $que->save();
            
            // News::create($requestData);
            return redirect('news/news')->with('flash_message', 'News added!');
        }
        return response(view('403'), 403);
    }

    public function show($id)
    {
        $model = str_slug('news','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $news = News::findOrFail($id);
            return view('news.news.show', compact('news'));
        }
        return response(view('403'), 403);
    }

   
    public function edit($id)
    {
        $model = str_slug('news','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $news = News::findOrFail($id);
            return view('news.news.edit', compact('news'));
        }
        return response(view('403'), 403);
    }

   
    public function update(Request $request, $id)
    {
        $model = str_slug('news','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'image' => 'required'
		]);
            // $requestData = $request->all();
            // $news = News::findOrFail($id);
            //  $news->update($requestData);

            if($request->hasFile("image")){
                $fileNameWithExt    = $request->file("image")->getClientOriginalName();
                $filename           = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension          = $request->file("image")->getClientOriginalExtension();
                $testingImage       = $filename."_".time().".".$extension;
                $path               = $request->file("image")->storeAs("public/NewsImages", $testingImage);
            }else{
                $testingImage = "default.jpg";
            }

            $que = News::find($id);
            $que->title = $request->title;
            $que->description =  $request->description;
            $que->image = $testingImage;
            $que->save();

             return redirect('news/news')->with('flash_message', 'News updated!');
        }
        return response(view('403'), 403);

    }

    public function destroy($id)
    {
        $model = str_slug('news','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            News::destroy($id);

            return redirect('news/news')->with('flash_message', 'News deleted!');
        }
        return response(view('403'), 403);

    }
}
