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
					<?php foreach ($pr as $value): ?>
						
						<form action="{{ action('ProductController@editproduct') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{$value->id}}">
						<fieldset class="form-group">
							<label for="exampleInputEmail1">Tên sản phẩm</label>
							<input name="name" type="text" class="form-control" id="" value="{{$value->name}}">
						</fieldset>

						<fieldset class="form-group">
							<label for="exampleInputPassword1">Giá</label>
							<input type="number" name="price" placeholder="Giá"  class="form-control" value="{{$value->price}}">
						</fieldset>

						<fieldset class="form-group">
							<label for="exampleInputPassword1">Giá giảm</label>
							<input type="number" name="discount" placeholder="Giá giảm"  class="form-control" value="{{$value->discount}}">
						</fieldset>
						<fieldset class="form-group">
							<label for="exampleInputPassword1">Số lượng</label>
							<input type="number" name="amount" placeholder="Số lượng"  class="form-control" value="{{$value->amount}}" >
						</fieldset>
                        <fieldset class="form-group" style="width: 300px">
							 <label for="exampleFormControlSelect2">Danh mục</label>
							    <select class="form-control" name="producttype_id">
							       <option selected="">----------------Chọn----------------</option>
							       <?php foreach ($producttype as $prtype): ?>
							       	  <option value="{{ $prtype->id_type }}" {{$value->producttype_id == $prtype->id_type  ? 'selected' : ''}}>{{ $prtype->name_type}}</option>

							       <?php endforeach ?>
						        </select>
	                    </fieldset>
					    <fieldset class="form-group" style="width: 300px">
							 <label for="exampleFormControlSelect2">Hãng</label>
							    <select class="form-control" name="supplier_id">
							      <option value="" > -- Chọn -- </option>
				               <?php foreach ($supplier as $ncc): ?>
										 <option value="{{ $ncc->id }}" {{$value->supplier_id == $ncc->id  ? 'selected' : ''}}>{{ $ncc->name}}</option>
									<?php endforeach ?>
						        </select>
	                    </fieldset>
						
						<fieldset class="form-group">
							<label for="exampleInputPassword1">Mô tả</label>
							<textarea name="content" id="noidung" rows="10" cols="82">
							{{$value->content}}  
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
				<input type="file" name="image" id="profile-img" value="{{$value->image}}">
				<img src="<?= url('') ?>/{{$value->image}}" id="profile-img-tag" width="400px" />
			</div>
		</form>
					<?php endforeach ?>

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


<?php 


function fetch_menu($catalog,$selectedCatalog){

	foreach($catalog as $menu){

		if ($menu->id==$selectedCatalog) {
			echo "<option selected value='".$menu->id."'>".$menu->name."</option>";
		}
		else {
			echo "<option value='".$menu->id."'>".$menu->name."</option>";
		}

		if(!empty($menu->sub)){
			fetch_sub_menu($menu->sub,$selectedCatalog);

		}

	}

}


function fetch_sub_menu($sub_menu,$selectedCatalog){

	foreach($sub_menu as $menu){

		if ($menu->id==$selectedCatalog) {
			echo "<option selected value='".$menu->id."'>"."&#160;&#160;&#160;&#160;&#160;".$menu->name."</option>";
		} else{

			echo "<option value='".$menu->id."'>"."&#160;&#160;&#160;&#160;&#160;".$menu->name."</option>";
		}
		
		if(!empty($menu->sub)){

			fetch_sub_menu($menu->sub);
		}   

	}

}

?>