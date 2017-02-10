<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



class J_DiscountViewDetail extends ViewDetail {


    function display() {   
        // get "do not apply with" list - Tung Bui
        $disableList = json_decode(html_entity_decode($this->bean->disable_list),true);

        $schemaHtml .= '<ul style="margin-left: 0;">';
        if (in_array("Reward",$disableList)) $schemaHtml .= '<li>Reward</li>';
        if (in_array("Partnership",$disableList)) $schemaHtml .= '<li>Partnership</li>';

        foreach ($disableList as $value){
            if ($value != "Reward" && $value != "Partnership"){
                $disable_discount = BeanFactory::getBean("J_Discount", $value);
                if (!empty($disable_discount->id)){
                    $schemaHtml .= '<li>';
                    $schemaHtml .= '<a href="index.php?module=J_Discount&action=DetailView&record='.$disable_discount->id.'" target=_blank>'.$disable_discount->name.'</a>';                
                    $schemaHtml .= '</li>';    
                }
            }
        }
        $schemaHtml .= '</ul>';
        // get gift
        $content=json_decode(htmlspecialchars_decode($this->bean->content), true);
        $schemaHtmlContent ='';  
        $schemaHtmlContent .= '<ul style="margin-left: 0;">';
        foreach($content as $key => $value) {
            $schemaHtmlContent .= '<li>'; 
            $schemaHtmlContent .= $this->_buildGiftRow($key, $value); 
            $schemaHtmlContent .= '</li>';
        }
        $schemaHtmlContent .= '</ul>';

        // get Partnership
        $this->bean->load_relationship('j_discount_j_partnership_1');
        $partnership= $this->bean->j_discount_j_partnership_1->getBeans(); 
        $part .= '<ul style="margin-left: 0;">';
        foreach ($partnership as $partner)
        {   $part .= '<li>';
            $part .= '<a href=index.php?module=J_Partnership&offset=1&stamp=1442306303029459400&return_module=J_Partnership&action=DetailView&record='.$partner->id.' TARGET=_blank>'.$partner->name.'</a>';                
            $part .= '</li>';
        }
        $part .= '</ul>';


        $this->ss->assign('CONTENT', $schemaHtmlContent);
        $this->ss->assign('SCHEMA', $schemaHtml); 
        $this->ss->assign('PARTNERSHIP', $part); 
        parent::display();
    }
    private function _buildGiftRow($id, $data) {
        $sql ="SELECT unit FROM product_templates WHERE id='".$id."'";
        $unit = $GLOBALS['db']->getone($sql); 
        return '<a href=index.php?module=ProductTemplates&offset=2&stamp=1437618694097285200&return_module=ProductTemplates&action=DetailView&record='.$id.' TARGET=_blank>'.$data['book_name'].'</a> &nbsp; <label> '.$data['qty_book'].' '.$unit.'</label>';
    }
}
?>