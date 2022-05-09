@extends("frontend/master/master")
@section("title","Vietpro store - Thanh toán")
@section("main")

    <div class="colorlib-shop">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Giỏ hàng</h3>
                        </div>
                        <div class="process text-center active">
                            <p><span>02</span></p>
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Hoàn tất thanh toán</h3>
                        </div>
                    </div>
                </div>
            </div>

            <form method="post" class="colorlib-form" action="/gio-hang/thanh-toan">
                <div class="row">
                    <div class="col-md-7" style="background-color: whitesmoke">
                        <h2 style="padding-top: 20px">Chi tiết thanh toán</h2>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Họ & Tên</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Full Name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                           placeholder="Nhập địa chỉ của bạn" value="{{old('address')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="email">Địa chỉ email</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                           placeholder="Ex: youremail@domain.com" value="{{old('email')}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="Phone">Số điện thoại</label>
                                    <input name="phone" type="text" id="Phone" class="form-control"
                                           placeholder="Ex: 0123456789" value="{{old('phone')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="cart-detail">
                            <h2>Tổng Giỏ hàng</h2>
                            <ul>
                                <li>
                                    <ul>
                                        @foreach($cart as $item)
                                            <li><span>{{$item->qty}} x {{$item->name}}</span>
                                                <span>₫ {{$item->qty * $item->price}}</span></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li><span>Tổng tiền đơn hàng</span> <span>₫ {{$priceTotal}}</span></li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>



    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>

    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>



    <!-- Main -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>

@endsection