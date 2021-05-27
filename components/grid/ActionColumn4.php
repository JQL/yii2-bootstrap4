<?php

/**
 * Basic PHP File for ActionColumn4
 *
 * @copyright © 2021, John Lavelle  Created on : 27 May 2021, 11:30:14
 *
 * No part of this site may be reproduced without prior permission.
 *
 * Author     : John Lavelle
 * Title      : ActionColumn4
 */

namespace app\components\grid;

use Yii;
use yii\helpers\Html;
use yii\grid\ActionColumn;

/**
 * ActionColumn4 //add more information about this file
 *
 * @author John Lavelle
 * @since 1.0 // Update version number
 */
class ActionColumn4 extends ActionColumn
{

  protected function initDefaultButtons()
  {
    $this->initDefaultButton('view', 'bi bi-eye');      //  'eye-open'
    $this->initDefaultButton('update', 'bi bi-pencil'); //  'pencil'
    $this->initDefaultButton('delete', 'bi bi-trash', [//  'trash'
      'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
      'data-method' => 'post',
    ]);
  }

  protected function initDefaultButton($name, $iconName, $additionalOptions = [])
  {
    if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false)
    {
      $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions)
      {
        switch ($name)
        {
          case 'view':
            $title = Yii::t('yii', 'View');
            break;
          case 'update':
            $title = Yii::t('yii', 'Update');
            break;
          case 'delete':
            $title = Yii::t('yii', 'Delete');
            break;
          default:
            $title = ucfirst($name);
        }
        $options = array_merge([
          'title' => $title,
          'aria-label' => $title,
          'data-pjax' => '0',
          ], $additionalOptions, $this->buttonOptions);
        $icon = isset($this->icons[$iconName]) ? $this->icons[$iconName]
          //  : Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
          : Html::tag('span', '', ['class' => $iconName]);
        return Html::a($icon, $url, $options);
      };
    }
  }

}
