<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Send FeedBack</title>
	<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container-fluid">
		<div class="row my-4">
			<div class="col-md-6 m-auto">
				<div class="card">
					<div class="card-header">
				    Form Send FeedBack
				  </div>
				  <div class="card-body">

				  	<form id="form-feedback">

				  		@csrf

						  <div class="form-group">
						    <label for="name">Your Name</label>
						    <input type="text" name="name" class="form-control" id="name" placeholder="John Cornor" required />
						  </div>

						  <div class="form-group">
						    <label for="email">Your Email Address</label>
						    <input type="email" name="email" class="form-control" id="email" placeholder="example@example.com" required />
						  </div>

						  <div class="form-group">
						    <label for="message">Your Message</label>
						    <textarea name="message" class="form-control" id="message" rows="3" placeholder="Something You Want to Write..."></textarea>
						  </div>

						  <div class="text-right">
						  	<button id="submit" type="submit" class="btn btn-info">SEND FEEDBACK</button>
						  </div>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Jqeury Core js -->
	<script src="{{ asset('vendor/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
	<!-- Bootstrap Core js -->
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- Sweet Alert2 Core js -->
	<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

	<script>
		$('#form-feedback').on('submit', function(event){
			event.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: '{{ route('api.send.feedback') }}', 
				method: 'POST', 
				data: formData, 
				cache:false, 
        contentType: false, 
        processData: false, 

				beforeSend:function() {
					$('#submit').attr('disabled', 'disabled');
					$('#submit').html('SENDING...');
				},
				success:function(data) {
					$('#submit').attr('disabled', false);
					$('#submit').html('SEND FEEDBACK');
					$('#form-feedback')[0].reset();

					data = JSON.parse(data);

					if (data.message == "success") {

						Swal.fire({
						  type: 'success',
						  title: 'Success!',
						  text: 'Your FeedBack Has Been Sent!'
						});

					} else if (data.message == "failed") {
						
						Swal.fire({
						  type: 'error',
						  title: 'Opps...!',
						  text: 'Something Wrong Has Happened!'
						});

					} else {

						Swal.fire({
						  type: 'error',
						  title: 'Opps...!',
						  text: 'Something Wrong Has Happened!',
						  footer: 'Error: ' + data.message
						});

					}
				},
				error:function(xhr) {
					$('#submit').attr('disabled', false);
					$('#submit').html('SEND FEEDBACK');

					Swal.fire({
					  type: 'error',
					  title: 'Opps...!',
					  text: 'Something Wrong Has Happened!',
					  footer: 'Error: ' + xhr
					});

				}

			});
		});
	</script>
</body>
</html>