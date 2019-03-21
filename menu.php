<?php
$activePage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if (($activePage == '') || ($activePage == 'index')) { ?> class="active" <?php 
                                                                                        } ?> >
          <a href="<?php echo $base_url ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
        <li  <?php if ($activePage == 'input_po') { ?> class="active" <?php 
                                                                    }
                                                                    $rule; ?>>
          <a href="<?php echo $base_url ?>input_po">
            <i class="fa fa-pencil"></i>
            <span>INPUT PO</span>
          </a>
        </li>

         <li  <?php if ($activePage == 'void_report') { ?> class="active" <?php 
                                                                        }
                                                                        $rule; ?>>
          <a href="<?php echo $base_url ?>void_report">
            <i class="fa fa-ban"></i>
            <span>VOID PO</span>
          </a>
        </li>
        
        <li class="treeview" >
          <a href="#">
            <i class="fa fa-database"></i>
            <span>MASTER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
          <li <?php if ($activePage == 'mst_barang_view') { ?> class="active" <?php 
                                                                            }
                                                                            $rule; ?>>
          <a href="<?php echo $base_url ?>mst_barang_view">
          <i class="fa fa-circle-o"></i>Master Barang</a></li>

          <li  <?php if ($activePage == 'mst_unit_view') { ?> class="active" <?php 
                                                                          }
                                                                          $rule; ?>>
          <a href="<?php echo $base_url ?>mst_unit_view">
          <i class="fa fa-circle-o"></i>Master Unit</a></li>
            
          <li <?php if ($activePage == 'mst_supplier_view') { ?> class="active" <?php 
                                                                              }
                                                                              $rule; ?>>
          <a href="<?php echo $base_url ?>mst_supplier_view"><i class="fa fa-circle-o">
          </i>Master Supplier</a></li>
         
          <li <?php if ($activePage == 'mst_mg_view') { ?>class="active"<?php 
                                                                      }
                                                                      $rule; ?>>
          <a href="<?php echo $base_url ?>mst_mg_view">
          <i class="fa fa-circle-o"></i>Master MG</a></li>
          
          <li <?php if ($activePage == 'mst_setting_view') { ?> class="active" <?php 
                                                                            }
                                                                            $rule; ?>>
          <a href="<?php echo $base_url ?>mst_setting_view"><i class="fa fa-circle-o">
          </i>Master Setting</a></li>
        
        </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i>
            <span>REPORT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($activePage == 'transaksi_header_view') { ?> class="active" <?php 
                                                                                    }
                                                                                    $rule; ?>>
            <a href="<?php echo $base_url ?>transaksi_header_view"><i class="fa fa-circle-o">
            </i>Purchase Order Aktif</a></li>

      
           <li <?php if ($activePage == 'po_void') { ?> class="active" <?php 
                                                                    }
                                                                    $rule; ?>>
            <a href="<?php echo $base_url ?>po_void"><i class="fa fa-circle-o">
            </i>Purchase Order Void</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
