@extends('Admin.layouts.master')
@section('title','View Blogs')
@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>View Blogs</h1>
                  <small>Blogs List</small>
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

            <div id="message_success" style="display: none;" class="alert alert-sm alert-success">Status Enabled</div>
            <div id="message_error" style="display: none;" class="alert alert-sm alert-danger">Status Disabled</div>
            
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Blogs</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/add-blog')}}"> <i class="fa fa-plus"></i> Add Blog
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Category ID</th>
                                       <th>Banner Image</th>
                                       <th>Main Image</th>
                                       <th>Description</th>
                                       <th>Status</th>
                                       <th>Keyword</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($blogs as $blog)
                                    <tr>
                                       <td>{{$blog->BlogID}}</td>
                                       <td>{{$blog->Name}}</td>
                                       <td>{{$blog->BlogCategoryID}}</td>

                                       <td>@php if (!empty($blog->BannerImage)) { @endphp
                                       <img src="{{url('/uploads/blog/'.$blog->BannerImage)}}" style="height: 150px; width: 150px" >
                                       @php } else { @endphp 
                                       <p>No image found</p>
                                       @php } @endphp
                                       </td>

                                       <td>@php if (!empty($blog->MainImage)) { @endphp
                                       <img src="{{url('/uploads/blog/'.$blog->MainImage)}}" style="height: 150px; width: 150px" >
                                       @php } else { @endphp 
                                       <p>No image found</p>
                                       @php } @endphp
                                       </td>

                                       <td>{{$blog->Description}}</td>

                                       <td>
                                          <input type="checkbox" class="BlogStatus btn btn-success" rel="{{$blog->BlogID}}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"

                                          @if($blog['Status']=="1")checked @endif>
                                          <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div></td>
                                       <td>
                                          <a href="{{url('/admin/add-keyword/'.$blog->BlogID)}}" class="btn btn-warning btn-sm" title="Add Keywords" style="margin-left: 31%"><i class="fa fa-list"></i></a>
                                       </td>
                                       <td>
                                          <a href="{{url('/admin/edit-blog/'.$blog->BlogID)}}" class="btn btn-add btn-sm" title="Edit Blog"><i class="fa fa-pencil"></i></a>

                                          <a href="{{url('/admin/delete-blog/'.$blog->BlogID)}}" class="btn btn-danger btn-sm" title="Delete Blog"><i class="fa fa-trash-o"></i> </a>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>

@endsection