<?php
ob_start();

require_once("classes/statistic.class.php");
global $dbF;

$object  =   new statistics();

//$dbF->prnt($_POST);
//$dbF->prnt($_FILES);
//exit;

// ob_get_clean();
// ob_start();
// $output = ob_get_clean();
// ob_start();

$date_range_selected = '';
if( isset($_POST['submit']) ){
    $date_range_from     = isset($_POST['min']) && $_POST['min'] != '' ? $_POST['min'] : date('Y-m-d');
    $date_range_to       = isset($_POST['max']) && $_POST['max'] != '' ? $_POST['max'] : date('Y-m-d');
    $date_range_selected = ' (' . $date_range_from . ' - ' . $date_range_to . ')';
}


?>

<h3 class="sub_heading borderIfNotabs"><?php echo _uc($_e['Statitics Report']); echo $date_range_selected; ?></h3>
    
<?php
    $object->generate_form();
    $object->create_list_report();
    $object->generate_list_report();
?>


<?php //echo $output; ?>

<div class="table-wrapper">
    <table >
        <thead class="header">
            <tr>
                <th>Month</th>
                <th>Item 1</th>
                <th>Item 2</th>
                <th>Item 3</th>
                <th>Item 4</th>
            </tr>
        </thead>
        <tbody class="results">
            <tr>
                <th>Jan</th>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
            </tr>
            <tr>
                <th>Feb</th>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
            </tr>
            <tr>
                <th>Mar</th>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
            </tr>
            <tr>
                <th>Apr</th>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>  
            </tr>
            <tr>    
                <th>May</th>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
            </tr>
            <tr>
                <th>Jun</th>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
                <td>3163</td>
            </tr>

            <tr>
                <th>...</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            </tr>
        </tbody>
    </table>
</div>

<style>
    .ui-autocomplete-loading {
        background: white url("../images/ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .input_date {
        padding-left: 45px;
    }

    .input-group-addon-date {
        position: absolute;
        left: 15px;
        top: 0;
        padding: 6px 12px;
        font-size: 14px;
        font-weight: normal;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
    }


    .table-wrapper { 
        overflow-x:scroll;
        overflow-y:visible;
        width:250px;
        margin-left: 120px;
    }


    td, th {
        padding: 5px 20px;
        width: 100px;
    }

    th:first-child {
        position: fixed;
        left: 5px
    }

</style>

<script>
    $(function(){
        tableHoverClasses();
        dateRangePickerTwo();
    });
</script>
<?php return ob_get_clean(); ?>