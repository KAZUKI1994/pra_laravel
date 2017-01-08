<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function about(){
      // 変数宣言ver1
      // $name = 'Kazuki <span style="color: red">Higashiguchi</span>';
      // return view('pages.about')->with('name', $name);

      /* 変数宣言ver2
      return view('pages.about')->with([
        'first' => 'Kazuki',
        'last' => 'Higashiguchi',
      ]); */

      /* 変数宣言ver3
      $data = [];
      $data['first'] = 'Kazuki';
      $data['last'] = 'Higashiguchi';
      return view('pages.about', $data);
      */

      $first = 'Kazuki';
      $last = 'Higashiguchi';
      $people = [
        'Taylor Otwell', 'Dayle Rees', 'Eric Barnes'
      ];
      return view('pages.about', compact('first', 'last', 'people'));
    }

    public function contact(){
      return view('pages.contact');
    }

}
