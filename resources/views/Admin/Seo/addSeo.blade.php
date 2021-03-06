@extends('Admin.layouts.master')
@section('title','Add Blog Seo')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-search"></i>
               </div>
               <div class="header-title">
                  <h1>Add Blog Seo</h1>
                  <small>Add Blog Seo</small>
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
                              <a class="btn btn-add " href="{{url('admin/view-blogSeos')}}"> 
                              <i class="fa fa-eye"></i> View Blog Seos </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" action="{{url('/admin/add-blogSeo')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                              <div class="form-group">
                                 <label>Meta Title</label>
                                 <input type="text" class="form-control" placeholder="Enter Meta Title" name="meta_title" id="meta_title" required>
                              </div>
                              <div class="form-group">
                                 <label>Meta Description</label>
                                 <textarea class="form-control" name="meta_description" id="meta_description"></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Meta Keyword</label>
                                 <input type="text" class="form-control" placeholder="Enter Meta Keyword" name="meta_keyword" id="meta_keyword" required>
                              </div>
                              <div class="form-group">
                                 <label>Index Follow</label><br>
                                 <label class="radio-inline"><input name="index_follow" value="1" checked="checked" type="radio">True</label> 
                                 <label class="radio-inline"><input name="index_follow" value="0" type="radio">False</label>
                              </div>
                              <div class="form-group">
                                 <label>Under Blog</label>
                                 <select class="form-control" name="blog_id" id="blog_id">
                                    <?php echo $blog_dropdown ?>
                                 </select>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Blog Seo">
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