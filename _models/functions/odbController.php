<?php 

class ODBController {
    public $rowCount='';
    public $rowLastId='';
    public $connn;
    public $rowException ='';
    public $hasException = false;
    public $showErrorOnLocal = true;
    public $showErrorOnLive  = false;
    
    function __construct() {
        $this->connn=$this->connectDB();
    }
    //Db connection
    private function connectDB() {
        $param = $_POST;
        $servername = 'localhost';
        //$db_username = "sharkspe_new"; //new
        //$db_password = "=DM}BXT,Zn(!"; //new
        $db_username = "root"; //new2
        // $db_password = "(q#,5_}Oo1N("; //new2
              $db_password = "kr%02&WvZ*R7"; //new2
        
        
        //$conn = new PDO("mysql:host=$servername;dbname=sharkspe_2018new", $db_username, $db_password); //new
        // $conn = new PDO("mysql:host=$servername;dbname=sharkspe_merged", $db_username, $db_password); //new2
        $conn = new PDO("mysql:host=$servername;dbname=sharkspech_132", $db_username, $db_password); //new2

        return $conn;
    }

    public function prnt($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function setRow($query,$arr=null,$tryCatch=true){

       try{
            if($arr==false){
                $tryCatch=false;
            }

            if($this->connn->inTransaction()) {
                //if previous Transaction already start
               $tryCatch = false; // make it false to stop more transaction in this function
            }

            if($tryCatch)
                    $this->connn->beginTransaction();

            $sth = $this->connn->prepare($query); // use like,   WHERE name < ? AND colour = ?');
            $i=0;
            if($arr==null){
            for($i=0;$i<$arr;$i++){
                $index=$i+1;
                $sth->bindParam($index, $arr[$i]);
            }    
            }else{
            for($i=0;$i<sizeof($arr);$i++){
                $index=$i+1;
                $sth->bindParam($index, $arr[$i]);
            }
           }
            $sth->execute();
            $this->rowCount=$sth->rowCount();

            $this->rowLastId=$this->connn->lastInsertId();

            if($tryCatch)
                $this->connn->commit();

           $this->error_submit(false);

           //return $sth->rowCount();
           return $this->rowLastId;

       }catch (PDOException $e)
        {
           // echo $query;
            if($tryCatch)
                $this->connn->rollBack();
            $this->error_submit($e,$query);

        }

    }

    public function getRow($query,$arr=null,$tryCatch=true, $array_with_key = false){
        try{
            if($arr==false){
                $tryCatch=false;
            }
            if($this->connn->inTransaction()) {
                //if previous Transaction not start
                $tryCatch = false;
                    //global $_e;
                    //$_e = array();
            }

            if($tryCatch)
                $this->connn->beginTransaction();

            if(stristr($query,' LIMIT ') == false){
                $query.=" LIMIT 1";
            }
            $sth = $this->connn->prepare($query); //    WHERE name < ? AND colour = ?');
            $i=0;

            if($array_with_key)
                foreach($arr as $key=>$val){
                    $i++;
                    $sth->bindValue($i, $val, PDO::PARAM_STR);
                }
            else{
                if($arr==null){
                 for ($i=0;$i<$arr;$i++) {
                    $index=$i+1;
                    $sth->bindValue($index, $arr[$i], PDO::PARAM_STR);
                 }        
                }else{
                for ($i=0;$i<sizeof($arr);$i++) {
                    $index=$i+1;
                    $sth->bindValue($index, $arr[$i], PDO::PARAM_STR);
                }
               }
            }


            $sth->execute();
            $this->rowCount=$sth->rowCount();

            if($tryCatch)
                $this->connn->commit();

            $this->error_submit(false);
            return $sth->fetch();
            // return $query;
            
        }catch (PDOException $e) {
            if($tryCatch)
                $this->connn->rollBack();
            $this->error_submit($e,$query);
        }
    }

    public function getRows($query,$arr=null,$tryCatch=true,$assoc  = true,$array_with_key = false){
        try{
            if($arr==false){
                $tryCatch=false;
            }

            if($this->connn->inTransaction()) {
                //if previous Transaction already start
                $tryCatch = false; // make it false to stop more transaction in this function
            }

            if($tryCatch)
            $this->connn->beginTransaction();

            $sth = $this->connn->prepare($query); //    WHERE calories < ? AND colour = ?');
            $i=0;

            if($array_with_key)
                foreach($arr as $key=>$val){
                    $i++;
                    $sth->bindValue($i, $val, PDO::PARAM_STR);
                }
            else{
                if($arr==null){
                  for ($i=0;$i<$arr;$i++) {
                    $index=$i+1;
                    $sth->bindValue($index, $arr[$i], PDO::PARAM_STR);
                }    
                }else{
                for ($i=0;$i<sizeof($arr);$i++) {
                    $index=$i+1;
                    $sth->bindValue($index, $arr[$i], PDO::PARAM_STR);
                }
              }
            }

            $sth->execute();
            $this->rowCount=$sth->rowCount();

            if($tryCatch)
                $this->connn->commit();

            $this->error_submit(false);
            if($assoc == false){
                return $sth->fetchAll();
            }
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            if($tryCatch)
                $this->connn->rollBack();
            $this->error_submit($e,$query);
            echo "<br>";
        }
    }

    /*
 * MutiTable insert query ..
 * $sql="INSERT INTO table('name','val') VALUES (?,?)";
 * $arr=array($name,$val);
 *
 * $sql2="INSERT INTO child_table('table_ID','val','val2') VALUES";
 * $valFormat='?,?'; // table id not include,
 * $arr2=array(array('1','11'),array('2','22'));
 *
 * setRowMultiTable();
 *
 *
 *
 */
     public function setRowMultiTable2($query,$arry,$query2=false,$valFormat,$arry2,$tryCatch=true){

        try{
            if($this->connn->inTransaction()) {
                //if previous Transaction not start
                $tryCatch = false;
            }

            if($tryCatch)
                $this->connn->beginTransaction();

            //First Parent table
            $this->setRow($query,$arry,false);
            $lastId=$this->connn->lastInsertId();

            //Child related table
            if($query2!=false)
            {
                for($i=0;$i<sizeof($arry2);$i++)
                {
                    $query2.="('$lastId',$valFormat),";
                }
                $query2= trim($query2,",");

                $sth=$this->connn->prepare($query2);
                $sth->execute($arry2);
                $this->rowCount = $sth->rowCount();
            }

            if($tryCatch)
                $this->connn->commit();

            $this->error_submit(false);
            return $this->rowCount; // Check Parent row count result

        } catch (PDOException $e) {
            if($tryCatch)
                $this->connn->rollBack();
            bs_alert::warning("Some required fields are empty!");
            $this->error_submit($e);
        }

     }

    private $errorNo = 1;
    public function error_submit($e,$query=''){
        $exec  =    false;
        if($e === false){
            $this->hasException = false;
            $this->rowException = "";
        }else{
            $this->hasException = true;
            $this->rowException = $e->errorInfo[2];

            if($_SERVER['HTTP_HOST']=='localhost' && $this->showErrorOnLocal){
                $exec = true;
            }else if($this->showErrorOnLive){
                $exec = true;
            }

            if($exec){
                if($this->errorNo<=4){
                    $errorCookie = "Exce_".$this->errorNo;
                    $errorDetailLink = WEB_URL."/error.php?errorId=$errorCookie";
                    echo $error="<pre>Asad Manual Execption From Function class. : ".$e->getMessage()
                        ."<br>For Detail :  <a href='$errorDetailLink' target='_blank'>$errorCookie</a></pre>";
                    $error .="<br>Query : $query <br>";

                    $error_detail = $e->getTrace(); //error throw from where?

                    $error = $error.print_r($error_detail,true);
                    $_SESSION['error'][$errorCookie]= $error;
                    //use of session becase,, cooking show error, or size limit
                    $this->errorNo++;

                }
            }
        }
    }
}