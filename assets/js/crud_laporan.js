// $(".laporanPerTanggal").on("click", function () {
// 	const tanggal = $(this).data("laporan");

// 	$.ajax({
// 		url: base_url + "Dashboard/tampil_laporan_pertanggal",
// 		type: "POST",
// 		data: {
// 			tanggal: tanggal,
// 		},
// 		dataType: "json",
// 		success: function (data) {
// 			reload_table(datatabel);
// 			alert(data);
// 		},
// 	});
// });

// function reload_table(table) {
// 	table.ajax.reload();
// }

// $(document).ready(function () {
// 	datatabel_laporan = $("#datatabel_laporan").DataTable({
// 		dom: "rt",
// 		aaSorting: [],
// 		scrollY: "600px",
// 		scrollX: true,
// 		scrollCollapse: true,
// 		paging: false,
// 		fixedColumns: {
// 			leftColumns: 1,
// 			rightColumns: 1,
// 		},
// 		retrieve: true,
// 		processing: true,
// 		ajax: {
// 			type: "GET",
// 			url: base_url + "Dashboard/tampil_laporan_pertanggal",
// 			dataSrc: "",
// 			dataType: "json",
// 		},
// 		columns: [
// 			{
// 				render: function (full, type, data, meta) {
// 					return data.kategori;
// 				},
// 			},
// 			{
// 				render: function (full, type, data, meta) {
// 					return data.nama;
// 				},
// 			},
// 			{
// 				render: function (full, type, data, meta) {
// 					return data.qty;
// 				},
// 			},
// 			{
// 				render: function (full, type, data, meta) {
// 					return data.harga;
// 				},
// 			},
// 			{
// 				render: function (full, type, data, meta) {
// 					return `

// 					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick='editdata(${data.id})' style="margin-left: 5px">
// 						<i class="fa fa-edit"></i>
// 					</button>
// 					<button type="button" class="btn btn-danger" onclick='hapus(${data.id})'>
// 						<i class="fa fa-trash"></i>
// 					</button>
// 					`;
// 				},
// 			},
// 		],
// 	});
// });
