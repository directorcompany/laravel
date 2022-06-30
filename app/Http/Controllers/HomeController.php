<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Apply;
use App\Models\User;
use Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index');
    }
    /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
        
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required',
            'message' => 'required',
            'file' => 'required|png,jpeg,jpg,pdf',
            'status' => 'required'
        ]);
    }    
    /**
     * Checking date every 24 hour
     *
     * @return boolean
     */
    public function check() {
        $id = auth()->id();
        $value=0;
        $data = User::find($id)->applies;
        // $apply = Apply::where('created_at','>=',now()->subDay()->toDateTimeString())->get();
        foreach($data as $elem) {
            if($elem->created_at >= (now()->subDay()->toDateTimeString()))  $value++;
        }
        return $value > 0 ? false : true;
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->check()) {
        $input = $request->all();
        $this->validator($input);
        $input['user_id']=Auth::id();
        $input['status']=0;
        if ($request->hasFile('file')) 
        {

            $fileName = time().'.'.$request->file->extension();  
   
            $request->file->move(public_path('uploads'), $fileName);
        }
           
            $input['file']=$fileName;
            $user = Apply::create($input);
    
        return redirect()->route('home')
                        ->with('success','Заява успешно оправлено');
        }
        else {
            return redirect()->route('home')
            ->with('warning','Вы не можете добавить данные');
        }
    }    
    /**
     * Output view error
     *
     * @return 
     */
    public function middle() {
        return view('errors.error');
    }

}
