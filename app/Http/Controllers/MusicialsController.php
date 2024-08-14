<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Musicials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Musicials::all();
        $template = 'layout.list';
        return view('layout', compact('template', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $template = 'layout.add';
        return view('layout', compact('template'));
    }

    public function uploadFile($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('image',$fileName,'public');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = $request->except('profile_picture', '_token', '_method');
        if($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()){
            $data['profile_picture'] = $this->uploadFile($request->file('profile_picture'));
        }
        Musicials::query()->create($data);
        return redirect()->route('musicians.index')->with('success', 'Thêm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(Musicials $musicials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Musicials::query()->find($id);
        $template = 'layout.edit';
        return view('layout', compact('template', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('profile_picture', '_token', '_method');
        $musician = Musicials::query()->find($id);
        if(!$musician){
            return redirect()->back()->with('error', 'Không tìm thấy id cần sửa');
        }

        if($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()){
            $data['profile_picture'] = $this->uploadFile($request->file('profile_picture'));
            if (Storage::disk('public')->exists($musician->profile_picture)){
                Storage::disk('public')->delete($musician->profile_picture);
            }
        }

        try {
            Musicials::query()->find($id)->update($data);
            return redirect()->route('musicians.index')->with('success', 'Sửa thành công');
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Sửa không thành công');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        dd($id);
        try {
            Musicials::query()->find($id)->forceDelete();
            return redirect()->back()->with('success', 'Xóa thành công');
        }catch (
            \Exception $e
        ){
            return redirect()->back()->with('error', 'Xóa không thành công');
        }
    }
}
