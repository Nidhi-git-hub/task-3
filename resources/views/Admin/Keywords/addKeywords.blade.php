@extends('Admin.layouts.master')
@section('title','Add Keywords')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-key"></i>
               </div>
               <div class="header-title">
                  <h1>Add Keywords</h1>
                  <small>Add Keywords</small>
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
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-body">
                            <form class="col-sm-6" action="{{url('/admin/add-keyword/'.$blog->BlogID)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                              <label>Blog Name</label>
                              {{$blog->Name}}
                            </div>
                              <div class="form-group">
                                 <label>Keyword Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Keywords Name" name="keyword_name" id="keyword_name" required>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Keywords">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->

            <!--View Attributes -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Keywords</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                      <th>Keyword ID</th>
                                      <th>Keywords</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($blog['keywords'] as $keyword)
                                    <tr>
                                    <td>{{$keyword->KeywordID}}</td>
                                    <td>{{$keyword->KeywordName}}</td>
                                    <td>
                                        <input type="checkbox" class="KeywordStatus btn btn-success" rel="{{$keyword->KeywordID}}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"

                                        @if($keyword['Status']=="1")checked @endif>
                                        <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div></td>
                                    <td class="center">
                                        <div class="btn-group">
                                          <a href="{{url('/admin/edit-keyword/'.$keyword->KeywordID)}}" class="btn btn-add btn-sm" title="Edit Keywords"><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-keyword/'.$keyword->KeywordID)}}" class="btn btn-danger btn-sm" title="Delete Keyword"><i class="fa fa-trash-o"></i> </a>
                                        </div>
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
         </div>
         <!-- /.content-wrapper -->



@endsection