$(document).ready(function () {
	var nasabahTable = $("#permohonan_kreditTable").DataTable({
        "language" : {
            "lengthMenu": "Tampilkan _MENU_ data/page",
            "zeroRecords": "Data Tidak Ada",
            "info": "Menampilkan _START_ s.d _END_ dari _TOTAL_ data",
            "infoEmpty": "Menampilkan 0 s.d 0 dari 0 data",
            "search": "Pencarian:",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        },
        "lengthMenu": [ 10, 25, 75, 100 ],
        "pageLength": 10,
        order: [],
        processing: true,
        serverSide: true,
        ajax: {
            url: BASE_URL+"permohonan-kredit-admin/get-list/",
            type: 'POST',
			data: {},
        },
        "columnDefs": [
            {
                "targets":[0, 10],
                "orderable":false,
            }
        ],
        createdRow: function(row, data, dataIndex){}
	});
	
    // get view
    

    // get delete

});