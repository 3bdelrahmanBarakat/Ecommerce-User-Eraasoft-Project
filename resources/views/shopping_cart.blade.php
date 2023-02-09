<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">


        </div>
        <div class="offcanvas__nav__option">

            <a href="/show_cart"><img src="img/icon/cart.png" alt=""> <span class="cart_count">{{$cart_count}}</span></a>

        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/home"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="/home">Home</a></li>
                            <li class="active"><a href="/shop">Shop</a></li>



                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">


                        <a href="/show_cart"><img src="img/icon/cart.png" alt=""> <span class="cart_count">{{$cart_count}}</span></a>

                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/home">Home</a>
                            <a href="/shop">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>

                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)


                                <tr class="productRow{{$cart_ids[$key]}}">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img width="60" height="60" src="{{$products[$key]['photo']}}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$products[$key]['Product_name']}}</h6>
                                            <h5>{{$products[$key]['price']}}</h5>
                                        </div>
                                    </td>

                                    <td class="cart__price">{{$products[$key]['price']}}</td>
                                    {{-- <td class="cart__close"><a href="{{url('delete_from_cart')}}/{{$cart_ids[$key]}}"><i class="fa fa-close"></i></a></td> --}}
                                    <td class="cart__close"><a class="delete_btn" product_id="{{$cart_ids[$key]}}"><i class="fa fa-close"></i></a></td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/shop">Continue Shopping</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    @if ($total_price != 0)


                    <div id="cart_total" class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total price <span id="total">$ {{$total_price}}</span></li>
                            {{-- <li>Total <span id="total">$</span></li> --}}
                        </ul>

                        <a href="/checkout" class="primary-btn">Proceed to checkout</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="/home"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>

                    </div>
                </div>



            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">

                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This website is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://barakat.com" target="_blank">Barakat</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).on('click', '.delete_btn' , function(e){

                e.preventDefault();
                var product_id = $(this).attr('product_id');
                let total_price = $(this).attr('total');
                $.ajax({
                    type: 'GET',
                    url: "{{ route('delete_from_cart') }}",
                    data: {
                        '_token' : "{{csrf_token()}}",
                        'id' : product_id,

                    },
                    success: function (data) {


                        console.log('The item is deleted successfully');

                        $("#total").text(data.total);

                        $(".cart_count").text(data.count);

                        $('.productRow'+data.id).remove();

                        if(data.total == 0)
                        {
                            $('#cart_total').remove();
                        }



                    },
                    error: function (reject){
                        console.log('Failed to add to cart');
                    }
                });
            });

    </script>
</body>

</html>
