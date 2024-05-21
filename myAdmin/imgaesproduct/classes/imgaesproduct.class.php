<?php
require_once(__DIR__ . "/../../global.php"); //connection setting db

################### NEW MODULE NOTE ##########################
//If you want to make new module like Assign, just copy paste Assign. and change page_type to your type
//and only change label  and hide or show any fields.

class imgaesProduct extends object_class
{
    public $productF;
    public $imageName;
    private $page_type = "Assign";
    public function __construct()
    {
        parent::__construct('3');

        /**
         * MultiLanguage keys Use where echo;
         * define this class words and where this class will call
         * and define words of file where this class will called
         **/
        global $_e;
        global $adminPanelLanguage;
        $_w = array();
        //Index
        $_w['Assign Management'] = '';
        $_w['WithOut Edit'] = '';
        //Assign.php
        $_w['Manage Product'] = '';
        $_w['Active Imgaes Product'] = '';
        $_w['Manage Imgaes Product'] = '';
        $_w['Pending'] = '';
        $_w['Draft'] = '';
        $_w['Add New Imgaes Product'] = '';
        $_w['Delete Fail Please Try Again.'] = '';
        $_w['Completed'] = '';

        //AssignNew.php
        $_w['Add New Imgaes Product'] = '';

        //This Class
        $_w['SNO'] = '';
        $_w['TITLE'] = '';
        $_w['PUBLISH DATE'] = '';
        $_w['UPDATE'] = '';
        $_w['ACTION'] = '';
        $_w['Assign Save Successfully'] = '';
        $_w['Added'] = '';
        $_w['Assign Save Failed'] = '';




        $_w['Recommened Image Size: 210 X 164 px.'] = '';
        $_w['Drop images here to upload.'] = '';
        $_w['they will only be visible to you'] = '';
        $_w['SAVE'] = '';
        $_w['Assign Image'] = '';
        $_w['Leave Blank to publish now'] = '';
        $_w['Publish'] = '';
        $_w['Images Detail'] = '';

        $_w['Allow Comment'] = '';
        $_w['Assign Date'] = '';
        $_w['Date'] = '';
        $_w['Assign Setting'] = '';
        $_w['Enter Full Detail'] = '';
        $_w['Detail'] = '';
        $_w['Enter Short Description'] = '';
        $_w['Short Description'] = '';
        $_w['Assign Title'] = '';
        $_w['Enter Alt'] = '';
        $_w['Update Alt'] = '';
        $_w['Remove Image'] = '';
        $_w['User Name'] = '';

        $_w['Assign Detail'] = '';
        $_w['Old Assign Image'] = '';
        $_w['Album Update Successfully'] = '';
        $_w['Album Update'] = '';
        $_w['Album'] = '';
        $_w['Album Update Failed'] = '';
        $_w['Image Not Delete Please Try Again'] = '';

        $_e    =   $this->dbF->hardWordsMulti($_w, $adminPanelLanguage, 'Admin Assign Management');
    }

    public function AssignView()
    {
        $today = date('Y-m-d');
        $page_type = $this->page_type;
        $sql  = "SELECT id, user_name,date,	project_status,assigned_from,package_id FROM final_img WHERE publish = '1' ";
        $data =  $this->dbF->getRows($sql);
        $this->print_Assign_table($data);
    }

    public function AssignPending()
    {
        $today = date('Y-m-d');
        $page_type = $this->page_type;
        $sql  = "SELECT id, user_name,date,project_status,assigned_from,package_id FROM final_img WHERE	project_status=1 AND `status` = '1' AND publish = '1' ";
        // $sql  = "SELECT id, heading,publish_date,dateTime FROM uploaded_files WHERE `type` = '$page_type' AND publish = '1' AND publish_date > '$today' ";
        $data =  $this->dbF->getRows($sql);
        $this->print_Assign_table($data);
    }


    public function AssignDraft()
    {
        $page_type = $this->page_type;
        $sql  = "SELECT id, user_name,date,project_status,assigned_from,package_id FROM final_img WHERE typeofpack = '1' ";

        $data =  $this->dbF->getRows($sql);

        $this->print_Assign_table($data);
    }

    public function productName($id){
        $qry="SELECT `product_id` FROM `orders` WHERE `order_id`=$id ";
        $data =  $this->dbF->getRow($qry);
        $proId=$data['product_id'];
        if($proId){
        $qry2="SELECT `prodet_name` FROM `proudct_detail_spb` WHERE `prodet_id`=$proId ";
        $data2 =  $this->dbF->getRow($qry2);
        $productName=unserialize($data2['prodet_name']);
        return $productName;
        }
        
    }
    private function print_Assign_table($data)
    {
        $data   = empty($data) ? array() : $data;
        global $_e;
        echo '<div class="table-responsive">
                <table class="table table-hover dTable tableIBMS">
                    <thead>
                        <th>' . _u($_e['SNO']) . '</th>
                        <th>User Name</th>
                        <th>TITLE PRODUCT NAME</th>
                        <th>' . _u($_e['UPDATE']) . '</th>
                        <th>STATUS</th>
                        <th>ASSIGN FROM</th>
                        <th>' . _u($_e['ACTION']) . '</th>
                    </thead>
                <tbody>';

        $i = 0;
        $defaultLang = $this->functions->AdminDefaultLanguage();
      
        foreach ($data as $val) {
            $i++;
            $id = $val['id'];
            $ProId = $val['package_id'];
            
            $product = $this->productName($ProId);
            $productName=$product['English'];
            
            $project_status = $val['project_status'];
            if($project_status==1){
                $status="Accept";
                
            }else{
               $status="Pending"; 
            }
            $heading = $val['user_name'];
            $assigned = $val['assigned_from'];
            if($assigned){
                $editor = $this->UserName($assigned);
                $editorName=$editor['acc_name'];
            }else{
                $editorName="Not Assign";
            }
            if($status=="Pending"){
                  echo "<tr>
                    <td class='btn-pending'>$i</td>
                    <td class='btn-pending'>$heading</td>
                    <td class='btn-pending'>$productName</td>
                    
                    <td class='btn-pending'>$val[date]</td>
                    <td class='btn-pending'>$status</td>
                    <td class='btn-pending'>$editorName</td>
                    <td class='btn-pending'>
                        <div class='btn-group btn-group-sm'>
                            <a data-id='$id' href='-imgaesproduct?page=edit&pageId=$id' class='btn'>
                                <i class='glyphicon glyphicon-edit'></i>
                            </a>
                            <a data-id='$id' onclick='deleteAssign(this);' class='btn'>
                                <i class='glyphicon glyphicon-trash trash'></i>
                                <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                            </a>
                        </div>
                    </td>
                  </tr>";
            }else{
            echo "<tr>
                    <td>$i</td>
                    <td>$heading</td>
                    <td>$productName</td>
                    <td>$val[date]</td>
                    <td>$status</td>
                    <td>$editorName</td>
                    <td>
                        <div class='btn-group btn-group-sm'>
                            <a data-id='$id' href='-imgaesproduct?page=edit&pageId=$id' class='btn'>
                                <i class='glyphicon glyphicon-edit'></i>
                            </a>
                            <a data-id='$id' onclick='deleteAssign(this);' class='btn'>
                                <i class='glyphicon glyphicon-trash trash'></i>
                                <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                            </a>
                        </div>
                    </td>
                  </tr>";
        }
}

        echo '</tbody>
             </table>
            </div> <!-- .table-responsive End -->';
    }

    public function newAssignAdd()
    {
        global $_e;
        if (isset($_POST['submit'])) {
            if (!$this->functions->getFormToken('newAssign')) {
                return false;
            }

            $heading        = empty($_POST['heading'])      ? ""    : serialize($_POST['heading']);
            $short_desc     = empty($_POST['shortDesc'])    ? ""    : serialize($_POST['shortDesc']);
            $dsc            = empty($_POST['dsc'])          ? ""    : base64_encode(serialize($_POST['dsc']));
            $date           = empty($_POST['date'])         ? ""    : $_POST['date'];
            $publish        = empty($_POST['publish'])      ? "0"   : $_POST['publish'];
            $publishDate    = empty($_POST['publish_date']) ? ""    : date('Y-m-d', strtotime($_POST['publish_date']));
            $comment        = empty($_POST['comment'])      ? "0"   : $_POST['comment'];
            $file           = empty($_FILES['image']['name']) ? false    : true;
            $returnImage    = "";
            $date           =   date('Y-m-d', strtotime($date));
            try {
                $this->db->beginTransaction();

                $sql      =   "INSERT INTO `Assign`(
                                    `date`, `heading`, `shortDesc`,
                                     `dsc`, `image`,
                                     `comment`, `publish`,`publish_date`,
                                     `type`)
                                    VALUES (?,?,?,  ?,?,   ?,?,?, ?)";

                if ($file) {
                    $returnImage =  $this->functions->uploadSingleImage($_FILES['image'], 'Assign');
                    if ($returnImage == false) {
                        throw new Exception('Image File Error');
                    }
                }

                $array   = array(
                    $date, $heading, $short_desc,
                    $dsc, $returnImage,
                    $comment, $publish, $publishDate, $this->page_type
                );

                $this->dbF->setRow($sql, $array, false);

                $this->db->commit();
                if ($this->dbF->rowCount > 0) {
                    $this->functions->notificationError(_uc($_e['Assign']), ($_e['Assign Save Successfully']), 'btn-success');
                    $this->functions->setlog(_uc($_e['Added']), _uc($_e['Assign']), $this->dbF->rowLastId, ($_e['Assign Save Successfully']));
                } else {
                    $this->functions->notificationError(_uc($_e['Assign']), ($_e['Assign Save Failed.']), 'btn-danger');
                }
            } catch (Exception $e) {
                if ($returnImage !== false) {
                    $this->functions->deleteOldSingleImage($returnImage);
                }
                $this->db->rollBack();
                $this->dbF->error_submit($e);
                $this->functions->notificationError(_uc($_e['Assign']), ($_e['Assign Save Failed.']), 'btn-danger');
            }
        } // If end
    }



    public function AssignEditSubmit()
    {

        global $_e;

        if (isset($_POST['submit']) && isset($_POST['ProductNewId'])) {

            // if (!$this->functions->getFormToken('editAlbum')) {
            //     return false;
            // }

            $assigned        = empty($_POST['Editor']) ? 0   : $_POST['Editor'];
            // if($_POST['Editor']!=0){
                
                
            // }
            $lastId = $_GET['pageId'];
            try {
                $this->db->beginTransaction();
                $sql    =  "UPDATE `final_img` SET
                            `assigned_from`=?,
                            `publish`=1
                            WHERE id=$lastId";

                $array   = array($assigned);
                $this->dbF->setRow($sql, $array, false);
                $this->db->commit();

                // $sql    = "SELECT `acc_email` FROM accounts_user WHERE acc_id = '$assigned'";
                // $getemail   =   $this->dbF->getRow($sql);
                // mail($getemail, 'Assing Images Product', 'Open Website to see your project', 'man411210@gmail.com');
                if ($this->dbF->rowCount > 0) {



                    $this->functions->notificationError(_uc($_e['Album Update']), _uc($_e['Album Update Successfully']), 'btn-success');
                    $this->functions->setlog(_uc($_e['Album Update']), _uc($_e['Album']), $lastId, _uc($_e['Album Update Successfully']));
                } else {
                    $this->functions->notificationError(_uc($_e['Album Update']), _uc($_e['Album Update Failed']), 'btn-danger');
                }
            } catch (Exception $e) {
                $this->db->rollBack();
                $this->dbF->error_submit($e);
                $msg = $this->dbF->rowException;
                $this->functions->notificationError(_uc($_e['Album']), _replace('{{msg}}', $msg, ($_e['Album Update Failed,Please Enter Correct Values,: Error: {{msg}}'])), 'btn-danger');
            }
        }
    }
    public function UserName($user_id, $returnAll = true)
    {
        $sql    = "SELECT * FROM accounts_user WHERE acc_id = '$user_id'";
        $userData   =   $this->dbF->getRow($sql);

        if ($returnAll === true) {
            return $userData;
        }
        return $userData[$returnAll];
    }
    public function AssignNew()
    {
        global $_e;
        $token       = $this->functions->setFormToken('newAssign', false);
        //No need to remove any thing,, go in developer setting table and set 0
        echo '<form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">' .
            $token .
            '<div class="form-horizontal">

           <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs_arrow" role="tablist">
                <li class="active"><a href="#homeP" role="tab" data-toggle="tab">' . _uc($_e['Detail']) . '</a></li>
                <li><a href="#setting" role="tab" data-toggle="tab">' . _uc($_e['Assign Setting']) . '</a></li>
            </ul>


           <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane fade in active container-fluid" id="homeP">
                    <h2  class="tab_heading">' . _uc($_e['Assign Detail']) . '</h2>
           ';

        $lang = $this->functions->IbmsLanguages();
        if ($lang != false) {
            $lang_nonArray = implode(',', $lang);
        }
        echo '<input type="hidden" name="lang" value="' . $lang_nonArray . '" />';

        echo '<div class="panel-group" id="accordion">';
        for ($i = 0; $i < sizeof($lang); $i++) {
            if ($i == 0) {
                $collapseIn = ' in ';
            } else {
                $collapseIn = '';
            }
            echo '<div class="panel panel-default">
                          <div class="panel-heading">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#' . $lang[$i] . '">
                                    <h4 class="panel-title">
                                        ' . $lang[$i] . '
                                    </h4>
                                 </a>
                          </div>
                          <div id="' . $lang[$i] . '" class="panel-collapse collapse ' . $collapseIn . '">
                             <div class="panel-body">';

            //Title
            echo '<div class="form-group">
                                            <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['TITLE']) . '</label>
                                            <div class="col-sm-10  col-md-9">
                                                <input type="text" name="heading[' . $lang[$i] . ']"  maxlength="150"  class="form-control" placeholder="' . _uc($_e['Assign Title']) . '">
                                            </div>
                                        </div>';

            //Short Desc
            echo '<div class="form-group">
                                        <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['Short Description']) . '</label>
                                        <div class="col-sm-10  col-md-9">
                                            <textarea name="shortDesc[' . $lang[$i] . ']" class="form-control" maxlength="500" placeholder="' . _uc($_e['Enter Short Description']) . '"></textarea>
                                        </div>
                                   </div>';

            //Desc
            echo '<div class="form-group">
                                        <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['Detail']) . '</label>
                                        <div class="col-sm-10  col-md-9">
                                            <textarea name="dsc[' . $lang[$i] . ']" id="dsc_' . $lang[$i] . '_" placeholder="' . _uc($_e['Enter Full Detail']) . '" class="ckeditor"></textarea>
                                        </div>
                                   </div>';

            echo '           </div> <!-- panel-body end -->
                          </div> <!-- collapse end-->
                    </div><!-- panel end-->';
        }


        echo '</div> <!-- .accordian end -->';

        echo '</div> <!-- homeP Tab End -->
                     <div class="tab-pane fade in container-fluid" id="setting">
                            <h2  class="tab_heading">' . _uc($_e['Assign Setting']) . '</h2>
                ';

        //Date
        if ($this->functions->developer_setting('Assign_date') == '1') {
            echo '<div class="form-group">
                                <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['Date']) . '</label>
                                <div class="col-sm-10  col-md-9">
                                    <input type="text" name="date" class="date form-control" placeholder="' . _uc($_e['Assign Date']) . '">
                                </div>
                            </div>';
        } else {
            echo '<input type="hidden" name="date" value="" class="form-control">';
        }

        //Comment
        if ($this->functions->developer_setting('Assign_comment') == '1') {
            echo '<div class="form-group">
                                    <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['Allow Comment']) . '</label>
                                    <div class="col-sm-10  col-md-9">
                                        <div class="make-switch" data-off="warning" data-on="success">
                                            <input type="checkbox" name="comment" value="1">
                                        </div>
                                    </div>
                               </div>';
        } else {
            echo '<input type="hidden" name="comment" value="0" class="form-control">';
        }

        //Publish
        echo '<div class="form-group">
                                    <label  class="col-sm-2 col-md-3  control-label">' . _uc($_e['Publish']) . '</label>
                                    <div class="col-sm-10  col-md-9">
                                        <div class="make-switch" data-off="danger" data-on="success" data-on-label="' . _uc($_e['Publish']) . '" data-off-label="' . _uc($_e['Draft']) . '">
                                            <input type="checkbox" name="publish" value="1">
                                        </div>
                                    </div>
                               </div>';


        //Publish Date
        echo '<div class="form-group">
                                    <label  class="col-sm-2 col-md-3  control-label">' . _uc($_e['PUBLISH DATE']) . '</label>
                                    <div class="col-sm-10  col-md-9">
                                        <input type="text" name="publish_date" class="date form-control" placeholder="' . ($_e['Leave Blank to publish now']) . '">
                                    </div>
                               </div>';


        //Banner
        if ($this->functions->developer_setting('Assign_image') == '1') {
            echo '<div class="form-group">
                                    <label  class="col-sm-2 col-md-3  control-label">' . _uc($_e['Assign Image']) . '</label>
                                    <div class="col-sm-10  col-md-9">
                                        <input type="file" name="image" class="btn-file btn btn-primary">
                                    </div>
                               </div>';
        } else {
            echo '<input type="hidden" name="mage" value="" class="form-control">';
        }

        //echo '<input type="submit" name="submit" value="SAVE" class="btn btn-lg btn-primary"/>';
        // echo '<button type="submit" name="submit" value="SAVE" class="btn btn-lg btn-primary">' . _u($_e['SAVE']) . '</button>';

        echo "</div><!-- setting tabs end -->
        </div> <!-- tab-content end -->
    </div> <!-- container end -->
</form>";
    }
    public function webUserInfoArray($data, $settingName)
    {
        foreach ($data as $val) {
            if ($val['setting_name'] == $settingName) {
                return $val['setting_val'];
            }
        }
        return "";
    }

    public function accountEditor()
    {
        if (!isset($selectuserId)) {
  $selectuserId = null;
}
        $sql  = "SELECT `acc_name`,`acc_id` FROM accounts_user WHERE `user_typeee`='Editor'";
        $data =  $this->dbF->getRows($sql);
        $option = '';
        $option .= "<option value='0'></option>";
        foreach ($data as $val) {
            $option .= "<option value='" . $val['acc_id'] . "'>" . $val['acc_name'] . "</option>";
        }
        return $option;
  
        if (!isset($selectuserId)) {
  $selectuserId = null;
}
    }
    public function AssignEdit()
    {
        global $_e;
        $token  = $this->functions->setFormToken('editImgaesProduct', false);
        $id     =   $_GET['pageId'];
        $sql    =   "SELECT * FROM final_img where id = '$id' ";
        $data   =   $this->dbF->getRow($sql);
        if ($this->dbF->rowCount == 0) {

            echo "Images Not Found For Update";
            return false;
        }

        //No need to remove any thing,, go in developer setting table and set 0
        echo '<form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">' .
            $token .
            '<input type="hidden" name="editId" value="' . $id . '"/>
            <div class="form-horizontal">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs_arrow" role="tablist">
                <li class="active"><a href="#homeP" role="tab" data-toggle="tab">' . _uc($_e['Detail']) . '</a></li>
            </ul>


           <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane fade in active container-fluid" id="homeP">
                    <h2  class="tab_heading">' . _uc($_e['Images Detail']) . '</h2>
           ';

        $lang = $this->functions->IbmsLanguages();
        if ($lang != false) {
            $lang_nonArray = implode(',', $lang);
        }
        echo '<input type="hidden" name="lang" value="' . $lang_nonArray . '" />';

        echo '<div class="panel-group" id="accordion">';

        // $heading = unserialize($data['user_name']);
        $heading = $data['user_name'];
        $selectuser = empty($data['assigned_from']) ? 0 : $data['assigned_from'];
        $selectuserId = empty($data['assigned_from']) ? 0 : $data['assigned_from'];
        if ($selectuser != 0) {
            $selectuser = $this->UserName($selectuser);
        }
        for ($i = 0; $i < sizeof($lang); $i++) {
            if ($i == 0) {
                $collapseIn = ' in ';
            } else {
                $collapseIn = '';
            }
            echo '<div class="panel panel-default">
                          <div class="panel-heading">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#' . $lang[$i] . '">
                                    <h4 class="panel-title">
                                        ' . $lang[$i] . '
                                    </h4>
                                 </a>
                          </div>
                          <div id="' . $lang[$i] . '" class="panel-collapse collapse ' . $collapseIn . '">
                             <div class="panel-body">';

            //Title
            echo '<div class="form-group">
                                    <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['User Name']) . '</label>
                                    <div class="col-sm-10  col-md-9">
                                        <input readonly value="' . $heading . '" type="text" name="heading[' . $lang[$i] . ']"  maxlength="150"  class="form-control" placeholder="' . _uc($_e['Assign Title']) . '">
                                    </div>
                                </div>';

            //Short Desc
            // echo '<div class="form-group">
            //                         <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['Short Description']) . '</label>
            //                         <div class="col-sm-10  col-md-9">
            //                             <textarea name="shortDesc[' . $lang[$i] . ']" class="form-control" maxlength="500" placeholder="' . _uc($_e['Enter Short Description']) . '">' . $shortDesc[$lang[$i]] . '</textarea>
            //                         </div>
            //                     </div>';
        $qryy    =   "SELECT * FROM final_img where id = '$id' ";
        $dataqry   =   $this->dbF->getRow($qryy);
        $assigned=$dataqry['project_status'];
        $packType=$dataqry['typeofpack'];
        $ass=$dataqry['assigned_from'];

        if($assigned){
            $editor = $this->UserName($ass);
                @$editorName=$editor['acc_name'];
                        echo '<div class="form-group">
                                    <label class="col-sm-2 col-md-3  control-label"> Assigned To</label>
                                    <div class="col-sm-10  col-md-9">
                                        <input readonly value="' . $editorName . '" type="text" name="heading[' . $lang[$i] . ']"  maxlength="150"  class="form-control" placeholder="' . _uc($_e['Assign Title']) . '">
                                    </div>
                                </div>';
            
        }else{
            if($packType == 0){
            echo '<div class="form-group">
                    <label class="col-sm-3 control-label">Assigned To</label>
                    <div class="col-sm-9">
                        <select id="accountSelect" class="form-control arole" name="Editor">' .
                $this->accountEditor()
                . '</select>
                        <script>
                        $(document).ready(function(){
                            $("#accountSelect option[value=' . $selectuserId . ']").attr("selected", "selected");
                        });
                        </script>
                    </div>
                </div>';
        }
}





            echo '<h3>User Images...</h3>';
            echo '<div id="dropbox">';
            echo '<input type="hidden" id="AjaxFileNewId" name="ProductNewId" value="' . $id . '">
            <input type="hidden" id="AjaxFileNewPage" value="albums">';
            $this->albumEditImages($id);

            echo '</div><span class="message">
            ' . $_e['Recommened Image Size: 210 X 164 px.'] . '<br />
            ' . _fu($_e['Drop images here to upload.']) . '<br />
            <i>(' . _fu($_e['they will only be visible to you']) . ')</i></span><br>';


                
                
                
                
                
                
                $finalId=$_GET['pageId'];
                $qry="SELECT * FROM `final_img` WHERE `id`='$finalId'";
                $data = $this->dbF->getRow($sql);
                if($data['project_status']==1){
            echo '<h3>Editor Images...</h3>';
            echo '<div id="dropbox">';
            // echo '<input type="hidden" id="AjaxFileNewId" name="ProductNewId" value="' . $id . '">
            // <input type="hidden" id="AjaxFileNewPage" value="albums">';
            $this->albumEditImagess($id);

            echo '</div><span class="message">
            ' . $_e['Recommened Image Size: 210 X 164 px.'] . '<br />
            ' . _fu($_e['Drop images here to upload.']) . '<br />
            <i>(' . _fu($_e['they will only be visible to you']) . ')</i></span><br>';
                
                
                
                echo '


  <div class="chat-box" id="chatBox">';
                echo '
            <h3>Comments</h3>
             <div id="chats">
            ';


               
                $userId=$data['user_id'];
                $assigned_from=$data['assigned_from'];
                $projectId=$data['package_id'];

                // $sql = "SELECT * FROM chat_comment WHERE sender_id = '$id' OR user_id = $userId ORDER BY `time` DESC";
                $sql = "SELECT * FROM chat_comment WHERE (assigned_from = '$assigned_from' OR user_id = $userId) AND `project_id` = $projectId ORDER BY `time` ASC";
                $comment_data = $this->dbF->getRows($sql);
                foreach ($comment_data as $commentVal) {
                    $message = $commentVal['message'];
                    $sender_id = $commentVal['sender_id'];
                    $time2 = $commentVal['time'];
                    $time = substr($time2, 11);
                    
                     $editor = $this->UserName($sender_id);
                     $senderName=$editor['acc_name'];
                    // $username = $functions->webUserName($sender_id);

                    echo '
                    <div class="chat-message">
                    <b>'.$senderName.'</b>-<b>' . $message . '</b>
                    <div class="time-message">' . $time . '</div>
                    </div>
                    
                    ';
                }


                echo '</div></div>';

}




            echo '</br>';

            echo '<button type="submit" name="submit" value="SAVE" class="btn btn-lg btn-primary">' . _u($_e['SAVE']) . '</button>';

            echo '        </div> <!-- panel-body end -->
                      </div> <!-- collapse end-->
                </div><!-- panel end-->';
        }


        echo '</div> <!-- .accordian end -->';

        echo '</div> <!-- homeP Tab End -->
                     <div class="tab-pane fade in container-fluid" id="setting">
                            <h2  class="tab_heading">' . _uc($_e['Assign Setting']) . '</h2>
                ';

        //Date
        if ($this->functions->developer_setting('Assign_date') == '1') {
            echo '<div class="form-group">
                    <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['Date']) . '</label>
                    <div class="col-sm-10  col-md-9">
                        <input type="text" name="date" value="' . $data['date'] . '"  class="date form-control" placeholder="' . _uc($_e['Assign Date']) . '">
                    </div>
                 </div>';
        } else {
            echo '<input type="hidden" name="date" value="" class="form-control">';
        }

        //Comment
        if ($this->functions->developer_setting('Assign_comment') == '1') {
            $checked = "";
            if ($data['comment'] == '1') {
                $checked = 'checked';
            }
            echo '<div class="form-group">
                    <label class="col-sm-2 col-md-3  control-label">' . _uc($_e['Allow Comment']) . '</label>
                    <div class="col-sm-10  col-md-9">
                        <div class="make-switch" data-off="warning" data-on="success">
                            <input type="checkbox" name="comment" value="1" ' . $checked . '>
                        </div>
                    </div>
               </div>';
        } else {
            echo '<input type="hidden" name="comment" value="0" class="form-control">';
        }

        //Publish
        $checked = "";
        if ($data['publish'] == '1') {
            $checked = 'checked';
        }
        echo '<div class="form-group">
                    <label  class="col-sm-2 col-md-3  control-label">' . _uc($_e['Publish']) . '</label>
                    <div class="col-sm-10  col-md-9">
                        <div class="make-switch" data-off="danger" data-on="success" data-on-label="' . _uc($_e['Publish']) . '" data-off-label="' . _uc($_e['Draft']) . '">
                            <input type="checkbox" name="publish" value="1" ' . $checked . '>
                        </div>
                    </div>
               </div>';


        //Publish Date
        $publish_date = empty($data['publish_date']) ? "" : date('m/d/Y', strtotime($data['publish_date']));
        echo '<div class="form-group">
                    <label  class="col-sm-2 col-md-3  control-label">' . _uc($_e['PUBLISH DATE']) . '</label>
                    <div class="col-sm-10  col-md-9">
                        <input type="text" value="' . $publish_date . '" name="publish_date" class="date form-control" placeholder="' . ($_e['Leave Blank to publish now']) . '">
                    </div>
               </div>';

        //Banner
        if ($this->functions->developer_setting('Assign_image') == '1') {
            $img = "";
            if ($data['image'] != '') {
                $img = $data['image'];
                echo "<input type='hidden' name='oldImg' value='$img' />";
                echo '<div class="form-group">
                    <label  class="col-sm-2 col-md-3  control-label">' . _uc($_e['Old Assign Image']) . '</label>
                    <div class="col-sm-10  col-md-9">
                        <img src="../images/' . $img . '" style="max-height:250px;" >
                    </div>
               </div>';
            }

            echo '<div class="form-group">
                    <label  class="col-sm-2 col-md-3  control-label">' . _uc($_e['Assign Image']) . '</label>
                    <div class="col-sm-10  col-md-9">
                        <input type="file" name="image" class="btn-file btn btn-primary">
                    </div>
               </div>';
        } else {
            echo '<input type="hidden" name="image" value="" class="form-control">';
        }

        //echo '<input type="submit" name="submit" value="SAVE" class="btn btn-lg btn-primary"/>';
        echo '<button type="submit" name="submit" value="SAVE" class="btn btn-lg btn-primary">' . _u($_e['SAVE']) . '</button>';

        echo "</div><!-- setting tabs end -->
        </div> <!-- tab-content end -->
    </div> <!-- container end -->
</form>";
    }
    public function albumEditImages($ids)
    {
        global $_e;
        $qry1 = "SELECT * FROM  `final_img` WHERE `id` = '$ids'";
        $eData1 = $this->dbF->getRow($qry1);
        $idd = $eData1['user_id'];
        $proID = $eData1['package_id'];
        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$idd' AND `status` = '1' AND `product_id`=$proID ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $this->dbF->getRows($qry);
        if ($this->dbF->rowCount > 0) {
            foreach ($eData as $key => $val) {
                $img    = $val['file_path'];
                
                $imgId  = $val['id'];
                $alt    = $val['file_name'];
                $imgType  = $val['file_type'];
                $place1 =   $_e['Enter Alt'];
                $place2 =   $_e['Update Alt'];
                $place3 =   $_e['Remove Image'];
                
                 if($imgType=='link'){
                  $typOfData='<a class="thumb_link" href="'.$url.'/uploads/'.$img.'" data-image="'.$imgId.'" width="225px" height="187" title="'.$img.'" target="_blank" ></a>';  
                }else{
                  $typOfData='<img src="'.$url.'/uploads/'.$img.'" data-image="'.$imgId.'">';  
                    
                }
                echo <<<HTML
                        <div class="preview albumPreview" id="image_$imgId">
                            <span class="imageHolder">
                                $typOfData
                            </span>

                            <div class="progressHolder album">
                                <input type="text" id="alt-$imgId" value="$alt" placeholder="$place1" class="form-control" style="margin:3px 0">
                                <a class="albumAltUpdate  btn btn-default btn-sm" data-id="$imgId" ><span>$place2</span>
                                <i class='glyphicon glyphicon-save trash'></i>
                                <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                            </a>
                            <!-- <input type="checkbox" name="selectedImages[]" value="' . $img . '"> -->
                                <!-- <a class="shakeeb">color</a> -->
                                <a class="productEditImageDel btn btn-danger btn-sm"  data-id="$imgId">$place3</a>
                            </div>
                        </div>
HTML;
            }
        }
    }
    public function albumEditImagess($ids)
    {
        global $_e;
        $qry1 = "SELECT * FROM  `final_img` WHERE `id` = '$ids'";
        $eData1 = $this->dbF->getRow($qry1);
        $idd = $eData1['assigned_from'];
        $qry = "SELECT * FROM editor_upload WHERE editor_id = '$idd' AND `status` = '1' ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $this->dbF->getRows($qry);
        if ($this->dbF->rowCount > 0) {
            foreach ($eData as $key => $val) {
                $img    = $val['image_path'];
                $imgId  = $val['id'];
                $alt    = $val['alt_name'];
                $place1 =   $_e['Enter Alt'];
                $place2 =   $_e['Update Alt'];
                $place3 =   $_e['Remove Image'];
                echo <<<HTML
                        <div class="preview albumPreview" id="image_$imgId">
                            <span class="imageHolder">
                                 <img src="$url/$img" />
                            </span>

                           
                        </div>
HTML;
            }
        }
    }
}
