@include('Customer.inc.header')
<!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
           
             
           <form action="Cart/UpdateCart" method="post">
            @csrf
                <?php foreach ($cart as $value): ?>
                   <tr>
                  <td>
                    <div class="media">
                      <div class="media-body">
                        <p>{{$value->name}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>${{ number_format($value->price, 2) }}</h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <input
                        type="text"
                        name="qty_{{$value->id}}"
                        id="qty_{{$value->id}}"
                        maxlength="12"
                        value="{{$value->qty}}"
                        title="Quantity:"
                        class="input-text qty"
                      />
                      <button
                        onclick="var result = document.getElementById('qty_{{$value->id}}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                        class="increase items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-up"></i>
                      </button>
                      <button
                        onclick="var result = document.getElementById('qty_{{$value->id}}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                        class="reduced items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-down"></i>
                      </button>
                    </div>
                  </td>
                  <td>
                    <h5>${{number_format($value->subtotal,2)}}</h5>
                  </td>
                  <td><a href="Cart/DeleteCart/{{$value->id}}" class="btn btn-danger">Xóa</a></td>
                </tr>
              <?php endforeach ?>
              
          
                <tr class="bottom_button">
                  <td>
                     <button class="gray_btn">Update Cart</button>
                  </td>
                  <td></td>
                  <td>  <h5>Subtotal</h5></td>
                  <td>
                     <h5>$<?= Cart::priceTotal() ?></h5>
                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="gray_btn" href="">Continue Shopping</a>
                      <a class="main_btn" href="<?= url('') ?>/Checkout">Proceed to checkout</a>
                    </div>
                  </td>
                </tr>
                 </form>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->

@include('Customer.inc.footer')