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

function editdata(id_penyakit) {
	$.ajax({
		url: base_url + "dashboard/getdatabyid_penyakit",
		type: "POST",
		data: {
			id_penyakit: id_penyakit,
		},
		dataType: "json",
		success: function (data) {
			// $("#id").val(data.id);
			$("#kode_penyakit").val(data.kode_penyakit);
			$("#nama_penyakit").val(data.nama_penyakit);
			$("#deskripsi_penyakit").val(data.deskripsi_penyakit);
			$("#solusi_penyakit").val(data.solusi_penyakit);

			let buttonedit = `
            <button type="button" class="btn btn-warning" id="btnedit" >Edit</button>
            <button type="button" class="btn btn-info" onclick="button_cancel()" >Close</button>
            `;
			$("#button_").html(buttonedit);

			$("#btnedit").click(function () {
				var kode_penyakit = $("#kode_penyakit").val();
				var nama_penyakit = $("#nama_penyakit").val();
				var deskripsi_penyakit = $("#deskripsi_penyakit").val();
				var solusi_penyakit = $("#solusi_penyakit").val();
				$.ajax({
					url: base_url + "dashboard/updatedata_penyakit",
					type: "POST",
					data: {
						id_penyakit: id_penyakit,
						kode_penyakit: kode_penyakit,
						nama_penyakit: nama_penyakit,
						deskripsi_penyakit: deskripsi_penyakit,
						solusi_penyakit: solusi_penyakit,
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
	$("#deskripsi_penyakit").val("");
	$("#solusi_penyakit").val("");
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
	var deskripsi_penyakit = $("#deskripsi_penyakit").val();
	var solusi_penyakit = $("#solusi_penyakit").val();

	$.ajax({
		url: base_url + "dashboard/tambah_penyakit",
		type: "POST",
		data: {
			kode_penyakit: kode_penyakit,
			nama_penyakit: nama_penyakit,
			deskripsi_penyakit: deskripsi_penyakit,
			solusi_penyakit: solusi_penyakit,
		},
		dataType: "json",
		success: function (data) {
			// $("#id").val("");
			$("#kode_penyakit").val("");
			$("#nama_penyakit").val("");
			$("#deskripsi_penyakit").val("");
			$("#solusi_penyakit").val("");
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
					return data.deskripsi_penyakit;
				},
			},
			{
				render: function (full, type, data, meta) {
					return data.solusi_penyakit;
				},
			},
			{
				render: function (full, type, data, meta) {
					return `

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick='editdata(${data.id_penyakit})'>
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger" onclick='hapus(${data.id_penyakit})'>
                        <i class="fa fa-trash"></i>
                    </button>
                    `;
				},
			},
		],
	});
});
