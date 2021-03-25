function hapus(id) {
	$.ajax({
		url: base_url + "Dashboard/hapus_penyakit",
		type: "POST",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (data) {
			swal("Berhasil", "Data Penyakit Berhasil Di hapus", "success");
			reload_table(datatabel);
		},
	});
}

function editdata(id) {
	$.ajax({
		url: base_url + "dashboard/getdatabyid_penyakit",
		type: "POST",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (data) {
			// $("#id").val(data.id);
			$("#kode_penyakit").val(data.kode_penyakit);
			$("#nama_penyakit").val(data.nama_penyakit);

			let buttonedit = `
            <button type="button" class="btn btn-warning" id="btnedit" >Edit</button>
            <button type="button" class="btn btn-info" onclick="button_cancel()" >Close</button>
            `;
			$("#button_").html(buttonedit);

			$("#btnedit").click(function () {
				// let id = $("#id").val();
				var kode_penyakit = $("#kode_penyakit").val();
				var nama_penyakit = $("#nama_penyakit").val();
				$.ajax({
					url: base_url + "dashboard/updatedata_penyakit",
					type: "POST",
					data: {
						id: id,
						kode_penyakit: kode_penyakit,
						nama_penyakit: nama_penyakit,
					},
					dataType: "json",
					success: function () {
						// $("#id").val("");
						// $("#kode_penyakit").val("");
						// $("#nama_penyakit").val("");
						$("#exampleModal").modal("hide");
						swal("Berhasil", "Data Penyakit Berhasil Diubah", "success");
						reload_table(datatabel);
						cancel();
					},
				});
			});
		},
	});
}

function button_cancel() {
	$("#exampleModal").modal("hide");
}

function cancel() {
	$("#id").val("");
	$("#kode_penyakit").val("");
	$("#nama_penyakit").val("");
	let buttontambah = `
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" onclick="form_tambah()" class="btn btn-info">Submit Data</button>
                `;
	$("#button_").html(buttontambah);
}

$("#buttoncancel").click(function () {
	$("#exampleModal").modal("hide");
	cancel();
});

function reload_table(table) {
	table.ajax.reload();
}

function form_tambah() {
	var kode_penyakit = $("#kode_penyakit").val();
	var nama_penyakit = $("#nama_penyakit").val();

	$.ajax({
		url: base_url + "dashboard/tambah_penyakit",

		type: "POST",
		data: {
			kode_penyakit: kode_penyakit,
			nama_penyakit: nama_penyakit,
		},
		dataType: "json",
		success: function (data) {
			// $("#id").val("");
			$("#kode_penyakit").val("");
			$("#nama_penyakit").val("");
			$("#exampleModal").modal("hide");
			swal("Berhasil", "Data Penyakit Berhasil Ditambahkan", "success");
			reload_table(datatabel);
			cancel();
		},
	});
}

$(document).ready(function () {
	datatabel = $("#datatabel_penyakit").DataTable({
		dom: "rt",
		aaSorting: [],
		scrollY: "600px",
		scrollX: true,
		scrollCollapse: true,
		paging: false,
		fixedColumns: {
			leftColumns: 1,
			rightColumns: 1,
		},
		retrieve: true,
		processing: true,
		ajax: {
			type: "GET",
			url: base_url + "Dashboard/tampildata_penyakit",
			dataSrc: "",
			dataType: "json",
		},
		columns: [
			{
				render: function (full, type, data, meta) {
					return data.kode_penyakit;
				},
			},
			{
				render: function (full, type, data, meta) {
					return data.nama_penyakit;
				},
			},
			{
				render: function (full, type, data, meta) {
					return `

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick='editdata(${data.id})' style="margin-left: 5px">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger" onclick='hapus(${data.id})'>
                        <i class="fa fa-trash"></i>
                    </button>
                    `;
				},
			},
		],
	});
});
