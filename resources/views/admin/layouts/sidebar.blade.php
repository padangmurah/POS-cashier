
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ (Request::path() == '/') ? 'active' : '' }}">
          <a href="{{url('/')}}">
            <i class="fa fa-th"></i> <span>Home</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="{{ (Request::path() == 'admin/transaksi') ? 'active' : '' }}">
          <a href="{{url('admin/transaksi')}}">
            <i class="fa fa-check"></i> <span>Transaksi</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fire"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (Request::path() == 'admin/barang') ? 'active' : '' }}"><a href="{{url('admin/barang')}}"><i class="fa fa-circle-o"></i> List Barang</a></li>
          </ul>
        </li>
        
        <li class="{{ (Request::path() == 'admin/jasa') ? 'active' : '' }}">
          <a href="{{url('admin/jasa')}}">
            <i class="fa fa-check"></i> <span>Jasa</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="{{ (Request::path() == 'keluar') ? 'active' : '' }}">
          <a href="{{url('keluar')}}">
            <i class="fa fa-fw fa-close"></i> <span>Log Out</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>