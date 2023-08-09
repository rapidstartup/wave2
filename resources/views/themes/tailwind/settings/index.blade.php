@extends('theme::layouts.app')

@section('content')

	<div class="flex px-8 mx-auto my-6 max-w-7xl xl:px-5">

		<!-- Left Settings Menu -->
		<div class="w-16 mr-6 md:w-1/5">

			@include('theme::partials.sidebar')
        </div>
		<!-- End Settings Menu -->

		<div class="dark-section flex flex-col w-full bg-white border rounded-lg md:w-4/5 border-gray-150">
			<div class="dark-section flex flex-wrap items-center justify-between border-b border-gray-200 sm:flex-no-wrap">
	            <div class="relative p-6">
	                <h3 class="text flex text-lg font-medium leading-6 text-gray-600">
						<svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
						@if(isset($section_title)){{ $section_title }}@else{{ Auth::user()->name . '\'s' }} {{ ucwords(str_replace('-', ' ', Request::segment(2)) ?? 'profile') . ' Settings' }}@endif
	                </h3>
	            </div>
	        </div>
			<div class="uk-card-body">
				@include('theme::settings.partials.' . $section)
			</div>
		</div>
	</div>

@endsection

@section('javascript')

	<style>
		#upload-crop-container .croppie-container .cr-resizer, #upload-crop-container .croppie-container .cr-viewport{
			box-shadow: 0 0 2000px 2000px rgba(255,255,255,1) !important;
			border: 0px !important;
		}
		.croppie-container .cr-boundary {
			border-radius: 50% !important;
			overflow: hidden;
		}
		.croppie-container .cr-slider-wrap{
			margin-bottom: 0px !important;
		}
		.croppie-container{
			height:auto !important;
		}
	</style>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
	<script>

			let uploadCropEl = document.getElementById('upload-crop');
			let uploadLoading = document.getElementById('uploadLoading');
			let fileTypes = ['jpg', 'jpeg', 'png'];

			function readFile() {
				input = document.getElementById('upload');
				if (input.files && input.files[0]) {
					let reader = new FileReader();

					let fileType = input.files[0].name.split('.').pop().toLowerCase();
					if (fileTypes.indexOf(fileType) < 0) {
						alert('Invalid file type. Please select a JPG or PNG file.');
						return false;
					}
					reader.onload = function (e) {
						//$('.upload-demo').addClass('ready');
						uploadCrop.bind({
							url: e.target.result,
							orientation: 4
						}).then(function(){
							//uploadCrop.setZoom(0);
						});
					}
					reader.readAsDataURL(input.files[0]);
				}
				else {
					alert("Sorry - you're browser doesn't support the FileReader API");
				}
			}

			if(document.getElementById('upload')){
				document.getElementById('upload').addEventListener('change', function () {
					Alpine.store('uploadModal').openModal();
					uploadCropEl.classList.add('hidden');
					uploadLoading.classList.remove('hidden');
					setTimeout(function(){
						uploadLoading.classList.add('hidden');
						uploadCropEl.classList.remove('hidden');

						if(typeof(uploadCrop) != "undefined"){
							uploadCrop.destroy();
						}
						uploadCrop = new Croppie(uploadCropEl, {
							viewport: { width: 190, height: 190, type: 'square' },
							boundary: { width: 190, height: 190 },
							enableExif: true,
						});

						readFile();
					}, 800);
				});
			}

			function clearInputField(){
				document.getElementById('upload').value = '';
			}

			function applyImageCrop(){
				let fileType = input.files[0].name.split('.').pop().toLowerCase();
				if (fileTypes.indexOf(fileType) < 0) {
					alert('Invalid file type. Please select a JPG or PNG file.');
					return false;
				}
				uploadCrop.result({type:'base64',size:'original',format:'png',quality:1}).then(function(base64) {
					document.getElementById('preview').src = base64;
					document.getElementById('uploadBase64').value = base64;
				});
			}

	</script>
@endsection
