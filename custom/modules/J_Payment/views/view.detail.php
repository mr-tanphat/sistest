<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class J_PaymentViewDetail extends ViewDetail{
    function _displaySubPanels(){
        require_once ('include/SubPanel/SubPanelTiles.php');
        $subpanel = new SubPanelTiles($this->bean, $this->module);
        if($this->bean->payment_type == 'Delay'){
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['payment_paymentdetails']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_payment_j_discount_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_payment_j_sponsor']);
            echo $subpanel->display();
        }
        elseif($this->bean->payment_type == 'Moving In' || $this->bean->payment_type == 'Transfer In'){
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['payment_paymentdetails']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_payment_j_discount_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_payment_j_payment_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_payment_j_sponsor']);
            echo $subpanel->display();
        }
        elseif($this->bean->payment_type == 'Moving Out' || $this->bean->payment_type == 'Transfer Out' || $this->bean->payment_type == 'Transfer From AIMS' || $this->bean->payment_type == 'Refund'){
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['payment_paymentdetails']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_payment_j_discount_1']);
            unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup']['j_payment_j_sponsor']);
            echo $subpanel->display();
        }
        else{
            parent::_displaySubPanels();
        }
    }
    public function display(){
        global $locale, $current_user, $timedate;
        require_once('custom/include/_helper/class_utils.php');
        require_once('custom/include/_helper/junior_schedule.php');
        $this->options ['show_subpanels'] = true;

        //Custom Adult
        $team_type = getTeamType($this->bean->team_id);
        $this->ss->assign('team_type', $team_type);

        ////Bo sung 3 button export--
        $bt_export.='</ul><span class="ab"></span></li></ul>';
        $this->ss->assign('payment_id', '<span class="textbg_blue">'.$this->bean->name.'</span>');

        //Show paid amount, unpaid amount - Tung Bui 08/12/2015
        $sqlPayDtl = "SELECT DISTINCT
        IFNULL(payment_no, '') payment_no,
        IFNULL(status, '') status,
        IFNULL(invoice_number, '') invoice_number,
        IFNULL(payment_amount, '0') payment_amount
        FROM j_paymentdetail
        WHERE payment_id = '{$this->bean->id}'
        AND deleted = 0
        AND status <> 'Cancelled'
        ORDER BY payment_no";
        $resultPayDtl = $GLOBALS['db']->query($sqlPayDtl);

        $paidAmount     = 0;
        $unpaidAmount   = 0;
        $countEmptyVAT  = 0;
        $countVAT       = 0;
        while($rowPayDtl = $GLOBALS['db']->fetchByAssoc($resultPayDtl)){
            if($rowPayDtl['status'] == "Unpaid")
                $unpaidAmount += $rowPayDtl['payment_amount'];
            else
                $paidAmount   += $rowPayDtl['payment_amount'];

            if(empty($rowPayDtl['invoice_number']))
                $countEmptyVAT++;
            $countVAT++;
        }
        $this->ss->assign('PAID_AMOUNT','<span class="textbg_bluelight" id="pmd_paid_amount">'.format_number($paidAmount).'</span>');
        $this->ss->assign('UNPAID_AMOUNT','<span class="textbg_redlight" id="pmd_unpaid_amount">'.format_number($unpaidAmount).'</span>');
        if($countEmptyVAT == 0){
            unset($this->dv->defs['panels']['LBL_OTHER'][3]);
        }

        //        if($unpaidAmount == 0)
        if($paidAmount !== 0 || $unpaidAmount == 0 || $this->bean->paid_amount !== 0 ) // cho add hoc vien vao class khi da dong 1 phan hoc phi
            $this->ss->assign('is_paid', '1');
        else $this->ss->assign('is_paid', '0');

        $this->ss->assign('today',$timedate->nowDate());

        $this->ss->assign('card_type', $GLOBALS['app_list_strings']['card_type_payments_list']);
        $this->ss->assign('bank_type', $GLOBALS['app_list_strings']['bank_name_list']);


        //Show replace Student by Lead info When payment have lead_id
        if(!empty($this->bean->lead_id)){
            $this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST'][1][0]['name'] = 'lead_name';
            $this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST'][1][0]['customCode'] = '{$LEAD_NAME}';
            $leadBean = BeanFactory::getBean("Leads", $this->bean->lead_id);
            $leadFullname = $locale->getLocaleFormattedName($leadBean->first_name, $leadBean->last_name, $leadBean->salutaion);
            $leadLink = '<a href="index.php?module=Leads&amp;action=DetailView&amp;record='.$leadBean->id.'">'.$leadFullname.'</a>';
            $this->ss->assign('LEAD_NAME',$leadLink);
        }

        //QUick Edit
        $arr_Q = array( '_sale_type', '_sale_type_date', '_assigned_user_id');

        if ($current_user->isAdmin()){
            $sale_typeQ .= '<img id="loading_sale_type" src=\'custom/include/images/fb_loading.gif\' style=\'width:15px; height:15px; display:none;\'/>';
            $sale_typeQ .= '<div id="panel_1_sale_type"><label id="label_sale_type">'.$this->bean->sale_type.'</label>&nbsp&nbsp<a id="btnedit_sale_type" title="Edit" title="Admin Edit"><i style="font-size: 20px;cursor: pointer;" class="icon icon-edit"></i></a></div>';
            $sale_typeQ .= '<div id="panel_2_sale_type" style="display: none;"><select id="value_sale_type">'.get_select_options($GLOBALS['app_list_strings']['sale_type_payment_list'],$this->bean->sale_type).'</select>';
            $sale_typeQ .=  '&nbsp&nbsp<a title="Save" id="btnsave_sale_type"><i style="font-size: 20px;cursor: pointer;" class="icon icon-download-alt"></i></a> <a title="Cancel" id="btncancel_sale_type"><i style="font-size: 20px;cursor: pointer;" class="icon icon-remove"></i></a></div>';
            $sale_type_dateQ = '
            <img id="loading_sale_type_date" src=\'custom/include/images/fb_loading.gif\' style=\'width:15px; height:15px; display:none;\'/>
            <div id="panel_1_sale_type_date"><label id="label_sale_type_date">'.$this->bean->sale_type_date.'</label>&nbsp&nbsp<a id="btnedit_sale_type_date" title="Edit" title="Admin Edit"><i style="font-size: 20px;cursor: pointer;" class="icon icon-edit"></i></a></div>
            <div id="panel_2_sale_type_date" style="display: none;"><input disabled="" name="value_sale_type_date" size="10" id="value_sale_type_date" type="text" value="'.$this->bean->sale_type_date.'">
            <img border="0" src="custom/themes/default/images/jscalendar.png" alt="Sale Type Date" id="sale_type_date_trigger" align="absmiddle">
            &nbsp&nbsp<a title="Save" id="btnsave_sale_type_date"><i style="font-size: 20px;cursor: pointer;" class="icon icon-download-alt"></i></a>
            <a title="Cancel" id="btncancel_sale_type_date"><i style="font-size: 20px;cursor: pointer;" class="icon icon-remove"></i></a>
            </div>';
            $user_list = $GLOBALS['db']->fetchArray("SELECT DISTINCT IFNULL(users.id,'') primaryid ,CONCAT(IFNULL(users.last_name,''),' ',IFNULL(users.first_name,'')) users_full_name FROM users INNER JOIN teams l1 ON users.default_team=l1.id AND l1.deleted=0 WHERE (((l1.id='{$this->bean->team_id}' ) AND ((users.is_admin is null OR users.is_admin='0') ) AND (users.status = 'Active' ) AND (users.for_portal_only = '0' ) AND (users.portal_only = '0' ) )) AND users.deleted=0 ORDER BY users.last_name, users.first_name ASC");
            $user_arr = array($current_user->id => $current_user->name);
            foreach($user_list as $key => $user)
                $user_arr[$user['primaryid']] = $user['users_full_name'];

            $assigned_user_idQ = '<img id="loading_assigned_user_id" src=\'custom/include/images/fb_loading.gif\' style=\'width:15px; height:15px; display:none;\'/>
            <div id="panel_1_assigned_user_id"><label id="label_assigned_user_id">'.$this->bean->assigned_user_name.'</label>&nbsp&nbsp<a id="btnedit_assigned_user_id" title="Edit" title="Admin Edit"><i style="font-size: 20px;cursor: pointer;" class="icon icon-edit"></i></a></div>
            <div id="panel_2_assigned_user_id" style="display: none;"><select id="value_assigned_user_id">'.get_select_options($user_arr, $this->bean->assigned_user_id).'</select>
            &nbsp&nbsp<a title="Save" id="btnsave_assigned_user_id"><i style="font-size: 20px;cursor: pointer;" class="icon icon-download-alt"></i></a> <a title="Cancel" id="btncancel_assigned_user_id"><i style="font-size: 20px;cursor: pointer;" class="icon icon-remove"></i></a></div>';
        }else{
            $sale_typeQ         = '<label id="label_sale_type">'.$GLOBALS['app_list_strings']['sale_type_payment_list'][$this->bean->sale_type].'</label>';
            $sale_type_dateQ    = '<label id="label_sale_type_date">'.$this->bean->sale_type_date.'</label>';
            $assigned_user_idQ    = '<label id="label_assigned_user_id">'.$this->bean->assigned_user_name.'</label>';
        }

        $this->ss->assign('sale_typeQ',$sale_typeQ);
        $this->ss->assign('sale_type_dateQ',$sale_type_dateQ);
        $this->ss->assign('assigned_user_idQ',$assigned_user_idQ);

        // Dirty trick to clear cache, a must for EditView:
        $th = new TemplateHandler();
        $th->deleteTemplate('J_Payment', 'DetailView');

        if($this->bean->payment_type == 'Enrollment'){
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            if($this->bean->paid_hours <= 0 )
                unset($this->dv->defs['panels']['LBL_ENROLLMENT'][7]);
            if($this->bean->deposit_amount <= 0 )
                unset($this->dv->defs['panels']['LBL_ENROLLMENT'][12]);


            $sql_get_class="SELECT
            DISTINCT IFNULL(l2.id,'') l2_id ,
            IFNULL(l2.name,'') l2_name ,
            IFNULL(j_payment.id,'') primaryid,
            MIN(l1.start_study) start_study,
            MAX(l1.end_study) end_study,
            IFNULL(l2.class_type,'') class_type
            FROM j_payment INNER JOIN j_studentsituations l1 ON j_payment.id=l1.payment_id
            AND l1.deleted=0 INNER JOIN j_class l2 ON l1.ju_class_id=l2.id
            AND l2.deleted=0 WHERE j_payment.id='{$this->bean->id}'
            AND j_payment.deleted=0
            GROUP BY l2.id";
            $result_get_class = $GLOBALS['db']->query($sql_get_class);
            $html_class='';
            $first_set = true;
            $start_study = '';
            $end_study = '';
            while($row = $GLOBALS['db']->fetchByAssoc($result_get_class)){
                $html_class.='<li style="margin-left:10px;"><a href=index.php?module=J_Class&offset=1&stamp=1441785563066827100&return_module=J_Class&action=DetailView&record='.$row['l2_id'].' target=_blank>'.$row['l2_name'].'</a> ('.$row['class_type'].')</li>';
                if($first_set){
                    $start_study  = $row['start_study'];
                    $end_study    = $row['end_study'];
                    $first_set    = false;
                }else{
                    if($start_study > $row['start_study'])
                        $start_study = $row['start_study'];

                    if($end_study < $row['end_study'])
                        $end_study = $row['end_study'];
                }
            }
            if(!empty($start_study))
            $this->bean->start_study = $timedate->to_display_date($start_study,false);

            if(!empty($end_study))
            $this->bean->end_study = $timedate->to_display_date($end_study,false);

            $this->ss->assign('html_class',$html_class);
            //button create payment book/gift
            $btn_customize = '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Book/Gift&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_CREATE_PAYMENT_BOOKGIFT'].'" id="create_payment_book">';

            if($current_user->isAdmin()){
                if($this->bean->status != 'Closed')
                    $btn_customize .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_DROP_PAYMENT'].'" id="btn_delay_payment">';
            }
        }
        elseif($this->bean->payment_type == 'Cashholder' || $this->bean->payment_type == 'Corporate'){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);

            if($team_type == 'Adult'){ //Caculate Remain Amount / Day - Adult
                $today          = $timedate->nowDbDate();
                $start_study    = $timedate->to_db_date($this->bean->start_study,false);
                $end_study      = $timedate->to_db_date($this->bean->end_study,false);
                if($this->bean->status != 'Closed'){
                    if(!empty($this->bean->start_study) && !empty($this->bean->end_study)){
                        if($today < $start_study){
                            $this->bean->remain_amount = ($this->bean->paid_amount + $this->bean->payment_amount + $this->bean->deposit_amount);
                            $this->bean->remain_hours  = $this->bean->tuition_hours;
                            //    $GLOBALS['db']->query("UPDATE j_payment SET remain_amount = '{$this->bean->remain_amount}', remain_hours='{$this->bean->remain_hours}' WHERE id = '{$this->bean->id}'");
                        }elseif($today >= $start_study && $today <= $end_study){
                            $holiday_list   = get_list_holidays_adult($start_study);
                            $arr_range      = getDatesFromRange($start_study, $today);

                            $arr_learned    = array_diff($arr_range, $holiday_list);
                            $count_learned  = count($arr_learned);
                            $total_amount   = ($this->bean->paid_amount + $this->bean->payment_amount + $this->bean->deposit_amount);
                            $remain_amount = $total_amount - ($count_learned * ( $total_amount / $this->bean->tuition_hours));
                            $remain_hours  = $this->bean->tuition_hours - $count_learned;

                            if($remain_hours < 0) $remain_hours = 0;
                            if($remain_amount < 0) $remain_amount = 0;

                            if($remain_amount != $this->bean->remain_amount || $remain_hours != $this->bean->remain_hours){
                                $this->bean->remain_amount = $remain_amount;
                                $this->bean->remain_hours  = $remain_hours;
                                //        $GLOBALS['db']->query("UPDATE j_payment SET remain_amount = '{$this->bean->remain_amount}', remain_hours='{$this->bean->remain_hours}' WHERE id = '{$this->bean->id}'");
                            }
                            $this->ss->assign('total_amount',$total_amount);
                            $this->ss->assign('total_used',$total_amount - $remain_amount);
                        }elseif($today > $end_study){
                            $this->bean->remain_amount = 0;
                            $this->bean->remain_hours  = 0;
                            //    $GLOBALS['db']->query("UPDATE j_payment SET remain_amount = '{$this->bean->remain_amount}', remain_hours='{$this->bean->remain_hours}' WHERE id = '{$this->bean->id}'");
                        }
                    }else{
                        $this->bean->remain_amount = ($this->bean->paid_amount + $this->bean->payment_amount + $this->bean->deposit_amount);
                        $this->bean->remain_hours  = $this->bean->tuition_hours;
                    }
                }else{
                    $this->bean->remain_amount = 0;
                    $this->bean->remain_hours  = 0;
                }

                unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
                if($this->bean->deposit_amount == 0)
                    unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT'][8]);
                if($this->bean->paid_amount == 0)
                    unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT'][3]);
                //Remove cac button Payment Corporate
                if($this->bean->payment_type == 'Corporate'){
                    unset($this->dv->defs['templateMeta']['form']['buttons'][0]);
                    unset($this->dv->defs['templateMeta']['form']['buttons'][1]);
                    //                   unset($this->dv->defs['templateMeta']['form']['buttons'][2]);
                    unset($this->dv->defs['templateMeta']['fo    rm']['buttons'][3]);
                }
            }else{
                unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            }
            //End Caculate
            if($this->bean->remain_amount > 0 || $this->bean->remain_hours > 0){
                if($team_type == 'Junior'){
                    $btn_customize .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Enrollment&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_CREATE_PAYMENT_ENROLLMENT'].'" id="create_payment_enrollment">';

                    if($current_user->isAdmin()){
                        if($this->bean->status != 'Closed' && $this->bean->remain_amount > 0)//Hiện tại chỉ có Status = Closed là Dropped Revenue
                            $btn_customize .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_DROP_PAYMENT'].'" id="btn_delay_payment">';

                        $btn_customize .= '<input class="button" type="button" value="Convert Payment" id="convert_payment">';

                    }
                }else{
                    $btn_customize.= '<input class="button" type="button" value="Add To Class" id="add_to_class">';
                    $btn_customize.= '<input class="button" type="button" value="Delay Payment" id="btn_delay_payment">';
                }
            }
        }
        elseif($this->bean->payment_type == 'Book/Gift'){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            ////Bo sung 3 button export--neu la invenroty thi them button export inventory
            $btn_customize ='<input type="button" name="inventory_id" id="inventory_id" inventory_id="'.$this->bean->j_payment_j_inventory_1j_inventory_idb.'"  value="Export Inventory" />';
        }
        elseif($this->bean->payment_type == 'Placement Test' || $this->bean->payment_type == 'Freeze Fee' || $this->bean->payment_type == 'Tutor Package' || $this->bean->payment_type == 'Travelling Fee' || $this->bean->payment_type == 'Deposit' || $this->bean->payment_type == 'Merge AIMS'){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            if($team_type == 'Junior'){
                if($this->bean->remain_amount > 0) {
                    $btn_customize .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Enrollment&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_CREATE_PAYMENT_ENROLLMENT'].'" id="create_payment_enrollment">';
                    if($current_user->isAdmin()){
                        $btn_customize .= '<input class="button" type="button" value="Convert Payment" id="convert_payment">';
                        $btn_customize .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_DROP_PAYMENT'].'" id="btn_delay_payment">';
                    }
                }
            }else{
                $btn_customize.= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Cashholder&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="Create Cashholder" id="create_cashholder">';
            }

            if($this->bean->remain_amount > 0 && $team_type == 'Adult')
                if($current_user->isAdmin()){
                    $btn_customize .= '<input class="button" type="button" value="Convert Payment" id="convert_payment">';

                }

        }
        elseif($this->bean->payment_type == 'Moving In' || $this->bean->payment_type == 'Moving Out'){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            unset($this->dv->defs['templateMeta']['form']['buttons'][0]);

            // Assign Undo button
            if($this->bean->payment_type == 'Moving Out' && ($current_user->isAdmin()))
                $btn_customize ='<input type="button" class="primary button" name="btn_undo" id="btn_undo" value="'.$GLOBALS['mod_strings']['LBL_UNDO'].'" />';

            if ($this->bean->payment_type == 'Moving In') {
                $this->ss->assign("PAYMENT_RELA_LABEL", "Moving Out Payment:");
                $this->ss->assign("PAYMENT_RELA", '<a href="index.php?module=J_Payment&action=DetailView&record='.$this->bean->payment_out_id.'">'.$this->bean->payment_out_name."</a>");

                if($team_type == 'Adult' && !empty($this->bean->contract_id) && ($this->bean->remain_amount > 0 && $this->bean->remain_hours > 0)){
                    $btn_customize .= '<input class="button primary" type="button" value="Enable Fee" id="btn_enable_delay_fee">';
                }
            }
            else{
                $this->ss->assign("PAYMENT_RELA_LABEL", "Moving In Payment:");
                $this->bean->load_relationship("ju_payment_in");
                $moving_in_payment = reset($this->bean->ju_payment_in->getBeans());
                $this->ss->assign("PAYMENT_RELA", '<a href="index.php?module=J_Payment&action=DetailView&record='.$moving_in_payment->id.'">'.$moving_in_payment->name."</a>");
            }
            if($this->bean->remain_amount > 0 || $this->bean->remain_hours > 0)
                $btn_customize .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Enrollment&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_CREATE_PAYMENT_ENROLLMENT'].'" id="create_payment_enrollment">';
            if($current_user->isAdmin())
                if($this->bean->status != 'Closed' && $this->bean->remain_amount > 0)//Hiện tại chỉ có Status = Closed là Dropped Revenue
                    $btn_customize .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_DROP_PAYMENT'].'" id="btn_delay_payment">';

        }
        elseif($this->bean->payment_type == 'Transfer Out' || $this->bean->payment_type == 'Transfer In'){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            unset($this->dv->defs['templateMeta']['form']['buttons'][0]);

            // Assign Undo button
            if($this->bean->payment_type == 'Transfer Out' && ($current_user->isAdmin()))
                $btn_customize ='<input type="button" class="primary button" name="btn_undo" id="btn_undo" value="'.$GLOBALS['mod_strings']['LBL_UNDO'].'" />';

            if ($this->bean->payment_type == 'Transfer In') {
                $this->ss->assign("PAYMENT_RELA_LABEL", "Transfer Out Payment:");
                $this->ss->assign("STUDENT_RELA_LABEL", "Transfer From Student:");
                $this->ss->assign("PAYMENT_RELA", '<a href="index.php?module=J_Payment&action=DetailView&record='.$this->bean->payment_out_id.'">'.$this->bean->payment_out_name."</a>");
                $transfer_out_payment = BeanFactory::getBean("J_Payment", $this->bean->payment_out_id);
                $transfer_from_student = BeanFactory::getBean("Contacts", $transfer_out_payment->contacts_j_payment_1contacts_ida);
                $this->ss->assign("STUDENT_RELA", '<a href="index.php?module=Contacts&action=DetailView&record='.$transfer_from_student->id.'">'.$transfer_from_student->name."</a>");
                if($current_user->isAdmin()){
                    if($this->bean->status != 'Closed' && $this->bean->remain_amount > 0)//Hiện tại chỉ có Status = Closed là Dropped Revenue
                        $btn_customize .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_DROP_PAYMENT'].'" id="btn_delay_payment">';
                }
                if($team_type == 'Adult' && !empty($this->bean->contract_id) && ($this->bean->remain_amount > 0 && $this->bean->remain_hours > 0)){
                    $btn_customize .= '<input class="button primary" type="button" value="Enable Fee" id="btn_enable_delay_fee">';
                }
            }
            else{
                $this->ss->assign("PAYMENT_RELA_LABEL", "Transfer In Payment:");
                $this->ss->assign("STUDENT_RELA_LABEL", "Transfer To Student:");
                $this->bean->load_relationship("ju_payment_in");
                $transfer_in_payment = reset($this->bean->ju_payment_in->getBeans());
                $this->ss->assign("PAYMENT_RELA", '<a href="index.php?module=J_Payment&action=DetailView&record='.$transfer_in_payment->id.'">'.$transfer_in_payment->name."</a>");
                $transfer_to_student = BeanFactory::getBean("Contacts", $transfer_in_payment->contacts_j_payment_1contacts_ida);
                $this->ss->assign("STUDENT_RELA", '<a href="index.php?module=Contacts&action=DetailView&record='.$transfer_to_student->id.'">'.$transfer_to_student->name."</a>");
            }
            if($this->bean->remain_amount > 0 && $team_type == 'Junior'){
                $btn_customize .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Enrollment&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_CREATE_PAYMENT_ENROLLMENT'].'" id="create_payment_enrollment">';
                if($current_user->isAdmin()){
                    $btn_customize .= '<input class="button" type="button" value="Convert Payment" id="convert_payment">';

                }
            }
        }
        elseif($this->bean->payment_type == 'Refund'){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            unset($this->dv->defs['templateMeta']['form']['buttons'][0]);

            // Assign Undo button
            if($current_user->isAdmin())
                $btn_customize ='<input type="button" class="primary button" name="btn_undo" id="btn_undo" value="'.$GLOBALS['mod_strings']['LBL_UNDO'].'" />';
        }
        elseif($this->bean->payment_type == 'Transfer From AIMS'){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_DELAY']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            if($this->bean->remain_amount > 0 || $this->bean->remain_hours > 0)
                $btn_customize .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Enrollment&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_CREATE_PAYMENT_ENROLLMENT'].'" id="create_payment_enrollment">';

            if($current_user->isAdmin()){
                if($this->bean->status != 'Closed' && $this->bean->remain_amount > 0)//Hiện tại chỉ có Status = Closed là Dropped Revenue
                    $btn_customize .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_DROP_PAYMENT'].'" id="btn_delay_payment">';

                $btn_customize .= '<input class="button" type="button" value="Convert Payment" id="convert_payment">';

            }
        }
        elseif($this->bean->payment_type == 'Delay' || $this->bean->payment_type == 'Schedule Change'  ){
            unset($this->dv->defs['panels']['LBL_ENROLLMENT']);
            unset($this->dv->defs['panels']['LBL_BOOK_PLACEMENT_TEST']);
            unset($this->dv->defs['panels']['LBL_PLACE_HOLDER']);
            unset($this->dv->defs['panels']['LBL_DEPOSIT']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_TRANSFER']);
            unset($this->dv->defs['panels']['LBL_REFUND']);
            unset($this->dv->defs['panels']['LBL_MOVING']);
            unset($this->dv->defs['panels']['LBL_TRANSFER_AIMS']);
            unset($this->dv->defs['panels']['LBL_CASHHOLDER_ADULT']);
            unset($this->dv->defs['templateMeta']['form']['buttons'][0]);
            if(($this->bean->remain_amount > 0 || $this->bean->remain_hours > 0) && $team_type == 'Junior'){
                $btn_customize .= '<input class="button" type="button" onClick="window.open(\'index.php?module=J_Payment&action=EditView&return_module=J_Payment&return_action=DetailView&payment_type=Enrollment&student_id='.$this->bean->contacts_j_payment_1contacts_ida.'\',\'_blank\')" value="'.$GLOBALS['mod_strings']['LBL_CREATE_PAYMENT_ENROLLMENT'].'" id="create_payment_enrollment">';
                if($current_user->isAdmin())
                    $btn_customize .= '<input class="button" type="button" value="Convert Payment" id="convert_payment">';
            }
            if($current_user->isAdmin()){
                if($this->bean->status != 'Closed')
                    $btn_customize .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['LBL_DROP_PAYMENT'].'" id="btn_delay_payment">';
            }
            if(($this->bean->remain_amount > 0 && $this->bean->remain_hours > 0))
                if($team_type == 'Adult'){
                    $btn_customize .= '<input class="button primary" type="button" value="Enable Fee" id="btn_enable_delay_fee">';
                }
        }

        if($this->bean->payment_type == 'Refund'){
            unset($this->dv->defs['templateMeta']['form']['buttons'][1]);
        }
        $this->ss->assign('CUSTOM_BUTTON',$btn_customize);
        //Show button export form
        $exportPaymentTypes = array("Refund","Delay","Moving Out","Moving In","Transfer Out","Transfer In");
        $btnExportForm = "";
        if(in_array($this->bean->payment_type,$exportPaymentTypes)){
            $btnExportForm .= '<input class="button" type="button" value="'.$GLOBALS['mod_strings']['BTN_EXPORT_FORM'].'" id="btn_export_form" onclick="location.href = \'index.php?module=J_Payment&action=exportform&record='. $this->bean->id .'\'">';
        }
        $this->ss->assign('EXPORT_FROM_BUTTON',$btnExportForm);

        //Show link doanh thu Drop
        $revenue_link = '';
        if($current_user->isAdmin()){
            $delivery_id = $GLOBALS['db']->getOne("SELECT id FROM c_deliveryrevenue WHERE ju_payment_id='{$this->bean->id}' AND deleted = 0 AND passed = 0");
            if(!empty($delivery_id))
                $revenue_link =  '<a target="_blank" href="index.php?action=DetailView&module=C_DeliveryRevenue&record='.$delivery_id.'"> >>Revenue Link<< </a>';

        }
        $this->ss->assign("revenue_link",$revenue_link );

        //Convert Payment Type
        if($this->bean->payment_type == 'Deposit')
            $convert_to = 'Cashholder';
        else
            $convert_to = $this->bean->payment_type;

        $this->ss->assign("convertToPaymentType", $convert_to );

        if($this->bean->use_type == 'Hour' && $team_type == 'Adult')
            $this->bean->use_type = 'Day';

        parent::display();
    }
}