<?php

require_once (__DIR__."/../../global.php"); //connection setting db

class seo extends object_class{

public $productF;

public $imageName;

public function __construct(){

parent::__construct('3');



/**

* MultiLanguage keys Use where echo;

* define this class words and where this class will call

* and define words of file where this class will called

**/

global $_e;

global $adminPanelLanguage;

$_w=array();

//index

$_w['SEO Management'] = '' ;

//seo.php

$_w['Manage SEO'] = '' ;

$_w['Draft'] = '' ;

$_w['Add New SEO'] = '' ;

$_w['Delete Fail Please Try Again.'] = '' ;

$_w['Active SEO'] = '' ;

$_w['Mobile Banner'] = '' ;
$_w['Desktop Banner'] = '' ;

$_w['Old Mobile Banner'] = '' ;
$_w['Old Desktop Banner'] = '' ;





//This Class

$_w['SNO'] = '' ;

$_w['PAGE'] = '' ;

$_w['TITLE'] = '' ;

$_w['UPDATE'] = '' ;

$_w['ACTION'] = '' ;

$_w['SEO'] = '' ;

$_w['Added'] = '' ;

$_w['SEO Save Successfully'] = '' ;

$_w['SEO Save Failed,Please Enter Correct Values'] = '' ;



$_w['Desktop Banner Link'] = '' ;
$_w['Mobile Banner Link'] = '' ;




$_w['NOTE:Blank Fields Will Not Show In Meta Tags'] = '' ;

$_w['Page link where SEO apply'] = '' ;

$_w['Canonical'] = '' ;

$_w['Meta Keywords'] = '' ;

$_w['Meta Description'] = '' ;

$_w['Meta Title'] = '' ;

$_w['Author'] = '' ;

$_w['Revisit After'] = '' ;

$_w['ReWrite Title Tag'] = '' ;

$_w['Yes'] = '' ;

$_w['Index/ No-Index'] = '' ;

$_w['Index'] = '' ;

$_w['Follow/ No-Follow'] = '' ;

$_w['Follow'] = '' ;

$_w['NO'] = '' ;

$_w['Web Page Type'] = '' ;

$_w['Publish'] = '' ;

$_w['SAVE'] = '' ;

$_w['Special'] = '' ;

$_w['Add Seo'] = '' ;

$_w['Slug'] = '' ;

$_e    =   $this->dbF->hardWordsMulti($_w,$adminPanelLanguage,'Admin SEO');



}



public function seoQuickLink($id,$link){

global $_e;

$temp = "<a data-id='$id' title='{$_e['Add Seo']}' href='-seo?page=edit&quickLink=$link#newPage' target='_blank' class='btn'>

<i class='glyphicon glyphicon glyphicon-globe'></i>

</a>";

return $temp;

}



private function printSeoViewTable($data){

global $_e;

echo '<div class="table-responsive">

<table class="table table-hover dTable tableIBMS">

<thead>

<th>'. _u($_e['SNO']) .'</th>

<th>'. _u($_e['PAGE']) .'</th>

<th>'. _u($_e['TITLE']) .'</th>

<th>'. _u($_e['UPDATE']) .'</th>

<th>'. _u($_e['ACTION']) .'</th>

</thead>

<tbody>';

$i = 0;

foreach($data as $val){

$i++;

$id     = $val['id'];

$link   = $val['pageLink'];

$link   = $this->functions->removeWebUrlFromLink($link);

$title  = $this->functions->unserializeTranslate($val['title']);



echo "<tr>

<td>$i</td>

<td>$link</td>

<td>$title</td>

<td>$val[dateTime]</td>

<td>

<div class='btn-group btn-group-sm'>

<a data-id='$id' href='-seo?page=edit&seoId=$id' class='btn'>

<i class='glyphicon glyphicon-edit'></i>

</a>

<a data-id='$id' onclick='deleteSeo(this);' class='btn'>

<i class='glyphicon glyphicon-trash trash'></i>

<i class='fa fa-refresh waiting fa-spin' style='display: none'></i>

</a>

</div>

</td>

</tr>";

}

echo '</tbody>

</table>

</div> <!-- .table-responsive End -->';

}



public function seoView(){

$sql  = "SELECT id, pageLink,title,dsc,dateTime FROM seo WHERE publish = '1'";

$data =  $this->dbF->getRows($sql);

$this->printSeoViewTable($data);

}



public function seoDraft(){

$sql  = "SELECT id, pageLink,title,dsc,dateTime FROM seo WHERE publish = '0'";

$data =  $this->dbF->getRows($sql);

$this->printSeoViewTable($data);

}



public function newSeoAdd(){



if(isset($_POST['submit'])){

if(!$this->functions->getFormToken('newSeo')){return false;}

global $_e;

$pageLink        = empty($_POST['insert']['pageLink']) ? ""    : $_POST['insert']['pageLink'];

$pageLink        = str_replace(WEB_URL,'',$pageLink);

$_POST['insert']['pageLink'] = $pageLink;

$lastId     = $this->functions->formInsert('seo',$_POST['insert']);



if($lastId>0) {



$seo_slug        = empty($_POST['seo_slug']) ? ""    : $_POST['seo_slug'];
$lang   =   $this->functions->IbmsLanguages();
// $sql = "DELETE FROM `seo_slug` WHERE seo_id= '$lastId'";
// $this->dbF->setRow($sql);
for ($i=0; $i < count($seo_slug); $i++) { 
$sql      = "INSERT INTO `seo_slug`(`seo_id`, `slug`, `lang`) VALUES (?,?,?)";
$array    =    array($lastId,$seo_slug[$i],$lang[$i]);
$this->dbF->setRow($sql,$array);
}


$this->functions->notificationError(_js(_uc($_e['SEO'])), _js(_uc($_e['SEO Save Successfully'])), 'btn-success');

$this->functions->setlog(_uc($_e['Added']), _uc($_e['SEO']), $lastId, _uc($_e['SEO Save Successfully']));

}else{

$this->functions->notificationError(_js(_uc($_e['SEO'])),_js(_uc($_e['SEO Save Failed,Please Enter Correct Values'])),'btn-danger');

}

} // If end

}



public function seoEditSubmit(){

// $this->dbF->prnt($_POST);
// die;

if(isset($_POST['submit'])  && isset($_POST['editId'])){

if(!$this->functions->getFormToken('editSeo')){return false;}



global $_e;

$lastId         =   $_POST['editId'];

$pageLink        = empty($_POST['insert']['pageLink']) ? ""    : $_POST['insert']['pageLink'];

$pageLink        = str_replace(WEB_URL,'',$pageLink);

$_POST['insert']['pageLink'] = $pageLink;

$return = $this->functions->formUpdate('seo',$_POST['insert'],$lastId);


$seo_slug        = empty($_POST['seo_slug']) ? ""    : $_POST['seo_slug'];

$lang   =   $this->functions->IbmsLanguages();
$sql = "DELETE FROM `seo_slug` WHERE seo_id= '$lastId'";
$this->dbF->setRow($sql);
$true = false;
for ($i=0; $i < count($seo_slug); $i++) { 
$sql      = "INSERT INTO `seo_slug`(`seo_id`, `slug`, `lang`) VALUES (?,?,?)";
$array    =    array($lastId,$seo_slug[$i],$lang[$i]);
$this->dbF->setRow($sql,$array);
$true = true;

}


// var_dump($return);
if($return || $true) {


$this->functions->notificationError(_js(_uc($_e['SEO'])), _js(_uc($_e['SEO Save Successfully'])), 'btn-success');

$this->functions->setlog(_uc($_e['UPDATE']), _uc($_e['SEO']), $lastId, _uc($_e['SEO Save Successfully']));

}else{

$this->functions->notificationError(_js(_uc($_e['SEO'])),_js(_uc($_e['SEO Save Failed,Please Enter Correct Values'])),'btn-danger');

}

}

}



public function newSeo(){

$this->seoEdit(true);

return false;

}



public function seoEdit($new = false){

global $_e;

$isEdit = false;

$quickAdd  =false;



//if quick add seo check if already add, then make this function as edit, and add edit id.

//if not already add,, then make this function as new,

if(isset($_GET['quickLink'])){

$quickAdd   =   true;

$quickLink = urldecode($_GET['quickLink']);

$sql = "SELECT id,pageLink FROM seo WHERE pageLink = '$quickLink'";

$quickData = $this->dbF->getRow($sql);

if(!empty($quickData)) {

$isEdit     =   true;

$_GET['seoId'] = $quickData['id'];

$quickLink  = $quickData['pageLink']; // more secure if find....

}else{

$new     =   true;

}

}





if($new){

$token       = $this->functions->setFormToken('newSeo',false);

}else {

$isEdit = true;

$token = $this->functions->setFormToken('editSeo', false);

$id = $_GET['seoId'];

$sql = "SELECT * FROM seo where id = '$id' ";

$data = $this->dbF->getRow($sql);

}



$form_fields = array();



$form_fields[] = array(

'type'  => 'none',

'thisFormat' => '

<h5>'. _uc($_e['NOTE:Blank Fields Will Not Show In Meta Tags']) .'</h5>',

);



$form_fields[] = array(

'type'  => 'none',

'format' => $token,

);



$form_fields[] = array(

'label' => "hidden",

'name'  => 'editId',

'placeholder' => "",

'value' => @$id,

'type'  => 'hidden',

'class' => 'form-control',

);



//making Loop for multilanguage

$form_fields[]  = array(

'type'          => 'none',

'thisFormat'    => '<div class="panel-group" id="accordion">',

);

$lang = $this->functions->IbmsLanguages();

if($lang != false){

$lang_nonArray = implode(',', $lang);

}


@$b1         =    unserialize($data['b1']);
@$b2         =    unserialize($data['b2']);


@$l1         =    unserialize($data['l1']);
@$l2         =    unserialize($data['l2']);

@$title         =    unserialize($data['title']);

@$dsc           =    unserialize($data['dsc']);

@$keywords      =    unserialize($data['keywords']);

@$canonical     =    unserialize($data['canonical']);

@$author       =     unserialize($data['author']);

@$special       =    unserialize($data['special']);

for ($i = 0; $i < sizeof($lang); $i++) {

if ($i == 0) {

$collapseIn = ' in ';

} else {

$collapseIn = '';

}



$form_fields[] = array(

'type'  => 'none',

'thisFormat' => '<div class="panel panel-default">

<div class="panel-heading">

<a data-toggle="collapse" data-parent="#accordion" href="#'.$lang[$i].'">

<h4 class="panel-title">

'.$lang[$i].'

</h4>

</a>

</div>

<div id="'.$lang[$i].'" class="panel-collapse collapse '.$collapseIn.'">

<div class="panel-body">',

);



//Title

@$tempValue = $title[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Meta Title']),

'name'  => 'insert[title]['.$lang[$i].']',

'placeholder' => _uc($_e['Meta Title']),

'value' => $tempValue,

'type'  => 'text',

'class' => 'form-control',

);



//Short Desc

@$tempValue = $dsc[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Meta Description']),

'name'  => 'insert[dsc]['.$lang[$i].']',

'placeholder' =>  _uc($_e['Meta Description']),

'value' => $tempValue,

'type'  => 'textarea',

'maxlength' => '250',

'class' => 'form-control',

);



//Keywords

@$tempValue = $keywords[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Meta Keywords']),

'name'  => 'insert[keywords]['.$lang[$i].']',

'placeholder' => _uc($_e['Meta Keywords']),

'value' => $tempValue,

'type'  => 'textarea',

'maxlength' => '250',

'class' => 'form-control',

);

// @$tempValue = $keywords[$lang[$i]];


$varS = "";

if(isset($_GET['seoId'])){
$seo_slug = "SELECT * FROM seo_slug where seo_id = '$id' and lang = '$lang[$i]'";
$seo_slugData = $this->dbF->getRow($seo_slug);
if(isset($seo_slugData['slug'])){
    $seo_slugData = $seo_slugData['slug'];
}
$varS = $seo_slugData;
}else{
$id = "0";
$varS = "";
}


$form_fields[] = array(
'label' => $lang[$i].' '.$_e['Slug'],
'name'  => 'seo_slug[]',
'placeholder' => $lang[$i].' '.$_e['Slug'],
'value' => $varS,
'type'  => 'text',
'format' => '<input type="text" class="form-control slugSEO'.$lang[$i].'" onfocusout="check_slug('.$id.')" onChange="passM();" onkeyup="passM();" name="seo_slug[]" placeholder="'._uc($_e['Slug']).'" value="'.$varS.'" />',
);


//canonical

@$tempValue  = $canonical[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Canonical']),

'name'  => 'insert[canonical]['.$lang[$i].']',

'placeholder' => _uc($_e['Canonical']),

'value' => $tempValue,

'type'  => 'text',

'class' => 'form-control',

);



//author

@$tempValue  = $author[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Author']),

'name'  => 'insert[author]['.$lang[$i].']',

'placeholder' => _uc($_e['Author']),

'value' => $tempValue,

'type'  => 'text',

'class' => 'form-control',

);




@$tempValue  = $b1[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Desktop Banner']),

'name' => 'insert[b1]['.$lang[$i].']',

'value' => $tempValue,

'type' => 'url',

'uploadtype' => 'b1'.$lang[$i],

'class' => 'b1'.$lang[$i].' form-control',

'onclick' => 'openKCFinderImageWithImg("b1'.$lang[$i].'")'

);

// echo '<div class="form-group">
// <label class="col-sm-2 col-md-3  control-label">'. _uc($_e['Link']) .'</label>
// <div class="col-sm-10  col-md-9">
// <div class="input-group">
// <input type="url" value="'.$link.'" name="link" class="pastLinkHere form-control" placeholder="'. _uc($_e['Link']) .'">
// <div class="input-group-addon linkList pointer"><i class="glyphicon glyphicon-search"></i>
// </div>
// </div>
// </div>
// </div>';


@$tempValue  = $l1[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Desktop Banner Link']),

'name'  => 'insert[l1]['.$lang[$i].']',

'placeholder' => _uc($_e['Desktop Banner Link']),

'value' => $tempValue,

'type'  => 'text',

// 'required' => 'true',

'class' => 'form-control l1pastLinkHere'.$lang[$i].''

// 'format' => '<div class="input-group">{{form}}<div class="input-group-addon l1linkList'.$lang[$i].' pointer"><i class="glyphicon glyphicon-search"></i></div>

// </div>'

);


// @$tempValue  = $l1[$lang[$i]];

// $form_fields[] = array(

// 'label' => _uc($_e['Desktop Banner Link']),

// 'name' => 'insert[l1]['.$lang[$i].']',

// 'value' => $tempValue,

// 'type' => 'url',

// 'uploadtype' => 'l1'.$lang[$i],

// 'class' => 'l1'.$lang[$i].' form-control',


// );



// $form_fields[] = array(

// 'label' =>_uc($_e['Old Desktop Banner']),

// 'name' => 'insert[b1old]['.$lang[$i].']',

// 'value' => "$tempValue",

// 'type' => 'hidden',

// 'class' => 'form-control'

// );


@$tempValue  = $b2[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Mobile Banner']),

'name' => 'insert[b2]['.$lang[$i].']',

'value' => $tempValue,

'type' => 'url',

'uploadtype' => 'b2'.$lang[$i],

'class' => 'b2'.$lang[$i].' form-control',

'onclick' => 'openKCFinderImageWithImg("b2'.$lang[$i].'")'

);

@$tempValue  =$l2[$lang[$i]];

$form_fields[] = array(

'label' => _uc($_e['Mobile Banner Link']),

'name'  => 'insert[l2]['.$lang[$i].']',

'placeholder' => _uc($_e['Mobile Banner Link']),

'value' => $tempValue,

'type'  => 'text',

// 'required' => 'true',

'class' => 'form-control l2pastLinkHere'.$lang[$i].''

// 'format' => '<div class="input-group">{{form}}<div class="input-group-addon l2linkList'.$lang[$i].' pointer"><i class="glyphicon glyphicon-search"></i></div>

// </div>'

);



// @$tempValue  = $l2[$lang[$i]];

// $form_fields[] = array(

// 'label' => _uc($_e['Mobile Banner Link']),

// 'name' => 'insert[l2]['.$lang[$i].']',

// 'value' => $tempValue,

// 'type' => 'url',

// 'uploadtype' => 'l2'.$lang[$i],

// 'class' => 'l2'.$lang[$i].' form-control',


// );



// $form_fields[] = array(

// 'label' =>_uc($_e['Old Mobile Banner']),

// 'name' => 'insert[oldb2]['.$lang[$i].']',

// 'value' => "$tempValue",

// 'type' => 'hidden',

// 'class' => 'form-control'

// );



//author

@$tempValue  = $special[$lang[$i]];



$form_fields[] = array(

'label' => _uc($_e['Special']),

'name'  => 'insert[special]['.$lang[$i].']',

'placeholder' => _uc($_e['Special']),

'value' => $tempValue,

'type'  => 'textarea',

'class' => 'form-control ckeditor',

);



$form_fields[]  = array(

'type'          => 'none',

'thisFormat'    => '</div><!-- panel-body end -->

</div><!-- collapse end-->

</div>',

);



}

$form_fields[]  = array(

'type'          => 'none',

'thisFormat'    => '</div>',

);



//Page Link

if($isEdit) {

if($quickAdd){

$link = $quickLink;

}else {

@$link = $data['pageLink'];

}

if (preg_match('@http://@i', $link) || preg_match('@https://@i', $link)) {



} else {

$link = WEB_URL . $link;

}

}else{

$link = '';

if($quickAdd){

$link = $quickLink;

$link = WEB_URL . $link;

}

}

$form_fields[] = array(

'label' => _uc($_e['Page link where SEO apply']),

'name'  => 'insert[pageLink]',

'placeholder' => _uc($_e['Page link where SEO apply']),

'value' => $link,

'type'  => 'text',

'required' => 'true',

'class' => 'form-control pastLinkHere',

'format' => '<div class="input-group">{{form}}<div class="input-group-addon linkList pointer"><i class="glyphicon glyphicon-search"></i></div>

</div>'

);

// $form_fields[] = array(
// 'label' => _uc($_e['Slug']),
// 'name'  => 'insert[slug]',
// 'placeholder' => _uc($_e['Slug']),
// 'value' => (isset($data['slug'])) ? $data['slug'] : NULL,
// 'type'  => 'text',
// 'class' => 'form-control',
// 'format' => '<input type="text" class="form-control slugSEO" name="insert[slug]" placeholder="'._uc($_e['Slug']).'" value="'.@$data['slug'].'" onfocusout="check_slug()"/>
// '
// );





//revisit-after

$form_fields[] = array(

'label' => _uc($_e['Revisit After']),

'name'  => 'insert[revisit-after]',

'placeholder' => _uc($_e['Revisit After']),

'value' => @$data['revisit-after'],

'type'  => 'text',

'class' => 'form-control',

);



//page-type

//$valFormTemp = empty($data['type']) ? "website" : $data['type'];

$types = array("website","product","og:product","article","blog","book","city","country","company",

"food","game","hotel","restaurant","politician","profile",

"music.song","music.album","music.playlist","music.radio_station",

"video","video.movie","video.episode","video.tv_show","video.other");

$form_fields[] = array(

'label' => _uc($_e['Web Page Type']),

'name'  => 'insert[type]',

//'select' => $valFormTemp,

"value"  => @$data['type'],

//"option"  => $types,

'type'  => 'text',

'class' => 'form-control ogtype_autocomplete',

);

$form_fields[] = array(

'type'  => 'none',

'thisFormat' => '<script>$(document).ready(function(){

var availableTags = '.json_encode($types).';

$( ".ogtype_autocomplete" ).autocomplete({

source: availableTags,

minLength: 0

}).focus(function(){

$(this).autocomplete("search", "");

});

}); </script>',

);





//Rewrite

$valFormTemp = empty($data['rewriteTitle']) ? "0" : '1';

$form_fields[]  = array(

"label" => $_e['ReWrite Title Tag'],

'type'  => 'checkbox',

'value' => "$valFormTemp",

'select' => "1",

'format' => '<div class="make-switch" data-off="danger" data-on="success" data-on-label="'. _uc($_e['Yes']) .'" data-off-label="'. _uc($_e['NO']) .'">

{{form}}

<input type="hidden" name="insert[rewriteTitle]" class="checkboxHidden" value="'.$valFormTemp.'" />

</div>'

);



//Index

$valFormTemp = empty($data['sIndex']) ? "0" : '1';

$form_fields[]  = array(

"label" => $_e['Index/ No-Index'],

'type'  => 'checkbox',

'value' => "$valFormTemp",

'select' => "1",

'format' => '<div class="make-switch" data-off="danger" data-on="success" data-on-label="'. _uc($_e['Index']) .'" data-off-label="'. _uc($_e['NO']) .'">

{{form}}

<input type="hidden" name="insert[sIndex]" class="checkboxHidden" value="'.$valFormTemp.'" />

</div>'

);



//Follow

$valFormTemp = empty($data['sFollow']) ? "0" : '1';

$form_fields[]  = array(

"label" => $_e['Follow/ No-Follow'],

'type'  => 'checkbox',

'value' => "$valFormTemp",

'select' => "1",

'format' => '<div class="make-switch" data-off="danger" data-on="success" data-on-label="'. _uc($_e['Follow']) .'" data-off-label="'. _uc($_e['NO']) .'">

{{form}}

<input type="hidden" name="insert[sFollow]" class="checkboxHidden" value="'.$valFormTemp.'" />

</div>'

);



//Follow

$valFormTemp = empty($data['publish']) ? "0" : '1';

$form_fields[]  = array(

"label" => $_e['Publish'],

'type'  => 'checkbox',

'value' => "$valFormTemp",

'select' => "1",

'format' => '<div class="make-switch" data-off="danger" data-on="success" data-on-label="'. _uc($_e['Publish']) .'" data-off-label="'. _uc($_e['NO']) .'">

{{form}}

<input type="hidden" name="insert[publish]" class="checkboxHidden" value="'.$valFormTemp.'" />

</div><div id="slug_Respose" style="color : red">

</div>

 <div id="pm"></div>

 '

);



$form_fields[]  = array(

"name"  => 'submit',

'id' => 'submit_btn',

'class' => 'btn btn-primary',

'type'  => 'submit',

'value' => _u($_e['SAVE']),

'thisFormat' => '{{form}}'

);





$form_fields['form']  = array(

'type'      => 'form',

'class'     => "form-horizontal",

'action'   => '-seo?page=seo',

'method'   => 'post',

'format'   => '{{form}}'

);



$format = '<div class="form-group">

<label class="col-sm-2 col-md-3  control-label">{{label}}</label>

<div class="col-sm-10  col-md-9">


{{form}}

</div>


</div>';



$this->functions->print_form($form_fields,$format);

}

}

?>