<?php
require_once (__DIR__."/../../global_ajax.php"); //connection setting db
class recommends_ajax extends object_class{
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
        //ajax class
        $_w['Delete'] = '' ;
        $_w['Recommends'] = '' ;
        $_w['Recommends Delete Successfully'] = '' ;

        $_e    =   $this->dbF->hardWordsMulti($_w,$adminPanelLanguage,'Admin Recommends');
    }

public function deleteRecommends(){
    global $_e;
    try{
        $this->db->beginTransaction();
        $id=$_POST['id'];

       $sql2="DELETE FROM `sp_recommends` WHERE id='$id'";
       $this->dbF->setRow($sql2,false);
        if($this->dbF->rowCount) echo '1';
        else echo '0';

        $this->db->commit();
        $this->functions->setlog(($_e['Delete']),($_e['Recommends']),$id,($_e['Recommends Delete Successfully']));
    }catch (PDOException $e) {
        echo '0';
        $this->db->rollBack();
        $this->dbF->error_submit($e);
    }
}


    public function recommendssSort(){
        $list=$_POST['album'];
        for ($i = 0; $i < count($list); $i++) {
            $sql3="UPDATE `sp_recommends` SET sort='$i' WHERE `id`='$list[$i]'";
            $data=$this->dbF->setRow($sql3);
        }
    }


}
?>