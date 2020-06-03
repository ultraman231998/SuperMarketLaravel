@include('Admin.inc.header')
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">

		<div class="col-lg-7">

			

			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Nhập thông tin</h6>
				</div>
				<div class="card-body">
					@if(count($errors)>0)
					<div class="alert alert-danger">
						<?php foreach ($errors->all() as $err): ?>
							{{$err}}<br>
						<?php endforeach ?>
					</div>
					@endif
					
					<form action="AddProduct" method="POST" enctype="multipart/form-data">
						@csrf
						<fieldset class="form-group">
							<label for="exampleInputEmail1">Tên sản phẩm</label>
							<input name="name" type="text" class="form-control" id="" placeholder="Tên sản phẩm">
						</fieldset>

						<fieldset class="form-group">
							<label for="exampleInputPassword1">Giá</label>
							<input type="number" name="price" placeholder="Giá"  class="form-control" >
						</fieldset>

						<fieldset class="form-group">
							<label for="exampleInputPassword1">Giá giảm</label>
							<input type="number" name="discount" placeholder="Giá giảm"  class="form-control" >
						</fieldset>
						<fieldset class="form-group">
							<label for="exampleInputPassword1">Số lượng</label>
							<input type="number" name="amount" placeholder="Số lượng"  class="form-control" >
						</fieldset>
                        <fieldset class="form-group" style="width: 300px">
							 <label for="exampleFormControlSelect2">Loại sản phẩm</label>
							    <select class="form-control" name="producttype_id">
							       <option selected="">----------------Chọn----------------</option>
						         <?php foreach ($productype as $prt): ?>
						           	     <option value="{{$prt->id_type}}">{{$prt->name_type}}</option>
						           <?php endforeach ?>
						          
						        </select>
	                    </fieldset>
					    <fieldset class="form-group" style="width: 300px">
							 <label for="exampleFormControlSelect2">Hãng</label>
							    <select class="form-control" name="supplier_id">
							       <option selected="">----------------Chọn----------------</option>
						           <?php foreach ($supplier as $ncc): ?>
						           	     <option value="{{$ncc->id}}">{{$ncc->name}}</option>
						           <?php endforeach ?>
						        </select>
	                    </fieldset>
						
						<fieldset class="form-group">
							<label for="exampleInputPassword1">Mô tả</label>
							<textarea name="content" id="noidung" rows="10" cols="82">
							</textarea>
							<script>
								CKEDITOR.replace( 'noidung' );
							</script>
						</fieldset>
						
						<button type="submit" class="btn btn-primary">Xác nhận</button>
					</div>
				</div>

			</div>

			<div class="col-lg-5">
				<input type="file" name="image" id="profile-img">
				<img src="" id="profile-img-tag" width="400px" />
			</div>
		</form>

	</div>

</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->
@include('Admin.inc.footer')
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('#profile-img-tag').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#profile-img").change(function(){
		readURL(this);
	});
</script>

<!-- <?php 

function data_tree($data, $parent_id = 0)
{
    $result =[];
    foreach ($data as $item) {
    	 if($item['parent_id']== $parent_id){
    	 	$result[]=$item;
    	    $child = data_tree($data,$item['id']);
    	    $result = array_merge($result,$child);
    	 }
    }
    return $result;
}




 ?>
 -->

