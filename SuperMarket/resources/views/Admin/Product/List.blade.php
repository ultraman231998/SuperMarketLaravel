@include('Admin.inc.header')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
      

          <!-- DataTales Example -->
           <!-- ?php echo form_open('Admin/Admin/multipledelete');?> -->
           
           {{ Form::open(array('action' => 'ProductController@multidelete', 'method' => 'post')) }}
           @csrf
           @if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
          @endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="Add" class="btn btn-outline-primary">Thêm mới sản phẩm</a>
              <input class="btn btn-outline-warning" type="submit" value="Xóa sản phẩm đã chọn" onclick="return confirm('Bạn chắc chắn muốn xóa')">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>CodeProduct</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($product as $value): ?>
                    	<tr>
                      <td><input type="checkbox" name="id[]" value="{{$value->id}}"></td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->code_product}}</td>
                      <td>{{$value->price}}</td>
                      <td>{{$value->discount}}</td>
                       <td>{{$value->amount}}</td>
                       <td>
                         <a href="Edit/{{$value->id}}" class="btn btn-outline-primary"><i class="fas fa-info"></i></a>
                         <a href="Delete/{{$value->id}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                       </td>
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
