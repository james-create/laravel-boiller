<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
    $this->middleware('preventBackHistory');
    $this->middleware('IsActive');
    // $this->middleware('isAdmin');
    $this->middleware('2fa');
    

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Profile::where('user_id', auth()->user()->id )->exists()) {
            return redirect('/profile/create')->with('info','create your profile '); 
         }
        $data=Profile::where('user_id',auth()->user()->id)->first();
        return view('profile.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Profile::where('user_id', auth()->user()->id )->exists()) {
            return redirect('profile')->with('danger','Update your profile '); 
         }
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_path'=>'required|image|mimes:jpeg,jpg,png,gif',
            'name'=>'',
            'title'=>'',
            'education'=>'',
            'location'=>'',
            'skills'=>'',
            'notes'=>'',
            'phone'=>'',
            
        ]);
        $newImageName=uniqid(). '-' . $request->name . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'),$newImageName);
        if (Profile::where('user_id', auth()->user()->id )->exists()) {
           return redirect('profile')->with('danger','Update your profile '); 
        }
   
    
        Profile::create([
            'image_path'=>$newImageName,
            'name'=>$request->name,
            'title'=>$request->title,
            'education'=>$request->education,
            'location'=>$request->location,
            'skills'=>$request->skills,
            'notes'=>$request->notes,
            'phone'=>$request->phone,
            'user_id'=>auth()->user()->id
        ]);
        return redirect('profile')->with('info','Profile was created ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Profile::where('id',$id)->first();
        return view('profile.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image_path'=>'nullable|image|mimes:jpeg,jpg,png,gif',
            'name'=>'',
            'title'=>'',
            'education'=>'',
            'location'=>'',
            'skills'=>'',
            'notes'=>'',
            'phone'=>'',
            
        ]);
     
        // if (Profile::where('user_id', auth()->user()->id )->exists()) {
        //    return redirect('profile')->with('danger','Update your profile '); 
        // }

        if ($request->image_path) {
            $newImageName=uniqid(). '-' . $request->name . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'),$newImageName);
            Profile::where('id',$id)->update([
                'image_path'=>$newImageName,
                'name'=>$request->name,
                'title'=>$request->title,
                'education'=>$request->education,
                'location'=>$request->location,
                'skills'=>$request->skills,
                'notes'=>$request->notes,
                'phone'=>$request->phone,
                'user_id'=>auth()->user()->id
            ]);
            return redirect('profile')->with('message','Profile was updated ');
        }
        else
        {
            Profile::where('id',$id)->update([
                // 'image_path'=>$newImageName,
                'name'=>$request->name,
                'title'=>$request->title,
                'education'=>$request->education,
                'location'=>$request->location,
                'skills'=>$request->skills,
                'notes'=>$request->notes,
                'phone'=>$request->phone,
                'user_id'=>auth()->user()->id
            ]);
        }
     
        return redirect('profile')->with('message','Profile was updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
