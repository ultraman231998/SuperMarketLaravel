@include('Customer.inc.header')

<div class="container">
	<div class="row">
		<div class="col-md-12">
		
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <center>Đăng ký thành công</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <center><a href="<?= url('') ?>/Login">Di chuyển đến trang đăng nhập</a></center>
         
		</div>
	</div>
</div>

@include('Customer.inc.footer')