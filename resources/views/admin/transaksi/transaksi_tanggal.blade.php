@extends('admin.layouts.dashboard')

@section('content')

<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3>{{ $title }}</h3>
			</div>
			<div class="box-body">
				
				<div class="row">
					<form role="form" action="{{ url('admin/transaksi/tanggal') }}" method="get">
						<div class="col-md-4">
							<input type="text" value="{{ date('Y-m-d') }}" name="tgl_awal" class="form-control tanggal" placeholder="Pilih Tanggal" autocomplete="off">
						</div>
						<div class="col-md-4">
							<input type="text" value="{{ date('Y-m-d') }}" name="tgl_akhir" class="form-control tanggal" placeholder="Pilih Tanggal" autocomplete="off">
						</div>
						<div class="col-md-4">
							<button class="btn btn-block btn-primary">Periksa</button>
						</div>
					</form>
				</div>

				<table class="table table-stripped table-bordered table-barang">
					<thead>
						<tr>
							<th>Barang</th>
							<th>Qty</th>
							<th>Total</th>
							<th>Tanggal</th>
						</tr>
					</thead>
				</table>



			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var flash = "{{ Session::has('pesan') }}";
		if(flash){
			var pesan = "{{ Session::get('pesan') }}";
			swal('Success',pesan,'success');
		}

		$('.tanggal').datepicker({
	      autoclose: true,
	      format: 'yyyy-mm-dd'
	    })

		$('.table-barang').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "{{ url('admin/transaksi/yajra/'.$tgl1.'/'.$tgl2) }}",
	        columns: [
	            {data: 'barang_id', name: 'barang_id'},
	            {data: 'qty', name: 'qty'},
	            {data: 'total', name: 'total'},
	            {data: 'tanggal', name: 'tanggal'},
	        ],
          order: [ [0, 'asc'] ]
	    });

	    // Ketika btn tambah di klik
	    $('.btn-tambah').click(function(e){
	    	e.preventDefault();
	    	$('#modal-tambah').modal();
	    });

	    // Button edit di klik
	    $('body').on('click','.btn-edit',function(e){
	    	var id = $(this).attr('barang-id');
	    	$.ajax({
	    		'type':'get',
	    		'url':"{{ url('admin/transaksi/yajra/'.$tgl1.'/'.$tgl2) }}"+'/'+id,
	    		success: function(data){
	    			console.log(data);
	    			$('#modal-edit').find("input[name='nama']").val(data.nama);
	    			$('#modal-edit').find("input[name='harga_awal']").val(data.harga_awal);
	    			$('#modal-edit').find("input[name='discount']").val(data.discount);

	    			var url = "{{ url('admin/barang') }}"+'/'+id;

	    			$('#modal-edit').find('form').attr('action',url);
	    		}
	    	})

	    	$('#modal-edit').modal();
	    })
	})
</script>

@endsection