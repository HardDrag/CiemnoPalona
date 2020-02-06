<?php

namespace App\Http\Controllers;

use App\Site;
use App\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Routing\Redirector;

class SitesController extends Controller
{
    public function __construct()
    {
        //$this -> middleware('auth');
    }

    public function index() 
    {
        $coffees = Coffee::all();

        return view('sites.index', compact('coffees'));
    }

    public function add() 
    {
        $sites = Site::all();
        
        return view('sites.add', compact('sites'));
    }

    public function about()
    {
        return view('sites.about');
    }

    public function save(Request $request) 
    {
        $current_date = date('Y-m-d H:i:s');
        $check = $request->input('check');

        if ($check === NULL) {
            return redirect('')->with('popup', 'open');;
        }

        DB::table('coffee');
        $sum = 0;
        $names = [];
        foreach ($check as $key => $ck) {
            $coff = coffee::find($ck)->price;
            $name = coffee::find($ck)->type;
            $names = Arr::add($names, $key, $name);
            $sum += $coff;
        }

        $site = new Site();
        $site->title = implode(', ', $names);
        $site->user_id = auth()->user()->id;
        $site->price = $sum;
        $site->date = $current_date;
        $site->save();
        return redirect('add');
    }

    public function show(Site $site) 
    {   
        return view('sites.show', compact('site'));
    }

    public function destroy($id) {
        DB::delete('delete from sites where id = ?',[$id]);
        return redirect('add');
    }

    public function edit($id){
        $site = site::find($id);
        return view('sites.edit', compact('site'));
    }
    public function update(Request $request,$id){
        $site = site::find($id);
        $current_date = date('Y-m-d H:i:s');
        $check = $request->input('check');

        if ($check === NULL) {
            return redirect(route('site.edit',$site->id))->with('popup', 'open');
        }

        DB::table('coffee');
        $sum = 0;
        $names = [];
        foreach ($check as $key => $ck) {
            $coff = coffee::find($ck)->price;
            $name = coffee::find($ck)->type;
            $names = Arr::add($names, $key, $name);
            $sum += $coff;
        }
        $site->title = implode(', ', $names);
        $site->user_id = auth()->user()->id;
        $site->price = $sum;
        $site->date = $current_date;
        $site->save();
        return redirect('add');
    }

}
