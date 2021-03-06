<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Blog;
use App\BlogCategory;
use App\BlogKeyword;

class BlogController extends Controller
{
    public function addBlog(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;

            $blog = new Blog;
            $blog->Name=$data['blog_name'];
            $blog->BlogCategoryID=$data['category_id'];
            $blog->Description=$data['blog_description'];
            $blog->save();

            $url="http://127.0.0.1:8000/storage/";
            $banner=$request->file('banner_image');

            $bannerPath=$request->file('banner_image')->storeAs('images', 'banner_image' . time().'.'.$request->banner_image->extension());

            $blog->BannerImage=$bannerPath;
            $blog->BannerImgPath=$url.$bannerPath;
            $blog->save();


            $url="http://127.0.0.1:8000/storage/";
            $main=$request->file('main_image');

            $mainPath=$request->file('main_image')->storeAs('images', 'main_image' . time().'.'.$request->main_image->extension());

            $blog->MainImage=$mainPath;
            $blog->mainimgpath=$url.$mainPath;
            $blog->save();


            return redirect('/admin/view-blogs')->with('flash_message_success','Blog has been added successfully');
        }
        // Category Dropdown Menu Code
        $category = BlogCategory::where(['status'=>1])->get();
        $category_dropdown = "<option value = '' selected diasabled>Select</option>";
        foreach($category as $cat){
            $category_dropdown.="<option value='".$cat->CategoryID."'>".$cat->CategoryName."</option>";
        }
        return view('Admin.Blog.addBlog')->with(compact('category_dropdown'));
    }
    public function viewBlogs(){
        $blogs = Blog::get();
        return view('Admin.Blog.viewBlogs')->with(compact('blogs'));
    }
    public function apiBlogs(){
        $blogs = Blog::get();
        if($blogs->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'Blog' => $blogs
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }
    }
    public function show($BlogID){

        $blogDetails =Blog::find($BlogID);
           
        //dd($blogDetails);
        if($blogDetails->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'Blog' => $blogDetails
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }    
     }
    public function editBlog(Request $request,$BlogID=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

                $blog=Blog::find($request->BlogID);
                $blog->Name=$data['blog_name'];
                $blog->BlogCategoryID=$data['category_id'];
                $blog->Description=$data['blog_description'];
                $blog->save();

                if($request->hasFile('banner_image')){
                    $url="http://127.0.0.1:8000/storage/";
                    $banner=$request->file('banner_image');

                    $bannerPath=$request->file('banner_image')->storeAs('images', 'banner_image' . time().'.'.$request->banner_image->extension());

                    $blog->BannerImage=$bannerPath;
                    $blog->BannerImgPath=$url.$bannerPath;
                    $blog->save();
                }
                if($request->hasFile('main_image')){
                    $url="http://127.0.0.1:8000/storage/";
                    $main=$request->file('main_image');

                    $mainPath=$request->file('main_image')->storeAs('images', 'main_image' . time().'.'.$request->main_image->extension());

                    $blog->MainImage=$mainPath;
                    $blog->mainimgpath=$url.$mainPath;
                    $blog->save();
                }
            return redirect('/admin/view-blogs')->with('flash_message_success','Blog has been updated');
        }
        $blogDetails = Blog::where(['BlogID'=>$BlogID])->first();

        //Category Dropdown Menu Code
        $category = BlogCategory::where(['status'=>1])->get();
        $category_dropdown = "<option value = '' selected diasabled>Select</option>";
        foreach($category as $cat){
            if($cat->CategoryID==$blogDetails->BlogCategoryID){
                $selected="selected";
            }else{
                $selected="";
            }
        $category_dropdown.="<option value='".$cat->CategoryID."' ".$selected.">".$cat->CategoryName."</option>";
        }
        return view('Admin.Blog.editBlog')->with(compact('blogDetails','category_dropdown'));
    }
    public function deleteBlog($BlogID=null){
        Blog::where(['BlogID'=>$BlogID])->delete();
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->back();

    }
    public function updateStatus(Request $request,$BlogID=null){
        $data= $request->all(); 
        Blog::where('BlogID',$data['BlogID'])->update(['Status'=>$data['Status']]);
    }
    public function addKeyword(Request $request,$BlogID=null){
        $blog = Blog::with('keywords')->where(['BlogID'=>$BlogID])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;

            $keyword = new BlogKeyword;
            $keyword->BlogID =$BlogID;
            $keyword->KeywordName=$data['keyword_name'];
            $keyword->save();

            return redirect('/admin/add-keyword/'.$BlogID)->with('flash_message_success','Keyword added successfully');
        }
        return view('Admin.Keywords.addKeywords')->with(compact('blog'));
    }
    public function deleteKeyword($KeywordID=null){
        BlogKeyword::where(['KeywordID'=>$KeywordID])->delete();
        return redirect()->back()->with('flash_message_error','Blog Keyword is Deleted.');
    }
    public function editKeyword(Request $request,$KeywordID=null){
        if($request->isMethod('post')) {
            $data = $request->all();

            $blogKeyword=BlogKeyword::find($request->KeywordID);
            $blogKeyword->KeywordName=$data['keyword_name'];
            $blogKeyword->save();

            return redirect('/admin/view-blogs')->with('flash_message_success','Blog Keywords Updated Successfully!!');
        }
        $blogKeyword = BlogKeyword::where(['KeywordID'=>$KeywordID])->first();
        return view('Admin.Keywords.editKeywords')->with(compact('blogKeyword'));
    }
    public function updateKeywordStatus(Request $request,$KeywordID=null){
        $data= $request->all(); 
        BlogKeyword::where('KeywordID',$data['KeywordID'])->update(['Status'=>$data['Status']]);
    }
}
