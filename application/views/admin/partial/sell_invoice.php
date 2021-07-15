<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title float-left"><?php echo $page_title; ?></h4>
                  <ol class="breadcrumb float-right">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('dashbord');?>"><?php echo COMPANY; ?></a></li>
                      <li class="breadcrumb-item"><a href="#"><?php echo (($method=="edit")?"Update ":"Add " ).$page_title; ?></a></li>
                  </ol>
                  <div class="clearfix"></div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="card-box ">
                  <h4 class="header-title m-t-0"><?php echo (($method=="edit")?"Update ":"Add " ).$page_title?></h4><br>
                  <form action="<?php echo $action; ?>" method="post"  onsubmit="return myFunction()" >
                      <div class="row">
                          <div class="col-md-6">   
                            <div class="form-group row">
                                  <label for="bill_type" class="col-3 col-form-label">Bill Type</label>
                                      <div class="col-9" style="margin-top: 4px;">                                
                                          <label class="radio-inline" style="padding-right:20px;">
                                          <input type="radio" name="bill_type" value="debit" 
                                            <?php echo(($method=="edit")?(($sell_invoice->bill_type=="debit")?"checked":""):"");?> checked >Debit
                                          </label>                                   
                                      </div>
                              </div>
                              <div class="form-group row">
                                   <label for="gst" class="col-3 col-form-label">Gst Type</label>
                                    <div class="col-9">
                                        <select name="gst_type" id="gst_type" required>
                                          <?php if($method=="add"): ?>
                                          <option value="1">(S+C)GST</option>
                                          <option value="2">IGST</option>
                                          <?php else: ?>
                                          <option value="<?php echo $sell_invoice->gst_type; ?>"><?php echo (($sell_invoice->gst_type=="1")?"(S+C)GST":"IGST"); ?></option>
                                          <?php endif; ?>
                                        </select>
                                    </div>
                              </div>
                              <div class="form-group row">
                                  <label for="party_id" class="col-3 col-form-label">Party</label>
                                      <div class="col-9">
                                          <select data-live-search="true" name="party_id" id="party_id" data-parsley-required-message="You Must Select 1 Party" required>
                                            <option value="0">None</option>
                                            <?php
                                            foreach ($party as  $party) {
                                              echo '<option value="'.$party->party_id .'"'.
                                              (($method=="edit")?(($party->party_id==$sell_invoice->party_id)?"selected":""):"")
                                              .' >'.$party->party_name.'</option>';
                                            }
                                            ?>
                                          </select>
                                      </div>                                      
                              </div>
                             
                          </div>
                          <div class="col-md-6">
                              <div class="form-group row">
                                 <label for="invoice_no" class="col-3 col-form-label">Invoice No</label>
                                     <div class="col-9">
                                        <input type="text" class="form-control"  title="Invoice No" name="invoice_no" placeholder="Invoice No." value="<?php echo (($method=="edit")?"$sell_invoice->invoice_no":$invoice['no_invoice'] )?>" required >
                                     </div>
                              </div>
                              <div class="form-group row">
                                  <label for="date" class="col-3 col-form-label">Date</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="datepicker-autoclose" title="Date" name="date" placeholder="Date" required value="<?php echo (($method=="edit")?date("d/m/Y",strtotime($sell_invoice->date)):date('d/m/Y'));?>">
                                       <?php echo (($method=="edit")?'<input type="hidden" name="id_sell" required value="'.$sell_invoice->id_sell .'">':"");?>
                                    </div>
                              </div>
                              <div class="form-group row">
                                  <label for="aangadiya_id" class="col-3 col-form-label">Transpoter</label>
                                      <div class="col-9">
                                          <select data-live-search="true" name="transport_id">
                                            <option>None</option>
                                            <?php
                                            foreach ($transport as  $transport) {
                                              echo '<option value="'.$transport->id.'"'.
                                              (($method=="edit")?(($transport->transport_id==$sell_invoice->transport_id)?"selected":""):"")
                                              .' >'.$transport->transport_name.'</option>';
                                            }
                                            ?>
                                          </select>
                                      </div>                                      
                              </div>
                            
                          </div>
                      </div>
                      <div class="row m-t-50">
                          <div class="col-lg-12">
                              <div style="overflow-x:auto;">
                                 <h4 class="header-title m-t-0">Product Detail</h4>
                                    <table class="table" id="myTable" style="min-width: 1080px;">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                
                                                <th>Quantity</th>
                                                <th>cut_mtr</th>
                                                <th>total mtr</th>
                                                <th>Price</th>
                                                <th>Sub Total</th>
                                                <th class="trtext text-center">GST</th>
                                                <th>G Total</th>
                                                <th></th>                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            if($method=="edit"):
                                            $i=1; 
                                            foreach ($sell_product as $sell_product):
                                            $products=$this->General_model->get_all_where('item','status','1');
                                          ?>
                                          <tr>
                                            <td width="20%">
                                                <select class="sProduct_id"  data-live-search="true" name="product_id[]"  data-style="btn-custom" required>
                                                    <?php
                                                    foreach ($items as  $item) {
                                                      echo '<option value="'.$item->item_id.'"'.(($item->item_id==$sell_product->item_id)?"selected":"").'>'.$item->item_name.'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" step="any" class="form-control sQuality" name="quality[]" required  placeholder="Quantity" value="<?php echo $sell_product->quality; ?>" />
                                                <input type="hidden" name="sellproduct[]" required value="<?php echo $sell_product->id_sellproduct; ?>" />
                                                <input type="hidden" step="any" class="sFine" name="fine[]" value="<?php echo $sell_product->sfine; ?>" required  />
                                            </td>
                                            <td>
                                                <input type="number" step="any" class="form-control sPrice" name="item_price[]" placeholder="Price" required value="<?php echo $sell_product->price; ?>" />
                                            </td>
                                            <td>
                                                <input type="number" step="any" class="form-control stotal"  name="total[]" placeholder="Total" readonly value="<?php echo $sell_product->total; ?>" />
                                            </td>
                                            <td class="row trgst" >
                                              <?php if($sell_invoice->gst_type=="1"): ?>
                                              <input type="number" name="cgst[]" class="form-control sSgst w-50" step="any" placeholder="SGST" readonly value="<?php echo $sell_product->sgst; ?>" /><input type="number" name="sgst[]" class="form-control sCgst w-50"  step="any"  placeholder="CGST" readonly value="<?php echo $sell_product->cgst; ?>" />
                                              <?php else: ?>
                                              <input type="number" name="igst[]" class="form-control sIgst "  step="any"  placeholder="IGST" readonly value="<?php echo $sell_product->igst; ?>" />
                                              <?php endif; ?>
                                            </td>
                                            <td>
                                            <input type="number" step="any" class="form-control sAmount"  name="amount[]" placeholder="Amount" required value="<?php echo $sell_product->amount; ?>">
                                            </td>
                                            <td>
                                              <?php if($i!=1):?>
                                                <button type="button" data-id="DltBtn" data-value="<?php echo $sell_product->id_sellproduct; ?>" class="btn btn-icon waves-effect waves-light btn-warning btn-sm"><i class="mdi mdi-delete"></i></button>
                                              <?php endif; ?>
                                            </td>
                                          </tr>
                                          <?php
                                            $i++;
                                            endforeach;
                                            endif;
                                          ?>
                                            <tr id="xItemadd">
                                              <td width="30%">
                                                  <select class="sitem_id"  data-live-search="true" name="item_id[]"  data-style="btn-custom" required>
                                                      <?php
                                                      foreach ($items as  $item) {
                                                        echo '<option value="'.$item->item_id.'">'.$item->item_name.'</option>';
                                                      }
                                                      ?>
                                                  </select>
                                                  <textarea name="description" placeholder="Description"  class="form-control"></textarea>
                                              </td>
                                              <td>
                                                  <input type="number" step="any" class="form-control sQuality" name="quality[]" required  placeholder="Pcs" />
                                              </td>
                                              <td>
                                                  <input type="number" step="any" class="form-control sCutmtr" name="cut_mtr[]" required  placeholder="Cut  Mtr" />
                                            
                                              </td>
                                              
                                              <td>
                                                  <input type="number" step="any" class="form-control sTmeter" name="total_mtr[]" required  placeholder="Total Mtr" />
                                              </td>
                                              <td>
                                                  <input type="number" step="any" class="form-control sPrice" name="item_price[]" placeholder="Price On Mtr" value="" required />
                                              </td>
                                              <td>
                                                  <input type="number" step="any" class="form-control stotal"  name="total[]" placeholder="Total" readonly  />
                                              </td>
                                              <td class="row trgst" >
                                                <input type="number" name="cgst[]" class="form-control sSgst w-50" step="any" placeholder="SGST" readonly /><input type="number" name="sgst[]" class="form-control sCgst w-50"  step="any"  placeholder="CGST" readonly />
                                              </td>
                                              <td>
                                              <input type="number" step="any" class="form-control sAmount"  name="amount[]" placeholder="Amount" required >
                                              </td>
                                              <td>
                                                  <button type="button" class="btn btn-icon waves-effect waves-light bDelete btn-danger btn-sm "><i class="fa fa-minus"></i></button>
                                              </td>
                                            </tr>
                                            <tr id="lsttr">
                                                <td colspan="6"></td>
                                                <td><button type="button" class="btn btn-icon waves-effect waves-light btn-secondary btn-sm AddBtn " style="margin-left: 2px;"> <i class=" fa fa-plus"></i> </button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-6 m-t-50">
                            <div class="form-group row">
                               <label for="" class="col-3 col-form-label">Sub Total</label>
                                   <div class="col-9">
                                      <input type="text" class="form-control SubTotal" name="sub_total" readonly>
                                   </div>
                            </div>                            
                          </div>
                          <div class="col-md-6 offset-md-6">
                            <div class="form-group row">
                               <label for="" class="col-3 col-form-label">GST</label>
                                   <div class="col-9">
                                      <input type="text" class="form-control Gst" name="all_gst" readonly>
                                   </div>
                            </div>                            
                          </div>
                          <div class="col-md-6 offset-md-6">
                            <div class="form-group row">
                               <label for="" class="col-3 col-form-label">Grand Total</label>
                                   <div class="col-9">
                                      <input type="text" class="form-control Gtotal" name="grand_total" readonly>
                                   </div>
                            </div>                            
                          </div>
                          <div class="col-md-12 text-center m-t-20">
                              <button type="submit" onclick="return validateForm()" class="btn btn-purple waves-effect waves-light"><?php echo (($method=="edit")?"Update":"Add"); ?></button>
                          </div>
                      </div>
                  </form>
              </div> 
          </div>
      </div>
    </div> <!-- container -->
</div> <!-- content -->
<script type="text/javascript">
  <?php foreach ($settings as $settings) {
      echo "var ".$settings->s_key."_percentage=".$settings->s_value.";";
    } 
    echo (($method=="edit")?"var method='edit';":"var method='add';");
    ?>    
</script>
<script src="<?php echo base_url('assets/admin');?>/custom/sellinvoice.js"></script>