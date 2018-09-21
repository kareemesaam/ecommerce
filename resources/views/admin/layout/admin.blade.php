@include('admin.layout.element.header')
@include('admin.layout.element.sidbar')
<div class="content-wrapper">



    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @include('element.flach')
        @yield('content')

    </section>

</div>

@include('admin.layout.element.footer')