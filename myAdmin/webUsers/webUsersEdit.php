<?php
ob_start();

require_once("classes/webUsers.class.php");
global $dbF;

$webUser  =   new webUsers();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;
$msg = $webUser->webUserEditSubmit();
@$id     = $_GET['userId'];
?>
<a href="-webUsers?page=view" class="btn btn-primary"><?php echo $_e['Back To WebUsers']; ?></a>
<h2 class="sub_heading borderIfNotabs"><?php echo $_e['Edit User Info']; ?></h2>

<?php

if($msg !=''){
    $functions->notificationError($_e['WebUsers'],$msg,'btn-info');
}
$webUser->webUserEdit();

$product = false;
//products order reports end ?>



<script src="webUsers/js/user.js"></script>

<script>
    $(function(){
        dateJqueryUi();
    });

</script>
<script type="text/javascript" src="webUsers/countries.json"></script>
<script type="text/javascript" src="webUsers/cities.json"></script>
<script type="text/javascript" src="webUsers/states.json"></script>
<script>

var country = JSON.parse(country);

var state = JSON.parse(state);

var city = JSON.parse(city);

$.each(country, function (key, value)
{
    var id = Object.keys(value)[0];
    var name = Object.keys(value)[2];
    $("#countryId").append($("<option />").val(value[id]).text(value[name]));
});

$("#countryId").change(function ()
{
    var countryId = $(this).val();
    $("#stateId option").remove();
    $("#stateId").append("<option value=''>Select State</option>");
    $("#cityId option").remove();
    $("#cityId").append("<option value=''>Select City</option>");
    $.each(state, function (key, value)
    {
        var id = Object.keys(value)[0];
        var stateid = Object.keys(value)[2];
        var name = Object.keys(value)[1];
        if (countryId == value[stateid])
        {
            $("#stateId").append($("<option />").val(value[id]).text(value[name]));
        }
    });
});

$("#stateId").change(function ()
{
    var stateId = $(this).val();
    $("#cityId option").remove();
    $("#cityId").append("<option value=''>Select City</option>");
    $.each(city, function (key, value)
    {
        var id = Object.keys(value)[0];
        var cityid = Object.keys(value)[2];
        var name = Object.keys(value)[1];
        if (stateId == value[cityid])
        {
            $("#cityId").append($("<option />").val(value[id]).text(value[name]));
        }
    });
});

    </script>
<?php return ob_get_clean(); ?>