@extends('admin.layouts.dashboard')

@section('content')

<div class="row">
    
  <div class="col-md-8 col-md-offset-2">
    
    <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="{{asset('adminlte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                <span class="username"><a href="#">Fadly.</a></span>
                <span class="description">0877-4146-5953 (WA)</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p>Ingin membuat aplikasi atau sistem berbasis Web? Kami siap memberikan solusi untuk anda.</p>

              <p>Kami sudah berpengalaman dalam mengerjakan project system berbasis Web dengan harga mahasiswa, Memiliki portofolio yang bisa dibuktikan, selengkap nya jangan sungkan untuk menghubungi kami.. 0877-4146-5953 (WA)</p>

              <p>Free Source Code lainnya : <a href="https://www.sangcahaya.com/search/label/laravel">www.sangcahaya.com</a></p>
            <!-- /.box-footer -->
          </div>

  </div>

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
	})
</script>

@endsection