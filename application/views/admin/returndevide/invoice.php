<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left"><?php echo $page_title; ?></h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashbord');?>"><?php echo COMPANY; ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('ReturnDevide/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <style type="text/css">
          .table-borderless > tbody > tr > td, .table-borderless > tbody > tr > th, .table-borderless > tfoot > tr > td, .table-borderless > tfoot > tr > th, .table-borderless > thead > tr > td, .table-borderless > thead > tr > th {
            padding: 7px 8px;
          }
          @media print {
              .h2-job{
                  color: white !important;
                  -webkit-print-color-adjust: exact; 
                }
              .header-title {
                font-size: 17px;
              }
            }
        </style>
        <div class="row">
           <div class="col-12">
               <div class="card-box">
                    <div class="col-md-12">
                        <table width="100%">
                            <tbody>
                              <tr>
                                  <td style="width: 66%">
                                    <h1 class="h2-job text-center"><span class="bg-dark text-white" style="padding: 0 20px;">RETURN DEVIDE JOB WORK</span></h1>
                                  </td>
                                  <td style="width: 34%">
                                    <h3 class="m-b-0"><b><?php echo FULL_NAME; ?></b></h3>
                                    <h4 class="m-b-1 header-title"><?php echo ADDRESS2; ?></h4>
                                    <h4 class="m-t-0 header-title"><b>Gst No.  : </b><?php echo GST_NO; ?></h4>
                                    <h4 class="m-t-0 header-title">Mo.: <?php echo MOBILE; ?></h4>
                                  </td>
                              </tr>         
                          </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td style="width: 12%">
                                      <h4 class="header-title m-t-0"><b> M/S :</b> </h4>
                                    </td>
                                    <td colspan="2" style="width: 88%; border-bottom: 1px solid black;">
                                      <h4 class="header-title m-t-0"> <?php echo $returndevide->patla_name; ?></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 m-t-20">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td style="width: 33% " class="td-p">
                                      <h4 class="header-title m-t-0"> <b>Challan No.</b> :  <?php echo $returndevide->devide_challan_no; ?></h4>
                                    </td>
                                    <td style="width: 33% " class="td-p text-center">
                                      <h4 class="header-title m-t-0"> <b>Date.</b> :   <?php echo date('d/m/Y', strtotime($returndevide->date)); ?></h4>
                                    </td>  
                                    <td style="width: 33% " class="td-p text-right">
                                      <h4 class="header-title m-t-0"> <b>Invoice No.</b> :  <?php echo $returndevide->challan_no; ?></h4>
                                    </td>        
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <table class="table text-center table-bordered m-t-20" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="header-title">SR NO</th>
                                <th class="header-title">PARTY</th>
                                <th class="header-title">ITEM</th>
                                <th class="header-title">PCS</th>
                                <th class="header-title">MISS PCS</th>
                                <th class="header-title">RATE</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   <td class="header-title"><?php echo 1;?></td>
                                   <td class="header-title"><?php echo $party->party_name; ?></td>
                                   <td class="header-title"><?php echo $party->item_name; ?></td>
                                   <td class="header-title"><?php echo $returndevide->total_pcs;; ?></td>
                                   <td class="header-title"><?php echo $returndevide->miss_pcs; ?></td>
                                   <td class="header-title"><?php echo number_format($returndevide->rate,2); ?></td>
                                </tr>
                            </tbody>
                      </table>        
                   </div>
                    <div class="offset-md-8 col-md-4 mt-5">
                        <table class="table">
                            <tr>
                                <th style="width:50%">TOTAL PCS</th>
                                <td><?php echo $returndevide->total_pcs; ; ?></td>
                            </tr>
                            <tr>
                                <th>G TOTAL</th>
                                <td><?php echo number_format($returndevide->g_total,2); ?></td>
                            </tr>
                        </table>
                    </div>
               </div>
           </div>
       </div>
    </div> 
</div>
  