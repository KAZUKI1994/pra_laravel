<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller{

  public function show(Tag $tag){

    return $tag->articles();
  }
}
