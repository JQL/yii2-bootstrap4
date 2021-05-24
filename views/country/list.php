<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Countries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
<?= Html::a(Yii::t('app', 'Create Country'), ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

  <?=
  ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
  ]);
  ?>

<?php Pjax::end(); ?>

</div>
