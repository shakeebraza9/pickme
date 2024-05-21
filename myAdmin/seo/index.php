<?php

require_once("../global.php");

@$page = $_GET['page'];

global $menu;
global $subMenu;
$menu="seoM"; // ul menu active

switch($page):
    case ("seo"):
        $subMenu='seo';
        $content = include "seo.php";
        break;
    case ("edit"):
        $subMenu='seo';
        $content = include "seoEdit.php";
        break;

    default:
        $content = "Page Not Found.";
        break;
    endswitch;


include("../header.php");
echo '<h3 class="main_heading">'. _uc($_e['SEO Management']) .'</h3>';
echo $content;

include("../footer.php");
?>    <script type="text/javascript">
        function check_slug(id){
            // $(this).attr("class");


     var inp_slugEnglish = $('.slugSEOEnglish').val();
     var inp_slugSwedish = $('.slugSEOSwedish').val();
     var inp_slugNorwegian = $('.slugSEONorwegian').val();
     var inp_slugDanish = $('.slugSEODanish').val();
     var inp_slugFinnish = $('.slugSEOFinnish').val();

           console.log(inp_slugEnglish);
           console.log(inp_slugSwedish);
           console.log(inp_slugNorwegian);
           console.log(inp_slugFinnish);
           console.log(inp_slugDanish);

               $.ajax({
                url: 'seo/seo_ajax.php',
                type: 'POST',
                data: {'inp_slugEnglish': inp_slugEnglish,'inp_slugSwedish': inp_slugSwedish,'inp_slugNorwegian': inp_slugNorwegian,'inp_slugFinnish': inp_slugFinnish,'inp_slugDanish': inp_slugDanish, 'is_slug_check' : 'check', 'id' : id},
            })
            .done(function(res) {

                console.log(res);
                if(res == "00"){
                    $('#slug_Respose').css('display','block');

                    $('#slug_Respose').text('English Slug already available Please provide another slug');
                    // alert('English already available Please provide another slug');
                    $('#submit_btn').prop('disabled',true);
                }else if(res == "000"){
                    $('#slug_Respose').css('display','block');

                    $('#slug_Respose').text('Swedish Slug already available Please provide another slug');
                    // alert('Swedish already available Please provide another slug');
                    $('#submit_btn').prop('disabled',true);
                }else if(res == "0000"){
                    $('#slug_Respose').css('display','block');

                    $('#slug_Respose').text('Norwegian Slug already available Please provide another slug');
                    // alert('Norwegian already available Please provide another slug');
                    $('#submit_btn').prop('disabled',true);
                }else if(res == "00000"){
                    $('#slug_Respose').css('display','block');

                    $('#slug_Respose').text('Finnish Slug already available Please provide another slug');
                    // alert('Finnish already available Please provide another slug');
                    $('#submit_btn').prop('disabled',true);
                }else if(res == "000000"){
                    $('#slug_Respose').css('display','block');

                    $('#slug_Respose').text('Danish Slug already available Please provide another slug');
                    // alert('Danish already available Please provide another slug');
                    $('#submit_btn').prop('disabled',true);
                }
                else{
                    $('#slug_Respose').css('display','none');
                    $('#submit_btn').prop('disabled',false);
                    passM();
                }
                console.log(res);
            });
            
        }
        


         function passM() {

        var inp_slugEnglish = $('.slugSEOEnglish').val();
        var inp_slugSwedish = $('.slugSEOSwedish').val();
        var inp_slugNorwegian = $('.slugSEONorwegian').val();
        var inp_slugDanish = $('.slugSEODanish').val();
        var inp_slugFinnish = $('.slugSEOFinnish').val();


        // var pass = document.getElementById("pass").value;
        // var rpass = document.getElementById("rpass").value;
        // if (pass.length >= 4) {
if (inp_slugSwedish == inp_slugEnglish || inp_slugSwedish == inp_slugNorwegian || inp_slugSwedish == inp_slugDanish || inp_slugSwedish == inp_slugFinnish) {

                document.getElementById("pm").style.color = "red";
                document.getElementById("pm").innerHTML = "<?php $dbF->hardWords('Slug Matched!');?>";
                // document.getElementById("submit_btn").disabled = false;
              $('#submit_btn').prop('disabled',true);

            }
            else {
                document.getElementById("pm").style.color = "green";
                document.getElementById("pm").innerHTML = "";
                // document.getElementById("submit_btn").disabled = true;

                    $('#submit_btn').prop('disabled',false);

            }
        // }
        // else {
        //     document.getElementById("pm").style.color = "orange";
        //     document.getElementById("pm").innerHTML = "<?php $dbF->hardWords('Atleat 4 characters!');?>";
        //     document.getElementById("signup_btn").disabled = true;
        // }
    }
    </script>