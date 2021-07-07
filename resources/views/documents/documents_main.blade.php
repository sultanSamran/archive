@extends('layouts.master')
@section('title')
قائمة المعاملات
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
{{-- <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"> --}}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المعاملات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المعاملات</span>
						</div>
					</div>
					
				</div>
				
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				{{-- <div class="row">
					@if(session()->has('Add'))
						<div class="alert alert-success" role="alert">
							<strong>{{ session()->get('Add')}}</strong>
							<button aria-label="Close" class="close" data-dismiss="alert" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

					@endif

					@if(session()->has('Error'))
						<div class="alert alert-danger mg-b-0" role="alert">
							<strong>{{ session()->get('Error')}}</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif --}}
					@if (session()->has('Add'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>{{ session()->get('Add') }}</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif

					@if ($errors->any())
    					<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
   					 </div>
					@endif

					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									{{-- <h4 class="card-title mg-b-0">Bordered Table</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i> --}}
								</div>
								{{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p> --}}
							</div>
							<div class="col-sm-6 col-md-4 col-xl-3">
								<a href="documents/create" class="modal-effect btn btn-outline-primary btn-block">إضافة معاملة</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table key-buttons text-md-nowrap">
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">رقم المعاملة</th>
												<th class="border-bottom-0">موضوع المعاملة</th>
												<th class="border-bottom-0">تاريخ المعاملة</th>
												<th class="border-bottom-0">القسم</th>
												<th class="border-bottom-0">الملف</th>
												<th class="border-bottom-0">المرفقات</th>
												<th class="border-bottom-0">إجراء</th>
												
											</tr>
										</thead>
										<tbody>
											<?php $i= 0; ?>
											@foreach($documents as $document) 
											<?php $i++ ;?>
											
											<tr>
												<th class="border-bottom-0">{{$i}}</th>
												<th class="border-bottom-0">{{$document->document_number}}</th>
												<th class="border-bottom-0">{{$document->document_name}}</th>
												<th class="border-bottom-0">{{$document->document_date}}</th>
												<th class="border-bottom-0">{{$document->section->section_name}}</th>
												<th class="border-bottom-0">{{$document->folder_name}}</th>
												<th class="border-bottom-0">لا يوجد</th>
												<th class="border-bottom-0">إجراء</th>
											</tr>

											@endforeach
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<div class="modal" id="modaldemo8">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">إضافة ملف جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="card-body pt-0">
							<form class="form-horizontal" action="{{route('folders.store')}}" method="POST">
								@csrf
								<div class="form-group">
									<input type="text" class="form-control" name="folder_name" id="folder_name" placeholder="اسم الملف">
								</div>
								<select name="section_id" id="section_id" class="form-control" required>
									<option value="" selected disabled> --حدد القسم--</option>
									{{-- @foreach ($sections as $section)
										<option value="{{ $section->id }}">{{ $section->section_name }}</option>
									@endforeach --}}
								</select>
								<div class="form-group">
									<textarea class="form-control" name="folder_desc" id="folder_desc" placeholder="اكتب وصف للملف ..." rows="3"></textarea>
								</div>
								<div class="modal-footer">
									<button class="btn ripple btn-primary" type="submit">Save changes</button>
									<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
								</div>
								
								
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- main-content closed -->
		<!-- edit -->
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
	   <div class="modal-dialog" role="document">
		   <div class="modal-content">
			   <div class="modal-header">
				   <h5 class="modal-title" id="exampleModalLabel">تعديل الملف</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					   <span aria-hidden="true">&times;</span>
				   </button>
			   </div>
			   <div class="modal-body">

				   <form action="folders/update" method="post" autocomplete="off">
					   {{method_field('patch')}}
					   {{csrf_field()}}
					   <div class="form-group">
						   <input type="hidden" name="id" id="id" value="">
						   <label for="recipient-name" class="col-form-label">اسم الملف:</label>
						   <input class="form-control" name="folder_name" id="folder_name1" type="text">
					   </div>
					   <div class="form-group">
						   <label for="message-text" class="col-form-label">ملاحظات:</label>
						   <textarea class="form-control" id="folder_desc" name="folder_desc"></textarea>
					   </div>
			   </div>
			   <div class="modal-footer">
				   <button type="submit" class="btn btn-primary">تاكيد</button>
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
			   </div>
			   </form>
		   </div>
	   </div>
   </div>

<!-- delete -->
<div class="modal" id="modaldemo9">
   <div class="modal-dialog modal-dialog-centered" role="document">
	   <div class="modal-content modal-content-demo">
		   <div class="modal-header">
			   <h6 class="modal-title">حذف الملف</h6><button aria-label="Close" class="close" data-dismiss="modal"
															  type="button"><span aria-hidden="true">&times;</span></button>
		   </div>
		   <form action="folders/destroy" method="post">
			   {{method_field('delete')}}
			   {{csrf_field()}}
			   <div class="modal-body">
				   <p>هل انت متاكد من عملية الحذف ؟</p><br>
				   <input type="hidden" name="id" id="id" value="">
				   <input class="form-control" name="folder_name" id="folder_name" type="text">
			   </div>
			   <div class="modal-footer">
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
				   <button type="submit" class="btn btn-danger">تاكيد</button>
			   </div>
	   </div>
	   </form>
   </div>
</div>
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
{{-- <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script> --}}
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

<script>
	$('#exampleModal2').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var folder_name = button.data('folder_name')
		var folder_desc = button.data('folder_desc')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #folder_name').val(folder_name);
		modal.find('.modal-body #folder_desc').val(folder_desc);
	})
</script>

<script>
	$('#modaldemo9').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var folder_name = button.data('folder_name')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #folder_desc').val(folder_desc);
		modal.find('.modal-body #folder_name').val(folder_name);
	})
</script>
@endsection