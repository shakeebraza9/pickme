<?php
require_once(__DIR__ . "/../../global_ajax.php"); //connection setting db
class news_ajax extends object_class
{
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
        //Ajax class
        $_w['Delete'] = '';
        $_w['News'] = '';
        $_w['News Delete Successfully'] = '';

        $_e    =   $this->dbF->hardWordsMulti($_w, $adminPanelLanguage, 'Admin News Management');
    }
public function albumEditImageDel(){
    $id=$_POST['imageId'];

    $sql3="SELECT * FROM `uploaded_files` WHERE `id`='$id'";
    $data=$this->dbF->getRow($sql3);

    $this->functions->deleteOldSingleImage($data['image']);

    $sql3="DELETE FROM `uploaded_files` WHERE `id`='$id'";
    $this->dbF->setRow($sql3);

    if($this->dbF->rowCount>0){
        echo "1";
    }else{
        echo "0";
    }
}

    public function deleteAlbum(){
        $id=$_POST['id'];
        $sql3="SELECT * FROM `final_img` WHERE `id`='$id'";
        $da=$this->dbF->getRows($sql3);
        foreach($da as $data){
            $this->functions->deleteOldSingleImage($data['image']);
        }

        $sql3="DELETE FROM `final_img` WHERE `id`='$id'";
        $this->dbF->setRow($sql3);

        if($this->dbF->rowCount>0){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function albumAltUpdate(){
        $id=$_POST['imageId'];
        $alt=$_POST['altT'];
        $sql3="UPDATE `final_img` SET alt=? WHERE `id`='$id'";
        $array = array($alt);
        $data=$this->dbF->setRow($sql3,$array);
        if($this->dbF->rowCount>0){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function sortAlbumImage(){
        $list=$_POST['image'];
        for ($i = 0; $i < count($list); $i++) {
            $sql3="UPDATE `gallery_images` SET sort='$i' WHERE `img_pk`='$list[$i]'";
            $data=$this->dbF->setRow($sql3);
        }
    }

    public function activeAlbums(){
        $list=$_POST['album'];
        for ($i = 0; $i < count($list); $i++) {
            $sql3="UPDATE `gallery` SET sort='$i' WHERE `gallery_pk`='$list[$i]'";
            $data=$this->dbF->setRow($sql3);
        }
    }
    public function deleteAssign()
    {
        global $_e;
        try {
            $this->db->beginTransaction();

            $id = $_POST['id'];

            $sql3 = "SELECT * FROM final_img WHERE id='$id'";
            $data = $this->dbF->getRows($sql3, false);
            foreach ($data as $key => $val) {
                $userid = $val['user_id'];
                $sql_up = "UPDATE uploaded_files SET `status` = '0' WHERE account_id = ?";
                    $array = array($userid);
                    $this->dbF->setRow($sql_up, $array, false);
                $this->functions->deleteOldSingleImage($val['images_path']);
            }

            $sql2 = "DELETE FROM final_img WHERE id='$id'";
            $this->dbF->setRow($sql2, false);
            if ($this->dbF->rowCount) echo '1';
            else echo '0';

            $this->db->commit();
            $this->functions->setlog(($_e['Delete']), ($_e['News']), $this->dbF->rowLastId, ($_e['News Delete Successfully']));
        } catch (PDOException $e) {
            echo '0';
            $this->db->rollBack();
            $this->dbF->error_submit($e);
        }
    }
}
