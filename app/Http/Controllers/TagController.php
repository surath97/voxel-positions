<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
    * Handle the incoming request.
    */
    public function __invoke(Tag $tag)
    {

        return view('results', [ 
            'jobs' => $tag->jobs,
            'q' => $tag->name,
        ]);
    }

}
