<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applied = Apply::latest()->paginate(10);
        return view('manager.index',compact('applied'))
        ->with('i',(request()->input('page', 1) - 1)*10 );
       
    }
   
    /**
     * Update  the specified Apply model in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apply  $apply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $apply = Apply::findOrFail($id);
        $apply->update(['status'=>1]);
        return redirect()->back()->with('success','Изменено успешно');
    }
}
