<?php
/**
 * Created by PhpStorm.
 * User: PHPdev
 * Date: 14.12.2015
 * Time: 17:06
 */

namespace kak\widgets\BSwitch;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class BSwitch
 * @package kak\widgets\BSwitch
 * @docs options http://www.bootstrap-switch.org/options.html
 * @docs methods http://www.bootstrap-switch.org/methods.html
 * @docs events http://www.bootstrap-switch.org/events.html
 */
class BSwitch extends \yii\widgets\InputWidget
{
    const JS_KEY = '/kak/BSwitch';

    public function init(){
        parent::init();

        Html::addCssClass($this->options,'BSwitch');
    }

    public function run()
    {
        echo $this->hasModel()
            ? Html::activeCheckbox($this->model, $this->attribute, $this->options)
            : Html::checkbox($this->name, $this->value, $this->options);

        $this->registerAssets();
    }

    /**
     * Registers Assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        BootstrapSwitchAsset::register($view);

        //$id = $this->options['id'];


        $view->registerJs("jQuery('.BSwitch').bootstrapSwitch();" , $view::POS_READY, self::JS_KEY );


    }




}