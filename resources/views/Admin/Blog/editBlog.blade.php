@extends('Admin.layouts.master')
@section('title','Edit Blog')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Blog</h1>
                  <small>Edit Blog</small>
               </div>
            </section>
            <!-- Main content -->
            @if(Session::has('flash_message_error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-sm alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
            @endif
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('admin/view-blogs')}}"> 
                              <i class="fa fa-eye"></i> View Blogs </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" action="{{url('/admin/edit-blog/'.$blogDetails->BlogID)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" value="{{$blogDetails->Name}}" name="blog_name" id="blog_name" required>
                              </div>
                              <div class="form-group">
                                 <label>Under Category</label>
                                 <select class="form-control" name="category_id" id="category_id">
                                    <?php echo $category_dropdown ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Banner Image</label>
                                 <img src="{{url('/uploads/blog/'.$blogDetails->BannerImage)}}" style="height: 150px;width: 150px">
                                 <input type="file" name="banner_image" id="banner_image" value="{{asset($blogDetails->BannerImage)}}">
                              </div>
                              <div class="form-group">
                                 <label>Main Image</label>
                                 <img src="{{url('/uploads/blog/'.$blogDetails->MainImage)}}" style="height: 150px;width: 150px">
                                 <input type="file" name="main_image" id="main_image" value="{{asset($blogDetails->MainImage)}}">
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" name="blog_description" id="blog_description">{{$blogDetails->Description}}</textarea>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Edit Blog">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->


@endsection