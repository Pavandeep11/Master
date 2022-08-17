<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('points', 'DESC')->paginate(5);
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'age' => 'required',
            'points' => 'required',
            'address' => 'required',
        ]);
      
        User::create($request->all());
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'point' => 'required',
            'address' => 'required'
        ]);
      
        $user->update($request->all());
      
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {
        $user->delete();
       
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function addPoint($id)
    {
        $users = User::find($id);
        $users->increment('points');

        return redirect('/users')->with('success', 'Point Updated');
    }

    public function decreasePoint($id){
        $users = User::find($id);
        if($users->points > 0){
            $users->decrement('points');
            return redirect('/users')->with('success', 'Point decreased');
        }else{
            return redirect('/users')->with('success', 'Already at Zero');
        }
       
    }
}
