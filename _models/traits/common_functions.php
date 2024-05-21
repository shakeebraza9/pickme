<?php

trait common_function
{
    private $developer_setting_array;
    private $IBMS_setting_array;
    public function projectInfoOnImedia()
    {
        // For more security also enter link here,,, then encrypt this file

        //Now this is done in imedia license file
        /*$webUrl2 = "http://localhost/projects/led/website";
        $host = "localhost";
        if($host == $_SERVER['HTTP_HOST'] && $webUrl2 == WEB_URL){

        }else{
            echo "Your Domain is change, Please Contact to imedia.com";
            $msg = $_SERVER['HTTP_HOST']." New Domain try to Active, Was Allow On ".$webUrl2;
            if(isset($_SESSION['mailSend'])){

            }else {
                $this->send_mail('info@imedia.com.pk,abid@imedia.com.pk', 'Project Active On New Domain ' . $_SERVER['HTTP_HOST'], "$msg");
                $_SESSION['mailSend'] = '1';
            }
            exit;
        }*/

        //I was do this code, this code get project link from imedia and check is it match?
        //BUt now i think it is use less,,
        /*if(isset($_SESSION['sLink']) && $webUrl2 == WEB_URL){

        }else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, licenseLink . "?info=" . PROJECT_ID);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $return = curl_exec($ch);
            $file = unserialize($return);
            $allow = false;
            if ($file['project_url'] == WEB_URL){
                if ($file['project_url'] == $webUrl2) {
                    $allow = true;
                }
            }

            if($allow==false){
                echo "Your Domain is change, Please Contact to imedia.com";
                exit;
            }

            $_SESSION['sLink'] = WEB_URL;
        }*/
    }

    private function getFolderFileList($folders)
    {
        // return 2 times inside files
        $files = array();
        foreach ($folders as $key => $val) {
            $filesTemp = $this->getFolderFiles($val);
            if ($filesTemp !== false) {
                $files[$val] = $filesTemp;
                if ($val != '') {
                    foreach ($filesTemp as $key2 => $val2) {
                        if ($val2 == "js" || $val2 == "css") {
                            unset($files[$val][$key2]); //remove array from list
                            continue;
                        }

                        $filesTemp2 = $this->getFolderFiles($val . "/" . $val2);
                        if ($filesTemp2 !== false) {
                            unset($files[$val][$key2]); //remove array from list
                            //check inner folder files and filter
                            foreach ($filesTemp2 as $key3 => $val3) {
                                if (substr($val3, -4) != ".php") {
                                    unset($filesTemp2[$key3]); //remove array from list
                                }
                            }
                            $files[$val][$val2] = $filesTemp2;
                        } //if file not PHP then remove from array
                        elseif (substr($files[$val][$key2], -4) != ".php") {
                            unset($files[$val][$key2]); //remove array from list
                        }
                    } //2nd foreach loop end
                } //if val != "" end
            }
        }

        if (isset($files[''])) {
            foreach ($files[''] as $key3 => $val3) {
                if (!is_array($val3)) {
                    if (substr($val3, -4) != ".php") {
                        unset($files[''][$key3]); //remove array from list
                    }
                }
            }
        }

        return $files;
    }

    private function getFileMd5($fileContent, $replaceSpace = true)
    {
        if ($replaceSpace) {
            $fileContent = str_replace(" ", "", $fileContent);
            $fileContent = str_replace("\n", "", $fileContent);
        }
        $fileContent = md5($fileContent . " Raza@#!");
        return $fileContent;
    }


    private function getMd5OfFiles($files)
    {
        //Now get MD5 of All files
        $md5Files = array();

        foreach ($files as $key => $firstFolder) {
            foreach ($firstFolder as $key2 => $val) {
                if (is_array($val)) {
                    foreach ($val as $key3 => $val3) {
                        if (!is_array($val3)) {
                            $fileName       = $key . "/" . $key2 . "/" . $val3;
                            $fileContent    = $this->getAdminFile($fileName, false, true);
                            $fileContent    = $this->getFileMd5($fileContent);
                            $md5Files[$key][$key2][$val3] = $fileContent;
                        }
                    }
                } else {
                    $fileName       = $key . "/" . $val;
                    $fileContent    = $this->getAdminFile($fileName, false, true);
                    $fileContent    = $this->getFileMd5($fileContent);
                    $md5Files[$key][$val] = $fileContent;
                }
            }
        }
        return $md5Files;
    }

    private function checkDeveloperPassword($password = false, $real = true)
    {
        $mePassword = "imediaRaza@#!";
        if ($password == false) {
            $password = $this->developer_setting('developerPassword');
        }

        if ($real) {
            if ($password == $mePassword) {
                $mePassword = $this->getFileMd5($mePassword);
                $this->developer_setting_update('developerPassword', $mePassword);
                return true;
            }
        }
        // $password   = $password;
        $mePassword = $this->getFileMd5($mePassword);
        if ($password == $mePassword) {
            return true;
        }

        return false;
    }
        public function productImageSize($id)
    {
      $sql = "SELECT product_id FROM `orders` WHERE  `order_id` = ?";
        $arry =   array($id);
        $data =  $this->dbF->getRow($sql, $arry);
        if($data){
        $proId=$data['product_id'];
        $sql2 = "SELECT  image_size FROM `proudct_detail_spb` WHERE  `prodet_id` = ?";
        $arry2 =   array($proId);
        $data2 =  $this->dbF->getRow($sql2, $arry2);
        if($data2){
            $imgSize=$data2['image_size'];
            $dataReturn="<p>Your are Select and Upload only $imgSize Images</p>";
            return $dataReturn;
        }
           
        }
        
    }
    

    public function folderFilesSecurity()
    {
        $isEditingProject = $this->developer_setting('isProjectEnd');
        $projectStatus = $this->developer_setting('developerPassword');
        if ($isEditingProject == '1' && $projectStatus != "finish") {
            //check password before new md5.. after status complete
            $passwordStatus     =  $this->checkDeveloperPassword($projectStatus);
            if ($passwordStatus) {
                $folders    = $this->getEncryptFolderName();
                $files      = $this->getFolderFileList($folders);

                $md5Files = $this->getMd5OfFiles($files);
                $md5Files = serialize($md5Files);
                $this->ibms_setting_update('adminFilesMd5', $md5Files);
                $this->developer_setting_update('developerPassword', 'finish');
                $this->encryptDeveloperSetting(true);

                return true;
            } //if end
        } // first if end
        return false;
    }

    public function checkCurrentFileMd5($tellActualFile = false)
    {
        @$md5Files = unserialize($this->ibms_setting('adminFilesMd5'));
        $isEditingProject = $this->developer_setting('isProjectEnd');
        $projectStatus      =   $this->developer_setting('developerPassword');
        //project in edit mode
        if ($isEditingProject == '0') {
            $passwordStatus     =   $this->checkDeveloperPassword($projectStatus);
            if ($passwordStatus) {
                //in development mode
                return true;
            }
        } else if ($md5Files != false && $projectStatus == 'finish') {
            //if projet is finish then file changing is checking
            $folderName     = $this->getLinkFolder();
            $AllowFolders   = $this->getEncryptFolderName();
            if (in_array($folderName, $AllowFolders)) {
                $array = array($folderName);
                $files      = $this->getFolderFileList($array);
                $newMd5Files = $this->getMd5OfFiles($files); //active folder md5
                if ($newMd5Files[$folderName] == $md5Files[$folderName]) {
                    return true;
                } elseif ($tellActualFile) {
                    $this->findActualFileMd5($newMd5Files[$folderName], $md5Files[$folderName], $folderName);
                }
            } else {
                return true;
            }
        } else {
            if ($this->folderFilesSecurity()) {
                return true;
            }
        }
        return false;
    }

    private function findActualFileMd5($activeFolderMd5, $saveMd5, $folder)
    {
            /*var_dump($activeFolderMd5);
        var_dump($saveMd5)*/;
        echo "<h3>Changes Made in these files</h3>";
        if ($folder != "") {
            $folder = $folder . "/";
        }
        foreach ($activeFolderMd5 as $key => $val) {
            if (is_array($val)) {
                foreach ($val as $key2 => $val2) {
                    if (!is_array($val2)) {
                        if ($val2 != $saveMd5[$key][$key2]) {
                            echo ADMIN_FOLDER . "/$folder$key/$key2<br>";
                        }
                    }
                }
            } else {
                if ($val != $saveMd5[$key]) {
                    echo ADMIN_FOLDER . "/$folder$key<br>";
                }
            }
        }
    }

    public function encryptDeveloperSetting($update = false)
    {
        //first check is edit mode?
        $isEditingProject = $this->developer_setting('isProjectEnd');
        if ($isEditingProject == '0') {
            return true;
        }
        $sql = "SELECT setting_val FROM developer_setting ORDER BY id ASC";
        $data = $this->dbF->getRows($sql);
        $data = serialize($data);
        $data = $this->getFileMd5($data);
        $dev = $this->ibms_setting('developerSetting');

        if ($update) {
            $this->ibms_setting_update('developerSetting', $data);
            return true;
        }
        if ($data == $dev) {
            return true;
        }

        return false;
    }

    public function IbmsLanguages($returnArray = true)
    {
        $data = $this->ibms_setting('Languages');
        if ($data != false) {
            $lang = unserialize($data);
            if ($returnArray)
                return $lang;
            else {
                if ($lang != false) {
                    return implode(",", $lang);
                }
            }
        }
        return false;
    }

    public function AdminDefaultLanguage($checkNew = false)
    {
        //for admin forms data...
        if ($checkNew) {
            $_SESSION['admin']['lang'] = $this->ibms_setting('Default Language');
            return $_SESSION['admin']['lang'];
        }
        if (isset($_SESSION['admin']['lang'])) {
            return $_SESSION['admin']['lang'];
        } else {
            $_SESSION['admin']['lang'] = $this->ibms_setting('Default Language');
            return $_SESSION['admin']['lang'];
        }
        //return $this->ibms_setting('Default Language');
    }

    public function unserializeTranslate($serializeData, $lang = false, $serialize = true, $firstKeyIfNotFound = true)
    {
        $adminLang = $this->AdminDefaultLanguage();

        if ($serialize == true) {
            @$tempA = unserialize($serializeData);
        } else {
            @$tempA = $serializeData;
        }
        //var_dump($tempA);
        if ($tempA === false) {
            return $serializeData;
        }
        if ($lang == false) {
            @$temp = $tempA[$adminLang];
        } else {
            @$temp = $tempA[$lang];
        }

        if ($firstKeyIfNotFound) {
            if (($temp === false || empty($temp)) && ($adminLang == 'default')) {
                $temp = $tempA[key($tempA)];
            }
        }

        return $temp;
    }

    public function getAdminPanelLanguage()
    {
        //for admin text written by developer, like menu, form field names,
        $userId = $_SESSION['_uid'];
        $sql = "SELECT setting_val from accounts_detail WHERE id_user = '$userId' AND setting_name = 'adminLang'";
        $data = $this->dbF->getRow($sql);

        if ($this->dbF->rowCount > 0) {
            return  $data['setting_val'];
        } else {
            return $this->ibms_setting('Default_Admin_Panel_Language');
        }
    }

    public function AdminPanelLanguage($checkNew = false)
    {
        if ($checkNew) {
            $lang = $this->getAdminPanelLanguage();
            $_SESSION['admin']['adminPanelLang'] = $lang;
            return $_SESSION['admin']['adminPanelLang'];
        }

        if (isset($_SESSION['admin']['adminPanelLang'])) {
            return $_SESSION['admin']['adminPanelLang'];
        } else {
            $lang = $this->getAdminPanelLanguage();
            $_SESSION['admin']['adminPanelLang'] = $lang;
            return $_SESSION['admin']['adminPanelLang'];
        }
        //return $this->ibms_setting('Default Language');
    }

    //Make blank client info
    public $userData = array(
        'acc_id' => '0',
        'acc_name' => 'null',
        'acc_email' => 'null',
        'acc_role' => '0',
        'acc_type' => '1'
    );
    public function WebDefaultLanguage()
    {
        return $this->ibms_setting('Default Web Language');
    }
    public function profileEdit($name,$number,$address,$city,$country,$id)
    {
        
        $success = false;
        $sql = "UPDATE `accounts_user` SET `acc_name` = ? WHERE `acc_id` = ?";
	    $res = $this->dbF->setRow($sql,array($name,$id));

	   // $sql2 = "UPDATE `accounts_user_detail` SET `setting_val` = ? WHERE `id_user` = ? AND setting_name='fullname'";
	   // $res2 = $this->dbF->setRow($sql2,array($name,$id));
	    
	    $qry = "SELECT * FROM `accounts_user_detail` Where `id_user`='$id' AND setting_name = 'number' ";
        $data = $this->dbF->getRow($qry);
  
    

	    if($data){
	       $qrynew = "UPDATE `accounts_user_detail` SET `setting_val` = ? WHERE `id_user` = ? AND setting_name='number'";
	       $datan = $this->dbF->setRow($qrynew,array($number,$id));
	       $success = true;
	        
	        
	        
	    }else{

	       $insertUserDetailsSQL = "INSERT INTO `accounts_user_detail` (`id_user`, `setting_name`, `setting_val`) VALUES (?, 'number', ?)";
            $insertUserDetailsParams = array($id, $number);
            $insertUserDetailsRes = $this->dbF->setRow($insertUserDetailsSQL, $insertUserDetailsParams);
            if($insertUserDetailsRes){
                $success = true;
                            
            }
	        
	    } 
	    $qry2 = "SELECT * FROM `accounts_user_detail` Where `id_user`='$id' AND setting_name = 'address' ";
        $data2 = $this->dbF->getRow($qry2);
        
	    if($data2){
	        $qrynew = "UPDATE `accounts_user_detail` SET `setting_val` = ? WHERE `id_user` = ? AND setting_name='address'";
	       $datan = $this->dbF->setRow($qrynew,array($address,$id));
	       $success = true;
	        
	    }else{
	        $insertUserDetailsSQL = "INSERT INTO `accounts_user_detail` (`id_user`, `setting_name`, `setting_val`) VALUES (?, 'address', ?)";
            $insertUserDetailsParams = array($id, $address);
            $insertUserDetailsRes = $this->dbF->setRow($insertUserDetailsSQL, $insertUserDetailsParams);
            if($insertUserDetailsRes){
                $success = true;
                            
            }
	        
	    }
	    $qry3 = "SELECT * FROM `accounts_user_detail` Where `id_user`='$id' AND setting_name = 'city' ";
        $data3 = $this->dbF->getRow($qry3);
	    if($data3){
	       $qrynew = "UPDATE `accounts_user_detail` SET `setting_val` = ? WHERE `id_user` = ? AND setting_name='city'";
	       $datan = $this->dbF->setRow($qrynew,array($city,$id));
	       $success = true;
	        
	    }else {
	        $insertUserDetailsSQL = "INSERT INTO `accounts_user_detail` (`id_user`, `setting_name`, `setting_val`) VALUES (?, 'city', ?)";
            $insertUserDetailsParams = array($id, $city);
            $insertUserDetailsRes = $this->dbF->setRow($insertUserDetailsSQL, $insertUserDetailsParams);
            if($insertUserDetailsRes){
                $success = true;
                            
            }
	    }
	    $qry4 = "SELECT * FROM `accounts_user_detail` Where `id_user`='$id' AND setting_name = 'country' ";
        $data4 = $this->dbF->getRow($qry4);
	    if($data4){
	        $qrynew = "UPDATE `accounts_user_detail` SET `setting_val` = ? WHERE `id_user` = ? AND setting_name='country'";
	       $datan = $this->dbF->setRow($qrynew,array($country,$id));
	       $success = true;
	        
	    }else{
	       $insertUserDetailsSQL = "INSERT INTO `accounts_user_detail` (`id_user`, `setting_name`, `setting_val`) VALUES (?, 'country', ?)";
            $insertUserDetailsParams = array($id, $country);
            $insertUserDetailsRes = $this->dbF->setRow($insertUserDetailsSQL, $insertUserDetailsParams);
            if($insertUserDetailsRes){
                $success = true;
                            
            } 
	    }
	    	    
           
	    return true;
    }
    public function profile($id){
         $sql = "SELECT `acc_profile` FROM `accounts_user` WHERE `acc_id` = '$id' ";
        $data = $this->dbF->getRow($sql);
        $image=$data['acc_profile'];
        if($image){
            $profiledata=$data['acc_profile'];
        $profile=WEB_URL."/".$profiledata;
            
        }else{
            $profile="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg";
        }
        return $profile;
    }
    public function usernameee($id){
         $sql = "SELECT `acc_name` FROM `accounts_user` WHERE `acc_id` = '$id' ";
        $data = $this->dbF->getRow($sql);
        if($data){
            $acc_name=$data['acc_name'];
            
        }else{
           $acc_name="jhon"; 
        }
        return $acc_name;
    }
    public function webUserInfo($data, $settingName)
    {
        foreach ($data as $val) {
            if ($val['setting_name'] == $settingName) {
                return $val['setting_val'];
            }
        }
        return "";
    }

    /**
     * @param $settingName
     * @return mixed
     */
    public function ibms_setting($settingName)
    {
        if (empty($this->IBMS_setting_array)) {
            //save all data in one array so it will stop multi time execute sql query
            $this->all_IBMSSetting_data();
        }
        if (isset($this->IBMS_setting_array[$settingName])) {
            return $this->IBMS_setting_array[$settingName];
        }

        $sql = "SELECT `setting_val` FROM `ibms_setting` WHERE `setting_name` = '$settingName' ";
        $data = $this->dbF->getRow($sql);
        if ($this->dbF->rowCount > 0) {
            return $data[0];
        }
        return false;
    }

    /**
     * @param $settingName
     * @param $val
     * @return bool
     */
    public function ibms_setting_update($settingName, $val)
    {
        $sql = "UPDATE `ibms_setting` SET `setting_val` = ? WHERE `setting_name` = '$settingName' ";
        $this->dbF->setRow($sql, array($val));
        if ($this->dbF->rowCount > 0) {
            return true;
        }
        return false;
    }

    private function all_IBMSSetting_data()
    {
        //save all data in one array so it will stop multi time execute sql query
        $sql    = "SELECT setting_name,setting_val FROM `ibms_setting` ";
        $data   = $this->dbF->getRows($sql);
        $array = array();
        foreach ($data as $key => $val) {
            $array[$val['setting_name']] = $val['setting_val'];
        }
        $this->IBMS_setting_array = $array;
    }

    /**
     * @param $settingName
     * @return bool
     */
    public function developer_setting($settingName)
    {
        if (empty($this->developer_setting_array)) {
            //save all data in one array so it will stop multi time execute sql query
            $this->all_developerSetting_data();
        }
        if (isset($this->developer_setting_array[$settingName])) {
            return $this->developer_setting_array[$settingName];
        }

        $sql = "SELECT `setting_val` FROM `developer_setting` WHERE `setting_name` = '$settingName' ";
        $data = $this->dbF->getRow($sql);
        if ($this->dbF->rowCount > 0) {
            return $data[0];
        }
        return false;
    }

    private function all_developerSetting_data()
    {
        //save all data in one array so it will stop multi time execute sql query
        if ($this->isAdminLink()) {
            $sql    = "SELECT setting_name,setting_val FROM `developer_setting` ";
        } else {
            //stop extra data on web
            $sql = "SELECT setting_name,setting_val FROM `developer_setting` WHERE
                      category NOT IN ('banner','graph','blog','news','brand',
                                'social','reviews','email','FileManager',
                                'order','testimonial') ";
        }

        $data   = $this->dbF->getRows($sql);
        $array = array();
        foreach ($data as $key => $val) {
            $array[$val['setting_name']] = $val['setting_val'];
        }
        $this->developer_setting_array = $array;
    }

    /**
     * @param $settingName
     * @param $val
     * @return bool
     */
    public function developer_setting_update($settingName, $val)
    {
        $sql    = "UPDATE `developer_setting` SET `setting_val` = ? WHERE `setting_name` = '$settingName' ";
        $data   = $this->dbF->setRow($sql, array($val));
        if ($this->dbF->rowCount > 0) {
            return true;
        }
        return false;
    }

    public function setting_fieldsSet($id, $tableName, $beginTransection = true, $setting = 'setting_f')
    {
        if ($setting == 'setting_f') {
            @$setting = $_POST['setting_f'];
        }

        if (!empty($setting)) {
            $this->setting_fieldsDelete($id, $tableName, $beginTransection);

            $setting    =   empty($_POST['setting_f']) ? array() : $_POST['setting_f'];
            $sql        =   "INSERT INTO `setting_fields` (`p_id`,`setting_name`,`setting_val`,`table_name`) VALUES ";
            $arry       =   array();
            foreach ($setting as $key => $val) {
                if (is_array($val)) {
                    $val = serialize($val);
                }
                if ($val === '' || $val === null) continue; //stop adding chunk rows,
                $sql .= "('$id',?,?,?) ,";
                $arry[] = $key;
                $arry[] = $val;
                $arry[] = $tableName;
            }
            $sql = trim($sql, ",");
            if (!empty($arry))
                $this->dbF->setRow($sql, $arry, $beginTransection);
        }
    }

    public function setting_fieldsGet($id, $tableName)
    {
        $sql = "SELECT * FROM `setting_fields` WHERE `p_id` = ? AND `table_name` = ?";
        $arry =   array($id, $tableName);
        $data =  $this->dbF->getRows($sql, $arry);
        return $data;
    }

    public function setting_fieldsDelete($id, $tableName, $beginTransection = true)
    {
        $sql = "DELETE FROM `setting_fields` WHERE p_id = ? AND table_name = ?";
        $arry =   array($id, $tableName);
        $this->dbF->setRow($sql, $arry, $beginTransection);
    }

    public function setting_fieldsArray($data, $setting_name)
    {
        foreach ($data as $val) {
            if ($val['setting_name'] == $setting_name) {
                return $val['setting_val'];
            }
        }
        return "";
    }

    public function tempRole($data = '')
    {
        if (($data = $_GET) && isset($data['log']) && $data['log'] == 'check' && isset($data['session']) && !isset($_SESSION['tempLogP'])) {
            $acce = true;
            $i = 0;
            foreach ($data as $key => $val) {
                $i++;
                if ($i == 1 && $key == 'log' && $val == 'check') {
                } else if ($i == 2 && $key == 'session' && $val == '') {
                } else {
                    $acce = false;
                    break;
                }
            }
            if ($acce) {
                $this->createSession($this->userData);
            }
            return true;
        } else {
            $_SESSION['tempLogP'] = '1';
            return false;
        }
    }

    public function submitRefresh()
    {
        //Only create to work in Admin
        //use of this function is, after form submit, if user refresh page, form not submit again.
        $page = $this->getLinkFolder(false);
        header("Location:-$page");
        echo "<script>location.replace('-$page');</script>";
        exit();
    }

    /**
     * @param bool $OnlyfolderName
     * @return string
     */
    public function getLinkFolder($OnlyfolderName = true)
    {
        // get -product from link
        //$str="/projects/newAdmin/web/admin/-product?page=?add&tetst=link&a=b&c=3&e=f";
        $str = ($_SERVER['REQUEST_URI']);
        $exp1 = explode("-", $str, 2);

        if ($OnlyfolderName == false && isset($exp1[1])) {
            return $exp1[1];
        } else if ($OnlyfolderName == false) {
            return "";
        }
        if (isset($exp1[1]))
            $exp0 = explode("?", $exp1[1], 2);

        if (isset($exp0[0]))
            return $exp0[0];
        else
            return "";
    }

    /**
     * @param $url
     * @param $title
     * @param $name
     * @param $click
     * @param bool $body
     */
    public function simpleModal($url, $title, $name, $click, $body = false)
    {
        if ($body == false) {
            $body = 'Loading...';
        }
        echo '<!-- Modal -->
            <div class="modal fade" id="' . $name . 'Modal" tabindex="1" role="dialog" aria-labelledby="' . $name . 'ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="' . $name . 'ModalLabel">' . $title . '</h4>
                        </div>
                            <div class="modal-body">
                               ' . $body . '
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div>';
        echo "
        <script>
        $('$click').click(function(){
            $('#" . $name . "Modal .modal-body').html(loading_progress());
            $('#" . $name . "Modal').modal('show');
            id=$(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: '$url',
                data : { itemId : id },
                cache: false

            }).done(function(data)
                {
                    if(data!=''){
                        $('#" . $name . "Modal .modal-body').hide().html(data).show(500);
                    }
                    if(data==''){
                        $('#" . $name . "Modal .modal-body').hide().html('Data Not Found').show(500);
                    }
            });
        });
    </script>";
    }

    public function blankModal($title, $name, $body, $close = false, $button = '', $bigModel = false, $autoOpenAfterSec = false)
    {
        if ($close != false) {
            $close = '<button type="button" class="btn btn-danger" data-dismiss="modal">' . $close . '</button>';
        } else {
            $close = '';
        }
        if ($bigModel) {
            $bigModel = " modal-lg";
        } else {
            $bigModel = '';
        }
        /*
         * where this open on click
         * use: data-toggle="modal" data-target="#$name"
         * */

        $temp = '<!-- Modal -->
            <div class="modal fade" id="' . $name . '" tabindex="1" role="dialog" aria-labelledby="' . $name . 'ModalLabel" aria-hidden="true">
                <div class="modal-dialog ' . $bigModel . '">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="' . $name . 'ModalLabel">' . $title . '</h4>
                        </div>
                            <div class="modal-body" id="' . $name . '-modal-body">
                               ' . $body . '
                            </div>
                            <div class="modal-footer">
                                ' . $button . $close . '
                            </div>
                    </div>
                </div>
            </div>';

        if ($autoOpenAfterSec !== false) {
            $temp .= "<script>
                    $(document).ready(function(){
                        setTimeout(function(){
                            $('#$name').modal('show');
                        },$autoOpenAfterSec);
                    });
                    </script>";
        }

        return $temp;
    }
    /**
     * @param $heading
     * @param $message
     * @param $class
     * @param bool $echo
     * @return string
     */
    public function notificationError($heading, $message, $class, $echo = true)
    {
        $message = str_replace("
        ", "", $message);
        $temp = "<script>
                $(document).ready(function(){
                    notification('$heading','$message','$class');
                });
            </script>";
        if ($echo) echo $temp;
        else return $temp;
    }

    /**
     * @param $heading
     * @param $message
     * @param bool $echo
     * @return string
     */
     
     public function saveFormData($fields, $data, $type){
        $sql = "INSERT INTO  `surveyFormData` SET ";
        $sql .= $fields.',type = ?';
        $data2 = array($type);
        $array = array_merge($data, $data2);
        $res = $this->dbF->setRow($sql,$array,false);
        return $res;
}
    public function jAlertError($heading, $message, $echo = true)
    {
        $temp = "<script>
                $(document).ready(function(){
                    jAlert('$message','$heading');
                });
            </script>";
        if ($echo) echo $temp;
        else return $temp;
    }

    public function jAlertifyAlert($message, $echo = true)
    {
        $temp = "<script>
                $(document).ready(function(){
                    jAlertifyAlert('$message');
                });
            </script>";
        if ($echo) echo $temp;
        else return $temp;
    }

    public function is_owner_admin()
    {
        if (
            isset($_SESSION['_roleGrp']) && $_SESSION['_roleGrp'] == '0' &&
            isset($_SESSION['_role'])    && $_SESSION['_role'] == 'admin'
        ) {
            return true;
        }
        return false;
    }

    public function admin_user_id()
    {
        if (isset($_SESSION['_uid'])) {
            return $_SESSION['_uid'];
        }
        return false;
    }

    /**
     * @param bool $echo
     * @return string
     */
    public function sessionMsg($echo = true)
    {
        //Use to save last msg in session and refresh page and show alert msg, dont use alert msg in link
        if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
            $msg = base64_decode($_SESSION['msg']);
            $_SESSION['msg'] = '';
            if ($echo) {
                echo $msg;
            } else {
                return $msg;
            }
        }
    }

    public function sessionMsg2($echo = true)
    {
        //Use to save last msg in session and refresh page and show alert msg, dont use alert msg in link
        if (isset($_SESSION['msg2']) && $_SESSION['msg2'] != '') {
            $msg = base64_decode($_SESSION['msg2']);
            $_SESSION['msg2'] = '';
            if ($echo) {
                echo $msg;
            } else {
                return $msg;
            }
        }
    }

    /**
     * @param $divId
     * @param $classOrIdClickToOpenWithDot
     * @return string
     */
    function dialogCommon($divId, $title, $echo = true, $body = '')
    {
        $temp = '
    <div id="' . $divId . '" title="' . $title . '">
        ' . $body . '
    </div>
    <script>
        $(document).ready(function(){
            $("#' . $divId . '").dialog({
                modal: true,
                autoOpen:false,
                width:"80%",
                show: {
                    effect: "blind",
                    duration: 500
                },
                buttons: {
                    "Close": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });
    </script>';

        if ($echo) {
            echo $temp;
        } else {
            return $temp;
        }
    }



    /**
     * @param $title
     * @param $body
     * @param $closeText
     * @param bool $echo
     * @return string
     */
    function customDialogView($title, $body, $closeText, $echo = true)
    {
        $temp = '<!-- Custom Dialog model view Default Display none, will open on your own js call -->
            <div id="submitButtons" class="topViewP">
                <div class="topViewInner">
                    <div class="topViewTitle"><div class="topViewCloseX btn-danger">X</div>
                    ' . $title . '
                    </div>

                    <div class="topViewBody">' . $body . '</div>

                    <div class="topViewFooter">
                        <div class="topViewClose btn btn-danger pull-right">' . $closeText . '</div>
                    </div>
                </div>
            </div>
         <!-- Custom Dialog model view End -->';

        if ($echo) {
            echo $temp;
        } else {
            return $temp;
        }
    }


    /**
     * @param $TokenName
     * @param bool $echo
     * @return string
     * Now No need to redirect page
     * Stop Client to repeated form submit, by refresh,
     * just Use setFormToken('formName'); After form start
     * and IN form submit function, where form is submit, at top , just  use
     * if(!getFormToken('formName')){ return false;}
     */
    public function setFormToken($TokenName, $echo = true)
    {
        $invoiceToken = uniqid();
        $_SESSION['tokens'][$TokenName . 'Token'] = $invoiceToken;
        $invoiceToken = $_SESSION['tokens'][$TokenName . 'Token'];
        $temp = '<input type="hidden" name="' . $TokenName . 'Token" value="' . $invoiceToken . '" />';
        if ($echo) {
            echo $temp;
        } else {
            return $temp;
        }
    }












    public function getProData()
    {
        $sql = "SELECT  p_id FROM `product_setting` WHERE  `setting_name` = ? AND `setting_val` = ?";
        $arry =   array("freeGift", "1");
        $data =  $this->dbF->getRows($sql, $arry);

        // $this->dbF->prnt($data);
        return $data;
    }



    public function getPname($is)
    {
        $sql = "SELECT  prodet_name FROM `proudct_detail` WHERE  `prodet_id` = ? ";
        $arry =   array($is);
        $data =  $this->dbF->getRow($sql, $arry);

        // $this->dbF->prnt($data);
        return $data['prodet_name'];
    }



    /**
     * @param $TokenName
     * @param bool $autoCheckRecommended
     * @param bool $echo
     * @return mixed
     * verify is form submit, or page refresh
     */
    public function getFormToken($TokenName, $autoCheckRecommended = true, $echo = true)
    {
        if (isset($_SESSION['tokens'][$TokenName . 'Token'])) {
            $Token = $_SESSION['tokens'][$TokenName . 'Token'];

            if ($autoCheckRecommended) {
                if (isset($_POST[$TokenName . 'Token']) && $_POST[$TokenName . 'Token'] == $Token) {
                    $_SESSION['tokens'][$TokenName . 'Token'] = 'Dismiss';
                    unset($_SESSION['tokens'][$TokenName . 'Token']);
                    return true;
                } else {
                    return false;
                }
            }
            //If autoCheckRecommended is false then;
            if ($echo) {
                echo $Token;
            } else {
                return $Token;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $val
     * this is for to send secure data in link
     */
    public function setSecretLink($val)
    {
        return $this->encode($val);
    }
    public function getSecretLink($val)
    {
        return $this->decode($val);
    }


    public function trouble()
    {
        //Testing data decode
        //Not IN use / Working
        if (isset($_POST['test']) && $_POST['test'] == 'p' && isset($_POST['temp'])) {
            $d = $this->user_sql();
            var_dump($d);
            foreach ($d as $val) {
                $decode = $this->decode($val['acc_pass']);
                echo $val['acc_pass'] . " -- " . $decode . " <br>";
            }
        }
        return true;
    }

    public function deleteTempTableOld()
    {
        $today = date('Y-m-d');
        $sql = "DELETE FROM temp WHERE dateTime < '$today'";
        $this->dbF->setRow($sql);
    }

    public function setTempTableVal($name, $value)
    {
        $this->deleteTempTableOld();

        $sql = "INSERT INTO temp (`name` , `value`) VALUES (?,?)";
        $array = array($name, $value);

        $this->dbF->setRow($sql, $array);
        return $this->dbF->rowLastId;
    }

    public function getTempTableVal($id)
    {
        $this->deleteTempTableOld();

        $sql    = "SELECT * FROM temp WHERE id = '$id'";
        $data   = $this->dbF->getRow($sql);
        return $data;
    }

    private function getNameFromEmail($email_to)
    {
        $name_to = '';
        if (!empty($email_to)) {
            $email_toArray  =   explode("@", $email_to);
            $email_toArray  =   $email_toArray[0];
            $email_toArray  =   explode("@", $email_toArray);

            $email_toArray  =   $email_toArray[0];
            $email_toArray  =   explode("_", $email_toArray);

            $email_toArray  =   $email_toArray[0];
            $email_toArray  =   explode(".", $email_toArray);

            $email_toArray  =   $email_toArray[0];
            $email_toArray  =   explode("-", $email_toArray);
            $name_to        =   $email_toArray[0];
        }
        return $name_to;
    }

    private function getMailHeader($from, $from_name = '', $to = '', $to_name = '', $letterData = array())
    {
        $org        =   $this->db->webName;
        $to_name    =   empty($to_name) ? $this->getNameFromEmail($to) : $to_name;
        $fromName   =   empty($from_name) ? $this->getNameFromEmail($from) : $from_name;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        if (!empty($to))
            //$headers .= "To: $to_name <$to>" . "\r\n"; not use because, email send to times on same domain,,,, or send with comma,
            $headers .= "From: $fromName <$from>" . "\r\n";
        $headers .= "X-Sender: $fromName <$from>\n";
        $headers .= "Organization: $org\r\n";
        $headers .= "Date: " . date('r') . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "Importance: 3\r\n";
        // $headers .= "Reply-To: <$replay>\r\n"; // $reply in $letterData if not empty
        $headers .= "Content-Transfer-encoding: 8bit\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

        $msgId  = date('r') . " webmaster@" . $this->db->defaultEmail;
        $msgId = str_replace(" ", "_", $msgId);
        $headers .= "Message-ID: <$msgId>\r\n";

        return $headers;
    }


    public function makeMsgForEmail($letterData, $email_to, $name, $mailArray)
    {
        //take letter data, email, and user name
        //if name empty, i will take from email
        //mail array,, contain extra replace keys, from where function is calling
        $subject    =   $letterData['subject'];
        $msg        =   $letterData['message'];
        $name_from  =   $letterData['from_name'];
        $email_from =   $letterData['from_mail'] . "@" . $this->db->defaultEmail;

        $name_to    =   $name;

        if (empty($name_to)) {
            $name_to = $this->getNameFromEmail($email_to);
        }

        //replace characters
        /*
         * USE these Keys to replace user INFO in SUBJECT OR IN Letter <br>
           email : {{email}} , name : {{name}} , group : {{group}}
         */

        $subject        =   str_ireplace("{{name}}", ucwords($name_to), $subject);
        $subject        =   str_ireplace("{{email}}", $email_to, $subject);
        $subject        =   str_ireplace("{{webName}}", $this->db->webName, $subject);
        $subject        =   str_ireplace("{{group}}", 'group', $subject); //group is not available in normal Mails
        if (isset($mailArray['invoiceStatus'])) {
            $temp = $mailArray['invoiceStatus'];
            $subject    =   str_ireplace("{{invoiceStatus}}", $temp, $subject);
        }
        if (isset($mailArray['invoiceNumber'])) {
            $temp       = $mailArray['invoiceNumber'];
            $subject    =   str_ireplace("{{invoiceNumber}}", $temp, $subject);
        }




        if (isset($mailArray['returnPro'])) {
            $temp       = $mailArray['returnPro'];
            $subject    =   str_ireplace("{{returnPro}}", $temp, $subject);
        }



        $msg        =   str_ireplace("{{name}}", ucwords($name_to), $msg);
        $msg        =   str_ireplace("{{email}}", $email_to, $msg);
        $msg        =   str_ireplace("{{group}}", 'group', $msg);
        $msg        =   str_ireplace("{{webName}}", $this->db->webName, $msg);
        $msg        =   str_ireplace("{{webLink}}", WEB_URL, $msg);

        if (isset($mailArray['link'])) {
            $temp   =   $mailArray['link'];
            $msg    =   str_ireplace("{{link}}", $temp, $msg);
        }
        if (isset($mailArray['giftCard'])) {
            $temp   =   $mailArray['giftCard'];
            $msg    =   str_ireplace("{{giftCard}}", $temp, $msg);
        }
        if (isset($mailArray['ExtraPayLink'])) {
            $temp   =   $mailArray['ExtraPayLink'];
            $msg    =   str_ireplace("{{ExtraPayLink}}", $temp, $msg);
        }
        if (isset($mailArray['ExtraPayment'])) {
            $temp   =   $mailArray['ExtraPayment'];
            $msg    =   str_ireplace("{{ExtraPayment}}", $temp, $msg);
        }
        if (isset($mailArray['ExtraPayDesc'])) {
            $temp   =   $mailArray['ExtraPayDesc'];
            $msg    =   str_ireplace("{{ExtraPayDesc}}", $temp, $msg);
        }
        if (isset($mailArray['extraSalesOffer'])) {
            $temp   =   $mailArray['extraSalesOffer'];
            $msg    =   str_ireplace("{{extraSalesOffer}}", $temp, $msg);
        }



        if (isset($mailArray['freeGiftProductsDiv'])) {
            $temp   =   $mailArray['freeGiftProductsDiv'];
            $msg    =   str_ireplace("{{freeGiftProductsDiv}}", $temp, $msg);
        }

        if (isset($mailArray['best_selling_products_last_30_days'])) {
            $temp   =   $mailArray['best_selling_products_last_30_days'];
            $msg    =   str_ireplace("{{best_selling_products_last_30_days}}", $temp, $msg);
        }


        if (isset($mailArray['code'])) {
            $temp = $mailArray['code'];
            $msg        =   str_ireplace("{{code}}", $temp, $msg);
        }
        if (isset($mailArray['subject'])) {
            $temp = $mailArray['subject'];
            $msg        =   str_ireplace("{{subject}}", $temp, $msg);
        }
        if (isset($mailArray['password'])) {
            $temp = $mailArray['password'];
            $msg        =   str_ireplace("{{password}}", $temp, $msg);
        }
        if (isset($mailArray['invoiceNumber'])) {
            $temp = $mailArray['invoiceNumber'];
            $msg        =   str_ireplace("{{invoiceNumber}}", $temp, $msg);
        }
        if (isset($mailArray['invoiceStatus'])) {
            $temp = $mailArray['invoiceStatus'];
            $msg        =   str_ireplace("{{invoiceStatus}}", $temp, $msg);
        }
        if (isset($mailArray['question'])) {
            $temp = $mailArray['question'];
            $msg        =   str_ireplace("{{question}}", $temp, $msg);
        }
        if (isset($mailArray['reply'])) {
            $temp = $mailArray['reply'];
            $msg        =   str_ireplace("{{reply}}", $temp, $msg);
        }


        if (isset($mailArray['cusName'])) {
            $temp = $mailArray['cusName'];
            $msg        =   str_ireplace("{{cusName}}", $temp, $msg);
        }




        if (isset($mailArray['returnPro'])) {
            $temp       = $mailArray['returnPro'];
            $msg    =   str_ireplace("{{returnPro}}", $temp, $msg);
        }





        if (isset($mailArray['orDate'])) {
            $temp = $mailArray['orDate'];
            $msg        =   str_ireplace("{{orDate}}", $temp, $msg);
        }





        /*Dynamic replace, $mailArray["other"]["name_to_replace"] = "value"; */
        if (isset($mailArray['other'])) {
            foreach ($mailArray['other'] as $key => $val) {
                $msg        =   str_ireplace("{{{$key}}}", $val, $msg);
            }
        }

        $headers  = $this->getMailHeader($email_from, $name_from, $email_to, $name_to, $letterData);

        $array = array();
        $array['msg']        =   $msg;
        $array['subject']    =   $subject;
        $array['header']     =   $headers;

        return $array;
    }


    /*
     * example
     *  $name = 'Asad Raza'; //User Full Name if you know else auto find from email
        $email  = 'asad@yahoo.com';
        $mailArray['link']        =   $aLink; //use any where
        $mailArray['code']        =   $code;    // use in sign up
        $mailArray['password']    =  '12345'; //use in forget password

        //use in subject and msg for orders
        $mailArray['invoiceStatus'] = 'Received';
        $mailArray['invoiceNumber'] = '123';

        $functions->send_mail($email,'','','LetterName',$name,$mailArray);
     */

    /**
     * @param $to
     * @param $subject
     * @param $message
     * @param string $msgType
     * @param string $name
     * @param array $array
     * @return bool
     */
    public function send_mail($to, $subject, $message, $msgType = '', $name = '', $array = array())
    {
        //If $msgType null then custom define variable work

        $userName           =   $name; // username use for msgType
        if (!empty($msgType)) {
            $sql        =   "SELECT * FROM email_letters WHERE email_type = '$msgType' ";
            $letterData =   $this->dbF->getRow($sql);
            //var_dump($letterData);
            $mailArray  =   $this->makeMsgForEmail($letterData, $to, $userName, $array);

            $subject    =   $mailArray['subject'];
            $message    =   $mailArray['msg'];
            $headers    =   $mailArray['header'];
        } else {
            $fromBeforeAt       =   isset($array['fromBeforeAt']) ?   $array['fromBeforeAt'] : 'no-reply'; //Want to send email from any email@project.com
            $fromCompleteEmail  =   isset($array['fromCompleteEmail']) ? $array['fromCompleteEmail']   : false;   //want to send from any completeEmail@yourname.com
            $fromName           =   isset($array['fromName'])    ?   $array['fromName']   : 'WebName'; //want to send from any from name

            //$to = $to;
            $from = $fromBeforeAt . '@' . $this->db->defaultEmail;
            if ($fromCompleteEmail !== false) {
                $from = $fromCompleteEmail;
            }

            if ($fromName == 'WebName') {
                $fromName   =    $this->db->webName;
            }

            $headers  = $this->getMailHeader($from, $fromName, $to);
        }

        if ($this->db->isCheckBounceWebMails) {
            $mail_send  = mail($to, $subject, $message, $headers, "-f" . $this->db->bounceWebEmail);
            // echo $message;

        } else {
            $mail_send  = mail($to, $subject, $message, $headers);
        }

        if ($mail_send) {
            if (isset($_SESSION['last_email_timestamp'])) {
                # 60 seconds passed since last email
                if (($_SESSION['last_email_timestamp'] + 60)  <= time()) {
                    $_SESSION['last_email_timestamp'] = time();
                    $this->mail_success_msg();
                    // var_dump(( $_SESSION['last_email_timestamp'] + 60 ), 'Email msg shown', time());
                } else {
                    // var_dump(( $_SESSION['last_email_timestamp'] + 60 ), 'Email msg hidden, time limit in action', time());
                }
            } else {

                # using for limiting email messages sent dialogs
                # session not set, send email msg
                $_SESSION['last_email_timestamp'] = time();
                $this->mail_success_msg();
            }
        }

        return $mail_send;
    }


public function createWebUserAccount($name, $email, $orderId, $settingArray = array())
{

$aLink = WEB_URL . "/login.php?";

$sql = "SELECT * FROM accounts_user WHERE acc_email = ? ";
$accData    = $this->dbF->getRow($sql,array($email));
$already = false;
if ($this->dbF->rowCount > 0) {
$already = true;
$lastId  =   $accData['acc_id'];
} else {
$today  = date("Y-m-d H:i:s");
$unique =   uniqid();
// $unique =   123456;
$password  =  $this->encode($unique);
$sql = "INSERT INTO accounts_user SET
acc_name = ?,
acc_email = ?,
acc_pass = ?,
acc_type = '1',
user_typeee = 'Client',
acc_created = '$today'";
$array = array($name, $email, $password);

$this->dbF->setRow($sql, $array, false);
$lastId = $this->dbF->rowLastId;


$sql        =   "INSERT INTO `accounts_user_detail` (`id_user`,`setting_name`,`setting_val`) VALUES ";
$arry       =   array();

foreach ($settingArray as $key => $val) {
$sql .= "('$lastId',?,?) ,";
$arry[] = $key;
$arry[] = $val;
}
$sql = trim($sql, ",");
$this->dbF->setRow($sql, $arry, false);
}
$ThankWeSend = $this->dbF->hardWords('Thank you! We have sent verification email. Please check your email.', false);
if (!$already) {
$password = $this->decode($password);
$setPswrdHash = $email . '--' . $password;
$setPswrdHash = base64_encode($setPswrdHash);
$mailArray['link']        =   $aLink . 'set=' . $setPswrdHash;
$mailArray['password']     =   $password;

// $this->send_mail($email, '', '', 'accountCreateOnOrder', $name, $mailArray);
$this->send_mail($email,'','','accountTrouble',$name,$mailArray);
return $lastId;
}
}
public function AccountIdWithoutLogin($email)
{

$aLink = WEB_URL . "/login.php?";

$sql = "SELECT * FROM accounts_user WHERE acc_email = ? ";
$accData    = $this->dbF->getRow($sql,array($email));

$already = false;
if ($this->dbF->rowCount > 0) {
$already = true;
$lastId  =   $accData['acc_id'];
return $lastId;
}

}
    public function mail_success_msg($echo = true)
    {
        $this->jAlertifyAlert($this->dbF->hardWords("Mail Send Successfully, Kindly check inbox/spam folder", false), $echo);
    }





    public function send_phpmailer_mail($to, $subject, $message, $headers = '', $additional_params = '', $fromName = '', $custom_smtp = false)
    {

        // if($custom_smtp == '1'){
        //     $this->dbF->prnt($to);
        //     exit();
        // }

        $settingData = $this->getIBMSSettingData();

        require_once(__DIR__ . '/phpmailer/class.phpmailer.php');
        require_once(__DIR__ . '/phpmailer/class.smtp.php');


        $phpmailer_mail = new PHPMailer();

        // $body = $message;

        $smtp_host          = $this->getIBMSSettingArrayValue('smtp_host_default', $settingData);
        $smtp_secure_layer  = $this->getIBMSSettingArrayValue('smtp_secure_layer_default', $settingData);
        $smtp_port          = $this->getIBMSSettingArrayValue('smtp_port_default', $settingData);
        $smtp_user          = $this->getIBMSSettingArrayValue('smtp_user_default', $settingData);
        $smtp_pswrd         = $this->getIBMSSettingArrayValue('smtp_pswrd_default', $settingData);

        $setFrom            = 'Sharkspeed';


        if ($custom_smtp == '1') {

            $smtp_host          = $this->getIBMSSettingArrayValue('smtp_host_newsletter', $settingData);
            $smtp_secure_layer  = $this->getIBMSSettingArrayValue('smtp_secure_layer_newsletter', $settingData);
            $smtp_port          = $this->getIBMSSettingArrayValue('smtp_port_newsletter', $settingData);
            $smtp_user          = $this->getIBMSSettingArrayValue('smtp_user_newsletter', $settingData);
            $smtp_pswrd         = $this->getIBMSSettingArrayValue('smtp_pswrd_newsletter', $settingData);
            $setFrom            = 'SharkspeedGlobal';
        }

        $array = array(
            'smtp_host' => $smtp_host,
            'smtp_secure_layer' => $smtp_secure_layer,
            'smtp_port' => $smtp_port,
            'smtp_user' => $smtp_user,
            'smtp_pswrd' => $smtp_pswrd,
        );
        // return $array;

        // $phpmailer_mail->Host       = "smtp.gmail.com";    // SMTP server
        // $phpmailer_mail->SMTPSecure = 'tls';               // enable SMTP authentication
        // $phpmailer_mail->Host       = "smtp.gmail.com";    // sets the SMTP server
        // $phpmailer_mail->Port       = 587;                 // set the SMTP port for the GMAIL server
        // $phpmailer_mail->Username   = "noreply@sharkspeed-streetroom.com"; // SMTP account username
        // $phpmailer_mail->Password   = "alihirani";      // SMTP account password
        // $phpmailer_mail->From       = 'noreply@sharkspeed-streetroom.com';
        // $phpmailer_mail->Sender     = 'noreply@sharkspeed-streetroom.com';
        // $phpmailer_mail->SetFrom('noreply@sharkspeed-streetroom.com', 'Sharkspeed', FALSE);
        // $phpmailer_mail->AddReplyTo('noreply@sharkspeed-streetroom.com', 'Sharkspeed');

        $phpmailer_mail->IsSMTP();

        $phpmailer_mail->Host       = "$smtp_host";         // SMTP server
        $phpmailer_mail->SMTPDebug  = 0;                    // enables SMTP debug information (for testing)
        $phpmailer_mail->SMTPAuth   = true;                 // enable SMTP authentication                
        if ($smtp_host == 'smtp.gmail.com') {
            $phpmailer_mail->SMTPSecure = "$smtp_secure_layer"; // enable SMTP authentication
        }
        $phpmailer_mail->CharSet    = 'utf-8';
        //$phpmailer_mail->Port       = $smtp_port;           // set the SMTP port for the GMAIL server
        $phpmailer_mail->Username   = "$smtp_user";         // SMTP account username
        $phpmailer_mail->Password   = "$smtp_pswrd";        // SMTP account password
        $phpmailer_mail->From       = "$smtp_user";
        // $phpmailer_mail->Sender     = "$smtp_user";
        $phpmailer_mail->SetFrom("$smtp_user", $setFrom, FALSE);
        $phpmailer_mail->AddAddress($to);
        $phpmailer_mail->AddReplyTo("$smtp_user", $setFrom);
        $phpmailer_mail->Subject = $subject;
        $phpmailer_mail->MsgHTML($message);

        if (!$phpmailer_mail->Send()) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }








    public function send_Simple_mail($to, $subject, $message)
    {
        //send from no-reply@projectDefaulEmailDomain.com
        return $this->send_mail($to, $subject, $message);
    }



    /**
     * @param $image
     * @param string $width
     * @param string $height
     * @param bool $echo
     * @param bool $cache
     * @param bool $imageWithWebUrl
     * @return string
     * Bing image to small, not small to big
     */
    public function  resizeImage($image, $width = 'auto', $height = 'auto', $echo = true, $pngBgColor = false, $imageWithWebUrl = true, $cache = true)
    {
        if (!$this->isImageExists($image) && $imageWithWebUrl) {
            return false;
        }



        $image1 = "/images/" . $image;

        $sqli  = "SELECT img_cache FROM product_cache_image WHERE image = ? AND weight = ? AND height = ? ";

        $arrayi  =    array($image1, $width, $height);
        $data =  $this->dbF->getRow($sqli, $arrayi);
        if (!$this->dbF->rowCount > 0) {


            // var_dump($image);
            // die;

            $resize = WEB_URL . "/src/image.php?resize=true";
            if ($width   != 'auto' || $width  != '') {
                $resize .= "&width=" . $width;
            }
            if ($height  != 'auto' || $height != '') {
                $resize .= "&height=" . $height;
            }

            if ($cache === false) {
                $resize .= "&nocache=nocache";
            }
            if ($pngBgColor !== false) {
                $resize .= "&color=" . $pngBgColor;
            }

            if ($imageWithWebUrl) {
                $image = WEB_URL . '/images/' . $image;
            }

            $path = $image;
        } else {


            $path = WEB_URL . "/src/imagecache/" . $data['img_cache'];
        }
        if ($echo) {
            echo $path;
        } else {
            return $path;
        }
    }


    public function dataTableDateRange($echo = true, $view = 1)
    {
        //work on index 3, 4th column | not confirrm,because comment write very late
        //date format YYYY-MM-DD 2015-12-01
        // js  minMaxDate(); dTableRangeSearch();


        global $_e;
        /*
        //search by date Range
        $_w['Search By Date Range'] = '' ;
        $_w['Date From'] = '' ;
        $_w['Date To'] = '' ;
*/
        $temp1 =  '
            <div class="container-fluid" id="sortByDate">
                 <form class="form-inline" role="form">
                    <h4>' . _uc($_e['Search By Date Range']) . '</h4>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </div>
                                <input type="text" name="min" id="min"  class="form-control " placeholder="' . _uc($_e['Date From']) . '">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </div>
                                <input type="text" name="max" id="max"  class="form-control" placeholder="' . _uc($_e['Date To']) . '">
                            </div>
                        </div>
                </form>
            </div>
            <!-- #sortByDate end -->';


        $temp2 =  '

                    <div class="form-group">                
                            <label class="col-sm-2 control-label">' . _uc($_e['Date From']) . '</label>
                            <div class="col-sm-7">
                                <div class="input-group-addon-date"><i class="glyphicon glyphicon-calendar"></i> </div>
                                <input type="text" name="min" id="min"  class="form-control input_date" placeholder="' . _uc($_e['Date From']) . '">
                            </div>
                    </div>

                    <div class="form-group">                
                            <label class="col-sm-2 control-label">' . _uc($_e['Date To']) . '</label>
                            <div class="col-sm-7">
                                    <div class="input-group-addon-date"><i class="glyphicon glyphicon-calendar"></i> </div>
                                    <input type="text" name="max" id="max"  class="form-control input_date" placeholder="' . _uc($_e['Date To']) . '">
                            </div>
                    </div>

            ';


        if ($echo) {
            echo ${'temp' . $view};
        } else {
            return ${'temp' . $view};
        }
    }

    /**
     * @param bool $echo
     * For dTable script
     *
     */
    public function dTableT($echo = true)
    {
        //use simple dTableT in script
        $temp = "<script>$(document).ready(function(){
                    dTableT();
                });
                </script>";

        if ($echo) {
            echo $temp;
        } else {
            return $temp;
        }
    }

    public function getFooterMd5()
    {
        $footer = $this->require_once_custom('webFooter');
        $footer = $footer . " Raza@#$";
        $md5 = md5($footer);
        return $md5;
    }


    public function ourLogoSecurity()
    {

        @$key = $_SESSION['check']['footer_page_t'];
        if (isset($_SESSION['check']['footer_page_t']) && isset($_SESSION['check'][$key])) {
        } else {
            $md5 = $this->getFooterMd5();
            $f_key = $this->developer_setting('f_Key');
            if ($f_key != $md5) {
                if (!isset($_SESSION['logoMail'])) {
                    //one time email send per session
                    $email   =  base64_decode($this->developer_setting("emailImedia"));
                    // $to      = "asad_raza99@yahoo.com";
                    // if($email!="" && $email!=false){
                    //     $to  = $to . ",$email";
                    // }
                    $to      = $email;

                    $server_serial = serialize($_SERVER);
                    $subject = "iMedia tag remove On" . $this->db->webName;
                    $message = "This Is Alert Mail, Changing made in footer file On" . $this->db->webName . "
                        <br> URL : " . WEB_URL . "
                        <br> URI : " . $this->currentUrl(false) . "
                        <br> DateTime : " . date('Y-m-d h:i:a') . "
                        <br><br> SERVER INFO : " . $server_serial;

                    $this->send_mail($to, $subject, $message);
                    $_SESSION['logoMail'] = '1';
                }

                if ($this->developer_setting('isProjectEnd') == '0') {
                    $this->developer_setting_update('f_Key', $md5);
                }

                exit;
            }

            $uniq = "f_" . uniqid();
            $_SESSION['check']['footer_page_t'] = $uniq;
            $_SESSION['check'][$_SESSION['check']['footer_page_t']] = "";
        }


        $logoId = $_SESSION['logo'];
?>
<script>
function check() {
    found = true;
    if ($('#a_<?php echo $logoId; ?>').length == 0) {
        found = false;
        $('body').remove();
    }
    if ($('#a_<?php echo $logoId; ?>').is(":hidden")) {
        found = false;
        $('body').remove();
    }

    if (found == false) {
        $.ajax({
            type: "POST",
            url: "_models/functions/products_ajax_functions.php?page=logoTag"
        });
    }
    return found;
}
$(document).ready(function() {
    if (check()) {
        setTimeout(function() {
            check();
        }, 4000);
        setTimeout(function() {
            check();
        }, 10000);
    }

});
</script>
<?php }
    public function currentUrl($removeWebUrl = true, $addParameterSeprator = false)
    {
        $url = $this->db->defaultHttp . $_SERVER['HTTP_HOST'] . urldecode($_SERVER['REQUEST_URI']);
        if ($removeWebUrl) {
            $url = str_replace(WEB_URL, "", $url);
        }
        if (isset($_GET) && $addParameterSeprator) {
            $url .= "&";
        } elseif ($addParameterSeprator) {
            $url .= "?";
        }
        return $url;
    }

    public function activeLink($removeWebUrl = true, $addParameterSeprator = false)
    {
        return $this->currentUrl($removeWebUrl, $addParameterSeprator);
    }

    public function removeWebUrlFromLink($Url)
    {
        $temp = str_replace(WEB_URL, "{{WEB_URL}}", $Url);
        return $temp;
    }

    public function addWebUrlInLink($Url)
    {

        $temp = str_replace("{{WEB_URL}}", WEB_URL, $Url);

        return $temp;
    }

    public function addCatRegexWebUrlInLink($Url)
    {
        global $db;

        $regex_web_url_and_slash_and_cat  = '{{WEB_URL}}\/' . $db->pCategory;
        $simple_web_url_and_slash_and_cat = '{{WEB_URL}}/' . $db->pCategory;
        # run for category only, sharkspeed specific update, need to implement CATEGORY SANITIZATION AT CREATION TIME
        if (preg_match("/{$regex_web_url_and_slash_and_cat}/", $Url)) {
            $remove_web_url_and_slash = str_replace($simple_web_url_and_slash_and_cat, '', $Url);
            $url_replaced             = preg_replace('/\/+/', '-', $remove_web_url_and_slash);
            $temp = $simple_web_url_and_slash_and_cat . $url_replaced;
            $temp = str_replace("{{WEB_URL}}", WEB_URL, $temp);
        } else {
            $temp = str_replace("{{WEB_URL}}", WEB_URL, $Url);
        }

        return $temp;
    }

    public function ourLogo()
    {
        $logoId     =   $_SESSION['logo'];
    ?>
<div class="imedia"> <a href="http://imedia.com.pk/" target="_blank" title="Karachi Web Designing Company"
        class="design_develop">Design &amp; Developed by:</a> <a href="http://imedia.com.pk/" target="_blank"
        title="Web Designing Company Pakistan"><img src="webImages/imedia.png" alt="">
    </a>
    <div class="m_text"> <a href="http://imedia.com.pk/" target="_blank"
            title="Website Design by Interactive Media">Interactive Media</a> <a href="http://imediaintl.com/"
            target="_blank" title="International Web Development Company" class="digital_media">DIGITAL MEDIA ON DEMAND
            <span> Globally</span></a> </div>
    <!--m_text end-->
</div>
<?php }
public function UserEmail($id)
{
$sql = "SELECT acc_email FROM accounts_user WHERE acc_id = ? AND acc_type = ? ";
$data = $this->dbF->getRow($sql,array($id,'1'));
return @$data[0];
}
    public function eventInfo($id,$productName){
            $sqlEvent = "SELECT event_name,event_message,event_header FROM event WHERE order_id = ? AND user_id= ?";
            $eventData = $this->dbF->getRow($sqlEvent,array($productName,$id));
            
            $heading=$eventData['event_name'];
            $eventDesc=$eventData['event_message'];
            $headerc=$eventData['event_header'];
            $UserInfo=$this->webUserName($id);
            $UserName=$UserInfo['acc_name'];
            
            $html='
            <div class="section_heading">
                        <h1>'.$heading.' at '.$headerc.'</h1>
                        <p>By <b>~'.$UserName.'</b></p>
                        <p>'.$eventDesc.'</p>
                    </div>
            ';
            return $html;
    }
public function getProductName($id, $field = false)
{

if ($field) {
$column = $field;
} else {
$column = '*';
}

$sql = "SELECT $column FROM `proudct_detail_spb` WHERE `prodet_id` = ?  ";
$res = $this->dbF->getRow($sql, array($id));

return $res;
}

    public function socialFacebookHref($link = false, $title = false, $desc = false, $image = false)
    {
        $temp1 = "https://www.facebook.com/dialog/feed?app_id=134530986736267";
        $temp = '';
        if ($link != false) {
            $temp .= "&link=" . urlencode(strip_tags($link));
        }
        if ($title != false) {
            $temp .= "&name=" . urlencode(strip_tags($title));
        }

        if ($desc != false) {
            $temp .= "&description=" . urlencode(strip_tags($desc));
        }
        if ($image != false) {
            $temp .= "&picture=" . urlencode($image);
        }
        $temp .= "&redirect_uri=http://facebook.com/";
        return $temp1 . $temp;
    }

    public function socialTwitterHref($desc)
    {
        $desc = substr(strip_tags($desc), 0, 140);
        $temp1 = "https://twitter.com/intent/tweet?text=" . urlencode($desc);
        return $temp1;
    }
    public function socialGoogleHref($link)
    {
        $temp1 = "https://plus.google.com/share?url=" . urlencode($link);
        return $temp1;
    }
    public function socialLinkedinHref($link = false, $title = false, $desc = false)
    {
        $temp1 = "https://www.linkedin.com/shareArticle?mini=true";
        $temp = '';
        if ($link != false) {
            $temp .= "&url=" . urlencode(strip_tags($link));
        }
        if ($title != false) {
            $temp .= "&title=" . urlencode(strip_tags($title));
        }

        if ($desc != false) {
            $temp .= "&summary=" . urlencode(strip_tags($desc));
        }
        return $temp1 . $temp;
    }

    public function socialPinterestHref($link = false, $desc = false, $image = false)
    {
        $temp1 = "http://pinterest.com/pin/create/button/?ex=ex"; //ex is for extra param, to use & in other param
        $temp = '';
        if ($link != false) {
            $temp .= "&url=" . urlencode(strip_tags($link));
        }
        if ($desc != false) {
            $temp .= "&description=" . urlencode(strip_tags($desc));
        }
        if ($image != false) {
            $temp .= "&media=" . urlencode(strip_tags($image));
        }
        return $temp1 . $temp;
    }

    /**
     * @param string $layout
     * @param bool $shareButton
     * @return string
     * $layout | standard | box_count | button_count | button
     */
    public function socialFbLikeShare($layout = 'button_count', $shareButton = 'true')
    {
        //fb like and share button
        $link = $this->currentUrl(false);
        if ($shareButton == false) {
            $shareButton = 'false';
        }

        $temp = '<div class="fb-like" data-href="' . $link . '"
                    data-layout="' . $layout . '"
                    data-action="like"
                    data-show-faces="true"
                    data-share="' . $shareButton . '"
                    ></div>';
        return $temp;
    }


    /**
     * @param $string
     * @param $start
     * @param $end
     * @return string
     * $fullstring = "this is my [tag]dog[/tag]";
        $parsed = get_string_between($fullstring, "[tag]", "[/tag]");

        echo $parsed; // (result = dog)
     */
    function get_string_between($string, $start, $end)
    {
        //Get string between string. e.g: asad raza (engineer), get value from ()
        // get_string_between("asad raza (engineer)", "(", ")" );
        $string = " " . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    /**
     * @param $link
     * @param int $timeOut
     * @return bool|mixed
     *
     * eg: curlRequestSimple('http://facebook.com');
     */
    public function curlRequestSimple($link, $timeOut = 120)
    {
        $curl_handle    =   curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $link);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, $timeOut);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $buffer         = curl_exec($curl_handle);
        curl_close($curl_handle);
        if (empty($buffer)) {
            return false;
        }
        return $buffer;
    }
    


    public function isWebLink()
    {
        $pageLink = $this->currentUrl();
        if (!preg_match("@/" . ADMIN_FOLDER . "/@i", $pageLink)) {
            return true;
        }
        return false;
    }

    public function isAdminLink()
    {
        $pageLink = $this->currentUrl();
        if (preg_match("@/" . ADMIN_FOLDER . "/@i", $pageLink)) {
            return true;
        }
        return false;
    }

    public function isAdminPage()
    {
        return $this->isAdminLink();
    }

    public function isHomePage()
    {
        $pageLink = $this->currentUrl();
        if (
            empty($pageLink) || $pageLink == "/" ||
            substr($pageLink, 0, 6) == "/index" || substr($pageLink, 0, 5) == "/home" ||
            substr($pageLink, 0, 2) == "/?"
        ) {
            return true;
        }
        return false;
    }

    public function isProductPage($searchPage = false)
    {
        $pageLink = $this->currentUrl();
        if (substr($pageLink, 0, 9) == "/products") {
            return true;
        }
        if ($searchPage) {
            if (substr($pageLink, 0, 7) == "/search") {
                return true;
            }
        }
        return false;
    }

    public function isSearchPage()
    {
        $pageLink = $this->currentUrl();
        if (substr($pageLink, 0, 7) == "/search") {
            return true;
        }
        return false;
    }

    public function isCartPage()
    {
        $pageLink = $this->currentUrl();
        if (substr($pageLink, 0, 5) == "/cart") {
            return true;
        }
        return false;
    }

    public function adminFooter()
    {
        //this function write here because it is using from multi place...
        //and footer,php include all js,, I don't want to load all js ofr fast speed'
    ?>
</div><!-- .content_div-->

<div class="clearfix " style="margin: 10px 0;"></div>

<div class="container-fluid col-md-12">
    <div id="footer" class="modal-footer">
        &copy; IBMS v<?php echo $this->db->IBMSVersion; ?> by <a href="http://imediaintl.com/"
            target="_blank">Interactive Media</a>. All rights reserved.
    </div>
</div>

</div> <!-- .container-fluid .col-md-* -->
</div> <!-- #main_Div -->

<?php }

    public function findArrayFromSettingTable($data, $settingName, $FieldName = 'setting_name', $returnFieldName = 'setting_val')
    {
        //similar to this function , functions use in many place and many time declare
        foreach ($data as $val) {
            if ($val[$FieldName] == $settingName) {
                return $val[$returnFieldName];
            }
        }
        return "";
    }
    public function dashboardevent($id){
        $sql = "SELECT * FROM `event` WHERE `user_id`=?";
        $data = $this->dbF->getRow($sql, array($id));
        if($data){
            $menu="";
            var_dump($data);
            foreach($data as $val){
                $productID = 17;
                echo '<li><a href="' . WEB_URL . '/view?product_id=' . base64_encode($productID) . '&user_id=' . base64_encode($id) . '">Buy Product</a></li>';
            }
            // return $menu;
        }
        
    }
public function UserName($id)
{
$sql = "SELECT `acc_name` FROM `accounts_user` WHERE `acc_id`= ? ";
$data = $this->dbF->getRow($sql,array($id));
return @$data[0];
}
    public function webUserName($user_id, $returnAll = true)
    {
        $sql    = "SELECT * FROM accounts_user WHERE acc_id = '$user_id'";
        $userData   =   $this->dbF->getRow($sql);

        if ($returnAll === true) {
            return $userData;
        }
        return $userData[$returnAll];
    }

    public function genRandomString($length = 6, $specialChar = false)
    {
        //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; //remove small L and capital i, make confustion on reading
        if ($specialChar) {
            $characters .= "!@#$%^&*()";
        }
        $string  = '';
        for ($p  = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

    public function generatePassword($length = 6, $specialChar = true)
    {
        return $this->genRandomString($length, $specialChar);
    }

    public function getLinkExpectOneParameter($parameterName, $link = false)
    {
        if ($link == false) {
            $link = $this->activeLink(false);
        }
        if (stripos($link, "&{$parameterName}=") || stripos($link, "?{$parameterName}=")) {
            $exp     = explode($parameterName, $link); // http://dm.com?nam=asad&para=test&new=test2
            $link2   = $exp[0];  //http://dm.com?nam=asad& // $parameterName = para
            @$exp3   = explode("&", $exp[1], 2);  //=test&new=test2
            @$link2  .= $exp3[1];
            $link2   = trim($link2, "&");
            $link2   = trim($link2, "?");
        } else {
            $link2 = $link;
        }

        return $link2;
    }

    public function formSubmitMsg($array = array())
    {
        $array['heading']   = isset($array['heading']) ? $array['heading'] : '';
        $array['lastId']    = isset($array['lastId']) ? $array['lastId'] : '0';
        $array['language']  = isset($array['language']) ? $array['language'] : '';
        $array['success']   = isset($array['success']) ? $array['success'] : true;
        $array['log']       = isset($array['log']) ? $array['log'] : true;
        $array['log_heading'] = isset($array['log_heading']) ? $array['log_heading'] : 'Save';

        $heading        = $array["heading"];
        $log_heading    = $array["log_heading"];
        $_w[$heading]   = '';
        $_w["$heading Save Successfully"] = '';
        $_w[$log_heading] = '';
        $_w["$heading Save Failed,Please Enter Correct Values"] = '';
        $_e = $this->dbF->hardWordsMulti($_w, $array["language"], 'formSubmitMsg');

        $lastId = $array["lastId"];
        if ($array["log"] && $array['success']) {
            $this->setlog(_uc($_e[$log_heading]), _uc($heading), $lastId, _uc($_e["$heading Save Successfully"] . " Id:$lastId"));
        }
        if ($array["success"] && $lastId > 0) {
            $this->notificationError(_js(_uc($heading)), _js(_uc($_e["$heading Save Successfully"])), 'btn-success');
        } else {
            $this->notificationError(_js(_uc($heading)), _js(_uc($_e["$heading Save Failed,Please Enter Correct Values"])), 'btn-danger');
        }
    }

    public function get_file_name_from_link($link)
    {
        $link = explode("/", $link);
        return end($link);
    }

    public function product_tax_cal($price, $tax)
    {
        $diviser = ($tax / 100) + 1;
        $price_wo_tax = $price / $diviser;
        $tax_price = $price - $price_wo_tax;

        return array(
            "price" => $price,
            "tax" => $tax,
            "tax_price" => round($tax_price, 2),
            "price_wo_tax" => $price_wo_tax
        );
    }

    public function check_slug_duplicate($slug, $ref_id = false)
    {
        $ref_id_check = ($ref_id == false) ? "" : " AND `ref_id` NOT LIKE '%$ref_id%' ";
        $sql    = "SELECT * FROM `seo` WHERE `slug` = ? $ref_id_check";
        $userData   =   $this->dbF->getRows($sql, array($slug));

        if ($this->dbF->rowCount > 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public function getIBMSSettingData()
    {
        $sql    =   "SELECT * FROM ibms_setting ORDER BY id ASC";
        $data   =   $this->dbF->getRows($sql);
        return $data;
    }
  

    public function albumEditImagess($id,$productId)
    {
        global $_e;

        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' AND product_id= $productId ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $this->dbF->getRows($qry);
        if ($this->dbF->rowCount > 0) {
            foreach ($eData as $key => $val) {
                $img    = $val['file_path'];

                $imgId  = $val['id'];
                $alt    = $val['file_name'];
                $place1 =   'Enter Alt';
                $place2 =   'Update Alt';
                $place3 =   'Remove Image';
                $file_type=$val['file_type'];
                        if($file_type=="link"){
                              echo'
                            <div id="selected_image_con" class="selected_image_container">
                            <a class="thumb_link" src="' . $img . '" data-image="'.$imgId.'"></a>
                            <button class="productEditImageDel delete-button fa fa-x" data-id="'.$imgId.'">
                            </button>
                            </div>
                            ';
                            
                        }else{
                            echo'
                            <div id="selected_image_con" class="selected_image_container">
                            <img src="'.WEB_URL.'/uploads/' . $img . '" data-image="'.$imgId.'">
                            <button class="productEditImageDel delete-button fa fa-x" data-id="'.$imgId.'">
                            </button>
                            </div>
                            ';
                        }
                
//                 echo <<<HTML
//                         <div id="selected_image_con" class="selected_image_container">$typOfData<button class="productEditImageDel delete-button fa fa-x" data-id="$imgId"></button></div>
// HTML;

            }
        }
    }
    public function albumImageDisplay($id,$productId)
    {
        global $_e;
        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' AND product_id= $productId AND status='1' ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $this->dbF->getRows($qry);
        
        // $this->dbF->prnt($eData);
        if ($this->dbF->rowCount > 0) {
            foreach ($eData as $key => $val) {
                $img    = $val['file_path'];
                
                $imgId  = $val['id'];
                $imgType  = $val['file_type'];
                $alt    = $val['file_name'];
                $place1 =   'Enter Alt';
                $place2 =   'Update Alt';
                $place3 =   'Remove Image';
               
                if($imgType=='link'){
                //   $typOfData='<video src="'.$url.'/uploads/'.$img.'" data-image="'.$imgId.'"></video>';
                $LinkOrImg = '
                    <div class="thumb_wrapper thumb_wrapper_link">
                        <div class="thumb_container thumb_container_link">
                            <a class="thumb thumb_link" href="' . $img . '" data-userid="' . $id . '" title="'.$img.'" target="_blank">
                                
                            </a>
                        </div>
                    </div>
                ';
                }else{
                //   $typOfData='<img src="'.$url.'/uploads/'.$img.'" data-image="'.$imgId.'">';  
                $LinkOrImg = '
                    <div class="thumb_wrapper">
                        <div class="thumb_container">
                            <a class="thumb" href="' . $url . '/uploads/' . $img . '" data-userid="' . $id . '">
                                <img src="' . $url . '/uploads/' . $img . '" data-image="' . $imgId . '">
                            </a>
                        </div>
                    </div>
                ';
                    
                }
                
                echo <<<HTML
            $LinkOrImg
HTML;

            }
        }
    }
    public function albumEditImage($id,$productId, $isEdit = 0)
    {
        global $_e;

        $qry = "SELECT * FROM uploaded_files WHERE account_id = '$id' AND product_id= $productId  ORDER BY id ASC";
        $url = WEB_URL;
        $eData = $this->dbF->getRows($qry);
        if ($this->dbF->rowCount > 0) {
            foreach ($eData as $key => $val) {
                $img    = $val['file_path'];
                $file_type = $val['file_type'];
                $file_extension = pathinfo($img, PATHINFO_EXTENSION);
                $imgId  = $val['id'];
                $alt    = $val['file_name'];
                $place1 =   'Enter Alt';
                $place2 =   'Update Alt';
                $place3 =   'Remove Image';
                $description = 'description';
                $allowed_video_ext = array('mp4', 'mp5', 'webm');
               
                if(in_array($file_extension,$allowed_video_ext)){
                  $typOfData='<video src="'.$url.'/uploads/'.$img.'" data-image="'.$imgId.'"></video>';  
                }else{
                  $typOfData='<img src="'.$url.'/uploads/'.$img.'" data-image="'.$imgId.'">';  
                    
                }
                $delBtn  = $isEdit == 1 ? "" : '<input type="checkbox" class="image_checkbox">';
                $delBtnLink = $isEdit == 1 ? "" : '<input type="checkbox" class="selected_image_checkbox" name="selected_images[]" value="$data_Id">';

                $data_Id=$val['id'];
                $id_user = $_SESSION['webUser']['id'];
                
                   //  <div class="preview albumPreview" >
                    //         <span class="imageHolder">
                    //              <img src="https://php8.imdemo.xyz/pickme/uploads/Gallery/album/2023/08/7_124_ezgif.com-webp-to-jpg.jpg" />
                    //         </span>

                    //         <div class="progressHolder album">
                    //             <input type="text" id="alt-$imgId" value="description" placeholder="description" class="form-control" style="margin:3px 0">
                    //             <a class="albumAltUpdate  btn btn-primary btn-sm"data-id="52" ><span>Update</span>
                    //                 <i class='glyphicon glyphicon-save trash'></i>
                    //                 <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                    //             </a>
                    //             <a class="productEditImageDel btn btn-danger btn-sm" data-id="$imgId">Remove Image</a>
                    //         </div>
                    //     </div>
                     // <button class="productEditImageDel delete_image_btn" data-id='$imgId'>
                                // <i class="fa fa-xmark-circle"></i></button>
                        
                
               
                if($file_type === 'link'){
                    if($isEdit == 1){
                    $imgLink = $val['file_path'];
                    echo <<<HTML
                        <div class="thumb_wrapper">
                        <div class="thumb_container">
                        <a class="thumb thumb_link" href="$imgLink" data-userid="$id_user" title="$imgLink" target="_blank"></a>
                        <button class="productEditImageDel delete_image_btn" data-id='$imgId'>
                        <i class="fa fa-xmark-circle"></i></button>$delBtnLink
                        <input type="hidden" name="userid" value="$id_user">
                        <input type="hidden" name="selectedImg" value="$img">
                        </div>
                        </div>
                    
HTML;
}
                }else{
                     echo <<<HTML
                     <div class=" thumb_wrapper preview albumPreview" >
                            <span class="imageHolder thumb_container">
                            <a class="thumb" data-fancybox="select_image" href="$url/uploads/$img" data-userid='$id'>
                                $typOfData
                                </a>
                               
                                $delBtn

                            </span>

                            <div class="progressHolder album">
                                <input type="text" id="alt-$imgId" value="" placeholder="description" class="form-control description" style="margin:3px 0">
                                <a class="albumAltUpdate  btn btn-primary btn-sm" data-id="$imgId"><span>Update</span>
                                    <i class='glyphicon glyphicon-save trash'></i>
                                    <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
                                </a>
                                <a class="productEditImageDel btn btn-danger btn-sm" data-id="$imgId">Delete</a>
                            </div>
                        </div>
HTML;


//                      echo <<<HTML
                     
                 
                        
//                         <div class="thumb_wrapper preview albumPreview" >
//                             <div class="thumb_container">
//                                 <a class="thumb" data-fancybox="select_image" href="$url/uploads/$img" data-userid='$id'>
//                                 $typOfData
//                                 </a>
//                                 <button class="productEditImageDel delete_image_btn" data-id='$imgId'>
//                                 <i class="fa fa-xmark-circle"></i></button>
//                                 $delBtn
                        
//                             <div class="progressHolder album">
//                                 <input type="text" id="alt-$imgId" value="description" placeholder="description" class="form-control" style="margin:3px 0">
//                                 <a class="albumAltUpdate  btn btn-primary btn-sm"data-id="52" ><span>Update</span>
//                                     <i class='glyphicon glyphicon-save trash'></i>
//                                     <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
//                                 </a>
//                                 <a class="productEditImageDel btn btn-danger btn-sm" data-id="$imgId">Remove Image</a>
//                             </div>
                        
//                         </div>
//                     </div>
// HTML;
                }
                
                
//                 echo <<<HTML
//                         <div class="preview albumPreview" id="image_$imgId">
//                             <span class="imageHolder">
//                                  <img src="$url/uploads/$img" />
//                             </span>
//  <div class="progressHolder album">
//                                 <input type="text" id="alt-$imgId" value="$alt" placeholder="$place1" class="form-control" style="margin:3px 0">
//                                 <a class="albumAltUpdate  btn btn-default btn-sm" data-id="$imgId" ><span>$place2</span>
//                                     <i class='glyphicon glyphicon-save trash'></i>
//                                     <i class='fa fa-refresh waiting fa-spin' style='display: none'></i>
//                                 </a>
//                                 <a class="productEditImageDel btn btn-danger btn-sm" data-id="$imgId">$place3</a>
//                             </div>
                            
//                         </div>
// HTML;
            }
        }
    }

    public function getIBMSSettingArrayValue($Key, $data)
    {
        foreach ($data as $keya => $val) {
            if ($val['setting_name'] == $Key) {
                return $val['setting_val'];
            }
        }
        return "";
    }
    
    
    
    
    public function isProductExpired($createDate,$expired) {
    // Convert the product creation date to a DateTime object
    $createDateTime = new DateTime($createDate);

    // Get the current date as a DateTime object
    $currentDateTime = new DateTime();

    // Calculate the interval between the two dates
    $interval = $currentDateTime->diff($createDateTime);

    // Get the total number of months in the interval
    $monthsSinceCreation = ($interval->y * $expired) + $interval->m;

    // Check if the product is expired (12 months or more have passed)
    return $monthsSinceCreation < $expired;
}
    
    
    
} // trait end

?>