<?php
require_once(__DIR__."/../../product_management/functions/product_function.php");

class purchase_receipt extends object_class{
    public $product;
    public $productF;

    public function __construct(){
        parent::__construct('3');
        $this->product=new product_function();

        if (isset($GLOBALS['productF'])) $this->productF = $GLOBALS['productF'];
        else {
            require_once(__DIR__."/../../product_management/functions/product_function.php");
            $this->productF=new product_function();
        }

        /**
         * MultiLanguage keys Use where echo;
         * define this class words and where this class will call
         * and define words of file where this class will called
         **/
        global $_e;
        global $adminPanelLanguage;
        $_w=array();
        //purchasereceipt.php
        $_w['View All Receipts'] = '' ;
        $_w['Purchase Receipt'] = '' ;
        $_w['Purchase View'] = '' ;
        $_w['Add New Receipt'] = '' ;

        //This class
        $_w['SNO'] = '' ;
        $_w['VENDOR'] = '' ;
        $_w['STORE NAME'] = '' ;
        $_w['RECEIPT DATE'] = '' ;
        $_w['REGISTER DATE'] = '' ;
        $_w['ACTION'] = '' ;
        $_w['Vendor Name'] = '' ;
        $_w['Purchasing Date'] = '' ;
        $_w['Date'] = '' ;
        $_w['Select Store'] = '' ;
        $_w['Add In store'] = '' ;
        $_w['SINGLE PRICE'] = '' ;
        $_w['QTY'] = '' ;
        $_w['PRODUCT COLOR'] = '' ;
        $_w['PRODUCT SCALE'] = '' ;
        $_w['No Scale Avaiable'] = '' ;
        $_w['No Color Avaiable'] = '' ;
        $_w['Enter Product Color'] = '' ;
        $_w['Enter Product Scale'] = '' ;
        $_w['Enter Product Name'] = '' ;
        $_w['Enter Single Product Price'] = '' ;
        $_w['Enter SKU Number'] = '' ;
        $_w['Enter Product Quantity'] = '' ;
        $_w['Add Product'] = '' ;
        $_w['Remove Checked Items'] = '' ;
        $_w['Check/Uncheck All'] = '' ;
        $_w['PRODUCT'] = '' ;
        $_w['PRICE'] = '' ;
        $_w['Generate Receipt'] = '' ;

        $_w['Prodcut Quantity Add in {{n}} different products'] = '' ;
        $_w['New Receipt'] = '' ;
        $_w['Receipt'] = '' ;
        $_w['New Receipt Generate Successfully'] = '' ;
        $_w['New Receipt Generate Failed'] = '' ;


        //Data Range
        $_w['Search By Date Range'] = '' ;
        $_w['Date From'] = '' ;
        $_w['Date To'] = '' ;
        $_w['GRN'] = '' ;
        $_w['PRF'] = '' ;
        $_w['PO Number'] = '' ;
        $_w['Select Receiver'] = '' ;
        $_w['Receiver'] = '' ;
        $_w['PO NUMBER'] = '' ;
        $_w['RECEIVER'] = '' ;
        $_w['Draft'] = '' ;
        $_w['Back To Goods Receive Note'] = '' ;
        $_w['Edit Goods Receive Note'] = '' ;
        $_w['Supplier'] = '' ;
        $_w['Select Supplier'] = '' ;
        $_w['Status'] = '' ;
        $_w['NOTE'] = '' ;
        $_w['Note'] = '' ;
        $_w['SKU_NUMBER'] = '' ;

        $_e    =   $this->dbF->hardWordsMulti($_w,$adminPanelLanguage,'Admin StoreReceipt');


    }
public function GRN(){
            $grn = $this->functions->ibms_setting('GRN');
            $sql="SELECT grn FROM `purchase_receipt` ORDER BY receipt_pk DESC LIMIT 1";
            $data  =  $this->dbF->getRow($sql);
        $numb= $data[0];
        $numb = preg_replace('/\D/', '', $numb);
        @$numb = $numb + 1;
        if($data[0] === null){
        return "$grn"."1";
        }
        else{
        return "$grn".$numb;   
        }
    }
    function SelectSupplier(){
        $sql    =   "SELECT acc_name FROM `accounts_user` WHERE acc_id IN (SELECT id_user FROM accounts_user_detail WHERE setting_val='supplier' OR setting_val='both')";
        $data   =   $this->dbF->getRows($sql);
        $op='';
        if($this->dbF->rowCount > 0){
            foreach($data as $val){
                $op .="<option value='$val[acc_name]'>$val[acc_name]</option>";
            }
            return $op;
        }
        return "";
    }
  function SelectStaff(){
        $sql    =   "SELECT acc_name FROM `accounts`";
        $data   =   $this->dbF->getRows($sql);
        $op='';
        if($this->dbF->rowCount > 0){
            foreach($data as $val){
                $op .="<option value='$val[acc_name]'>$val[acc_name]</option>";
            }
            return $op;
        }
        return "";
    }
  public function newReceiptFormEdit(){
       $this->newReceiptForm(true);
    }

      public function newReceiptForm($edit = false){  
        global $_e;
        $isEdit = false;
        $grn = $this->GRN();
        $token = $this->functions->setFormToken('purchaseReceiptAdd',false);
        if($edit === true){
            $id = $_GET['id'];
            $isEdit = true;
            $sql = "SELECT * FROM `purchase_receipt` WHERE receipt_pk = '$id'";
            $data  =  $this->dbF->getRow($sql);
            $grn = $data['grn'];
            $sql = "SELECT * FROM `purchase_receipt_pro` WHERE receipt_id = '$id'";
            $data2  =  $this->dbF->getRows($sql);
            $token = $this->functions->setFormToken('purchaseReceiptEdit',false);
        }
        echo '
    <form method="post" class="form-horizontal" role="form">
    '.$token;
        if($isEdit){
            echo "<input type='hidden' name='oldId' value='$id'/>";
      }
        echo '<div class="form-horizontal">

<div class="col-md-6">
<div class="form-group">
<label for="receipt_grn" class="col-sm-2 col-md-3 control-label">'. _u($_e['GRN']) .'</label>
<div class="col-sm-10 col-md-9">
<input type="hidden" name="receipt_grn" class="receipt_grn" value="'.@$data['grn'].'">
<input type="text" class="form-control" id="receipt_grn" value="'.$grn.'" placeholder="'. _u($_e['GRN']) .'"  disabled>
</div>
</div>
<div class="form-group">
<label for="receipt_date" class="col-sm-2 col-md-3 control-label">'. _uc($_e['Date']) .'</label>
<div class="col-sm-10 col-md-9">
<input type="text" name="receipt_date" class="form-control date" required id="receipt_date" placeholder="'. _uc($_e['Purchasing Date']) .'" value="'.@$data['receipt_date'].'">
</div>
</div>

 <div class="form-group">
                    <label for="receipt_prf" class="col-sm-2 col-md-3 control-label">'. _u($_e['PRF']) .'</label>
                    <div class="col-sm-10 col-md-9">
                        <input type="text" name="receipt_prf" class="form-control" required id="receipt_prf" placeholder="'. _u($_e['PRF']) .'" value="'.@$data['prf'].'">
                    </div>
                </div>

                 <div class="form-group">
                    <label for="receipt_ponumber" class="col-sm-2 col-md-3 control-label">'. $_e['PO Number'] .'</label>
                    <div class="col-sm-10 col-md-9">
                        <input type="text" name="receipt_ponumber" class="form-control" id="receipt_ponumber" placeholder="'. $_e['PO Number'] .'" value="'.@$data['po_number'].'">
                    </div>
                </div>

             <div class="form-group">
                    <label for="receipt_receiver" class="col-sm-2 col-md-3 control-label">'. _uc($_e['Receiver']) .'</label>
                    <div class="col-sm-10 col-md-9">
                    <input type="hidden" value="'.@$data['receiver'].'" name="receipt_receiver" class="form-control receipt_receiver" data-val="" required>
                        <fieldset id ="receiver">
                        <select required  id="receipt_receiver" class="form-control product_color"
                        name="receipt_receiver">
                        <option value="">'.$_e['Select Receiver'] .'</option>';
                            echo $this->SelectStaff();
                        echo '</select>
                        <script>$("#receipt_receiver").val("'.@$data['receiver'].'").change()</script>
                    </fieldset>
                    </div>
                </div>

              <div class="form-group">
                    <label for="receipt_supplier" class="col-sm-2 col-md-3 control-label">'. _uc($_e['Supplier']) .'</label>
                    <div class="col-sm-10 col-md-9">
                    <input type="hidden"  value="'.@$data['vendor'].'" class="form-control receipt_supplier" data-val="" required>
                        <fieldset id ="supplier">
                        <select required  id="receipt_supplier" class="form-control product_color"  name="receipt_supplier">
                        <option value="">'. _uc($_e['Select Supplier']) .'</option>';
                            echo $this->SelectSupplier();
                        echo '</select>
                        <script>$("#receipt_supplier").val("'.@$data['vendor'].'").change()</script>
                    </fieldset>
                    </div>
                </div>


                  <div class="form-group">
                    <label for="receipt_store_id" class="col-sm-2 col-md-3 control-label">'. _uc($_e['Add In store']) .'</label>
                    <div class="col-sm-10 col-md-9">
                    <input type="hidden"  value="'.@$data['store'].'" class="form-control receipt_store_id" data-val="" required>
                    <fieldset>
                        <select required  id="r_store"  name="receipt_store_id" class="form-control product_color">
                        <option value="">'. _uc($_e['Select Store']) .'</option>';
                            echo $this->storeNamesOption();
                        echo '</select>
                         <script>$("#r_store").val("'.@$data['store'].'").change()</script>
                    </fieldset>
                    </div>
                 </div>
                   <div class="form-group">
                    <label for="receipt_note" class="col-sm-2 col-md-3 control-label">'. _uc($_e['Note']) .'</label>
                    <div class="col-sm-10 col-md-9">
                        <textarea name="receipt_note" class="form-control" required id="receipt_note" placeholder="'. _uc($_e['Note']) .'">'.@$data['note'].'</textarea>
                    </div>
                </div>
            <div class="form-group">
                    <label for="receipt_status" class="col-sm-2 col-md-3 control-label">'. _uc($_e['Status']) .'</label>
                    <div class="col-sm-10 col-md-9">
                        <div class="make-switch" data-off="warning" data-on="success" data-on-label="' . _uc($_e['Complete']) . '" data-off-label="' . _uc($_e['Draft']) . '" style="min-width: 150px;">
                        <input type="checkbox" value="0" placeholder="Public Access">
                        <input type="hidden" name="receipt_publish" class="checkboxHidden" value="0">
                        </div>
                    </div>
                </div>
            </div><!-- First col-md-6 end -->


            <div class="table-responsive bootTable" style="position: static;" >
              <table id="selected" class="table sTable table-hover" style="min-width: 570px;" width="100%" border="0" cellpadding="0" cellspacing="0">
            	<thead>
                	<tr>
                        <th>'. _u($_e['PRODUCT']) .'</th>
                        <th class="allowProductScale">'. _u($_e['PRODUCT SCALE']) .'</th>
                        <th class="allowProductColor">'. _u($_e['PRODUCT COLOR']) .'</th>
                        <th>'. _u($_e['QTY']) .'</th>
                        <th>'. _u($_e['SINGLE PRICE']) .'</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <td>
                            <input type="text" class="form-control" id="receipt_product_id" placeholder="'. _uc($_e['Enter Product Name']) .'">
                            <input type="hidden" class="form-control receipt_product_id" data-val="">
                    </td>
                    <td class="allowProductScale">
                            <input type="text" class="form-control" id="receipt_product_scale" placeholder="'. _uc($_e['Enter Product Scale']) .'" readonly value="'. _uc($_e['No Scale Avaiable']) .'">
                            <input type="hidden" class="form-control receipt_product_scale" data-val="">
                    </td>
                    <td class="allowProductColor">
                            <input type="text" class="form-control" required id="receipt_product_color" placeholder="'. _uc($_e['Enter Product Color']) .'" readonly value="'. _uc($_e['No Color Avaiable']) .'">
                            <input type="hidden" class="form-control receipt_product_color" data-val="">
                    </td>
                    <td>
                           <input type="number" class="form-control" id="receipt_qty" placeholder="'. _uc($_e['Enter Product Quantity']) .'">
                    </td>


                    <td>
                           <input type="number" class="form-control" id="receipt_price" placeholder="'. _uc($_e['Enter Single Product Price']) .'">
                    </td>
                  
            </tbody>

                </table>
            </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="button" onclick="receiptFormValid();" id="AddProduct" class="btn btn-default">'. _uc($_e['Add Product']) .'</button>
                    </div>
                </div>


            </div> <!-- form-horizontal end -->


            <div style="margin:50px 0 0 0;">
                <input type="button" class="btn btn-danger" onclick="removechecked()" value="'. _uc($_e['Remove Checked Items']) .'" >
                <input type="button" class="btn btn-danger" onclick="uncheckall()" value="'. _uc($_e['Check/Uncheck All']) .'">
                <br><br>


             <div class="table-responsive" >
              <table id="selected" class="table sTable table-hover" width="100%" border="0" cellpadding="0" cellspacing="0">
            	<thead>
                	<tr>
                    	<th>'. _u($_e['SNO']) .'</th>
                        <th>'. _u($_e['PRODUCT']) .'</th>
                        <th>'. _u($_e['QTY']) .'</th>
                        <th>'. _u($_e['PRICE']) .'</th>
                        <th>'. _u($_e['SKU_NUMBER']) .'</th>
                    </tr>
                </thead>
                <tbody id="vendorProdcutList">
                
                ';
                if($isEdit){
                foreach ($data2 as $key => $value) {
                $trpid = "p_".$value['receipt_product_id']."-"."-".$value['receipt_product_color'];
                $qty   = $value['receipt_qty'];
                $price = $value['receipt_price'];
                $pcode = $value['p_code'];
                $sku_code = explode(',',$pcode);
                $sku_location = 1; 
                $pid   = $value['receipt_product_id'];
                $store = $value['receipt_product_color'];
                $sn =  $this->dbF->getRow("SELECT `store_name` FROM `store_name` WHERE `store_pk`=$store");
                $storeName = $sn[0];
                $nm =  $this->dbF->getRow("SELECT `prodet_name` FROM `proudct_detail` WHERE `prodet_id`=$pid");
                $pName = translateFromSerialize($nm[0]);
                $sku   = $this->dbF->getRow("SELECT `setting_val` FROM `product_setting` WHERE `setting_name`='SKU' AND `p_id`=$pid");
                $sku   = $sku[0];
                    echo "<tr  id='tr_$trpid'>
                            <td>
                                <input type='checkbox' id='$trpid' onchange='checkchange(this.id)' value='$trpid' class='checkboxclass' />
                            <input type='hidden' name='cart_list[]' value='$trpid' /><span>".($key+1)."</span>
                            </td>
                            <td>
                                $pName [$sku]<input type='hidden' name='pid_$trpid' value='$pid' />
                            </td><input type='hidden' name='pstore_$trpid' value='$store' />
                            <td>
                                $qty<input type='hidden' name='pqty_$trpid' value='$qty' />
                            </td>
                            <td>
                                $price<input type='hidden' name='pqty_$trpid' value='$price' />
                            </td> 
                           
                          
                         
                         ";
                }
                echo " <td>   ";
                foreach ( $sku_code as $field ){ 
                        echo "<input type='text' name='pcode[]' value='$field' /><br>"; }
                        echo "</td> </tr>"; }
                
                    

                echo'</tbody>

               

                </table>
            </div>

            <br>
				    <button type="submit" onclick="return formSubmit();" name="submit" value="Generate Receipt" class="submit btn btn-primary btn-lg">'. _uc($_e['Generate Receipt']) .'</button>

         </div> <!-- add product script div end -->
       </form>';

    }


    public function receiptList(){
        global $_e;
        $this->functions->dataTableDateRange();
        echo '
            <div class="table-responsive">
                <table class="table table-hover dTable tableIBMS">
                    <thead>
                    <th>'. _u($_e['SNO']) .'</th>
                    <th>'. _u($_e['GRN']) .'</th>
                    <th>'. _u($_e['PRF']) .'</th>
                     <th>'. _u($_e['REGISTER DATE']) .'</th>
                    <th>'. _u($_e['PO NUMBER']) .'</th>
                    <th>'. _u($_e['RECEIVER']) .'</th>
                    <th>'. _u($_e['Supplier']) .'</th>
                    <th>'. _u($_e['STORE NAME']) .'</th>
                    <th>'. _u($_e['NOTE']) .'</th>

                    <th>'. _u($_e['RECEIPT DATE']) .'</th>
                   
                    <th>'. _u($_e['ACTION']) .'</th>
                    </thead>
                <tbody>

                ';
        $purchase_receipt=$this->receiptPurchaseSQL("*",1);
        $data=$this->receiptStoreSQL("*");
        $i=0;
        foreach($purchase_receipt as $val){
            $i++;
            $id=$val['receipt_pk'];
           $grn=$val['grn'];
           $prf=$val['prf'];
            $po=$val['po_number'];
            $receiver=$val['receiver'];
            $storeName =$this->StoreNameSQL($val['store']);
            $receiptDate = date('Y-m-d',strtotime($val['receipt_date']));
            echo "<tr class='tr_$id'>
                    <td>$i</td>
                    <td>$grn</td>
                    <td>$prf</td>
                    <td>$val[dateTime]</td>
                    <td> $po</td>
                    <td>$receiver</td>
                    <td>$val[vendor]</td>
                    <td>$storeName</td>
                    <td>$val[note]</td>
                    <td>$receiptDate</td>
                    
                    <td> <div class='btn-group btn-group-sm'>
                        <a data-id='$id'  data-target='#ViewReceiptModal' class='btn receiptEdit'><i class='glyphicon glyphicon-list-alt receiptEdit'></i></a>

                         <a data-id='$id' onclick='AjaxDelScript(this);' class='btn'>
                                 <i class='glyphicon glyphicon-trash trash'></i>
                                 <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                         </a>
                         </div>
                    </td>
                </tr>";
        }

        echo '</tbody>
            </table>
          </div><!-- .table-responsive End -->';
        $this->productF->AjaxDelScript('receiptAjax_del','receipt');

    }
// my code
    public function receiptListDraft(){
        global $_e;
        // $this->functions->dataTableDateRange();
        echo '
            <div class="table-responsive">
                <table class="table table-hover dTable tableIBMS">
                    <thead>
                    <th>'. _u($_e['SNO']) .'</th>
                    <th>'. _u($_e['GRN']) .'</th>
                    <th>'. _u($_e['PRF']) .'</th>
                    <th>'. _u($_e['REGISTER DATE']) .'</th>
                    <th>'. _u($_e['PO NUMBER']) .'</th>
                    <th>'. _u($_e['RECEIVER']) .'</th>
                    <th>'. _u($_e['Supplier']) .'</th>
                    <th>'. _u($_e['STORE NAME']) .'</th>
                    <th>'. _u($_e['NOTE']) .'</th>
                    
                     <th>'. _u($_e['RECEIPT DATE']) .'</th>
                    <th>'. _u($_e['ACTION']) .'</th>
                    </thead>
                <tbody>

                ';
        $purchase_receipt=$this->receiptPurchaseSQL("*",0);
        $data=$this->receiptStoreSQL("*");
        $i=0;
        foreach($purchase_receipt as $val){
           $i++;
            $id=$val['receipt_pk'];
           $grn=$val['grn'];
           $prf=$val['prf'];
            $po=$val['po_number'];
            $receiver=$val['receiver'];
            $storeName =$this->StoreNameSQL($val['store']);
            $receiptDate = date('Y-m-d',strtotime($val['receipt_date']));
            echo "<tr class='tr_$id'>
                    <td>$i</td>

                    <td>$grn</td>

                    <td>$prf</td>
                     <td>$val[dateTime]</td>
                    <td> $po</td>
                    <td>$receiver</td>
                    <td>$val[vendor]</td>
                    <td>$storeName</td>
                    <td>$val[note]</td>
                   
                     <td>$receiptDate</td>

                    <td> <div class='btn-group btn-group-sm'>
                        <a data-id='$id'  data-target='#ViewReceiptModal' class='btn receiptEdit2'><i class='glyphicon glyphicon-list-alt'></i></a>

                        <a data-id='$id' class='btn' href='-stock?page=grnEdit&id=$id'>
                                 <i class='glyphicon glyphicon-edit'></i>
                         </a>

                         <a data-id='$id' onclick='AjaxUpdateScript2(this);' class='btn'>
                                 <i class='glyphicon glyphicon-thumbs-up'></i>
                                 <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                         </a>

                         <a data-id='$id' onclick='AjaxDelScript(this);' class='btn'>
                                 <i class='glyphicon glyphicon-trash trash'></i>
                                 <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                         </a>

                         </div>
                    </td>
                </tr>";
        }

        echo '</tbody>
            </table>
          </div><!-- .table-responsive End -->';
        $this->productF->AjaxDelScript('receiptAjax_del','receipt');
        $this->productF->AjaxUpdateScript2('receiptAjax_update','receipt');

    }
    // mycode
 
    public function storeNamesOption(){
        $data = $this->receiptStoreSQL("`store_pk`,`store_name`,`store_location`");
        $op='';
        if($this->dbF->rowCount > 0){
            foreach($data as $val){
                $op .="<option value='$val[store_pk]'>$val[store_name] - $val[store_location]</option>";

            }
            return $op;
        }
        return "";
    }
  
    // public function receiptPurchaseSQL($column){
    //     $sql="SELECT ".$column." FROM `purchase_receipt` ORDER BY `receipt_pk` ASC";
    //     return $this->dbF->getRows($sql);
    // }
    public function receiptPurchaseSQL($column,$publish){
        $sql="SELECT ".$column." FROM `purchase_receipt` where `publish`='$publish' ORDER BY `receipt_pk` DESC";
        return $this->dbF->getRows($sql);
    }


    public function receiptStoreSQL($column){
        $sql="SELECT ".$column." FROM `store_name` ORDER BY `store_pk` ASC";
        return $this->dbF->getRows($sql);
    }

    public function StoreNameSQL($id){
        $sql="SELECT `store_name`,`store_location` FROM `store_name` WHERE `store_pk` = '$id'";
        $data = $this->dbF->getRow($sql);

        return $data['store_name']." - ".$data['store_location'];
    }



    public function receiptAdd(){
        global $_e;
        if(!$this->functions->getFormToken('purchaseReceiptAdd')){
            return false;
        }

        if(!empty($_POST) && !empty($_POST['submit']) && !empty($_POST['cart_list'])){
         //$this->dbF->prnt($_POST);
              $pcode =  empty($_POST['skunumber']) ?  array() : $_POST['skunumber'];
               //$this->dbF->prnt($pcode);
              $sku_pcode = implode(',',$pcode);
            $sql="INSERT INTO `purchase_receipt`(`receipt_date`,`grn`, `prf`, `po_number`,`receiver`,`vendor`, `store`,`note`,`Publish`,`p_code`) VALUES (?,?,?,?,?,?,?,?,?,'$sku_pcode')";
            

            $arry= array($_POST['receipt_date'],$this->GRN(),$_POST['receipt_prf'],$_POST['receipt_ponumber'],$_POST['receipt_receiver'],$_POST['receipt_supplier'],$_POST['receipt_store_id'],$_POST['receipt_note'],$_POST['receipt_publish']);
            @$store=$_POST['receipt_store_id'];
            $this->dbF->setRow($sql,$arry);
            $lastId= $this->dbF->rowLastId;
            $i=0;
            foreach($_POST['cart_list'] as $itemId){
               $id=$itemId;
                $i++;

                $temp="pid_".$id;
                $pid=abs($_POST[$temp]);

                $temp="pscale_".$id;
                @$pscale=abs($_POST[$temp]);

                $temp="pcolor_".$id;
                @$pcolor=abs($_POST[$temp]);

                $temp="pqty_".$id;
                @$pqty=abs($_POST[$temp]);

                $temp="pprice_".$id;
                @$pprice=abs($_POST[$temp]);

                @$hashVal=$pid.":".$pscale.":".$pcolor.":".$store;
                $hash = md5($hashVal);

                $qry_order="INSERT INTO `purchase_receipt_pro`(
                            `receipt_id`,
                            `receipt_product_id`,
                            `receipt_product_scale`,
                            `receipt_product_color`,
                            `receipt_price`,
                            `receipt_qty`,
                            `receipt_hash`,
                            `p_code`
                        

                            ) VALUES (?,?,?,?,?,?,?,'$sku_pcode')";
                $arry=array($lastId,$pid,$pscale,$pcolor,$pprice,$pqty,$hash);
                $this->dbF->setRow($qry_order,$arry);

 for ($i=0; $i < count($pcode);  $i++) { 
    

  echo $pcode[$i];


      // $sqlCheck="SELECT `product_store_hash` FROM `product_inventory_detail` WHERE `product_store_hash` = '$hash'";
                // $this->dbF->getRow($sqlCheck);
                // if($this->dbF->rowCount>0){
                //     $date =date('Y-m-d H:i:s'); //2014-09-24 13:46:10
                   
                // echo   $sql= "UPDATE `product_inventory_detail` SET `qty_item` = qty_item+$pqty , `updateTime` = '$date' WHERE `product_store_hash` = '$hash'";
                //     $this->dbF->setRow($sql);
                // }else{
     
                   echo  $sql = "INSERT INTO `product_inventory_detail`(
                                            `qty_store_id`,
                                            `qty_product_id`,
                                            `qty_product_scale`,
                                            `qty_product_color`,
                                            -- `qty_item`,
                                            `product_store_hash`,
                                            `p_code`
                                           
                                        ) VALUES (?,?,?,?,?,?,?) ";
                    $arry=array($store,$pid,$pscale,$pcolor,$hash,$pcode[$i]);
                    $this->dbF->setRow($sql,$arry);
                // }
                }
                // $sqlCheck="SELECT `product_store_hash` FROM `product_inventory` WHERE `product_store_hash` = '$hash'";
                // $this->dbF->getRow($sqlCheck);
                // if($this->dbF->rowCount>0){
                //     $date =date('Y-m-d H:i:s'); //2014-09-24 13:46:10
                   
                //     $sql= "UPDATE `product_inventory` SET `qty_item` = qty_item+$pqty , `updateTime` = '$date' WHERE `product_store_hash` = '$hash'";
                //     $this->dbF->setRow($sql);
                // }else{
     
                //     $sql = "INSERT INTO `product_inventory`(
                //                             `qty_store_id`,
                //                             `qty_product_id`,
                //                             `qty_product_scale`,
                //                             `qty_product_color`,
                //                             `qty_item`,
                //                             `product_store_hash`,
                                           
                //                         ) VALUES (?,?,?,?,?,?) ";
                //     $arry=array($store,$pid,$pscale,$pcolor,$pqty,$hash);
                //     $this->dbF->setRow($sql,$arry);
                // }

            } // foreach

            $desc= _replace('{{n}}',$i,$_e["Prodcut Quantity Add in {{n}} different products"]);
            if($this->dbF->rowCount>0){
                $this->functions->setlog('New Receipt','Receipt',$lastId,$desc);
                $this->functions->notificationError(_js(_uc($_e["New Receipt"])),_js(_uc($_e["New Receipt Generate Successfully"])),'btn-success');
            }else{
                $this->functions->notificationError(_js(_uc($_e["New Receipt"])),_js(_uc($_e["New Receipt Generate Failed"])),'btn-danger');
            }

        } // if end
    }

  public function receiptEdit(){
        global $_e;
        if(!$this->functions->getFormToken('purchaseReceiptEdit')){
            return false;
        }
        $oldId = $_POST['oldId'];
        $sql = "UPDATE `purchase_receipt` SET 
                `receipt_date` = '$_POST[receipt_date]',
                `prf`       = '$_POST[receipt_prf]',
                `po_number` = '$_POST[receipt_ponumber]',
                `vendor`  = '$_POST[receipt_supplier]',
                `receiver`  = '$_POST[receipt_receiver]',
                `Publish`   = '$_POST[receipt_publish]',
                `note`   = '$_POST[receipt_note]'
                WHERE `receipt_pk` = '$oldId'";
        $this->dbF->setRow($sql);
        $this->dbF->setRow("DELETE FROM `purchase_receipt_pro` WHERE `receipt_id`='$oldId'");
        @$store=$_POST['receipt_store_id'];
        $i=0;
            foreach($_POST['cart_list'] as $itemId){
               $id=$itemId;
                $i++;

                $temp="pid_".$id;
                $pid=abs($_POST[$temp]);

                $temp="pscale_".$id;
                @$pscale=abs($_POST[$temp]);

                $temp="pstore_".$id;
                @$pcolor=abs($_POST[$temp]);

                $temp="pqty_".$id;
                @$pqty=abs($_POST[$temp]);

                $temp="pprice_".$id;
                @$pprice=abs($_POST[$temp]);

                @$hashVal=$pid.":".$pscale.":".$pcolor.":".$store;
                $hash = md5($hashVal);

                $qry_order="INSERT INTO `purchase_receipt_pro`(
                            `receipt_id`,
                            `receipt_product_id`,
                            `receipt_product_scale`,
                            `receipt_product_color`,
                            `receipt_price`,
                            `receipt_qty`,
                            `receipt_hash`
                            ) VALUES (?,?,?,?,?,?,?)";
                $arry=array($oldId,$pid,$pscale,$pcolor,$pprice,$pqty,$hash);
                $this->dbF->setRow($qry_order,$arry);
                if($_POST['receipt_publish']=='1'){
                $sqlCheck="SELECT `product_store_hash` FROM `product_inventory` WHERE `product_store_hash` = '$hash'";
                $this->dbF->getRow($sqlCheck);
                if($this->dbF->rowCount>0){
                    $date =date('Y-m-d H:i:s'); //2014-09-24 13:46:10
                    $pcode =  empty($_POST['pcode']) ?  array() : $_POST['pcode'];
                   // printf($pcode);
                    $sql= "UPDATE `product_inventory` SET `qty_item` = qty_item+$pqty , `updateTime` = '$date' WHERE `product_store_hash` = '$hash'";
                    $this->dbF->setRow($sql);
                }else{

                    $sql = "INSERT INTO `product_inventory`(
                                            `qty_store_id`,
                                            `qty_product_id`,
                                            `qty_product_scale`,
                                            `qty_product_color`,
                                            `qty_item`,
                                            `product_store_hash`
                                        ) VALUES (?,?,?,?,?,?) ";
                    $arry=array($pcolor,$pid,$pscale,$pcolor,$pqty,$hash);
                    $this->dbF->setRow($sql,$arry);
                }
                }

            } // foreach

            $desc="Goods Receive Note Update";
            $desc .= "<pre>PRF:$_POST[receipt_prf]</pre>";
            $desc .= "<pre>PO Number:$_POST[receipt_ponumber]</pre>";
            $desc .= "<pre>Supplier:$_POST[receipt_supplier]</pre>";
            $desc .= "<pre>Delivery Date:$_POST[receipt_date]</pre>";
            $desc .= "<pre>Receiver:$_POST[receipt_receiver]</pre>";
            $desc .= "<pre>Note:$_POST[receipt_note]</pre>";
            if($this->dbF->rowCount>0){
                $this->functions->setlog('Goods Receive Note',$_POST['receipt_grn'],$oldId,$desc);
                $this->functions->notificationError(_js(_uc("Receipt")),_js(_uc("Receipt Update Successfully")),'btn-success');
            }else{
                $this->functions->notificationError(_js(_uc("Receipt")),_js(_uc("Receipt Update Failed")),'btn-danger');
            }
    }

}

?>