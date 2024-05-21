<?php



require_once(__DIR__ . "/../global_ajax.php"); //connection setting db







class ajax_functions extends object_class
{





    public function  __construct()

    {

        parent::__construct('3');
        // $con = $GLOBALS['orcl_conn'];
        // $sql = "SELECT * FROM `accounts`";
        // $con->getRows($sql_new);
        // echo "dsadasd";
        // $conIntra = $GLOBALS['orcl_connIntra'];
    }

    // public function test(){
    //     global $con;
    //     $sql = "SELECT * FROM `accounts`";
    //     return $con->getRows($sql);

    // }

    public function productImage($id, $name)
    {
        global $con, $functions, $conIntra;

        $sql = "INSERT INTO `product_image`(`product_id`,`image`) values($id,'$name')";
        $this->dbF->setRow($sql);
        $migrate_products = $functions->ibms_setting('migrate_product_to_ch');
        $migrate_product_to_intranet = $functions->ibms_setting('migrate_product_to_intranet');

        if (!empty($migrate_products) && $migrate_products == 1) {

            $new_id = 'ss' . $id;
            $sql_new = "INSERT INTO `product_image`(`product_id`,`image`) values('$new_id','$name')";
            $con->setRow($sql_new);

            $img_link = WEB_URL . '/images/' . $name;
            $path = 'images/';

            try {
                $sql_refer = "INSERT INTO `product_image_refer`(`p_id`,`img_link`,`upload_path`) VALUES ('$new_id','$img_link','$name')";

                $con->setRow($sql_refer);
                // echo 'Check Success :'.$con->rowCount();
            } catch (Exception $e) {
                $dbF->prnt($e);
            }
        }



        if (!empty($migrate_product_to_intranet) && $migrate_product_to_intranet == 1) {
            // $new_id = 'ss'.$id;

            $new_id = $id;
            $sql_new = "INSERT INTO `product_image`(`product_id`,`image`) values('$new_id','$name')";
            $conIntra->setRow($sql_new);

            $img_link = WEB_URL . '/images/' . $name;
            $path = 'images/';

            try {
                $sql_refer = "INSERT INTO `product_image_refer`(`p_id`,`img_link`,`upload_path`) VALUES ('$new_id','$img_link','$name')";

                $conIntra->setRow($sql_refer);
                // echo 'Check Success :'.$conIntra->rowCount();
            } catch (Exception $e) {
                $dbF->prnt($e);
            }
        }
    }
    public function shopProductImage($id, $name)
    {
        global $con, $functions, $conIntra;

        $sql = "INSERT INTO `product_image_spb`(`product_id`,`image`) values($id,'$name')";
        $this->dbF->setRow($sql);
        $migrate_products = $functions->ibms_setting('migrate_product_to_ch');
        $migrate_product_to_intranet = $functions->ibms_setting('migrate_product_to_intranet');

        if (!empty($migrate_products) && $migrate_products == 1) {

            $new_id = 'ss' . $id;
            $sql_new = "INSERT INTO `product_image_spb`(`product_id`,`image`) values('$new_id','$name')";
            $con->setRow($sql_new);

            $img_link = WEB_URL . '/images/' . $name;
            $path = 'images/';

            try {
                $sql_refer = "INSERT INTO `product_image_refer`(`p_id`,`img_link`,`upload_path`) VALUES ('$new_id','$img_link','$name')";

                $con->setRow($sql_refer);
                // echo 'Check Success :'.$con->rowCount();
            } catch (Exception $e) {
                $dbF->prnt($e);
            }
        }



        if (!empty($migrate_product_to_intranet) && $migrate_product_to_intranet == 1) {
            // $new_id = 'ss'.$id;

            $new_id = $id;
            $sql_new = "INSERT INTO `product_image`(`product_id`,`image`) values('$new_id','$name')";
            $conIntra->setRow($sql_new);

            $img_link = WEB_URL . '/images/' . $name;
            $path = 'images/';

            try {
                $sql_refer = "INSERT INTO `product_image_refer`(`p_id`,`img_link`,`upload_path`) VALUES ('$new_id','$img_link','$name')";

                $conIntra->setRow($sql_refer);
                // echo 'Check Success :'.$conIntra->rowCount();
            } catch (Exception $e) {
                $dbF->prnt($e);
            }
        }
    }





    public function defectImage($id, $name)
    {



        $sql = "INSERT INTO `defect_image` (`defect_id`,`image`) values ($id,'$name')";

        $this->dbF->setRow($sql);
    }



    public function albumImage($id, $name)
    {

        $sql = "INSERT INTO `gallery_images` (`gallery_id`,`image`) values ($id,'$name')";

        $this->dbF->setRow($sql);
    }

    public function productImages($id, $name)
    {
        $qry = "SELECT * FROM `final_img` WHERE `id`='$id' ";
        $data = $this->dbF->getRow($qry);
        $user_id = $data['user_id'];
        $images = $data['images_path'];

        $qry2 = "UPDATE images
        SET filepath = CONCAT('$images',',','$name' )
        WHERE `id`='$id' ";
        $this->dbF->setRow($qry2);


        $sql = "INSERT INTO uploaded_files (file_path, account_id, `status`)
        VALUES ('$name', $user_id,'1')";
        $this->dbF->setRow($sql);
    }
}