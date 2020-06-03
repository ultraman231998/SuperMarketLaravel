@include('Admin.inc.header')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          {{ Form::open(array('action' => 'ProductTypeController@multidelete', 'method' => 'post')) }}
           @csrf
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a type="button" class="btn btn-outline-info"  data-toggle="modal" data-target="#addModel">Thêm loại sản phẩm</a>
              <input class="btn btn-outline-warning" type="submit" value="Xóa loại sản phẩm đã chọn" onclick="return confirm('Bạn chắc chắn muốn xóa')">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Type</th>
                      <th>Catalog</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($type as $value): ?>

                  		<tr>
                        <td><input type="checkbox" name="id_type[]" value="{{$value->id_type}}"></td>
                  		<td>{{$value->name_type}}</td>
                  		<td>
                  			<?php foreach ($catalog as $cata): ?>
                  				
                  				 @if($value->catalog_id == $cata->id)
                  				  {{$cata->name}}
                  				 @else

                  				 @endif
                  				
                  			<?php endforeach ?>
                  		</td>
                  		<td><a type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModel{{$value->id_type}}"><i class="fas fa-info"></i></a>
                     	<a type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModel{{$value->id_type}}"><i class="fas fa-trash"></i></a></td>
                  	</tr>
                  	
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    {{ Form::close() }}
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@include('Admin.inc.footer')
<!-- bắt đầu xóa -->
  
<?php foreach ($type as $value): ?>
<div class="modal fade" id="deleteModel{{$value->id_type}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa loại sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
      <h2 class="text-center">Có chắc xóa</h2>
      </div>
      <div class="modal-footer">
       
       	 <form method="post" action="Delete/{{$value->id_type}}">
       	 	@csrf
       	 	{{$value->id_type}}
        	<input value="Xóa" type="submit" class="btn btn-danger">
        		<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
        </form>
       
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- hết xóa -->

<!-- bắt đầu thêm -->

    <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Thêm mới danh mục</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"> 
            <form action="Add" method="post">
            	  @csrf
              <div class="form-group">
                <label for="number">Tên loại sản phẩm</label>
                <input type="text" class="form-control" name="name_type" placeholder="Tên danh mục">
              </div>
              <div class="form-group">
                <label for="number">Tên danh mục</label>
                <select class="form-control" name="catalog_id">
                	<option selected="selected">----Chọn----</option>
  					<?php foreach ($catalog as $catas): ?>
  						<option value="{{$catas->id}}">{{$catas->name}}</option>
  					<?php endforeach ?>
				</select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
              <input type="submit" class="btn btn-outline-primary" value="Thêm">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 
  <!-- hết thêm -->

<!-- bắt đầu sửa -->

    <?php foreach ($type as $value): ?> 
  <div class="modal fade" id="editModel{{$value->id_type}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title">Chỉnh sửa thông tin loại sản phẩm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
              
        <!-- Modal body -->
        <div class="modal-body">
          <form action="Edit" method="POST">
          @csrf
          <input hidden="hidden" type="text" name="id_type" value="{{$value->id_type}}"> 

           <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" name="name_type" value="{{$value->name_type}}">
          </div>
          <div class="form-group">
                <label for="number">Tên danh mục</label>
                <select class="form-control" name="catalog_id">
                	<option selected="selected">----Chọn----</option>
  					<?php foreach ($catalog as $catas): ?>
  						<option value="{{$catas->id}}">{{$catas->name}}</option>
  					<?php endforeach ?>
				</select>
              </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">OK</button>
      </div>
        </div>
      
  </form>
      
      
  
    </div> 
    </div>
  </div>
  <?php endforeach ?>

<!-- hết sửa -->