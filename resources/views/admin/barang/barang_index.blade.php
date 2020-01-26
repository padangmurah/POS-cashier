@extends('admin.layouts.dashboard')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3>{{ $title }}</h3>
			</div>
			<div class="box-body">
				


				<button class="btn btn-block btn-primary btn-tambah"><i class="fa fa-fw fa-cart-plus"></i> Tambah</button>
				<table class="table table-stripped table-bordered table-barang">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Harga Awal</th>
							<th>Discount</th>
							<th>Harga Akhir</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>



			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal modal-default fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        


      		<form role="form" action="{{ url('admin/barang') }}" method="POST">
      			{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga Awal</label>
                  <input type="number" name="harga_awal" class="form-control" id="exampleInputEmail1" placeholder="Harga Awal">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Discount</label>
                  <input type="number" name="discount" class="form-control" id="exampleInputEmail1" value="0">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Tambah</button>
              </div>
            </form>



      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal Edit -->
<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit Barang</h4>
      </div>
      <div class="modal-body">
        


      		<form role="form" action="#" method="POST">
      			{{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga Awal</label>
                  <input type="number" name="harga_awal" class="form-control" id="exampleInputEmail1" placeholder="Harga Awal">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Discount</label>
                  <input type="number" name="discount" class="form-control" id="exampleInputEmail1" value="0">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
		var flash = "{{ Session::has('pesan') }}";
		if(flash){
			var pesan = "{{ Session::get('pesan') }}";
			swal('Success',pesan,'success');
		}

		$('.table-barang').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "{{ url('admin/barang/yajra') }}",
	        columns: [
	            {data: 'nama', name: 'nama'},
	            {data: 'harga_awal', name: 'harga_awal'},
	            {data: 'discount', name: 'discount'},
	            {data: 'harga_akhir', name: 'harga_akhir'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
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
	    		'url':"{{ url('admin/barang/get') }}"+'/'+id,
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