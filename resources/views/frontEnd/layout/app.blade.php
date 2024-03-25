<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>{{ !empty($meta_title) ? $meta_title : '' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    @if(!empty($meta_description))

    <meta content="{{$meta_description}}" name="description" />
    @endif
    @if(!empty($meta_keywords))

      <meta content="{{$meta_keywords}}" name="keywords" />
    @endif

    <!-- Favicon -->
    <link href="assets/frontend/img/favicon.ico" rel="icon" />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <!-- Flaticon Font -->
    <link href="{{url('assets/frontend/lib/flaticon/font/flaticon.css')}}" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{url('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('assets/frontend/css/style.css')}}" rel="stylesheet" />
  </head>

  <body>
    @include("frontEnd.layout._header")

        @yield("content")
    @include("frontEnd.layout._footer")

    <a href="#" class="btn btn-primary p-3 back-to-top">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets/frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('assets/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ url('assets/frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ url('assets/frontend/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ url('assets/frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ url('assets/frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('assets/frontend/js/main.js')}}"></script>
  </body>
</html>
