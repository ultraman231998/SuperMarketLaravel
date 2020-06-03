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
                      <th>Sản phẩm</th>
                      <th>Mã sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Thời gian</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                  		<input type="hidden" name="id" value="{{$order->code_transaction}}">
              	        <?php foreach ($detail as $si): ?>
                           @if($order->code_transaction == $si->transaction_code)
                           <tr>
                   
                           	<td>
                           		<?php foreach ($pro as $pr): ?>
                           			@if($pr->id == $si->product_id)
                           			   {{$pr->name}}
                           			@endif
                           		<?php endforeach ?>

                           	</td>
                           	<td><?php foreach ($pro as $pr): ?>
                           			@if($pr->id == $si->product_id)
                           			   {{$pr->code_product}}
                           			@endif
                           		<?php endforeach ?></td>
                           		<td>{{$si->qty}}</td>
                           		<td>{{$si->price}}</td>
                           			<td>{{$si->created}}</td>
                           </tr>
                           
                           @endif
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