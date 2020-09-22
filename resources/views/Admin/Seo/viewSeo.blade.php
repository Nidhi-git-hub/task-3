@extends('Admin.layouts.master')
@section('title','View Blog Seos')
@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>View Blog Seos</h1>
                  <small>Seo List</small>
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
                                 <h4>View Seos</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/add-blogSeo')}}"> <i class="fa fa-plus"></i> Add Blog Seo
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>SEO ID</th>
                                       <th>Meta Title</th>
                                       <th>Meta Description</th>
                                       <th>Meta Keyword</th>
                                       <th>Index Follow</th>
                                       <th>Blog ID</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($blogSeos as $blogSeo)
                                    <tr>
                                       <td>{{$blogSeo->SeoID}}</td>
                                       <td>{{$blogSeo->MetaTitle}}</td>
                                       <td>{{$blogSeo->MetaDescription}}</td>
                                       <td>{{$blogSeo->MetaKeyword}}</td>
                                       <td>
                                          @php if (($blogSeo->IndexFollow)==0)
                                       {
                                       @endphp
                                       <p>False</p>
                                       @php 
                                       } else {
                                       @endphp 
                                       <p>True</p>
                                       @php
                                       }
                                       @endphp
                                       </td>
                                       <td>{{$blogSeo->BlogID}}</td>

                                       <td>
                                          <a href="{{url('/admin/edit-blogSeo/'.$blogSeo->SeoID)}}" class="btn btn-add btn-sm" title="Edit Blog"><i class="fa fa-pencil"></i></a>

                                          <a href="{{url('/admin/delete-blogSeo/'.$blogSeo->SeoID)}}" class="btn btn-danger btn-sm" title="Delete Blog"><i class="fa fa-trash-o"></i> </a>
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