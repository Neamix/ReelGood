<?php

namespace App\Http\Controllers;

use App\Models\action;
use Auth;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function create(Request $request)
    {
        if(Auth::check()) {
            if($request->ajax()) {
                $action = action::where(['owner'=> Auth::id(),'show'=>$request->show,'action_type'=>$request->type])->get()->first();
                if($action) {
                    $action->delete();
                } else {
                    $action = action::create([
                        'owner' => Auth::id(),
                        'show' => $request->show,
                        'action_type' => $request->type,
                        'show_type' => $request->shtype
                    ]);
                }
           
             }
        } else {
            return 'false';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(action $action)
    {
        //
    }
}
