<?php
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


require_once('include/SugarForecasting/ForecastProcessInterface.php');
require_once('include/SugarForecasting/AbstractForecastArgs.php');
abstract class SugarForecasting_Chart_AbstractChart extends SugarForecasting_AbstractForecastArgs implements SugarForecasting_ForecastProcessInterface
{
    /**
     * Which data set are we working with?
     *
     * @var string
     */
    protected $dataset = 'likely';

    /**
     * Are we a manager
     *
     * @var bool
     */
    protected $isManager = false;

    /**
     * Where we store the data we want to use
     *
     * @var array
     */
    protected $dataArray = array();

    /**
     * The default properties that are passed back for the Chart
     *
     * @var array
     */
    protected $defaultPropertiesArray = array(
        'gauge_target_list' => 'Array',
        'title' => NULL,
        'subtitle' => '',
        'type' => 'bar chart',
        'legend' => 'on',
        'labels' => 'value',
        'print' => 'on',
        'thousands' => '',
        'goal_marker_type' =>
        array(
            0 => 'group',
            1 => 'pareto',
        ),
        'goal_marker_color' =>
        array(
            0 => '#000000',
            1 => '#7D12B2',
        ),
        'goal_marker_label' =>
        array(
            0 => 'Quota',
            1 => '',
        ),
        'label_name' => '',
        'value_name' => '',
    );

    /**
     * Default Colors
     *
     * @var array
     */
    protected $defaultColorsArray = array(
        0 => '#468c2b',
        1 => '#8c2b2b',
        2 => '#2b5d8c',
        3 => '#cd5200',
        4 => '#e6bf00',
        5 => '#7f3acd',
        6 => '#00a9b8',
        7 => '#572323',
        8 => '#004d00',
        9 => '#000087',
        10 => '#e48d30',
        11 => '#9fba09',
        12 => '#560066',
        13 => '#009f92',
        14 => '#b36262',
        15 => '#38795c',
        16 => '#3D3D99',
        17 => '#99623d',
        18 => '#998a3d',
        19 => '#994e78',
        20 => '#3d6899',
        21 => '#CC0000',
        22 => '#00CC00',
        23 => '#0000CC',
        24 => '#cc5200',
        25 => '#ccaa00',
        26 => '#6600cc',
        27 => '#005fcc',
    );

    /**
     * What the default chart value array looks like
     *
     * @var array
     */
    protected $defaultValueArray = array(
        'label' => '',
        'gvalue' => 0,
        'gvaluelabel' => 0,
        'values' => array(),
        'valuelabels' => array(),
        'links' => array(),
        'goalmarkervalue' => array(),
        'goalmarkervaluelabel' => array()
    );

    /**
     * Class Constructor
     * @param array $args       Service Arguments
     */
    public function __construct($args)
    {
        if(!empty($args['dataset'])) {
            $this->dataset = $args['dataset'];
        }

        parent::__construct($args);
    }

    /**
     * Return the data array
     *
     * @return array
     */
    public function getDataArray()
    {
        return $this->dataArray;
    }


    /**
     * Returns the module language strings based on whether or not a language is set in the $_SESSION.  If not, it
     * defaults to the global $current_language variable
     *
     * @param $module String value of the module language to load
     */
    public function getModuleLanguage($module) {
        // If the session has a language set, use that
        if(!empty($_SESSION['authenticated_user_language'])) {
            return return_module_language($_SESSION['authenticated_user_language'], $module);
        }

        global $current_language;
        return return_module_language($current_language, $module);
    }
}
