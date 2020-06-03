@include('Customer.inc.header')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" align="center">
				<strong><h2>Đăng ký</h2></strong>
			</div>	
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-md-6">
      @if(count($errors)>0)
       <?php foreach ($errors->all() as $err): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
         
              {{$err}}<br>
           
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
       </div>
        <?php endforeach ?>
      @endif
			<form method="POST" action="Register">
				@csrf
         
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input type="password" class="form-control" name="password"  placeholder="Nhập mật khẩu">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
    <input type="password" class="form-control" name="confirmpassword"  placeholder="Nhập lại mật khẩu">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tên người dùng</label>
    <input type="text" class="form-control" name="name"  placeholder="Tên người dùng">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Địa chỉ</label>
    <input type="text" class="form-control" name="address"  placeholder="Địa chỉ">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Số điện thoại</label>
    <input type="number" class="form-control" name="phone"  placeholder="Số điện thoại">
  </div>
  <button type="submit" class="btn btn-primary">Đăng ký</button>
</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<br>
@include('Customer.inc.footer')