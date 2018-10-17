$(document).ready(function (){
    // on click export
    $('#exportExcel').on('click', function(){
        console.log('Export clicked..');
        getExport($('#id').val(), $('#type').val());
    });

    // on click hapus
    $('#hapus').on('click', function(){
        console.log('Delete clicked..');
        getDelete($('#id').val())
    });

    // on click kembali
    $('#kembali').on('click', function(){
        console.log('Back clicked..');
        back();
    });
});

/**
 *  
 */
function getExport(id, type){
    window.open(BASE_URL+'permohonan-kredit-admin/export/'+id+'/?export='+type,'_blank');
}

/**
 * 
 */
function getDelete(id){
    swal({
        title: "Pesan Konfirmasi",
        text: "Apakah Anda Yakin Akan Menghapus Data Ini !!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
        closeOnConfirm: false,
    }, function(){
        $.ajax({
            url: BASE_URL+'permohonan-kredit-admin/delete/'+id,
            type: 'post',
            dataType: 'json',
            data: {},
            beforeSend: function(){
                disableButton();
            },
            success: function(response){
                disableButton(false);
                console.log('Response getDelete: ',response);
                if(response.success){
                    setNotif(response.notif);
                    setTimeout(function(){ 
                         window.location.href = BASE_URL+'permohonan-kredit-admin/'; 
                    }, 1500);
                }
            },
            error: function (jqXHR, textStatus, errorThrown){ // error handling
                disableButton(false);
                console.log('Response error getDelete: ', jqXHR, textStatus, errorThrown);
                swal("Pesan Gagal", "Terjadi Kesalahan Teknis, Silahkan Coba Kembali", "error");
            }
        })
    });

}

/**
*
*/
function back(){
    window.location.href = BASE_URL+'permohonan-kredit-admin/';
}

/**
 * 
 */
function disableButton(disable = true){
    if(disable){
        $('#export').prop('disabled', true);
        $('#hapus').prop('disabled', true);
        $('#kembali').prop('disabled', true);
    }
    else{
        $('#export').prop('disabled', false);
        $('#hapus').prop('disabled', false);
        $('#kembali').prop('disabled', false);
    }
}