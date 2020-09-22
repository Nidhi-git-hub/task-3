<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\BlogSeo;
use App\Blog;

class BlogSeoController extends Controller
{
    public function addSeo(Request $request){
    	if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;

            $blogSeo = new BlogSeo;
            $blogSeo->MetaTitle=$data['meta_title'];
            $blogSeo->MetaDescription=$data['meta_description'];
            $blogSeo->MetaKeyword=$data['meta_keyword'];           
            $blogSeo->IndexFollow=$data['index_follow'];
            $blogSeo->BlogID=$data['blog_id'];
        	$blogSeo->save();
        	return redirect('/admin/view-blogSeos')->with('flash_message_success','Blog Seo has been added successfully');
        }
        // Category Dropdown Menu Code
        $blog = Blog::where(['status'=>1])->get();
        $blog_dropdown = "<option value = '' selected diasabled>Select</option>";
        foreach($blog as $blogs){
            $blog_dropdown.="<option value='".$blogs->BlogID."'>".$blogs->Name."</option>";
        }
    	return view('Admin.Seo.addSeo')->with(compact('blog_dropdown'));
    }
    public function viewSeos(){
    	$blogSeos = BlogSeo::get();
    	return view('Admin.Seo.viewSeo')->with(compact('blogSeos'));
    }
    public function editSeo(Request $request,$SeoID=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

                $blogSeo=BlogSeo::find($request->SeoID);
                $blogSeo->MetaTitle=$data['meta_title'];
            	$blogSeo->MetaDescription=$data['meta_description'];
            	$blogSeo->MetaKeyword=$data['meta_keyword'];           
            	$blogSeo->IndexFollow=$data['index_follow'];
            	$blogSeo->BlogID=$data['blog_id'];
            	$blogSeo->save();
            	return redirect('/admin/view-blogSeos')->with('flash_message_success','Blog Seo has been updated');
        }
        $seoDetails = BlogSeo::where(['SeoID'=>$SeoID])->first();

        //Category Dropdown Menu Code
        $blog = Blog::where(['status'=>1])->get();
        $blog_dropdown = "<option value = '' selected diasabled>Select</option>";
        foreach($blog as $blogs){
            if($blogs->BlogID==$seoDetails->BlogID){
                $selected="selected";
            }else{
                $selected="";
            }
        $blog_dropdown.="<option value='".$blogs->BlogID."' ".$selected.">".$blogs->Name."</option>";
        }
        return view('Admin.Seo.editSeo')->with(compact('seoDetails','blog_dropdown'));
    }
    public function deleteSeo($SeoID=null){
        BlogSeo::where(['SeoID'=>$SeoID])->delete();
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->back();
    }
}
