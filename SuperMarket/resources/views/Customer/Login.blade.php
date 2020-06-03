@include('Customer.inc.header')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" align="center">
				<strong><h2>Đăng nhập</h2></strong>
			</div>	
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-md-6">
			<form method="POST" action="Login">
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email đăng nhập</label>
			    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Mật khẩu</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu">
			  </div>
			  <div class="form-group form-check">
			 
			  </div>
			  <button type="submit" class="btn btn-primary">Đăng nhập</button>
			</form>
			<br>	
		    Chưa có tài khoản?<a href="<?= url('') ?>/Register"> Nhấn vào đây để tạo tài khoản</a>

		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<br>
@include('Customer.inc.footer')