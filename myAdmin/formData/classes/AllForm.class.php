<?php
require_once (__DIR__."/../../global.php"); //connection setting db



class AllFormData extends object_class{
    public $productF;
    public $imageName;
    public function __construct(){
        parent::__construct('3');

        if (isset($GLOBALS['productF'])) $this->productF = $GLOBALS['productF'];
        else {
            if ($this->functions->developer_setting('product') == '1') {
                $this->functions->require_once_custom('product_functions');
                $this->productF = new product_function();
            }
        }
        /**
         * MultiLanguage keys Use where echo;
         * define this class words and where this class will call
         * and define words of file where this class will called
         **/
        global $_e;
        global $adminPanelLanguage;
        $_w=array();
        $_w['Manage Emails'] = '';
        $_w['Import Emails'] = '';
        $_w['Excel File'] = '';
        $_w['Submit'] = '';
        $_w['Example'] = '';
        $_w['Delete Group'] = '';
        $_w['Verify Emails'] = '';
        $_w['UnVerify Emails'] = '';
        $_w['Delete Fail Please Try Again.'] = '';
        $_w['Are You Sure You Want To Update?'] = '';
        $_w['Update Fail Please Try Again.'] = '';
        $_w['SNO'] = '';
        $_w['EMAIL'] = '';
        $_w['UPDATE'] = '';
        $_w['GROUP'] = '';
        $_w['GROUP CHANGE'] = '';
        $_w['ACTION'] = '';
        $_w['News Letter'] = '';
        $_w['Added'] = '';
        $_w['News Letter Add Successfully'] = '';
        $_w['News Letter Save Failed'] = '';
        $_w['News Letter Save Successfully'] = '';
        $_w['News Letter Save Failed,Please Enter Correct Values,: Error: {{msg}}'] = '';
        $_w['Email Queue'] = '';
        $_w['Queue Already Created'] = '';
        $_w['Queue Created Successfully'] = '';
        $_w['Queue Create Fail'] = '';
        $_w['News Letter UPDATE Successfully'] = '';
        $_w['News Letter UPDATE Failed'] = '';
        $_w['News Letter UPDATE Failed,Please Enter Correct Values,: Error: {{msg}}'] = '';

        $_w['All Form Data']  = '';
        $_w['LETTER TITLE']  = '';
        $_w['EMAIL SUBJECT']  = '';
        $_w['EMAIL PENDING']  = '';
        $_w['TOTAL EMAIL']  = '';
        $_w['Start/Pause Sending Email Queue']  = '';
        $_w['Delete Email Queue']  = '';
        $_w['SELECT GROUP']  = '';
        $_w['Edit']  = '';
        $_w['Delete Email Letter']  = '';

        $_w['FOR ADMIN']  = '';
        $_w['FROM NAME']  = '';
        $_w['FROM MAIL']  = '';
        $_w['REPLAY TO']  = '';
        $_w['SUBJECT']  = '';

        $_w['USE these Keys to replace user INFO in SUBJECT OR IN Letter']  = '';
        $_w['Enter Full Detail']  = '';
        $_w['Email News Letter']  = '';
        $_w['All Emails Send Successfully']  = '';
        $_w['Update'] = '';
        $_w['DeActive Email']= '';
        $_w['Delete Email']= '';
        $_w['Active Email']= '';
        $_w['Delete']= '';

        $_w['Email Content']= '';
        $_w['GO BACK']= '';
        $_w['Delete Fail Please Try Again.']= '';
        $_w['Update Fail Please Try Again.']= '';
        $_w["Are you sure you want to {{state}} email queue?"]= '';
        $_w['Please select group before send email letter'] = '';
        $_w['Are you sure you want to send email to {{grp}} Group?'] = '';
        $_w['Email Management'] = '';
        $_w['News Letters'] =   '';
        $_w['Email Stats'] =   '';
        $_w['New News Letter'] =   '';
        $_w['Bounce Email'] =   '';
        $_w['DateTime'] =   '';
        $_w['Delete Bounce Emails'] =   '';
        $_w['Delete'] =   '';
        $_w['Bounce Email Delete Successfully'] =   '';
        $_w['Bounce Email Delete Successfully'] =   '';
        $_w['Bounce Email Delete Failed'] =   '';
        $_w['CONTACT NO'] =   '';
        $_w['Message For Notification'] =   '';
        $_e    =   $this->dbF->hardWordsMulti($_w,$adminPanelLanguage,'Admin Email');
    }



    

public function allFormdataContent(){
        global $_e;
 
        $sql  = "SELECT * FROM surveyFormData GROUP BY type DESC ";
        $data =  $this->dbF->getRows($sql);
        $i = 0;
        foreach($data as $val){
           
            $id = $val['id'];
            $type = $val['type'];


echo "<div class='tab-pane fade in container-fluid' id='newPage".$id."'>
<h2  class='tab_heading'>".$type." </h2>";

echo '<div class="table-responsive">
<table class="table table-hover dTable tableIBMS">
<thead>
<th>Sno</th>

<th>Inserted date time</th>
<th>File</th>
<th>Field 1</th>
<th>Field 2</th>
<th>Field 3</th>
<th>Field 4</th>
<th>Field 5</th>
<th>Field 6</th>
<th>Field 7</th>
<th>Field 8</th>
<th>Field 9</th>
<th>Comment</th>
<th>Action</th>


</thead>


<tbody>';
  $i = 0;
        $sql  = "SELECT * FROM surveyFormData where type = '$type' ORDER BY id DESC ";
        $variable =  $this->dbF->getRows($sql);
foreach ($variable as $key => $value) {
     $id = $value['id'];
 $prev_comment = $value['comment'];

 $i++;
echo "<tr>
<td>$i</td>
<td>$value[currentdatetimePrint]</td>
<td>@$value[type]</td>
<td>$value[field1]</td>
 <td>$value[field2]</td>
<td>$value[field3]</td>
<td>$value[field4]</td>
<td>$value[field5]</td>
<td>$value[field6]</td>
<td>$value[field7]</td>
<td>$value[field8]</td>
<td>$value[field9]</td>
<form method='POST'>
<td><textarea name='comment' id ='comment_text".$id."' class='form-control' maxlength='500' placeholder=''>".$prev_comment."</textarea></td>



<td><div class='btn-group btn-group-sm'>
                             
                            <a id='".$id."' class='btn btn-lg btn-primary'  name='submit_comment' onclick='commentadd(this);' value='SAVE'><i class='glyphicon glyphicon-saved'></i></a>
                            <a id='".$id."' onclick='deleteComment(this);' class='btn'>
                                <i class='glyphicon glyphicon-trash trash'></i>
                                <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                            </a>
                        </div></td></form>


</tr>";
 

    # code...
}
?>

 <script>
    function commentadd(ths) {


                var allAttr = $(ths);
                var dataId = allAttr.attr('id');
                var comm = $('#comment_text'+dataId).val();
                console.log(dataId);
                console.log(comm);

                $.ajax({
                     type:"POST",
                     url:"email/classes/ajax.php",
                     data: {
                            id: dataId,comment: comm
                            },
                     success: function(response){
                             $('#comment_text').val(comm);
                             alert('Comment Saved'); 
                     },
                     error: function(jqxhr, status, exception) {
             alert('Exception:', exception);
         }
                });

            }

            function deleteComment(ths){
        btn=$(ths);
        if(secure_delete()){
            btn.addClass('disabled');
            btn.children('.trash').hide();
            btn.children('.waiting').show();

            id=btn.attr('id');
            $.ajax({
                type: 'POST',
                url: 'email/classes/ajax.php',
                data: { id:id,comm:'delete' }
            }).done(function(data)
                {
                    ift =true;
                    
                        
                        btn.closest('tr').hide(1000,function(){$(this).remove()});
                    
                    

                    if(ift){
                        btn.removeClass('disabled');
                        btn.children('.trash').show();
                        btn.children('.waiting').hide();
                    }

                });
        }
    }

         //    function deleteComment(ths) {


         //        var allAttr = $(ths);
         //        var dataId = allAttr.attr('id');
         //        // var comm = $('#comment_text'+dataId).val();
         //        console.log(dataId);
         //        // console.log(dataId);

         //        $.ajax({
         //             type:"POST",
         //             url:"email/classes/ajax.php",
         //             data: {
         //                    id: dataId,comm: 'delete'
         //                    },
         //             success: function(response){

         //                     // $('#comment_text').val(comm);
         //                     alert('deleted');  
         //                      location.reload();
         //             },
         //             error: function(jqxhr, status, exception) {
         //     alert('Exception:', exception);
         // }
         //        });

         //    }


    </script>

<?php

        echo '</tbody>
             </table>
            </div> <!-- .table-responsive End -->';




            echo "

        </div>




            ";

             
        }


       
    }
    
public function allFormdata(){
        global $_e;
      
        $sql  = "SELECT * FROM surveyFormData GROUP BY type DESC ";
        $data =  $this->dbF->getRows($sql);
        $i = 0;
        foreach($data as $val){
            $i++;
            $id = $val['id'];
            $type = str_replace("_"," ",$val['type']);


            echo "<li id='NewMenu'><a href='#newPage".$id."' role='tab' data-toggle='tab'>".$type."</a></li>";

            // $grpOption  =   $this->emailGrpOption($val['grp']);
            // $group      = "<div class='btn-group grpDiv btn-group-sm  col-sm-12' data-id='$id'>
            //                     <select class='form-control emailGrp col-sm-10' onchange='emailGroup(this);' style='width: 80%'>
            //                         $grpOption
            //                     </select>
            //                     <div class='col-sm-2' style='padding: 8px 0'>
            //                         <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
            //                     </div>
            //                     <div class='col-sm-12 padding-0 emailOtherGrp displaynone' style='padding: 8px 0'>
            //                         <div class='col-sm-8 padding-0'>
            //                             <input type='text' class='form-control emailOtherInput' style='width: 100%'/>
            //                         </div>
            //                         <div class='col-sm-4 padding-0'>
            //                             <button class='btn btn-sm btn-primary emailOtherButton' onclick='emailOtherGroup(this)' type='button'>". _uc($_e['Update']) ."</button>
            //                         </div>
            //                     </div>
            //                 </div>";

            // echo "<tr>
            //         <td>$i</td>
            //         <td>$val[email]</td>
            //         <td>$val[dateTime]</td>
            //         <td>$val[grp]</td>
            //         <td style='width: 300px'>$group</td>
            //         <td>
            //             <div class='btn-group btn-group-sm'>
            //                 <a data-id='$id' data-val='0' onclick='activeEmail(this);' class='btn'   title='". $_e['DeActive Email'] ."'>
            //                     <i class='glyphicon glyphicon-thumbs-down trash'></i>
            //                     <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
            //                 </a>
            //                 <a data-id='$id' onclick='deleteEmail(this);' class='btn'   title='". $_e['Delete Email'] ."'>
            //                     <i class='glyphicon glyphicon-trash trash'></i>
            //                     <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
            //                 </a>
            //             </div>
            //         </td>
            //       </tr>";
        }


        // echo '</tbody>
        //      </table>
        //     </div> <!-- .table-responsive End -->';
    }


}
?>