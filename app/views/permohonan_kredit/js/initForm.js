$(document).ready(function (){
	init();
	
	// datepicker month
	$('.datepicker').datepicker({
		autoclose: true,
		format: "yyyy-mm-dd",
		todayHighlight: true,
		orientation:"bottom auto",
		todayBtn: true,
	});

	$('.datepicker-year').datepicker({
		autoclose: true,
		format: "yyyy",
		viewMode: "years", 
    	minViewMode: "years",
		todayHighlight: true,
		orientation:"bottom auto",
		todayBtn: true,
	});

	// on submit form
	$('#form_permohonan_kredit').on('submit', function(e){
		e.preventDefault();
		submit();
		return false;
	});

	// on change seumur hidup
	$('#seumur_hidup').on('change', function(){
		if($(this).is(':checked')){	$('#berlaku').prop('disabled', true); }
		else { $('#berlaku').prop('disabled', false); }
		$('#berlaku').val('');
	});

	// on change status kawin
	$('input[type=radio][name=status_kawin]').on('change', function(){
		if($(this).val().trim() == 'Kawin' || $(this).val().trim() == 'Duda/Janda'){
			$('#jumlah_anak').prop('disabled', false);
			$('#tmpt_lahir_suami_istri').prop('disabled', false);
			$('#tgl_lahir_suami_istri').prop('disabled', false);
			$('#nama_suami_istri').prop('disabled', false);
			$('#pekerjaan_suami_istri').prop('disabled', false);
		}
		else {
			$('#jumlah_anak').prop('disabled', true);
			$('#tmpt_lahir_suami_istri').prop('disabled', true);
			$('#tgl_lahir_suami_istri').prop('disabled', true);
			$('#nama_suami_istri').prop('disabled', true);
			$('#pekerjaan_suami_istri').prop('disabled', true);
		}
		$('#jumlah_anak').val('');
	});

	// on change status rumah
	$('input[type=radio][name=status_rumah]').on('change', function(){
		if($(this).val().trim() == 'Sewa'){ $('#sewa_rumah').prop('disabled', false); }
		else{ $('#sewa_rumah').prop('disabled', true); }
		$('#sewa_rumah').val('');
	});

	// on change pilih pekerjaan
	$('input[type=radio][name=pilih_pekerjaan]').on('change', function(){
		if($(this).val().trim() == 'Karyawan'){
			$('.panel-data-pekerjaan').slideDown();
			$('.panel-data-usaha').slideUp();
			$('.panel-data-usaha').css('display', 'none');
			
			$('.panel-data-usaha input').prop('disabled', true);
			$('.panel-data-usaha textarea').prop('disabled', true);

			$('.panel-data-pekerjaan input').prop('disabled', false);
			$('.panel-data-pekerjaan textarea').prop('disabled', false);
			resetPekerjaan('usaha');
		}
		else if($(this).val().trim() == 'Usaha'){
			$('.panel-data-usaha').slideDown();
			$('.panel-data-pekerjaan').slideUp();
			$('.panel-data-pekerjaan').css('display', 'none');
			
			$('.panel-data-pekerjaan input').prop('disabled', true);
			$('.panel-data-pekerjaan textarea').prop('disabled', true);

			$('.panel-data-usaha input').prop('disabled', false);
			$('.panel-data-usaha textarea').prop('disabled', false);
			resetPekerjaan('pekerjaan');
		}
		else{
			$('.panel-data-usaha').slideUp();
			$('.panel-data-pekerjaan').slideUp();
			$('.panel-data-usaha').css('display', 'none');
			$('.panel-data-pekerjaan').css('display', 'none');

			$('.panel-data-pekerjaan input').prop('disabled', true);
			$('.panel-data-pekerjaan textarea').prop('disabled', true);

			$('.panel-data-usaha input').prop('disabled', true);
			$('.panel-data-usaha textarea').prop('disabled', true);

			resetPekerjaan();
		}
	});

	// on change jenis agunan
	$('input[type=radio][name=jenis]').on('change', function(){
		if($(this).val().trim() == 'Mobil' || $(this).val().trim() == 'Motor'){
			$('#tipe_kendaraan').prop('disabled', false);
			$('#warna').prop('disabled', false);
			$('#tahun').prop('disabled', false);
			$('#no_bpkb').prop('disabled', false);
			$("input[type=radio][name=atas_nama]").prop('disabled', false);
			$("input[type=radio][name=status_agunan]").prop('disabled', true);
			$("input[type=radio][name=imb]").prop('disabled', true);
			$('#ada').prop('disabled', true);
			$('#alamat_agunan').prop('disabled', false);
		}
		else if($(this).val().trim() == 'Deposito' 
			|| $(this).val().trim() == 'Jamsostek'){
			$('#tipe_kendaraan').prop('disabled', true);
			$('#warna').prop('disabled', true);
			$('#tahun').prop('disabled', true);
			$('#no_bpkb').prop('disabled', true);
			$("input[type=radio][name=atas_nama]").prop('disabled', false);
			$("input[type=radio][name=status_agunan]").prop('disabled', true);
			$("input[type=radio][name=imb]").prop('disabled', true);
			$('#ada').prop('disabled', true);
			$('#alamat_agunan').prop('disabled', false);
		}
		else if($(this).val().trim() == 'Tanah'){
			$('#tipe_kendaraan').prop('disabled', true);
			$('#warna').prop('disabled', true);
			$('#tahun').prop('disabled', true);
			$('#no_bpkb').prop('disabled', true);
			$("input[type=radio][name=atas_nama]").prop('disabled', false);
			$("input[type=radio][name=status_agunan]").prop('disabled', false);
			$("input[type=radio][name=imb]").prop('disabled', true);
			$('#ada').prop('disabled', true);
			$('#alamat_agunan').prop('disabled', false);
		}
		else if($(this).val().trim() == 'Rumah'){
			$('#tipe_kendaraan').prop('disabled', true);
			$('#warna').prop('disabled', true);
			$('#tahun').prop('disabled', true);
			$('#no_bpkb').prop('disabled', true);
			$("input[type=radio][name=atas_nama]").prop('disabled', false);
			$("input[type=radio][name=status_agunan]").prop('disabled', false);
			$("input[type=radio][name=imb]").prop('disabled', false);
			$('#ada').prop('disabled', true);
			$('#alamat_agunan').prop('disabled', false);
		}
		else{
			$('#tipe_kendaraan').prop('disabled', true);
			$('#warna').prop('disabled', true);
			$('#tahun').prop('disabled', true);
			$('#no_bpkb').prop('disabled', true);
			$("input[type=radio][name=atas_nama]").prop('disabled', true);
			$("input[type=radio][name=atas_nama]").prop('checked', false);
			$("input[type=radio][name=status_agunan]").prop('disabled', true);
			$("input[type=radio][name=status_agunan]").prop('checked', false);
			$("input[type=radio][name=imb]").prop('disabled', true);
			$("input[type=radio][name=imb]").prop('checked', false);
			$('#ada').prop('disabled', true);
			$('#alamat_agunan').prop('disabled', true);
		}

		resetAgunan();
	});

	// on change imb
	$('input[type=radio][name=imb]').on('change', function(){
		if($(this).val().trim() == 'Ada'){
			$('#ada').prop('disabled', false);
		}
		else if($(this).val().trim() == 'Tidak Ada'){
			$('#ada').val('');
			$('#ada').prop('disabled', true);
		}
		else{
			$('#ada').val('');
			$('#ada').prop('disabled', true);
		}
	});

	// on change input/textarea field
	$('.field').on('change', function(){
		if(this.value !== ""){
			$('.field-'+this.id).removeClass('has-error').addClass('has-success');
			$(".pesan-"+this.id).text('');
			$(".pesan-"+this.id).css('display', 'none');
		}
		else{
			$('.field-'+this.id).removeClass('has-error').removeClass('has-success');
			$(".pesan-"+this.id).text('');
			$(".pesan-"+this.id).css('display', 'none');
		}
	});

	// on change radio
	$('input[type=radio]').on('change', function(){
		if(this.value !== ""){
			$('.field-'+this.name).removeClass('has-error').addClass('has-success');
			$(".pesan-"+this.name).text('');
			$(".pesan-"+this.name).css('display', 'none');
		}
		else{
			$('.field-'+this.name).removeClass('has-error').removeClass('has-success');
			$(".pesan-"+this.name).text('');
			$(".pesan-"+this.name).css('display', 'none');	
		}
	});


});

/**
 * 
 */
function init(){
	// default set css class pesan none
	$('.pesan').css('display', 'none');

	// disable sewa rumah
	$('#sewa_rumah').prop('disabled', true);
	// disable jumlah anak
	$('#jumlah_anak').prop('disabled', true);

	// set panel pekerjaan dan usaha
	$('.panel-data-pekerjaan input').prop('disabled', true);
	$('.panel-data-pekerjaan textarea').prop('disabled', true);
	$('.panel-data-usaha input').prop('disabled', true);
	$('.panel-data-pekerjaan textarea').prop('disabled', true);

	// disable agunan
	$('#tipe_kendaraan').prop('disabled', true);
	$('#warna').prop('disabled', true);
	$('#tahun').prop('disabled', true);
	$('#no_bpkb').prop('disabled', true);
	$("input[type=radio][name=atas_nama]").prop('disabled', true);
	$("input[type=radio][name=status_agunan]").prop('disabled', true);
	$("input[type=radio][name=imb]").prop('disabled', true);
	$('#ada').prop('disabled', true);
	$('#alamat_agunan').prop('disabled', true);
}

/**
 * Function getDataForm
 * Proses get semua data dari form yang ada untuk dibungkus kedalam object
 * @return {FormData} data
 */
function getDataForm(){
	var data = new FormData();

	// get value radio
	var status_nasabah = ($('input[name=status_nasabah][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=status_nasabah][type=radio]:checked').val().trim();
	var tujuan = ($('input[name=tujuan][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=tujuan][type=radio]:checked').val().trim();
	var jk = ($('input[name=jk][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=jk][type=radio]:checked').val().trim();
	var status_kawin = ($('input[name=status_kawin][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=status_kawin][type=radio]:checked').val().trim();
	var pendidikan_formal = ($('input[name=pendidikan_formal][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=pendidikan_formal][type=radio]:checked').val().trim();
	var status_rumah = ($('input[name=status_rumah][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=status_rumah][type=radio]:checked').val().trim();
	var pekerjaan = ($('input[name=pekerjaan][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=pekerjaan][type=radio]:checked').val().trim();
	var bentuk_usaha = ($('input[name=bentuk_usaha][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=bentuk_usaha][type=radio]:checked').val().trim();
	var jenis = ($('input[name=jenis][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=jenis][type=radio]:checked').val().trim();
	var atas_nama = ($('input[name=atas_nama][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=atas_nama][type=radio]:checked').val().trim();
	var status_agunan = ($('input[name=status_agunan][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=status_agunan][type=radio]:checked').val().trim();
	var imb = ($('input[name=imb][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=imb][type=radio]:checked').val().trim();
	var pilih_pekerjaan = ($('input[name=pilih_pekerjaan][type=radio]:checked').size() == 0) ? 
		"" : $('input[name=pilih_pekerjaan][type=radio]:checked').val().trim();

	// get value checkbox
	var seumur_hidup = ($('#seumur_hidup').is(":checked")) ? $('#seumur_hidup').val().trim() : "";

	// id dan tgl
	data.append('id', $('#id').val().trim());
	data.append('tgl', $('#tgl').val().trim());

	// data pinjaman
	data.append('status_nasabah', status_nasabah);
	data.append('limit_kredit', $('#limit_kredit').val().trim());
	data.append('jangka_waktu', $('#jangka_waktu').val().trim());
	data.append('tujuan', tujuan);
	data.append('jelaskan', $('#jelaskan').val().trim());

	// data permohonan
	data.append('nama', $('#nama').val().trim());
	data.append('nama_panggilan', $('#nama_panggilan').val().trim());
	data.append('tmpt_lahir', $('#tmpt_lahir').val().trim());
	data.append('tgl_lahir', $('#tgl_lahir').val().trim());
	data.append('jk', jk);
	data.append('no_ktp', $('#no_ktp').val().trim());
	data.append('berlaku', $('#berlaku').val().trim());
	data.append('seumur_hidup', seumur_hidup);
	data.append('status_kawin', status_kawin);
	data.append('jumlah_anak', $('#jumlah_anak').val().trim());
	data.append('pendidikan_formal', pendidikan_formal);
	data.append('nama_ibu', $('#nama_ibu').val().trim());
	data.append('alamat', $('#alamat').val().trim());
	data.append('status_rumah', status_rumah);
	data.append('sewa_rumah', $('#sewa_rumah').val().trim());
	data.append('no_telp', $('#no_telp').val().trim());

	// data suami-istri
	data.append('nama_suami_istri', $('#nama_suami_istri').val().trim());
	data.append('tmpt_lahir_suami_istri', $('#tmpt_lahir_suami_istri').val().trim());
	data.append('tgl_lahir_suami_istri', $('#tgl_lahir_suami_istri').val().trim());
	data.append('pekerjaan_suami_istri', $('#pekerjaan_suami_istri').val().trim());

	data.append('pilih_pekerjaan', pilih_pekerjaan);

	// data pekerjaan
	data.append('pekerjaan', pekerjaan);
	data.append('bidang_usaha_pekerjaan', $('#bidang_usaha_pekerjaan').val().trim());
	data.append('lama_bekerja', $('#lama_bekerja').val().trim());
	data.append('nama_perusahaan', $('#nama_perusahaan').val().trim());
	data.append('jabatan', $('#jabatan').val().trim());
	data.append('alamat_perusahaan', $('#alamat_perusahaan').val().trim());
	data.append('no_telp_perusahaan', $('#no_telp_perusahaan').val().trim());
	data.append('penghasilan_bersih_pekerjaan', $('#penghasilan_bersih_pekerjaan').val().trim());
	data.append('rata2_biaya_hidup', $('#rata2_biaya_hidup').val().trim());

	// data pekerjaan - usaha
	data.append('bentuk_usaha', bentuk_usaha);
	data.append('prosentase_kepemilikan', $('#prosentase_kepemilikan').val().trim());
	data.append('usaha_sejak', $('#usaha_sejak').val().trim());
	data.append('bidang_usaha', $('#bidang_usaha').val().trim());
	data.append('jumlah_karyawan', $('#jumlah_karyawan').val().trim());
	data.append('alamat_usaha', $('#alamat_usaha').val().trim());
	data.append('no_telp_usaha', $('#no_telp_usaha').val().trim());
	data.append('penghasilan_bersih', $('#penghasilan_bersih').val().trim());
	
	// data agunan
	data.append('jenis', jenis);
	data.append('tipe_kendaraan', $('#tipe_kendaraan').val().trim());
	data.append('warna', $('#warna').val().trim());
	data.append('tahun', $('#tahun').val().trim());
	data.append('no_bpkb', $('#no_bpkb').val().trim());
	data.append('atas_nama', atas_nama);
	data.append('status_agunan', status_agunan);
	data.append('imb', imb);
	data.append('ada', $('#ada').val().trim());
	data.append('alamat_agunan', $('#alamat_agunan').val().trim());

	// data keluarga
	data.append('nama_keluarga', $('#nama_keluarga').val().trim());
	data.append('alamat_keluarga', $('#alamat_keluarga').val().trim());
	data.append('no_telp_keluarga', $('#no_telp_keluarga').val().trim());
	data.append('hubungan_keluarga', $('#hubungan_keluarga').val().trim());
	
	// data upload
	data.append('file_ktp_pemohon', $('#file_ktp_pemohon')[0].files[0]);
	data.append('file_ktp_suami_istri', $('#file_ktp_suami_istri')[0].files[0]);
	data.append('file_kk', $('#file_kk')[0].files[0]);
	data.append('file_slip_gaji', $('#file_slip_gaji')[0].files[0]);
	data.append('file_stnk', $('#file_stnk')[0].files[0]);
	data.append('file_nota_pajak', $('#file_nota_pajak')[0].files[0]);
	data.append('file_bpkb', $('#file_bpkb')[0].files[0]);
	data.append('file_faktur', $('#file_faktur')[0].files[0]);
	data.append('file_kwintasi_jual_beli', $('#file_kwintasi_jual_beli')[0].files[0]);

	data.append('action', $('#submit_permohonan_kredit').val().trim());

	return data;
}

/**
 * Function submit
 * Proses submit semua data di form ke server
 */
function submit(){
	var data = getDataForm();

	$.ajax({
		url: BASE_URL+'permohonan-kredit/'+$('#submit_permohonan_kredit').val().trim()+'/',
		type: 'POST',
		dataType: 'JSON',
		data: data,
		contentType: false,
		cache: false,
		processData: false,
		beforeSend: function(){
			$('#submit_permohonan_kredit').prop('disabled', true);
			$('#submit_permohonan_kredit').prepend('<i class="fa fa-spin fa-refresh"></i> ');
		},
		success: function(response){
			console.log("Result Submit from Server: ", response);
			$('#submit_permohonan_kredit').prop('disabled', false);
			$('#submit_permohonan_kredit').html($('#submit_permohonan_kredit').text());
			setNotif(response.notif);
			if(response.success){
				setTimeout(function(){ 
					window.location.href = SITE_URL;
				}, 1000);
			}
			else setError(response.error);
		},
		error: function(jqXHR, textStatus, errorThrown){
			console.log("Error Submit Data to Server: ", jqXHR, textStatus, errorThrown);
			swal("Pesan Gagal", "Terjadi Kesalahan Teknis, Silahkan Coba Kembali", "error");
			$('#submit_permohonan_kredit').prop('disabled', false);
			$('#submit_permohonan_kredit').html($('#submit_permohonan_kredit').text());
		}
	});
}

/**
 * 
 */
function setError(error){
	$.each(error, function(index, item){
		if(item != ""){
			$('.field-'+index).removeClass('has-success').addClass('has-error');
			$('.pesan-'+index).text(item);
			$('.pesan-'+index).css('display', 'block');
		}
		else{
			$('.field-'+index).removeClass('has-error').addClass('has-success');
			$('.pesan-'+index).text('');
			$('.pesan-'+index).css('display', 'none');
		}
	});
}

/**
 * 
 */
function resetPekerjaan($type = 'full'){
	if($type == 'usaha'){
		$("input[type=radio][name=bentuk_usaha]").prop('checked', false);
		$('#bentuk_usaha').val('');
		$('#prosentase_kepemilikan').val('');
		$('#usaha_sejak').val('');
		$('#bidang_usaha').val('');
		$('#jumlah_karyawan').val('');
		$('#alamat_usaha').val('');
		$('#no_telp_usaha').val('');
		$('#penghasilan_bersih_pekerjaan').val('');
	}
	else if($type == 'pekerjaan'){
		$("input[type=radio][name=pekerjaan]").prop('checked', false);
		$('#bidang_usaha_pekerjaan').val('');
		$('#lama_bekerja').val('');
		$('#nama_perusahaan').val('');
		$('#jabatan').val('');
		$('#alamat_perusahaan').val('');
		$('#no_telp_perusahaan').val('');
		$('#penghasilan_bersih_pekerjaan').val('');
		$('#rata2_biaya_hidup').val('');
	}
	else if($type == 'full'){
		$("input[type=radio][name=pekerjaan]").prop('checked', false);
		$('#bidang_usaha_pekerjaan').val('');
		$('#lama_bekerja').val('');
		$('#nama_perusahaan').val('');
		$('#jabatan').val('');
		$('#alamat_perusahaan').val('');
		$('#no_telp_perusahaan').val('');
		$('#penghasilan_bersih_pekerjaan').val('');
		$('#rata2_biaya_hidup').val('');

		$("input[type=radio][name=bentuk_usaha]").prop('checked', false);
		$('#bentuk_usaha').val('');
		$('#prosentase_kepemilikan').val('');
		$('#usaha_sejak').val('');
		$('#bidang_usaha').val('');
		$('#jumlah_karyawan').val('');
		$('#alamat_usaha').val('');
		$('#no_telp_usaha').val('');
		$('#penghasilan_bersih_pekerjaan').val('');
	}
}

/**
 * 
 */
function resetAgunan(){
	$('#tipe_kendaraan').val('');
	$('#warna').val('');
	$('#tahun').val('');
	$('#no_bpkb').val('');
	$('#ada').val('');
	$('#alamat_agunan').val('');
	$("input[type=radio][name=atas_nama]").prop('checked', false);
	$("input[type=radio][name=status_agunan]").prop('checked', false);
	$("input[type=radio][name=imb]").prop('checked', false);
}