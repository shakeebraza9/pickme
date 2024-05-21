<?php

ob_start();



require_once("classes/proStatics.class.php");

global $dbF;



$proStatics  =   new proStatics();



//$dbF->prnt($_POST);

//$dbF->prnt($_FILES);

//exit;

?>

<h2 class="sub_heading"><?php echo _uc($_e['Product Stats']); ?></h2>



    <!-- Nav tabs -->

    <ul class="nav nav-tabs tabs_arrow" role="tablist">

        <li class="active"><a href="#home" role="tab" data-toggle="tab"><?php echo _uc($_e['All Products']); ?></a></li>
        <li><a href="#sweden" role="tab" data-toggle="tab"><?php echo _uc($_e['Sweden']); ?></a></li>
        <li><a href="#norwegian" role="tab" data-toggle="tab"><?php echo _uc($_e['Norwegian']); ?></a></li>
        <li><a href="#finland" role="tab" data-toggle="tab"><?php echo _uc($_e['Finland']); ?></a></li>
        <li><a href="#denmark" role="tab" data-toggle="tab"><?php echo _uc($_e['Denmark']); ?></a></li>

    </ul>





    <!-- Tab panes -->

    <div class="tab-content">

 <form class="form-horizontal" enctype="multipart/form-data" method="post" style="display: none;">

<?php    

$functions->dataTableDateRange(true,$div_view = 2); 

?>



<button type="submit" name="submit" value="GENERATE" class="btn btn-sm btn-primary st_generate_btn">  <?php echo $_e['Stats']; ?>  </button>









</form>

        <div class="tab-pane fade in active container-fluid" id="home">

            <h2  class="tab_heading"><?php echo _uc($_e['Stats']); ?></h2>

            <?php $proStatics->statsView();  ?>

        </div>

        <div class="tab-pane fade container-fluid" id="sweden">
            <h2  class="tab_heading"><?php echo _uc($_e['Stats']); ?></h2>
            <?php $proStatics->statsViewSEK();  ?>
        </div>
        <div class="tab-pane fade container-fluid" id="norwegian">
            <h2  class="tab_heading"><?php echo _uc($_e['Stats']); ?></h2>
            <?php $proStatics->statsViewNOK();  ?>
        </div>
        <div class="tab-pane fade container-fluid" id="finland">
            <h2  class="tab_heading"><?php echo _uc($_e['Stats']); ?></h2>
            <?php $proStatics->statsViewFI();  ?>
        </div>
        <div class="tab-pane fade container-fluid" id="denmark">
            <h2  class="tab_heading"><?php echo _uc($_e['Stats']); ?></h2>
            <?php $proStatics->statsViewDK();  ?>
        </div>

    </div>



<script>

    $(function(){

        tableHoverClasses();

        dateJqueryUi();

        minMaxDateFilter();

        // dTableRangeSearch();

    });



    function deletePage(ths){

        btn=$(ths);

        if(secure_delete()){

            btn.addClass('disabled');

            btn.children('.trash').hide();

            btn.children('.waiting').show();



            id=btn.attr('data-id');

            $.ajax({

                type: 'POST',

                url: 'pages/page_ajax.php?page=deletePage',

                data: { id:id }

            }).done(function(data)

                {

                    ift =true;

                    if(data=='1'){

                        ift = false;

                        btn.closest('tr').hide(1000,function(){$(this).remove()});

                    }

                    else if(data=='0'){

                        jAlertifyAlert('<?php echo _js($_e['Delete Fail Please Try Again.']); ?>');

                    }

                    else{

                        btn.append(data);

                    }

                    if(ift){

                        btn.removeClass('disabled');

                        btn.children('.trash').show();

                        btn.children('.waiting').hide();

                    }



                });

        }

    }





var dateCodeTo   = '';
var dateCodeFrom = '';

minMaxDateFilter = function() {
    $( ".min,#min" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        changeYear: true,
        yearRange: "1935:2050",
        dateFormat: "yy-mm-dd",
        onClose: function( selectedDate,i ) {
            $( ".max,#max" ).datepicker( "option", "minDate", selectedDate);
        
            try {

            // if(selectedDate !== i.lastVal){
            //     console.log('This changed');
            //     // $(this).change();
            // }
                var date = $(this).datepicker('getDate'),
                    day   = date.getDate(),  
                    month = ("0" + (date.getMonth() + 1)).slice(-2),           
                    year  =  date.getFullYear();
                    console.log('date picker : '+ month);
                    dateCodeFrom = year + '-' + month + '-' + day;
                    console.log(dateCodeFrom);

                    console.log(selectedDate);

                var max_datepicker_val = $( "#max" ).data('datepicker').lastVal;
                if ( max_datepicker_val != "" ) {
                    fetch_ajax_result_again(dateCodeFrom, max_datepicker_val);
                    console.log("Inside Min");
                };

                console.log("Outside");
            } catch (e) {
                console.log(e);
            }

        }
    });


    $( ".max,#max" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        changeYear: true,
        yearRange: "1935:2050",
        dateFormat: "yy-mm-dd",
        onClose: function( selectedDate ) {
        
            $( ".min,#min" ).datepicker( "option", "maxDate", selectedDate );

            try {


                var date = $(this).datepicker('getDate'),
                    day  = date.getDate(),  
                    month = date.getMonth() + 1,              
                    year =  date.getFullYear();
                    dateCodeTo = year + '-' + month + '-' + day;
                    console.log(dateCodeTo);

                    console.log(selectedDate);


                        var min_datepicker_val = $( "#min" ).data('datepicker').lastVal;
                        if ( min_datepicker_val != "" ) {
                            fetch_ajax_result_again(dateCodeFrom,dateCodeTo);
                            console.log("Inside Max");
                        };


            } catch (e) {
                console.log(e);
            }


        }

    });
};

function fetch_ajax_result_again(dateCodeFrom, dateCodeTo) {

    my_dtable = $.fn.dataTable.tables( { visible: true, api: true } );
    console.log($.fn.dataTable.tables(true));
    $(my_dtable).DataTable().ajax.reload();

}





</script>

<?php return ob_get_clean(); ?>