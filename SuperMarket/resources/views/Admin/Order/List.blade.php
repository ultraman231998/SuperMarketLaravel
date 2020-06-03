@include('Admin.inc.header')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mã đơn hàng</th>
                      <th>Người mua</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Ngày mua</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($order as $value): ?>
                    	<tr>
                      <td>{{$value->code_transaction}}</td>
                      <td>{{$value->user_name}}</td>
                      <td>0{{$value->user_phone}}</td>
                      <td>{{$value->user_address}}</td>
                      <td>{{$value->created}}</td>
                      <td>
                      	<a href="<?= url('') ?>/Admin/Order/Info/{{$value->id}}" class="btn btn-outline-secondary"><i class="fas fa-info"></i></a>
                      	<a href="<?= url('') ?>/Admin/Order/Delete/{{$value->id}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@include('Admin.inc.footer')