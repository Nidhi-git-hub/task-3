@extends('Admin.layouts.master')
@section('title','Edit Keywords')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Keywords</h1>
                  <small>Edit Keywords</small>
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
                        <div class="panel-body">
                            <form class="col-sm-6" action="{{url('/admin/edit-keyword/'.$blogKeyword->KeywordID)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                              <div class="form-group">
                                 <label>Keyword Name</label>
                                 <input type="text" class="form-control" value="{{$blogKeyword->KeywordName}}" name="keyword_name" id="keyword_name" required>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Edit Keywords">
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