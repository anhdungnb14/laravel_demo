<!DOCTYPE HTML>
<html>

<!-- head -->
@include ("frontend/master/layouts/head")
<body>
    <!--header -->
    @include ("frontend/master/layouts/header")

    <!-- End header -->
    <!-- main -->
    @yield("main")
    <!-- end main -->

    <!-- subscribe -->
    @include ("frontend/master/layouts/subcribe")

    <!--end  subscribe -->
    <!-- footer -->
    @include ("frontend/master/layouts/footer")

    <!--end  footer -->
    </div>


</body>

</html>