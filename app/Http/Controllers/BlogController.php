<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use App\News;
use App\AboutU;
use App\Best;
use App\Testimonial;
use App\GameLevel;
use App\GameRegion;
use App\Order;
use App\Game;
use App\GameRole;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    private $tags;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        if(auth()->user()->permissions()->where('name','=','view-blog')->first()!= null) {
            // Grab all the blogs
            $blogs = Blog::all();
            // Show the page
            return view('blog.index', compact('blogs'));
        }
        return response(view('403'), 403);
    }

    
    public function create()
    {
        if(auth()->user()->permissions()->where('name','=','add-blog')->first()!= null) {
            $blogcategory = BlogCategory::select('title','id')->get();
            return view('blog.create', compact('blogcategory'));
        }
        return response(view('403'), 403);
    }

   
    public function store(Request $request)
    {
        if(auth()->user()->permissions()->where('name','=','add-blog')->first()!= null) {
            $this->validate($request,[
                'title' => 'required|min:3',
                'content' => 'required|min:3',
                'blog_category_id' => 'required',
            ],
                [
                    'blog_category_id.required' => 'Please select category'
                ]);
            $blog = new Blog($request->except('files','image','tags'));
            $blog->slug = str_slug($request->title);
            $message=$request->get('content');
            $dom = new \DOMDocument();
            $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            // foreach <img> in the submited message
            foreach($images as $img){

                $src = $img->getAttribute('src');
                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];
                    // Generating a random filename
                    $filename = uniqid();
                    $filepath = storage_path("/app/public/uploads/blog/$filename.$mimetype");
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        // resize if required
                        /* ->resize(300, 200) */
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save($filepath);
                    $new_src = asset("storage/uploads/blog/$filename.$mimetype");
                    $dirname = dirname($filename);

                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                } // <!--endif
            } // <!-
            $blog->content = $dom->saveHTML();

            $picture = "";

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->extension()?: 'png';
                $picture = str_random(10) . '.' . $extension;
                $destinationPath = storage_path("/app/public/uploads/blog/");
                $file->move($destinationPath, $picture);
                $blog->image = $picture;

            }
            $blog->user_id = auth()->user()->id;
            $blog->save();

            //Adding tags
            if($request->tags != null){
                $tag_ids = [];
                $tags = explode(',',$request->tags);
                foreach ($tags as $item){
                    $tag =  Tag::where('slug','=',str_slug($item,'-'))->first();
                    if($tag == null){
                        $tag = new Tag();
                        $tag->name = $item;
                        $tag->slug = str_slug($item,'-');
                        $tag->save();
                    }
                    $tag_ids[]= $tag->id;
                }
                if($tag_ids != null){
                    $blog->tags()->attach($tag_ids);
                }
            }

            if ($blog->id) {
                return redirect('/blog')->with('success', 'Blog created successfully');
            } else {
                return redirect('/blog')->withInput()->with('error', trans('blog/message.error.create'));
            }
        }
        return response(view('403'), 403);
    }


   
    public function show(Request $request)
    {
        if(auth()->user()->permissions()->where('name','=','view-blog')->first()!= null) {
            $blog = Blog::find($request->id);
            $comments = $blog->comments;
            $tags = $blog->tags()->pluck('name')->implode(', ');
            return view('blog.show', compact('blog', 'comments', 'tags'));
        }
        return response(view('403'), 403);
    }

    
    public function edit(Request $request)
    {
        if(auth()->user()->permissions()->where('name','=','edit-blog')->first()!= null) {
            $blog = Blog::where('id','=',$request->id)->first();
            $blogcategory = BlogCategory::select('title','id')->get();
            if(count($blog->tags) > 0){
                $tags = $blog->tags()->pluck('name')->implode(', ');
            }else{
                $tags = '';
            }
            return view('blog.edit', compact('blog', 'blogcategory','tags'));
        }
        return response(view('403'), 403);
    }

  
    public function update(Request $request)
    {
        if(auth()->user()->permissions()->where('name','=','edit-blog')->first()!= null) {

            $this->validate($request,[
                'title' => 'required|min:3',
                'content' => 'required|min:3',
                'blog_category_id' => 'required',
            ],
                [
                    'blog_category_id.required' => 'Please select category'
                ]);

            $blog = Blog::findOrfail($request->id);
            $blog->slug = str_slug($request->title);
            $blog->save();

            $message=$request->get('content');
            libxml_use_internal_errors(true);
            $dom = new \DOMDocument();
            $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            // foreach <img> in the submited message
            foreach($images as $img){
                $src = $img->getAttribute('src');
                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];
                    // Generating a random filename
                    $filename = uniqid();
                    info($filename);
                    $filepath =storage_path("/app/public/uploads/blog/$filename.$mimetype");
                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save($filepath);
                    $new_src = asset("storage/uploads/blog/$filename.$mimetype");
                } // <!--endif
                else{
                    $new_src=$src;
                }
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!-
            $blog->content = $dom->saveHTML();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->extension()?: 'png';
                $picture = str_random(10) . '.' . $extension;
                $destinationPath = storage_path('app/public/uploads/blog');
                $file->move($destinationPath, $picture);
                $blog->image = $picture;
                $blog->save();
            }

            if($request->tags != null){
                $tag_ids = [];
                $tags = explode(',',$request->tags);
                foreach ($tags as $item){
                    $tag =  Tag::where('slug','=',str_slug($item,'-'))->first();
                    if($tag == null){
                        $tag = new Tag();
                        $tag->name = $item;
                        $tag->slug = str_slug($item,'-');
                        $tag->save();
                    }
                    $tag_ids[]= $tag->id;
                }
                if($tag_ids != null){
                    $blog->tags()->detach();
                    $blog->tags()->attach($tag_ids);
                }
            }


            if ($blog->update($request->except('content','image','files','_method', 'tags'))) {
                return redirect('/blog')->with('success', 'Blog updated');
            } else {
                return redirect('/blog')->withInput()->with('error', 'Something went wrong');
            }
        }
        return response(view('403'), 403);
    }

    
    public function destroy(Request $request)
    {
        if(auth()->user()->permissions()->where('name','=','delete-blog')->first()!= null) {
            $blog = Blog::findOrfail($request->id);
            if($blog != null){
                $blog->delete();
                return redirect('blog')->with('success', 'Blog deleted');
            }else{
                return redirect('blog')->withInput()->with('error', 'Something went wrong');
            }
        }
        return response(view('403'), 403);

    }

    
    public function storeComment(Request $request)
    {
        $this->validate($request,[
            'comment' => 'required|min:3',
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);
        $blog = Blog::findOrfail($request->id);
        $blogcooment = new BlogComment($request->all());
        $blogcooment->blog_id = $blog->id;
        $blogcooment->save();
        return redirect('/blog/view/' . $blog->id );
    }

    // public function getBlogList(){
    //     $news = News::skip(0)->take(5)->orderBY('id','DESC')->get();
    //     $bests = Best::skip(0)->take(3)->orderBy('id','DESC')->get();
    //     $aboutus = AboutU::skip(0)->take(5)->orderBy('id','DESC')->get();
    //     return view('blog.frontend.blog-list',compact('news','aboutus','bests'));
    // }

    

    public function getBlog($slug){
        $blog = Blog::where('slug','=',$slug)->first();
        if($blog != null){
            $comments = $blog->comments;
            $tags = $blog->tags()->pluck('name')->implode(', ');
            return view('blog.frontend.show', compact('blog', 'comments', 'tags'));
        }else{
            return response(view(404),404);
        }
    }



    public function getCategoryBlog($slug){
        $category = BlogCategory::where('slug','=',$slug)->first();
        $blogs = $category->blogs()->paginate(10);
        if($category != null){
            return view('blog.frontend.category-blogs', compact('blogs','category'));
        }else{
            return response(view(404),404);
        }
    }

   

    public function getTagBlog($slug){
        $tag = Tag::where('slug','=',$slug)->first();
        if($tag != null){
            $blogs = $tag->blogs()->paginate(10);
            return view('blog.frontend.tag-blogs', compact('blogs', 'tag'));
        }else{
            return response(view(404),404);
        }
    }

    public function getAuthorBlog($id){
        $author = User::findOrfail($id);
        if($author != null){
            $blogs = $author->blogs()->paginate(10);
            return view('blog.frontend.author-blogs', compact('blogs', 'author'));
        }else{
            return response(view(404),404);
        }
    }
    

    public function AboutUs()
    {

        $blogs = Testimonial::all(); 
        return view('pages.aboutUs',compact('blogs'));
    }
    public function Jobs()
    {
        return view('pages.jobs');
    }

    public function Reviews()
    {
        return view('pages.reviews');
    }
    // public function CS_GO($slug)
    // {

    //     $levels    = GameLevel::where('game_id',1)->get();
    //     $regions   = GameRegion::where('game_id',1)->get();
    //     $bg_img    = Game::select('image','is_role')->where('id',1)->first();
    //     $gameroles = GameRole::where('game_id',1)->get();

    //     // dd($bg_img);
    //     return view('pages.cs_go',compact('levels','regions','bg_img','gameroles'));
    // }
    // public function OverWatch()
    // {
    //     return view('pages.overwatch');
    // }
    public function EloBoost()
    {
        return view('pages.EloBoost');
    }
    public function PlacementGames()
    {
        return view('pages.PlacementGames');
    }
    public function FAQ()
    {
        return view('pages.FAQ');
    }
    public function TermsOfService()
    {
        return view('pages.TermsOfService');
    }
    public function PrivacyPolicy()
    {
        return view('pages.PrivacyPolicy');
    }

    public function News()
    {
        $news = News::get();
        return view('pages.news',compact('news'));
    }

    public function CS_GO_Submit(Request $request)
    {

        // dd($request);
        $validator = Validator::make($request->all(), [
            // 'mylevel'   => 'required',
            // 'gamelevel' => 'required',
            'username'  => 'required',
            'password' => 'required',
            'steam_account'    => 'required',
            'region' => 'required',
           
        ]);

        if ($validator->fails()) {
            return redirect('cs-go')
                        ->withErrors($validator)
                        ->withInput();
        }


       $order = new Order();
       $order->game_id       = $request->gameId;
       $order->user_level    = $request->mylevel;
       $order->desired_level = $request->gamelevel;
       $order->username      = $request->username;
       $order->password      = $request->password;
       $order->steam_account = $request->steam_account;
       $order->region        = $request->region;
       $order->skype         = $request->skype;
       $order->game_price    = $request->gamepricing;
       $order->duo_price     = $request->duopricing;
       $order->total         = $request->grandtotal;
       $order->is_duo        = $request->duoboost;
       $order->date          = date('Y-m-d');
       $order->save();

       return redirect('cs-go');

    }


}
