@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المعاملات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة معاملة</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data"
									autocomplete="off">
									{{ csrf_field() }}
									{{-- 1 --}}
			
									<div class="row">
										<div class="col-lg-3">
											<label for="inputName" class="control-label">رقم المعاملة</label>
											<input type="text" class="form-control" id="inputName" name="document_number"
												title="يرجي ادخال رقم الفاتورة" required>
										</div>
			
										<div class="col-lg-3">
											<label>تاريخ المعاملة</label>
											<input class="form-control fc-datepicker" name="document_date" placeholder="YYYY-MM-DD"
												type="text" value="{{ date('Y-m-d') }}" required>
										</div>
										<div class="col-lg-6">
											<label>موضوع المعاملة</label>
											<input class="form-control" name="document_name" placeholder=""
												type="text"  required>
										</div>
			
										
			
									</div>
									<br>
									{{-- 2 --}}
									<div class="row">
										<div class="col-lg-3">
											<label for="inputName" class="control-label">القسم</label>
											<select name="Section" class="form-control SlectBox" onclick="console.log($(this).val())"
												onchange="console.log('change is firing')">
												<!--placeholder-->
												<option value="" selected disabled>حدد القسم</option>
													@foreach ($sections as $section)
                                        				<option value="{{ $section->id }}"> {{ $section->section_name }}</option>
                                    				@endforeach
											</select>
										</div>
			
										<div class="col-lg-3">
											<label for="inputName" class="control-label">الملف</label>
											<select id="folder" name="folder" class="form-control">
											</select>
										</div>
			
										
									</div>
			
			
									{{-- 3 --}}
			
									{{-- 4 --}}
			
									<br>
									{{-- 5 --}}
									<div class="row">
										<div class="col">
											<label for="exampleTextarea">ملاحظات</label>
											<textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
										</div>
									</div><br>
			
									<p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
									<h5 class="card-title">المرفقات</h5>
			
									<div class="col-sm-12 col-md-12">
										<input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
											data-height="70" />
									</div><br>
			
									<div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-primary">حفظ البيانات</button>
									</div>
			
			
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    {{-- <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script> --}}

    

	
<script>
	$('thead').on('click', '.addRow' , function(){
		var tr = "<tr>" +
					"<td><input type= 'text' name='document_number[]'' class='form-control'></td>" +
					"<td width='40%'><input type= 'text' name='document_name[]'' class='form-control'></td>" +
					"<td><input type= 'date' name='document_date[]'' class='form-control'></td>" +
					"<td>"+
						"<select class='form-control' name='Section' onclick='console.log($(this).val())"+
												"onchange='console.log('change is firing')'>>"+
													"<option value='' selected disabled>اختر القسم</option>"+
													"@foreach ($sections as $section)"+
                                        				"<option value='{{ $section->id }}'> {{ $section->section_name }}</option>"+
                                    				"@endforeach"+
												  "</select>"+	
					"</td>"+
					"<td>"+
						"<select class='form-control' name='folder[]'>"+
							
						"</select>"+
					"</td>"+
					"<td>"+
						"<div class='custom-file'>"+
													"<input type='file' class='custom-file-input'>"+
													"<label class='custom-file-label' for='validatedInputGroupCustomFile'>Choose file...</label>"+
												 "</div>"+
					"</td>" +
					"<th><a href='javascript:void(0)' class='btn btn-danger deleteRow'>_</a></th>"+

				"</tr>"
				$('tbody').append(tr);
	});

	$('tbody').on('click', '.deleteRow' , function(){
		$(this).parent().parent().remove();
	});
</script>
<script>
	$(document).ready(function() {
		$('select[name="Section"]').on('change', function() {
			var SectionId = $(this).val();
			if (SectionId) {
				$.ajax({
					url: "{{ URL::to('section') }}/" + SectionId,
					type: "GET",
					dataType: "json",
					success: function(data) {
						$('select[name="folder"]').empty();
						$.each(data, function(key, value) {
							$('select[name="folder"]').append('<option value="' +
								value + '">' + value + '</option>');
						});
					},
					error: function (data) {
						 console.log('Error:', data);
					   },
				});

			} else {
				console.log('AJAX load did not work');
			}
		});

	});

</script>    


{{-- <script>
	$(document).ready(function(){
		$('select[name="section"]').on('change', function(){
			var SectionId = $(this).val();
			if(SectionId)
			{
				$.ajax({
					url: "{{ URL::to('sections')}}/" + SectionId,
					type: "GET",
					datatype: "json",
					success: function(data){
						$('select[name="folder"]').empty();
						$.each(data , function(key , value){
							$('select[name="folder"]').append('<option value= "' +
							value + '">' + value + '</option>');
						});
					},
				});
				else{
					console.log('not work');
				}
			}
		});
	});

	$(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });
</script> --}}
@endsection