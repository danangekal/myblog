<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends BackendController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory')); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users      = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();
        return view('backend.users.index', compact('users','usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('backend.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {   
        User::create($request->all());
        return redirect('/backend/users')->with('message', 'New User was created successfully!');
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
        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        User::findOrFail($id)->update($request->all());
        return redirect('/backend/users')->with('message', 'User was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {   
        $user = User::findOrFail($id);
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if ($deleteOption == 'delete') {
            // delete user posts
            $post = $user->posts();
            $post->withTrashed()->forceDelete();
            
            // $image = $post->image;
            // dd($image);
            // if (! empty($image)) {
            //     $imagePath     = $this->uploadPath . '/' .$image;
            //     $ext           = substr(strrchr($image, '.'), 1);
            //     $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            //     $thumbnailPath = $this->uploadPath . '/' .$thumbnail;

            //     if (file_exists($imagePath)) unlink($imagePath);
            //     if (file_exists($thumbnailPath)) unlink($thumbnailPath);
            // }
        } elseif ($deleteOption == 'attribute') {
            $user->posts()->update(['author_id' => $selectedUser]);
        }

        $user->delete();
        return redirect('/backend/users')->with('message', 'User was deleted successfully!');
    }

    public function confirm(Requests\UserDestroyRequest $request, $id)
    {
        $user   = User::findOrFail($id);
        $users  = User::where('id','!=', $user->id)->pluck('name', 'id');
        return view('backend.users.confirm', compact('user', 'users'));
    }
}
