  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">

        <div style="color: #fff; display: inline-block;">
          <h3>{{Auth::user()->name }}</h3>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->
   
      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
       <li class="active">
      <a href="{{route('users')}}">users</a>
      </li>
       
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>products</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('product.index')}}">All product</a></li>
            <li><a href="{{route('product.create')}}">Add product</a></li>
          </ul>
        </li>

        {{-- categories  --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>categories</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('category.create')}}">Add category</a></li>
            


          <li class="treeview">
          <a href="#"><i class="fa fa-fighter-jet"></i> <span>main category</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @foreach($MainCategories as $category)
            <li><a href="{{route('category.show',$category->id)}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </li>
         </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>orders</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/orders')}}">All order</a></li>
            <li><a href="{{url('admin/orders/pending')}}">pending orders</a></li>
            <li><a href="{{url('admin/orders/delivered')}}">delivered orders</a></li>
          </ul>
        </li>








         
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>