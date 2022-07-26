<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use Str;
use Storage;
use App\Library\LogActivity;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CMS::where('status', '!=', 'delete')->orderBy('id', 'DESC')->get();
        return view('admin/cms/vw_cms', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->pageName != ''){
           $result = CMS::where('id',$request->pageName)->select('content','title','meta_title','meta_keywords','description','cms_image_path','cms_image_name')->first();
           
            $data = [
                'content'=> $result->content,
                'title'=> $result->title,
                'meta_title'=> $result->meta_title,
                'meta_keywords'=> $result->meta_keywords,
                'description'=> $result->description,
                'image' => $result->cms_image_path,
                'image_name' => $result->cms_image_name,
            ];
            return $data;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'description' => 'required',

        ]);
        $txtpkey = $request->id;
        $old_data = CMS::find($txtpkey);
        if($validator){
            $input = [];
            if($request->content != ''){
                $input['content'] =  $request->content;
            }
            $input['title'] = $request->title;
            $input['meta_title'] = $request->meta_title;
            $input['meta_keywords'] = $request->meta_keywords;
            $input['description'] = $request->description; 
            if($request->has('cms_image_path')){
                $filename = time().'.'.$request->file('cms_image_path')->getClientOriginalExtension();
                $original_name = $request->file('cms_image_path')->getClientOriginalName();
                $input['cms_image_name'] = $original_name;
                $filePath = $request->file('cms_image_path')->storeAs('public/images/cms_images',$filename);  
                $input['cms_image_path'] = $filePath;
            }
            
            $input['modified_ip_address'] = $request->ip();
            $input['modified_by'] = auth()->guard('admin')->user()->id;

            $result = CMS::where('id',$request->id)->update($input);
            $new_data = CMS::find($request->id);
            LogActivity::AdminLog(json_encode($new_data),json_encode($old_data),'CMS','update','admin');
            if($result){
                return redirect('/cms')->with('success', 'Page updated successfully!!');
            }else{
                return redirect('/cms')->with('error', 'Page not updated');
            }
        }
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
