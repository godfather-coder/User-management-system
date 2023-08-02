<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::when(
            request()
            ->get('keyword'),function($q){
            $q
            ->where("name","LIKE","%".request()
            ->get('keyword')."%")
            ->orwhere("email","LIKE","%".request()
            ->get('keyword')."%");
        })
        ->with('role')
        ->select('id','role_id','name','email','position','phone_number','address')
        ->paginate(10);

        return view('pages.users.index',
        [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::get();
        return view('pages.users.create',[
            'roles'=>$role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $requestdata = $request->validated();
        $randstr = Str::random(5);
        $str =$requestdata['email'].' => '.$randstr.';';
        Storage::disk('public')->append('users.txt', $str);
        $requestdata['password'] = Hash::make($randstr);
        User::create($requestdata);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $role = Role::get();
        return view('pages.users.show',[
            'user'=>$user,
            'roles' => $role,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UserCreateRequest $request, User $user)
    {
        if($request->validated()){
            $user->update($request->validated());
            return redirect()->route('users.index');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
