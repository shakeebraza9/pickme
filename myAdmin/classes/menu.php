<?php



class menu extends object_class

{

    //If you want to hide menu for this Website, use

    //$this->checkActive('Dashboard','name',false) false in 2nd parameter in functions

    //same as subMenu functions



    public function __construct()
    {

        parent::__construct('3');

        global $_e;

        global $adminPanelLanguage;



        //Main Menu List

        $_w = array();
        $_w['Product QTY Statistics'] = '';
        $_w['Dashboard'] = '';

        $_w['Products'] = '';
        $_w['Visiting Customers'] = '';

        $_w['Stock Management'] = '';

        $_w['Order Management'] = '';

        $_w['Statics'] = '';

        $_w['Shipping Management'] = '';

        $_w['Menu'] = '';
        $_w['Add New Orders'] = '';


        $_w['Sort Products Image'] = '';
        $_w['All Forms Data'] = '';
        $_w['Forms Data'] = '';


        $_w['Recommended Products'] = '';

        $_w['Logs Management'] = '';

        $_w['Pages'] = '';

        $_w['News & Events'] = '';

        $_w['Banners'] = '';

        $_w['Brands'] = '';

        $_w['Media'] = '';

        $_w['SEO Management'] = '';

        $_w['Setting'] = '';

        $_w['Email Management'] = '';

        $_w['Users'] = '';

        $_w['Blog'] = '';

        $_w['Collapse Menu'] = '';

        $_w['Best Seller'] = '';

        $_w['New Statistics'] = '';





        //Main Menu List End



        //SubMenu List

        $_w['Product View'] = '';

        $_w['Product Sort'] = '';

        $_w['Add New Product'] = '';

        $_w['Product Discount'] = '';

        $_w['Product Whole Sale'] = '';

        $_w['Product Coupon'] = '';

        $_w['Manage Currency'] = '';

        $_w['Manage Scales'] = '';

        $_w['Manage Color'] = '';

        $_w['Manage Category'] = '';

        $_w['View Stock Product'] = '';

        $_w['Purchase Receipt'] = '';

        $_w['Store Location'] = '';

        $_w['Import/Export'] = '';

        $_w['Orders'] = '';

        $_w['Shipping By Weight'] = '';

        $_w['Shipping By Class'] = '';

        $_w['Main Menu'] = '';

        $_w['Footer Menu'] = '';

        $_w['Defect Archive'] = '';

        $_w['Defect Register'] = '';

        $_w['Return Archive'] = '';

        $_w['Product Return Form'] = '';

        $_w['Product Defect Form'] = '';

        $_w['Pages'] = '';

        $_w['New Page'] = '';

        $_w['Product View'] = '';

        $_w['Imgaes Product'] = '';

        $_w['Home Page'] = '';

        $_w['News & Events'] = '';

        $_w['News'] = '';

        $_w['Add News'] = '';

        $_w['Banners'] = '';

        $_w['Brands'] = '';

        $_w['Media'] = '';

        $_w['Gallery'] = '';

        $_w['Images'] = '';

        $_w['Files'] = '';
        $_w['Assign Product'] = '';

        $_w['SEO'] = '';

        $_w['IBMS Setting'] = '';

        $_w['History'] = '';

        $_w['Account'] = '';

        $_w['Translate Language'] = '';

        $_w['Subscribe Emails'] = '';

        $_w['News Letter'] = '';

        $_w['Products List'] = '';

        $_w['Emails Content'] = '';

        $_w['Users'] = '';

        $_w['Admin Users'] = '';

        $_w['Admin Group'] = '';

        $_w['Web Users'] = '';

        $_w['Blog'] = '';

        $_w['Collapse Menu'] = '';

        $_w['Reviews'] = '';
        $_w['Shop Selling'] = '';

        $_w['Questions'] = '';

        $_w['File Manager'] = '';

        $_w['Testimonial'] = '';

        $_w['Measurement'] = '';

        $_w['Deal Product'] = '';

        $_w['Gift Card Management'] = '';

        $_w['Gift Card'] = '';

        $_w['All In One Product Returns'] = '';

        $_w['Emails in Waiting'] = '';

        $_w['View Emails'] = '';

        $_w['Table View'] = '';

        $_w['Create Insertions'] = '';
        $_w['Invoice List'] = '';

        $_w['List View'] = '';

        $_w['Manage Categories'] = '';
        $_w['Captivate Gallery'] = '';
        $_w['Gallery'] = '';

        $_w['Product Statistics'] = '';
        $_w['Delivery Note'] = '';
        $_w['Inventory Adjustment Note'] = '';
        $_w['Goods Transfer Note in'] = '';
        $_w['Goods Transfer Note'] = '';


$_w['Products']= '';
$_w['Product View']= '';
$_w['Product Coupon']= '';
$_w['Add New Product']= '';





        //SubMenu List End



        $_e    =   $this->dbF->hardWordsMulti($_w, $adminPanelLanguage, 'AdminMenu');



        //Files Modification restriction here

        $md5PageStatus = $this->functions->checkCurrentFileMd5();

        if ($md5PageStatus == false) {

            $md5PageStatus = $this->functions->checkCurrentFileMd5(true);

            echo "Your Page is modified and cant Be show,

                        Please Undo your changing in files. If you want to modify any changes, please contact to Imedia. <br>";

            //find Actual File Where edit made

            exit;
        }

        //check developer Setting

        if (isset($_SESSION['admin']['setting'])) {

            //making secure session

            if ($_SESSION['admin']['setting'] != '1' && isset($_SESSION['admin']['settingStatus'])) {

                echo "Developer Setting table value is change, please Undo Your Changes to continue.";

                exit;
            } elseif ($_SESSION['admin']['setting'] == '0') {

                $_SESSION['admin']['setting'] = '1';

                $_SESSION['admin']['settingStatus'] = 'ok';
            }
        } else {

            $developerSetting = $this->functions->encryptDeveloperSetting();

            if ($developerSetting) {

                $_SESSION['admin']['setting'] = uniqid();
            } else {

                echo "Developer Setting table value is change, please Undo Your Changes to continue.";

                exit;
            }
        }

        //Files Modification restriction here End



    }



    public $AutoVisibleMenu;

    public $AutoVisibleMenuLink;

    public $AutoVisibleMenuName;

    public $parentMenu;



    public function autoVisibleMenuArray()
    {

        $this->menu();

        return $this->AutoVisibleMenu;
    }



    public function visibleForThisProject()
    {

        //Not in use

        global $_e;
    }



    /*

     * menu

     * dropDown icon <span class="fa fa-chevron-down drop_menu"></span>

     * after dropDown ul <span class="fa fa-caret-left collapse_icon"></span>

     *

     * */

    public function menu()

    {

        global $_e;

        $this->AutoVisibleMenu = null;

        $this->AutoVisibleMenuLink = null;

        $this->AutoVisibleMenuName = null;

        return '



        <div id="IBMS_Menu" class="">

        <ul>

            <li class="' . $this->checkActive('Dashboard', 'Dashboard') . '">

                <a href="index.php"><h3><span class="fa fa-tachometer icon"></span> <span class="menu_h3">' . $_e['Dashboard'] . '</span></h3></a>

            </li>

            <li class="' . $this->checkActive('product', 'Products',false) . '">

                <h3><span class="fa fa-cube icon"></span><span class="menu_h3">' . $_e['Products'] . '</span> <span class="fa fa-chevron-down drop_menu"></span> </h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('Product View', '-product?page=list') . '><a href="-product?page=list">' . $_e['Product View'] . '</a></li>

                    <li ' . $this->checkSubMenu('New Product', '-product?page=add') . '><a href="-product?page=add">' . $_e['Add New Product'] . '</a></li>
                    
                             
                    <li ' . $this->checkSubMenu('Sort Products Image', '-product?page=update') . '><a href="-product?page=update">' . $_e['Sort Products Image'] . '</a></li>
                    
                    
                    

                    <li ' . $this->checkSubMenu('Deal Product', '-productDeal?page=deal') . '><a href="-productDeal?page=deal">' . $_e['Deal Product'] . '</a></li>



                    <li></li>

                    <li class="text-center disabled">' . $_e['Setting'] . '<a></a></li>

                    <li></li>



                    <li ' . $this->checkSubMenu('Product Sort', '-product?page=sort') . '><a href="-product?page=sort">' . $_e['Product Sort'] . '</a></li>

                    <li ' . $this->checkSubMenu('Manage Currency', '-product_management?page=currency', true) . '><a href="-product_management?page=currency">' . $_e['Manage Currency'] . '</a></li>

                    <li ' . $this->checkSubMenu('Manage Scales', '-product_management?page=scale', false) . '><a href="-product_management?page=scale">' . $_e['Manage Scales'] . '</a></li>

                    <li ' . $this->checkSubMenu('Manage Color', '-product_management?page=color', false) . '><a href="-product_management?page=color">' . $_e['Manage Color'] . '</a></li>

                    

                    <li ' . $this->checkSubMenu('managecat', "-categories?page=managecat") . '><a href="-categories?page=managecat">' . $_e['Manage Categories'] . '</a></li>

                    <li ' . $this->checkSubMenu('Product Discount', '-product?page=pDiscount') . '><a href="-product?page=pDiscount">' . $_e['Product Discount'] . '</a></li>

                    <li ' . $this->checkSubMenu('Product Sale', '-product?page=pSale', false) . '><a href="-product?page=pSale">' . $_e['Product Whole Sale'] . '</a></li>

                    <li ' . $this->checkSubMenu('Product Coupon', '-product?page=pCoupon') . '><a href="-product?page=pCoupon">' . $_e['Product Coupon'] . '</a></li>

                    <li ' . $this->checkSubMenu('Measurement', '-measurement?page=measurement', false) . '><a href="-measurement?page=measurement">' . $_e['Measurement'] . '</a></li>

                    <li ' . $this->checkSubMenu('bestsellers', '-bestseller?page=bestsellers', true) . '><a href="-bestseller?page=bestsellers">' . $_e['Best Seller'] . '</a></li>
                  
                  
<li ' . $this->checkSubMenu('recommendss', '-recommends?page=recommendss', true) . '><a href="-recommends?page=recommendss">' . $_e['Recommended Products'] . '</a></li>
                  
                    <li ' . $this->checkSubMenu('impExp', '-productPortation?page=csv', true) . '><a href="-productPortation?page=csv">' . $_e['Import/Export'] . '</a></li>

                </ul>

            </li>

<li class="' . $this->checkActive('product_spb','Shop Products') . '">
                <h3><span class="fa fa-cube icon"></span><span class="menu_h3">Shop ' . $_e['Products'].'</span> <span class="fa fa-chevron-down drop_menu" style="font-size:12px;"></span> </h3>
                <ul>
                    <span class="fa fa-caret-left collapse_icon"></span>
                    <li ' . $this->checkSubMenu('Product View','-product_spb?page=list') . '><a href="-product_spb?page=list">' . $_e['Product View'] .'</a></li>
                    <li ' . $this->checkSubMenu('New Product','-product_spb?page=add') . '><a href="-product_spb?page=add">' . $_e['Add New Product'] .'</a></li>
                    

                   

                    
                    <li ' . $this->checkSubMenu('Product Coupon','-product_spb?page=pCoupon',false) . '><a href="-product_spb?page=pCoupon">' . $_e['Product Coupon'] .'</a></li>
                 
                </ul>
            </li>





           <li class="' . $this->checkActive('stock', 'Stock Management', false) . '">

                <h3><span class="fa fa-cubes icon"></span><span class="menu_h3">' . $_e['Stock Management'] . '</span>

                    <span class="fa fa-chevron-down drop_menu"></span>

                </h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('inventory', '-stock?page=inventory') . '><a href="-stock?page=inventory">' . $_e['View Stock Product'] . '</a></li>

                    <li ' . $this->checkSubMenu('purchase receipt', '-stock?page=purchaseReceipt') . '><a href="-stock?page=purchaseReceipt">' . $_e['Purchase Receipt'] . '</a></li>
                     <li ' . $this->checkSubMenu('goods transfer note', '-stock?page=goodstransfernote') . '><a href="-stock?page=goodstransfernote">' . $_e['Goods Transfer Note'] . '</a></li>
                   
                    <li ' . $this->checkSubMenu('inventory adjustment note', '-stock?page=inventoryadjustmentnote') . '><a href="-stock?page=inventoryadjustmentnote">' . $_e['Inventory Adjustment Note'] . '</a></li>
                    <li ' . $this->checkSubMenu('inventory valuation', '-stock?page=inventoryvaluation') . '><a href="-stock?page=inventoryvaluation">Inventory Valuation</a></li>
                    <li ' . $this->checkSubMenu('inventory in out', '-stock?page=inventoryinout') . '><a href="-stock?page=inventoryinout">Inventory In Out</a></li>
                    <li ' . $this->checkSubMenu('add store', '-stock?page=addStore') . '><a href="-stock?page=addStore">' . $_e['Store Location'] . '</a></li>

                    <li ' . $this->checkSubMenu('Import/Export', '-stock?page=csv') . '><a href="-stock?page=csv">' . $_e['Import/Export'] . '</a></li>

                </ul>

            </li>
            
                        <li class="' . $this->checkActive('orderManagements','Order Management') . '">
                <h3><span class="fa fa-shopping-cart icon"></span><span class="menu_h3">' . $_e['Order Management'] .'</span>
                 <span class="fa fa-chevron-down drop_menu"></span></h3>
                <ul>
                    <span class="fa fa-caret-left collapse_icon"></span>
                    <li ' . $this->checkSubMenu('newOrder','-order_spb?page=newOrder') . '><a href="-order_spb?page=newOrder">' . $_e['Orders'] .'</a></li> 

                    <li ' . $this->checkSubMenu('invoicelist','-order_spb?page=invoicelist') . '><a href="-order_spb?page=invoicelist">' . $_e['Invoice List'] .'</a></li>


                    <li ' . $this->checkSubMenu('reports',"-order_spb?page=reports",false) . '><a href="-order_spb?page=reports">View Reports</a></li>




                </ul>
            </li>
            
            
            



            <li class="' . $this->checkActive('orderManagement', 'Order Management',false) . '">

                <h3><span class="fa fa-shopping-cart icon"></span><span class="menu_h3">' . $_e['Order Management'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('newOrder', '-order?page=newOrder') . '><a href="-order?page=newOrder">' . $_e['Orders'] . '</a></li>
                    
                    <li ' . $this->checkSubMenu('Import/Export', '-order?page=csv') . '><a href="-order?page=csv">' . $_e['Import/Export'] . '</a></li>



                     <li ' . $this->checkSubMenu('Denied Order', '-order?page=visiting', false) . '><a href="-order?page=visiting">' . $_e['Visiting Customers'] . '</a></li>





                </ul>

            </li>

    <li class="' . $this->checkActive('adminorderManagement', 'Shop Selling', false) . '">

                <h3><span class="fa fa-shopping-cart icon"></span><span class="menu_h3">' . $_e['Shop Selling'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('newOrder', '-adminorder?page=newOrder') . '><a href="-adminorder?page=newOrder">' . $_e['Add New Orders'] . '</a></li>
                    
                    

                </ul>

            </li>


            <li class="' . $this->checkActive('statics', 'Statics',false) . '">

                <h3><span class="fa fa-bar-chart-o icon"></span><span class="menu_h3">' . $_e['Statics'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('statics', "-statics?page=statics") . '><a href="-statics?page=statics">' . @$_e['Statics'] . '</a></li>

                </ul>

            </li>
            <li class="' . $this->checkActive('imgaesproduct', 'imgaesproduct') . '">

                <h3><span class="fa fa-bar-chart-o icon"></span><span class="menu_h3">' . $_e['Assign Product'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('imgaesproduct', "-imgaesproduct?page=imgaesproduct") . '><a href="-imgaesproduct?page=imgaesproduct">' . @$_e['Product View'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('statisticM', 'New Statistics',false) . '">

                <h3><span class="fa fa-bar-chart-o icon"></span><span class="menu_h3">' . $_e['New Statistics'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('statistic', "-statistic?page=statistics") . '><a href="-statistic?page=statistics">' . $_e['List View'] . '</a></li>

                    <li ' . $this->checkSubMenu('statistics_table_view', "-statistic?page=statistics_table_view") . '><a href="-statistic?page=statistics_table_view">' . $_e['Table View'] . '</a></li>

                    <li ' . $this->checkSubMenu('statistics_insertions_view', "-statistic?page=statistics_insertions", false) . '><a href="-statistic?page=statistics_insertions">' . $_e['Create Insertions'] . '</a></li>

                    <li ' . $this->checkSubMenu('produt_statistics', "-product_stats?page=statistics", true) . '><a href="-product_stats?page=statistics">' . $_e['Product Statistics'] . '</a></li>
  <li ' . $this->checkSubMenu('produt_qty_statistics', "-product_qty_stats?page=statistics_qty", true) . '><a href="-product_qty_stats?page=statistics_qty">' . $_e['Product QTY Statistics'] . '</a></li>
                </ul>

            </li>





            <li class="' . $this->checkActive('shippingManagement', 'Shipping Management',false) . '">

                <h3><span class="fa fa-truck icon"></span><span class="menu_h3">' . $_e['Shipping Management'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('shipping by weight', "-shipping?page=shipping", false) . '><a href="-shipping?page=shipping">' . @$_e['Shipping By Weight'] . '</a></li>

                    <li ' . $this->checkSubMenu('shipping by class', "-shipping?page=shippingByClass") . '><a href="-shipping?page=shippingByClass">' . @$_e['Shipping By Class'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('webMenuM', 'Menu') . '">

                <h3><span class="fa fa-navicon icon"></span><span class="menu_h3">' . $_e['Menu'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('menu', "-menu?page=menu") . '><a href="-menu?page=menu">' . $_e['Main Menu'] . '</a></li>

                    <li ' . $this->checkSubMenu('footerMenu', "-menu?page=footerMenu") . '><a href="-menu?page=footerMenu">' . $_e['Footer Menu'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('logs', 'Logs Management', false) . '">

                <h3><span class="fa fa-bug icon"></span><span class="menu_h3">' . $_e['Logs Management'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('defectArchive', "-logs?page=defectArchive") . '><a href="-logs?page=defectArchive">' . $_e['Defect Archive'] . '</a></li>

                    <li ' . $this->checkSubMenu('defectReg', "-logs?page=defectReg") . '><a href="-logs?page=defectReg">' . $_e['Defect Register'] . '</a></li>

                    <li ' . $this->checkSubMenu('returnReg', "-logs?page=returnReg") . '><a href="-logs?page=returnReg">' . $_e['Return Archive'] . '</a></li>

                    <li ' . $this->checkSubMenu('productReturn', "-logs?page=productReturn") . '><a href="-logs?page=productReturn">' . $_e['Product Return Form'] . '</a></li>

                    <li ' . $this->checkSubMenu('productDefect', "-logs?page=productDefect") . '><a href="-logs?page=productDefect">' . $_e['Product Defect Form'] . '</a></li>

                    <li ' . $this->checkSubMenu('all_returns', "-logs?page=all_returns") . '><a href="-logs?page=all_returns">' . $_e['All In One Product Returns'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('pages', 'Pages') . '">

                <h3><span class="fa fa-file-text icon"></span><span class="menu_h3">' . $_e['Pages'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('page', "-pages?page=page") . '><a href="-pages?page=page">' . $_e['Pages'] . '</a></li>

                    <li ' . $this->checkSubMenu('pageNew', "-pages?page=pageNew") . '><a href="-pages?page=pageNew">' . $_e['New Page'] . '</a></li>

                    <li ' . $this->checkSubMenu('homePage', "-pages?page=homePage") . '><a href="-pages?page=homePage">' . $_e['Home Page'] . '</a></li>

                    <li ' . $this->checkSubMenu('brands', "-brands?page=brands", false) . '><a href="-brands?page=brands">' . $_e['Brands'] . '</a></li>

                    <li ' . $this->checkSubMenu('fileManager', "-fileManager?page=fileManager", false) . '><a href="-fileManager?page=fileManager">' . $_e['File Manager'] . '</a></li>

                    <li ' . $this->checkSubMenu('testimonial', "-testimonial?page=testimonial", false) . '><a href="-testimonial?page=testimonial">' . $_e['Testimonial'] . '</a></li>

                 </ul>

            </li>



            <li class="' . $this->checkActive('newsM', 'News & Events', false) . '">

                <h3><span class="fa fa-clipboard icon"></span><span class="menu_h3">' . $_e['News & Events'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('news', "-news?page=news") . '><a href="-news?page=news">' . $_e['News'] . '</a></li>

                    <li ' . $this->checkSubMenu('addNews', "-news?page=addNews") . '><a href="-news?page=addNews">' . $_e['Add News'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('bannersM', 'Banners') . '">

                <h3><span class="fa fa-image icon"></span><span class="menu_h3">' . $_e['Banners'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('banners', "-banners?page=banners") . '><a href="-banners?page=banners">' . $_e['Banners'] . '</a></li>

                </ul>

            </li>
            <li class="' . $this->checkActive('captivategallery', 'captivategallery') . '">

                <h3><span class="fa fa-image icon"></span><span class="menu_h3">' . $_e['Captivate Gallery'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('captivategallery', "-captivategallery?page=captivategallery") . '><a href="-captivategallery?page=captivategallery">' . $_e['Gallery'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('emailin_waitingM', 'emailin_waiting', false) . '">

                <h3><span class="fa fa-image icon"></span><span class="menu_h3">' . $_e['Emails in Waiting'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('emailin_waiting', "-emailin_waiting?page=emailin_waiting") . '><a href="-emailin_waiting?page=emailin_waiting">' . $_e['View Emails'] . '</a></li>

                </ul>

            </li>



           </li>
                
                <li class="' . $this->checkActive('faqM','FAQ',false) . '">
                <h3><span class="fa fa-image icon"></span><span class="menu_h3">' . 'FAQ' .'</span>
                 <span class="fa fa-chevron-down drop_menu"></span></h3>
                <ul>
                    <span class="fa fa-caret-left collapse_icon"></span>
             <li ' . $this->checkSubMenu('faq',"-faq?page=faq") . '><a href="-faq?page=faq">' . 'FAQ Add' .'</a></li>
         <!--- <li ' . $this->checkSubMenu('faq',"-faq?page=edit") . '><a href="-faq?page=edit">' . 'FAQ View' .'</a></li>--->
                </ul>
            </li>

            <li class="' . $this->checkActive('galleryM', 'Media', true) . '">

                <h3><span class="fa fa-image icon"></span><span class="menu_h3">' . $_e['Media'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                     <li ' . $this->checkSubMenu('gallery', "-gallery?page=gallery", true) . '><a href="-gallery?page=gallery">' . $_e['Gallery'] . '</a></li>

                     <li ' . $this->checkSubMenu('Images', "editor/kcfinder/browse.php?type=images",false) . '><a onclick="openWin(\'editor/kcfinder/browse.php?type=images\')">' . $_e['Images'] . '</a></li>

                     <li ' . $this->checkSubMenu('Files', "editor/kcfinder/browse.php?type=files",false) . '><a onclick="openWin(\'editor/kcfinder/browse.php?type=files\')">' . $_e['Files'] . '</a></li>

                </ul>

            </li>
            <li class="' . $this->checkActive('FormDataM','Forms Data') . '">
                <h3><span class="fa fa-clipboard icon"></span><span class="menu_h3">' . $_e['Forms Data'] .'</span>
                 <span class="fa fa-chevron-down drop_menu"></span></h3>
                <ul>
                    <span class="fa fa-caret-left collapse_icon"></span>
                    <li ' . $this->checkSubMenu('formM',"-formData?page=all_forms") . '><a href="-formData?page=all_forms">' . $_e['All Forms Data'] .'</a></li>
                </ul>
            </li>


            <li class="' . $this->checkActive('seoM', 'SEO Management', false) . '">

                <h3><span class="fa fa-globe icon"></span><span class="menu_h3">' . $_e['SEO Management'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('seo', "-seo?page=seo") . '><a href="-seo?page=seo">' . $_e['SEO'] . '</a></li>

                </ul>

            </li>



             <li class="' . $this->checkActive('giftCardM', 'Gift Card Management', false) . '">

                <h3><span class="fa fa-gift icon"></span><span class="menu_h3">' . $_e['Gift Card Management'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('giftCard', "-giftcard?page=giftCard") . '><a href="-giftcard?page=giftCard">' . $_e['Gift Card'] . '</a></li>

                </ul>

            </li>



           <li class="' . $this->checkActive('adminSetting', 'Setting') . '">

                <h3><span class="fa fa-gears icon"></span><span class="menu_h3">' . $_e['Setting'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('IBMSSetting', '-setting?page=IBMSSetting') . '><a href="-setting?page=IBMSSetting">' . $_e['IBMS Setting'] . '</a></li>

                    <li ' . $this->checkSubMenu('history', "-setting?page=history") . '><a href="-setting?page=history">' . $_e['History'] . '</a></li>

                    <li ' . $this->checkSubMenu('account', "-setting?page=account") . '><a href="-setting?page=account">' . $_e['Account'] . '</a></li>

                    <li ' . $this->checkSubMenu('hardWords', "-setting?page=hardWords",false) . '><a href="-setting?page=hardWords">' . $_e['Translate Language'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('emailM', 'Subscribe Email', false) . '">

                <h3><span class="fa fa-envelope icon"></span><span class="menu_h3">' . $_e['Email Management'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('email', "-email?page=email") . '><a href="-email?page=email">' . $_e['Subscribe Emails'] . '</a></li>



                    <!-- For Stop News Letter, make false on both, news letter and all product info -->

                    <li ' . $this->checkSubMenu('newsLetter', "-email?page=newsLetter", true) . '><a href="-email?page=newsLetter">' . $_e['News Letter'] . '</a></li>

                    <li ' . $this->checkSubMenu('allProductsInfo', "-product?page=allProductsInfo", false) . '><a href="-product?page=allProductsInfo">' . $_e['Products List'] . '</a></li>

                    <li ' . $this->checkSubMenu('emailContent', "-email?page=emailMsg") . '><a href="-email?page=emailContent">' . $_e['Emails Content'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('webUserM', 'Users') . '">

                <h3><span class="fa fa-users icon"></span><span class="menu_h3">' . $_e['Users'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('AdminUsers', "-webUsers?page=AdminUsers", false) . '><a href="-webUsers?page=AdminUsers">' . $_e['Admin Users'] . '</a></li>

                    <li ' . $this->checkSubMenu('AdminGrp', "-webUsers?page=AdminGrp", false) . '><a href="-webUsers?page=AdminGrp">' . $_e['Admin Group'] . '</a></li>

                    <li ' . $this->checkSubMenu('webUser', "-webUsers?page=view") . '><a href="-webUsers?page=view">' . $_e['Web Users'] . '</a></li>

                    <li ' . $this->checkSubMenu('reviews', "-webUsers?page=reviews", true) . '><a href="-webUsers?page=reviews">' . $_e['Reviews'] . '</a></li>

                    <li ' . $this->checkSubMenu('questions', "-webUsers?page=questions", false) . '><a href="-webUsers?page=questions">' . $_e['Questions'] . '</a></li>

                </ul>

            </li>



            <li class="' . $this->checkActive('blogM', 'Blog', false) . '">

                <h3><span class="fa fa-rss icon"></span><span class="menu_h3">' . $_e['Blog'] . '</span>

                 <span class="fa fa-chevron-down drop_menu"></span></h3>

                <ul>

                    <span class="fa fa-caret-left collapse_icon"></span>

                    <li ' . $this->checkSubMenu('blog', "-blog?page=blog") . '><a href="-blog?page=blog">' . $_e['Blog'] . '</a></li>

                </ul>

            </li>



            <li id="collapse_menu">

                <h3>

                    <span class="fa fa-chevron-circle-left icon left"></span>

                    <span class="fa fa-chevron-circle-right icon right"></span>

                    <span class="menu_h3">' . $_e['Collapse Menu'] . '</span>

                </h3>

            </li>



        </ul>

    </div><!-- #IBMS_Menu -->



<script>

    /*jQuery time*/



    function openWin(url){

	myWindow=window.open(url,"","width=800,height=600");

	myWindow.focus();

}

    $(document).ready(function(){

        $("#IBMS_Menu h3").click(function(){

            //slide up all the link lists

            $("#IBMS_Menu ul ul").slideUp();

            //slide down the link list below the h3 clicked - only if its closed

            if(!$(this).next().is(":visible"))

            {

                $(this).next().slideDown();

            }

        });



         $("#collapse_menu").click(function(){

          $( ".IBMS_Main_Menu,#container_div" ).stop();

              if($(".IBMS_Main_Menu").hasClass("collapse_menu")){

                $( ".IBMS_Main_Menu,#container_div" ).removeAttr("style");

                $(".IBMS_Main_Menu").removeClass("collapse_menu");

                $("#container_div").removeClass("collapse_menu_active");

                $(".IBMS_Main_Menu").find("li.active").find("ul").slideDown(500);

                $.cookie("showTop", "null");



              }else{

                  $( ".IBMS_Main_Menu").animate({ width: "36"}, 500 );

                  $( "#container_div" ).animate({ width: "94%"}, 500 );

                $(".IBMS_Main_Menu").find("li.active").find("ul").hide(100);

                $(".IBMS_Main_Menu").addClass("collapse_menu");

                $("#container_div").addClass("collapse_menu_active");

                $.cookie("showTop", "collapse_menu");

              }

         });



         if($.cookie("showTop") == "collapse_menu"){

                $(".IBMS_Main_Menu").find("li.active").find("ul").hide();

                $(".IBMS_Main_Menu").addClass("collapse_menu");

                $("#container_div").addClass("collapse_menu_active");

         }

    });



</script>

';
    }



    private function checkActive($page, $name, $visibleForThisUser = true)

    {

        global $functions;



        $temp = '';



        if ($visibleForThisUser === true) {

            $this->parentMenu = $page;

            $this->AutoVisibleMenu['menu'][]   =   $page;

            $this->AutoVisibleMenu['hasSubMenu'][$page] =   false;

            $this->AutoVisibleMenuName[$page]  =   $name;

            $class  = "";



            $menuReturnPer  = $functions->adminMenuPermissions($page, 'mainMenu');

            if ($menuReturnPer === false) {

                $class  = "displaynone";
            }
        } else {

            $this->parentMenu = false;

            $class  = "displaynone";
        }





        global $menu;

        if ($menu == $page) {

            $temp = "active";
        }

        return $temp . " " . $class;
    }



    private function checkSubMenu($page, $link, $visibleForThisUser = true)

    {

        //$page is use as sub menu for active or permissions

        $temp = '';

        $class  = "";

        global $functions;

        $parentMenu = $this->parentMenu;



        if ($parentMenu !== false) {

            $this->AutoVisibleMenu['hasSubMenu'][$parentMenu] =   true;

            // when this function call, its mean it has sub menu, menu is true or false, it  is else thing



            if ($visibleForThisUser === true) {

                //For take auto array and use where i want

                $this->AutoVisibleMenu[$parentMenu][$page] = $page;

                $this->AutoVisibleMenuLink[$page] = $link;

                $class = "";



                $menuReturnPer = $functions->adminMenuPermissions($link, 'subMenu', $parentMenu);

                //var_dump($menuReturnPer);

                if ($menuReturnPer === false) {

                    $class = "displaynone";
                }
            } else {

                $class = "displaynone";
            }
        } else {

            $class = "displaynone";
        }



        global $subMenu;

        if ($subMenu == $page) {

            $temp   = "class='subMenu $class'";
        } else {

            $temp   = "class='$class'";
        }



        return $temp;
    }
}

// <li ' . $this->checkSubMenu('Manage Category','-product_management?page=category') . '><a href="-product_management?page=category">' . $_e['Manage Category'] .'</a></li>