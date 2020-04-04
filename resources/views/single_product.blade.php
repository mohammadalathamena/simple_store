<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Winter</title>
  <link rel="icon" href="../img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="../css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/lightslider.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="../css/flaticon.css">
  <link rel="stylesheet" href="../css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-white">
   <!--::header part start::-->
   <header class="main_menu home_menu">
      <div class="container-fluid">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-11">
                <nav class="navbar navbar-light">
                <h1>Logo</h1>
                    @if(Session::get('login')=='loged')
                    @if(Hash::check('ceo', Session::get('permission')))
                    <ul class="navbar-nav">
                        <li class="nav-item" >
                            <a class="nav-link" href="indexCEO">Mangment</a>
                        </li>
                    </ul>
                    @elseif(Hash::check('super_user', Session::get('permission')))
                    <ul class="navbar-nav">
                        <li class="nav-item" >
                            <a class="nav-link" href="indexSuper">Mangment</a>
                        </li>
                    </ul>
                    @endif
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item" >
                            <a class="nav-link" href="/login">login</a>
                        </li>
                    </ul>
                    @endif
                </nav>
              </div>
          </div>
      </div>
      <div class="search_input" id="search_input_box">
          <div class="container ">
              <form class="d-flex justify-content-between search-inner">
                  <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                  <button type="submit" class="btn"></button>
                  <span class="ti-close" id="close_search" title="Close Search"></span>
              </form>
          </div>
      </div>
  </header>
    <!-- Header part end-->
  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-5">
          <div class="product_slider_img">
            <div id="vertical">
              <img src="../img/product_details/prodect_details_1.png" />
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3>Faded SkyBlu Denim Jeans</h3>
            <h2>$149.99</h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : Household</a>
              </li>
              <li>
                <a href="#"> <span>Availibility</span> : In Stock</a>
              </li>
            </ul>
            <p>
                Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time.
            </p>
            <div class="card_area">
              <div class="product_count d-inline-block">
                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                <input class="input-number" type="text" value="1" min="0" max="10">
                <span class="number-increment"> <i class="ti-plus"></i></span>
              </div>
              <div class="add_to_cart">
                  <a href="#" class="btn_3">add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" aria-selected="true" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Specification</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
            Beryl Cook is one of Britain’s most talented and amusing artists
            .Beryl’s pictures feature women of all shapes and sizes enjoying
            themselves .Born between the two world wars, Beryl Cook eventually
            left Kendrick School in Reading at the age of 15, where she went
            to secretarial school and then into an insurance office. After
            moving to London and then Hampton, she eventually married her next
            door neighbour from Reading, John Cook. He was an officer in the
            Merchant Navy and after he left the sea in 1956, they bought a pub
            for a year before John took a job in Southern Rhodesia with a
            motor company. Beryl bought their young son a box of watercolours,
            and when showing him how to use it, she decided that she herself
            quite enjoyed painting. John subsequently bought her a child’s
            painting set for her birthday and it was with this that she
            produced her first significant work, a half-length portrait of a
            dark-skinned lady with a vacant expression and large drooping
            breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
          </p>
          <p>
            It is often frustrating to attempt to plan meals that are designed
            for one. Despite this fact, we are seeing more and more recipe
            books and Internet websites that are dedicated to the act of
            cooking for one. Divorce and the death of spouses or grown
            children leaving for college are all reasons that someone
            accustomed to cooking for more than one would suddenly need to
            learn how to adjust all the cooking practices utilized before into
            a streamlined plan of cooking that is more efficient for one
            person creating less
          </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5>Width</h5>
                  </td>
                  <td>
                    <h5>128mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Height</h5>
                  </td>
                  <td>
                    <h5>508mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Depth</h5>
                  </td>
                  <td>
                    <h5>85mm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Weight</h5>
                  </td>
                  <td>
                    <h5>52gm</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Quality checking</h5>
                  </td>
                  <td>
                    <h5>yes</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Freshness Duration</h5>
                  </td>
                  <td>
                    <h5>03days</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>When packeting</h5>
                  </td>
                  <td>
                    <h5>Without touch of hand</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Each Box contains</h5>
                  </td>
                  <td>
                    <h5>60pcs</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

  <!-- product_list part start-->
  <section class="product_list best_seller padding_bottom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Best Sellers</h2>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="../img/category/category_2.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="../img/category/category_3.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="../img/category/category_4.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="../img/category/category_5.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section>
  <!-- product_list part end-->

  <!--::footer_part start::-->
  <footer class="footer_part">
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-sm-6 col-lg-2">
                  <div class="single_footer_part">
                      <h4>Category</h4>
                      <ul class="list-unstyled">
                          <li><a href="#">Male</a></li>
                          <li><a href="#">Female</a></li>
                          <li><a href="#">Shoes</a></li>
                          <li><a href="#">Fashion</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-2">
                  <div class="single_footer_part">
                      <h4>Company</h4>
                      <ul class="list-unstyled">
                          <li><a href="">About</a></li>
                          <li><a href="">News</a></li>
                          <li><a href="">FAQ</a></li>
                          <li><a href="">Contact</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                  <div class="single_footer_part">
                      <h4>Address</h4>
                      <ul class="list-unstyled">
                          <li><a href="#">200, Green block, NewYork</a></li>
                          <li><a href="#">+10 456 267 1678</a></li>
                          <li><span>contact89@winter.com</span></li>
                      </ul>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                  <div class="single_footer_part">
                      <h4>Newsletter</h4>
                      <div id="mc_embed_signup">
                          <form target="_blank"
                              action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="subscribe_form relative mail_part">
                              <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                  class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                  onblur="this.placeholder = ' Email Address '">
                              <button type="submit" name="submit" id="newsletter-submit"
                                  class="email_icon newsletter-submit button-contactForm">subscribe</button>
                              <div class="mt-10 info"></div>
                          </form>
                      </div>
                      <div class="social_icon">
                          <a href="#"><i class="ti-facebook"></i></a>
                          <a href="#"><i class="ti-twitter-alt"></i></a>
                          <a href="#"><i class="ti-instagram"></i></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="copyright_text">
                      <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <script src="../js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="../js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="../js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="../js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="../js/lightslider.min.js"></script>
  <!-- swiper js -->
  <script src="../js/mixitup.min.js"></script>
  <script src="../js/lightslider.min.js"></script>
  <!-- particles js -->
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="../js/slick.min.js"></script>
  <script src="../js/jquery.counterup.min.js"></script>
  <script src="../js/waypoints.min.js"></script>
  <script src="../js/contact.js"></script>
  <script src="../js/jquery.ajaxchimp.min.js"></script>
  <script src="../js/jquery.form.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
  <script src="../js/mail-script.js"></script>
  <!-- custom js -->
  <script src="../js/custom.js"></script>
</body>

</html>