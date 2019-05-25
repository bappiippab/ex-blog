@extends('admin.admin_content')

@section('main-content')

<!-- BEGIN PAGE CONTAINER-->
   <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
         <div class="span12">
             <!-- BEGIN THEME CUSTOMIZER-->
             <div id="theme-change" class="hidden-phone">
                 <i class="icon-cogs"></i>
                  <span class="settings">
                      <span class="text">Theme Color:</span>
                      <span class="colors">
                          <span class="color-default" data-style="default"></span>
                          <span class="color-green" data-style="green"></span>
                          <span class="color-gray" data-style="gray"></span>
                          <span class="color-purple" data-style="purple"></span>
                          <span class="color-red" data-style="red"></span>
                      </span>
                  </span>
             </div>
             <!-- END THEME CUSTOMIZER-->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
             <h3 class="page-title">
               Form Layout
             </h3>
             <ul class="breadcrumb">
                 <li>
                     <a href="#">Home</a>
                     <span class="divider">/</span>
                 </li>
                 <li>
                     <a href="#">Form Stuff</a>
                     <span class="divider">/</span>
                 </li>
                 <li class="active">
                     Form Layout
                 </li>
                 <li class="pull-right search-wrap">
                     <form action="search_result.html" class="hidden-phone">
                         <div class="input-append search-input-area">
                             <input class="" id="appendedInputButton" type="text">
                             <button class="btn" type="button"><i class="icon-search"></i> </button>
                         </div>
                     </form>
                 </li>
             </ul>
             <!-- END PAGE TITLE & BREADCRUMB-->
         </div>
      </div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <div class="row-fluid">
          <div class="span12">
              <!-- BEGIN SAMPLE FORMPORTLET-->
              <div class="widget green">
                  <div class="widget-title">
                      <h4><i class="icon-reorder"></i> Form Layouts</h4>
                      <span class="tools">
                      <a href="javascript:;" class="icon-chevron-down"></a>
                      <a href="javascript:;" class="icon-remove"></a>
                      </span>
                  </div>
                  <div class="widget-body">
                      <!-- BEGIN FORM-->
                      {!! Form::open(['url' => '/update-category', 'method' => 'post']) !!}
                        <h3 align="center" style="color: red">
                          <?php
                              $exception = Session::get('exception');
                              if (isset($exception)) {
                                  echo $exception;
                                  Session::put('exception', '');
                              }
                          ?>
                        </h3>
                        <h3 align="center" style="color: green">
                          <?php
                              $message = Session::get('message');
                              if (isset($message)) {
                                  echo $message;
                                  Session::put('message', '');
                              }
                          ?>
                        </h3>
                        <div class="control-group">
                              <label class="control-label">Category Name</label>
                              <div class="controls">
                                  <input type="hidden" name="categories_id" value="{{$contacts->categories_id}}">
                                  <input type="text" name="categories_name" value="{{$contacts->categories_name}}" class="input-medium" />
                                  <!-- <span class="help-inline">Some hint here</span> -->
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label">Categories</label>
                              <div class="controls">
                                @if ($contacts->categories_type == 'Published')
                                  <select class="input-medium m-wrap" tabindex="1" name="categories_type">
                                      <option value="Published">Published</option>
                                      <option value="Unpublished">Unpublished</option>
                                  </select>
                                @else
                                  <select class="input-medium m-wrap" tabindex="1" name="categories_type">
                                      <option value="Unpublished">Unpublished</option>
                                      <option value="Published">Published</option>
                                  </select>
                                @endif
                              </div>
                          </div>
                          <div class="form-actions">
                              <button type="submit" class="btn blue"><i class="icon-ok"></i> Update</button>
                              <button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>
                          </div>
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
      </div>

      <!-- END PAGE CONTENT-->
   </div>
   <!-- END PAGE CONTAINER-->

@endsection