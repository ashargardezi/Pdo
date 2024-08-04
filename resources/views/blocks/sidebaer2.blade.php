<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('dist/img/poslogo.png') }}" alt="Pos Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
    </a>

   

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
            
             
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Catalog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('products.index') }}" class="nav-link active">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                            Product
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('units.index') }}" class="nav-link active">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                            Units
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link active">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                            Category 
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('brand.index') }}" class="nav-link active">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                            Brand 
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('barcode.index') }}" class="nav-link active">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                            Print Barcode 
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('stock.index') }}" class="nav-link active">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                            Stock Count 
                          </p>
                        </a>
                      </li>
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- <a href="product/product_list.blade.php" class="nav-link"> --}}
                                    <a href="{{ route('units.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product LIst</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('units.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Unit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Print Barcode</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock Count</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sale</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('salelist') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sale List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addsale') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Sale</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('pos') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>POS</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </aside>