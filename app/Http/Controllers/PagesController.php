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
use Illuminate\Support\Facades\Validator;


class PagesController extends Controller
{
    
    public function HomePage()
    {
        return view('frontend.homepage');
    }
}
