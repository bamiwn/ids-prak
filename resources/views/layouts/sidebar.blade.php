<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('adminlte/img/hokage.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Hokage V</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Sedang Online</a>
        </div>
      </div>
      <!-- search form -->
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="nav-item {{Request::is('dashboard')?'active':''}} ">
          <a href="{{ url('dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-child"></i> <span>Customer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::is('data')?'active':''}}"><a href="{{ url('data')}}"><i class="fa fa-circle-o"></i> Data Customer </a></li>
            <li class="{{Request::is('tambah1')?'active':''}}"><a href="{{ url('tambah1')}}"><i class="fa fa-circle-o"></i> Tambah Customer 1</a></li>
            <li class="{{Request::is('tambah2')?'active':''}}"><a href="{{ url('tambah2')}}"><i class="fa fa-circle-o"></i> Tambah Customer 2 </a></li>
          </ul>
        </li>
        <!-- <li class="treeview {{Request::is('databarang')?'active':''}}"> -->
        <li class="treeview">
          <a href="">
            <i class="fa fa-barcode"></i> <span>Barcode</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::is('databarang')?'active':''}}"><a href="{{ url('databarang')}}"><i class="fa fa-circle-o"></i> Data Barang </a></li>
            <li class="{{Request::is('scan')?'active':''}}"><a href="{{ url('scan')}}"><i class="fa fa-qrcode"></i> Scan Barcode </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-home"></i> <span>Toko</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::is('toko')?'active':''}}"><a href="{{ url('toko')}}"><i class="fa fa-circle-o"></i> Data Toko </a></li>
            <li class="{{Request::is('tokoBarcode')?'active':''}}"><a href="{{ url('tokoBarcode')}}"><i class="fa fa-circle-o"></i> Kunjungan Toko </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-home"></i> <span>Excel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::routeIs('excel.import') ? 'active' : ''}}">
              <a href="{{ route('excel.import') }}"><i class="fa fa-circle-o"></i> Import Data </a>
            </li>
            <li class="{{Request::routeIs('excel.data') ? 'active' : ''}}">
              <a href="{{ route('excel.data') }}"><i class="fa fa-circle-o"></i> Data Excel </a>
            </li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>