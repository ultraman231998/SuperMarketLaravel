@include('Customer.inc.header')
  <!--================Home Banner Area =================-->
    <!--================End Home Banner Area =================-->
    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar">
              <div class="left_dorp">
                <select class="sorting">
                  <option value="1">Default sorting</option>
                  <option value="2">Default sorting 01</option>
                  <option value="4">Default sorting 02</option>
                </select>
                <select class="show">
                  <option value="1">Show 12</option>
                  <option value="2">Show 14</option>
                  <option value="4">Show 16</option>
                </select>
              </div>
            </div>
            
            <div class="latest_product_inner">
              <div class="row">
               <?php foreach ($pro as $value): ?>
                  <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="<?= url('') ?>/{{$value->image}}"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="<?= url('') ?>/Product/{{$value->id}}">
                          <i class="ti-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4>{{$value->name}}</h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">${{ number_format($value->discount, 2) }}</span>
                        <del>${{ number_format($value->price, 2) }}</del>
                      </div>
                    </div>
                  </div>
                </div>
               <?php endforeach ?>

              </div>
                <center><div>{{$pro->links()}}</div></center>
            </div>

          </div>
          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Loại</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                   <li><a href="<?= url('') ?>/Catalog">Tất cả</a></li>
                    <?php foreach ($type as $typ): ?>
                  
                         <li><a href="<?= url('') ?>/CatalogbyType/{{$typ->id_type}}">{{$typ->name_type}}</a></li>
                     
                    <?php endforeach ?>
                  

                   
                  </ul>
                </div>
              </aside>
               <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Danh mục</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    <?php foreach ($cata as $value): ?>
                      <li>
                      <a href="">{{$value->name}}</a>
                    </li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Category Product Area =================-->
@include('Customer.inc.footer')