<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{Html::style('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}
    {{Html::style('assets/styles/bootstrap4/bootstrap.min.css')}}
    {{Html::style('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}
    {{Html::style('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}
    {{Html::style('assets/plugins/OwlCarousel2-2.2.1/animate.css')}}
    {{Html::style('assets/styles/main_styles.css')}}
    {{Html::style('assets/styles/responsive.css')}}

    {{Html::favicon('favicon_io/apple-touch-icon.png')}}
    {{Html::favicon('favicon_io/favicon-32x32.png')}}
    {{Html::favicon('favicon_io/favicon-16x16.png')}}
    {{Html::favicon('favicon_io/site.webmanifest')}}




<body>

<div class="super_container">

    <!-- Header -->

    @include('include.nav')

    @yield('content')

<!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
{{Html::script('assets/js/jquery-3.2.1.min.js')}}
{{Html::script('assets/styles/bootstrap4/popper.js')}}
{{Html::script('assets/styles/bootstrap4/bootstrap.min.js')}}
{{Html::script('assets/plugins/Isotope/isotope.pkgd.min.js')}}
{{Html::script('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}
{{Html::script('assets/plugins/easing/easing.js')}}
{{Html::script('assets/js/custom.js')}}

</body>

</html>
