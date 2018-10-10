$(document).ready(function() {
	// submit login
	$('#form_login').submit(function(e) {
		e.preventDefault();
		submit_login();

		return false;
	});

	// on change semua field
	$('.field').on('change', function() {
		if(this.value !== "") {
			$('.field-'+this.id).removeClass('has-error').addClass('has-success');
			$(".pesan-"+this.id).text('');
		}
		else {
			$('.field-'+this.id).removeClass('has-error').removeClass('has-success');
			$(".pesan-"+this.id).text('');	
		}

	});				
});

/**
 * 
 */
function submit_login() {
	$.ajax({
		url: BASE_URL+'login/',
		type: 'POST',
		dataType: 'JSON',
		data:{
			'username': $('#username').val().trim(),
			'password': $('#password').val().trim(),
		},
		beforeSend: function() {
			$('#submit_login').prop('disabled', true);
			$('#submit_login').prepend('<i class="fa fa-spin fa-refresh"></i> ');
		},
		success: function(response){
			console.log('Response submit_login: ', response);
			if(response.success) document.location=BASE_URL+'permohonan-kredit-admin/';
			else{
				$('#submit_login').prop('disabled', false);
				$('#submit_login').html($('#submit_login').text());
				// set error
				setError(response.error);
				setNotif(response.notif);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) { // error handling
			console.log('Response Error submit_login: ', jqXHR, textStatus, errorThrown);
			swal("Pesan Gagal", "Terjadi Kesalahan Teknis, Silahkan Coba Kembali", "error");
            $('#submit_login').prop('disabled', false);
			$('#submit_login').html($('#submit_login').text());
        }
	});
}

/**
 * 
 */
function resetForm() {
	// form login
	$('#form_login').trigger('reset');

	// hapus semua feedback
	$('.pesan').text('');

	// hapus semua pesan
	$('.form-group').removeClass('has-success').removeClass('has-error');
}

/**
 * 
 * @param {object} error 
 */
function setError(error) {
	$.each(error, function(index, item){
		if(item != ""){
			$('.field-'+index).removeClass('has-success').addClass('has-error');
			$('.pesan-'+index).text(item);
		}
		else{
			$('.field-'+index).removeClass('has-error').addClass('has-success');
			$('.pesan-'+index).text('');
		}
	});
}