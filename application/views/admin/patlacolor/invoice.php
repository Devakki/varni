<style type="text/css">
  .restable{
      width: 100%; 
      min-width: 720px;   
  }
  .divscroll{
      overflow-x: auto;
  }
  .table-borderless > tbody > tr > td, .table-borderless > tbody > tr > th, .table-borderless > tfoot > tr > td, .table-borderless > tfoot > tr > th, .table-borderless > thead > tr > td, .table-borderless > thead > tr > th {
    padding: 7px 8px;
  }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left"><?php echo $page_title; ?></h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashbord');?>"><?php echo COMPANY; ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Cut/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-12">
               <div class="card-box">
                    <h4 class="m-t-0 header-title m-b-30 text-right">PATLA COLOR CHALLAN</h4>
                    <h2 class="m-t-0 text-center"><?php echo FULL_NAME; ?></h2>
                    <h4 class="m-t-0 header-title text-center"><?php echo ADDRESS1; ?></h4>
                    <div class="row m-t-50">
                        <div class="col-md-4">
                          <table class="table table-borderless">
                              <tr>
                                  <th style="width:30%">M/s</th>
                                  <td> <?php echo ucwords($patla_color->patla_name); ?></td>
                              </tr>
 
                          </table>
                        </div>
                        <div class="offset-md-4 col-md-4">
                          <table class="table table-borderless">
                              <tr>
                                  <th>Invoice No</th>
                                  <td><?php echo $patla_color->challan_no; ?></td>
                              </tr> 
                          </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 divscroll">
                            <table class="table text-center table-bordered m-t-20 restable">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>COLOR NAME</th>
                                    <th>QTY</th>
                                    <th>RATE</th>
                                    <th>AMOUNT</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $no = 1;
                                    foreach($patla_color_lot as $rw){?>
                                    <tr>
                                       <td><?php echo $no; ?></td>
                                       <td><?php echo ucwords($rw->color_name); ?></td>
                                       <td><?php echo $rw->qty." GM"; ?></td>
                                       <td><?php echo $rw->rate; ?></td>
                                       <td><?php echo number_format($rw->amount,2);?></td>
                                    </tr>
                                   <?php $no++; } ?>
                                </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="offset-md-8 col-md-4 mt-5">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Total Qty</th>
                                    <td><?php echo $patla_color->total_qty; ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><?php echo $patla_color->total; ?></td>
                                </tr>
                            </table>
                        </div>
                   </div>
               </div>
           </div>
       </div>
    </div> 
</div>