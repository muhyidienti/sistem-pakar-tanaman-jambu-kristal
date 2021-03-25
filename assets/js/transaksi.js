function pilih(id) {
	$.ajax({
		url: base_url + "Transaksi/simpanPilihan",
		type: "POST",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (data) {
			swal("Berhasil", "Data Berhasil Di Pilih", "success");
			reload_table(datatabel);
			datatabel_jumlah.ajax.reload();
		},
	});
}

function bayar() {
	bayar = $("#bayar").val();

	$.ajax({
		url: base_url + "Transaksi/bayar",
		type: "POST",
		data: {
			bayar: bayar,
		},
		dataType: "json",
		success: function (data) {
			$("#kembalian").val(data);
		},
	});
}

function ubahQty(id, type) {
	$.ajax({
		url: base_url + "Transaksi/ubahQty",
		type: "POST",
		data: {
			id: id,
			type: type,
		},
		dataType: "json",
		success: function (data) {
			reload_table(datatabel);
			datatabel_jumlah.ajax.reload();
		},
	});
}

datatabel_jumlah = $("#datatabel_jumlahHarga").DataTable({
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
		url: base_url + "Transaksi/jumlahTransaksi",
		dataSrc: "",
		dataType: "json",
	},
	columns: [
		{
			render: function (full, type, data, meta) {
				return data.jumlahHarga;
			},
		},
	],
});

datatabel = $("#datatabel_transaksi").DataTable({
	dom: "rt",
	aaSorting: [],
	scrollY: "300px",
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
		url: base_url + "Transaksi/tampildata_transaksi",
		dataSrc: "",
		dataType: "json",
	},
	columns: [
		{
			render: function (full, type, data, meta) {
				return data.nama;
			},
		},
		{
			render: function (full, type, data, meta) {
				return `
                    <div style="display: flex">
					<button type="button" class="btn btn-danger btn-sm" onclick='ubahQty(${data.id}, "kurang")'>
					<i class="fa fa-minus"></i>
					</button>
						<p id="qty" class="mr-2 ml-2" >${data.qty}</p>
						<button type="button" class="btn btn-info btn-sm"  onclick='ubahQty(${data.id}, "tambah")' style="margin-left: 5px">
							<i class="fa fa-plus"></i>
						</button>
					</div>
                    `;
			},
		},
		{
			render: function (full, type, data, meta) {
				return data.harga;
			},
		},
	],
});

function reload_table(table) {
	table.ajax.reload();
}
