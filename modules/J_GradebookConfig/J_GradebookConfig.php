<?PHP
    /*********************************************************************************
    * By installing or using this file, you are confirming on behalf of the entity
    * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
    * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
    * http://www.sugarcrm.com/master-subscription-agreement
    *
    * If Company is not bound by the MSA, then by installing or using this file
    * you are agreeing unconditionally that Company will be bound by the MSA and
    * certifying that you have authority to bind Company accordingly.
    *
    * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
    ********************************************************************************/

    /**
    * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
    */
    require_once('modules/J_GradebookConfig/J_GradebookConfig_sugar.php');
    class J_GradebookConfig extends J_GradebookConfig_sugar {
        //config cot diem trong config
        var $gradebook_config_mark_options = array(
            'A' => array(
                'name' => 'progress',
                'alias' => '(A)',
                'label' => 'Progress',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'B' => array(
                'name' => 'participation',
                'alias' => '(B)',
                'label' => 'Participation',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'C' => array(
                'name' => 'penmanship',
                'alias' => '(C)',
                'label' => 'Penmanship',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'D' => array(
                'name' => 'listening',
                'alias' => '(D)',
                'label' => 'Listening Test',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'E' => array(
                'name' => 'grammar',
                'alias' => '(E)',
                'label' => 'Grammar/ Vocab. Test',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'F' => array(
                'name' => 'reading',
                'alias' => '(F)',
                'label' => 'Reading/ Writing Test',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'G' => array(
                'name' => 'speaking',
                'alias' => '(G)',
                'label' => 'Speaking Test',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'H' => array(
                'name' => 'readinga',
                'alias' => '(H)',
                'label' => 'Reading',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'I' => array(
                'name' => 'writinga',
                'alias' => '(I)',
                'label' => 'Writing',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'J' => array(
                'name' => 'useoflanguage',
                'alias' => '(J)',
                'label' => 'Use of Language',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            
            'T' => array(
                'name' => 'total',
                'alias' => '(T)',
                'label' => 'Total(%)',
                'default' => array(
                    'visible' => true,
                    'max_mark' => 0,
                    'weight' => 100,
                    'readonly' => true,
                    'formula' => '',
                ),
            ),
        );

        var $gradebook_config_mark_options_adult = array(
            'A' => array(
                'name' => 'fluence',
                'alias' => '(A)',
                'label' => 'Fluency',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'B' => array(
                'name' => 'lexialresource',
                'alias' => '(B)',
                'label' => 'Lexical Resource',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'C' => array(
                'name' => 'grammar',
                'alias' => '(C)',
                'label' => 'Grammar',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'D' => array(
                'name' => 'pronunciation',
                'alias' => '(D)',
                'label' => 'Pronunciation',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'E' => array(
                'name' => 'lms',
                'alias' => '(E)',
                'label' => 'LMS',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            /*'F' => array(
                'name' => 'lms',
                'alias' => '(F)',
                'label' => 'Listening',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'G' => array(
                'name' => 'speaking',
                'alias' => '(G)',
                'label' => 'Speaking',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),*/
            'F' => array(
                'name' => 'minicheck',
                'alias' => '(F)',
                'label' => 'Mini Check',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'G' => array(
                'name' => 'participation',
                'alias' => '(G)',
                'label' => 'Participation',
                'default' => array(
                    'visible' => false,
                    'max_mark' => 0,
                    'weight' => 0,
                    'readonly' => false,
                    'formula' => '',
                ),
            ),
            'T' => array(
                'name' => 'total',
                'alias' => '(T)',
                'label' => 'Total(%)',
                'default' => array(
                    'visible' => true,
                    'max_mark' => 0,
                    'weight' => 100,
                    'readonly' => true,
                    'formula' => '',
                ),
            ),
        );



        /**
        * This is a depreciated method, please start using __construct() as this method will be removed in a future version
        *
        * @see __construct
        * @depreciated
        */
        function J_GradebookConfig(){
            self::__construct();
        }

        public function __construct(){
            parent::__construct();
        }

        public function loadConfigContent() {
            if(!$this->id || !$this->content || $this->content == '{}') return $this->toHtmlContent(array());
            else {
                $config_array = json_decode(html_entity_decode($this->content),true) ;
                if(is_array($config_array)) return $this->toHtmlContent($config_array);
                else return $this->toHtmlContent(array());
            }
        }
        public function toHtmlContent($configs) {
            global $current_user;
            $config_default = $this->gradebook_config_mark_options;
            if($current_user->team_type == 'Adult'){
                $config_default = $this->gradebook_config_mark_options_adult;
            }
            $title_html = "";
            $alias_html = "";
            $visible_html = "";
            $max_mark_html = "";
            $weight_html = "";
            $readonly_html = "";
            $formula_html = "";
            foreach($config_default as $key => $param) {
                $title_html .= "<td class = 'center'><b>".$param['label']."</b></td>";
                $alias_html .= "<td class = 'center'><b>".$param['alias']."</b></td>";
                $config = isset($configs[$key])?$configs[$key]:$param['default'];
                $prex = $param['name']."_";
                if($config['visible']) $class = ''; else $class = 'readonly';
                $visible_html .= "<td class = 'center'>
                <input type = 'checkbox' name = '{$prex}visible' alias='{$key}' class = 'visible' value = '1' ".($config['visible']?"checked":"").">
                </td>";
                $max_mark_html .= "<td class = 'center'>
                <input type = 'text' name = '{$prex}max_mark' alias='{$key}' ".($config['visible'] && !$config['readonly']?"": "readonly")." value = '".$config['max_mark']."' class = ' max_mark input_mark $class'>
                </td>";
                $weight_html .= "<td class = 'center'>
                <input type = 'text' name = '{$prex}weight' alias='{$key}' ".($config['visible']?"": "readonly")." value = '".$config['weight']."' class = 'weight input_weight $class'>
                </td>";
                $readonly_html .= "<td class = 'center'>
                <input type = 'checkbox' class = 'cf_readonly' name = '{$prex}readonly' alias='{$key}' ".($config['visible']?"": "disabled")." value = '1' ".($config['readonly']?"checked":"").">
                </td>";
                $formula_html .= "<td class = 'center'>
                <input type = 'text' style='".($config['readonly']?"":"display:none;")."' alias='{$key}' value = '{$config['formula']}' class = 'input_formula formula'
                name = '{$prex}formula' >
                </td>";
            }
            $table = "
            <input type = 'hidden' id = 'config_content_js' value = '{}'>
            <table id = 'config_content' width='100%'>
            <thead>
            <tr>
            <td rowspan = 2> </td>
            $title_html
            </tr>
            <tr>
            $alias_html
            </tr>

            </thead>
            <tbody>
            <tr>
            <td><b>Visible</b></td>
            $visible_html
            </tr>
            <tr>
            <td><b>Max mark</b></td>
            $max_mark_html
            </tr>
            <tr>
            <td><b>Weight (%)</b></td>
            $weight_html
            </tr>
            <tr>
            <td><b>Readonly</b></td>
            $readonly_html
            </tr>
            <tr>
            <td><b>Formula</b></td>
            $formula_html
            </tr>
            </tbody>
            </table>";

            return $table;
        }

        function getConfigHTML($content = null) {
            if(empty($content))
                $configs = json_decode(html_entity_decode($this->content),true) ;
            else
                $configs = json_decode(html_entity_decode($content),true) ;

            $koc_adult = $GLOBALS['db']->getOne("SELECT
                IFNULL(kc.kind_of_course_adult, '')
            FROM
                j_gradebookconfig gc
                    INNER JOIN
                j_kindofcourse kc ON kc.id = gc.koc_id AND gc.deleted = 0
                    AND kc.deleted = 0
                    AND gc.id = '{$this->id}'");

            $config_default = $this->gradebook_config_mark_options;
            if (!empty($koc_adult)){
                $config_default = $this->gradebook_config_mark_options_adult;
            }
            $title_html = "";
            $alias_html = "";
            $visible_html = "";
            $max_mark_html = "";
            $weight_html = "";
            $readonly_html = "";
            $formula_html = "";
            foreach($config_default as $key => $param) {
                if(!isset($configs[$key]) || !$configs[$key][visible])
                    continue;
                $config = $configs[$key];

                $title_html .= "<td class = 'center no-bottom-border'><b>".$param['label']."</b></td>";
                $alias_html .= "<td class = 'center no-top-border'><b>".$param['alias']."</b></td>";
                $prex = $param['name']."_";

                $max_mark_html .= "<td class = 'center'>
                <span alias='{$key}' class = ' max_mark input_mark'> ".$config['max_mark']."</span>
                </td>";
                $weight_html .= "<td class = 'center'>
                <span alias='{$key}' class = 'weight input_weight'>".$config['weight']."</span>
                </td>";
                $readonly_html .= "<td class = 'center'>
                <span class = 'cf_readonly' alias='{$key}'>  ".($config['readonly']?"Yes":"No")." </span>
                </td>";
                $formula_html .= "<td class = 'center'>
                <span alias='{$key}' class = 'input_formula formula' >{$config['formula']}</span>
                </td>";
            }
            $table = "
            <table id = 'config_content' class = 'table-border' width='100%' cellpadding=0 cellspacing=0>
            <thead>
            <tr>
            <td rowspan = 2> </td>
            $title_html
            </tr>
            <tr>
            $alias_html
            </tr>

            </thead>
            <tbody>
            <tr>
            <td><b>Max mark</b></td>
            $max_mark_html
            </tr>
            <tr>
            <td><b>Weight(%)</b></td>
            $weight_html
            </tr>
            <tr>
            <td><b>Readonly</b></td>
            $readonly_html
            </tr>
            <tr>
            <td><b>Formula</b></td>
            $formula_html
            </tr>
            </tbody>
            </table>";

            return $table;
        }
    }
?>