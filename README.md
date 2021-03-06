# How to upgrade YII2 to Bootstrap 4

© 2021 J. Lavelle (http://jlavelle.uk) all rights reserved

## Licence
Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

 * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
 * Neither the name of J Lavelle nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

## How to:
These are step-by-step instructions but they assume you have some knowledge of web programming, PHP, HTML, CSS and database setup.
### Preparation
1. Download and install Composer if you haven't already done so: https://getcomposer.org/download/
2. Update Composer if required (version 2 required): `composer selfupdate`
3. Download Yii2 BASIC into the **bootstrap4** folder of your **_htdocs_** folder: `composer create-project --prefer-dist yiisoft/yii2-app-basic bootstrap4`
4. Create a database called **bootstrap4**.
5. Open Yii2 Basic in your favourite editor. For the video we're using NetBeans (https://netbeans.apache.org/)
6. In _config/web.php_ uncomment the 'urlManager' section to enable Pretty Urls
7. In _config/db.php_ enter your database details:
```
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=bootstrap4',
    'username' => 'root', // ← enter your username
    'password' => '',     // ← enter your password
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
```

8. Check that everything is working in your browser: http://localhost/bootstrap4/index.php You should see the Yii2 Home Page. Open all the pages on the menu to check they are working correctly.
9. Create some dummy data for the database. Either download the SQL file or create a migration. **Either** run the following SQL in your database manager: https://github.com/JQL/yii2-bootstrap4/blob/main/bootstrap4.sql **Or** copy the _migrations_ folder: https://github.com/JQL/yii2-bootstrap4/tree/main/migrations and place it in the root of the _bootstrap4_ folder and run ```./yii migrate```. **_Do Not Do Both_** Note: This will create a table called **Country** with some dummy data. Watch the video if you're uncertain how to do this.
10. Check that the table exists and is populated with data in your Database Manager.
11. Start GII http://localhost/bootstrap4/gii and create a Model called **County** using your default settings. Watch the video if you're uncertain as to which settings to use.
12. Create "CRUD" for the Model using your favourite settings. Watch the video if you're uncertain as to which settings to use.
13. Check it works by running: http://localhost/bootstrap4/country
14. Add a link to the _views/layouts/main.php_ in the "Nav::widget" to make it easier to access the country page.

```
      ['label' => 'Country', 'url' => ['/country/index']],
```

We now have a fully operational site using Yii2 and Bootstrap 3.

Note: if you have a template on your system like AdminLTE which uses Bootstrap 3 then upgrading will break the template and you will need to edit the template's css.


### Installing and configuring Bootstrap 4 on Yii2
Watch the video from ""
1. Open Terminal in your _htdocs/bootstrap4_ folder. It is essential you are in the root of your _bootstrap4_ folder.
2. Uninstall Bootstrap 3 from Yii2:

```
      composer remove yiisoft/yii2-bootstrap
```

3. Install Bootstrap 4:

```
      composer require yiisoft/yii2-bootstrap4
```

4. If you try to open http://localhost/bootstrap4 you will get errors. **This is normal.** We are now going to fix those errors.
5. Using Search and Replace but **excluding** the _vendor_ folder replace the following in all the PHP files:

```
      yii\bootstrap\
```
**with:**

```
      yii\bootstrap4\
```

6. In _views/layouts/main.php_ change this "use" line:
```
      use yii\widgets\Breadcrumbs;
```
**to:**
```
      use yii\bootstrap4\Breadcrumbs;
```

7. In the same file, _views/layouts/main.php_, change the css in the Navbar 'options' 'class' as and the footer follows:

**NavBar:**
```
      NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
          'class' => 'navbar-inverse navbar-fixed-top', // ← change this line
        ],
      ]);
      echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'], // ← change this line
[...]
```
**to:**
```
      NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
          'class' => 'navbar-expand-lg navbar-dark bg-dark fixed-top',
        ],
      ]);
      echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
[...]
```
**Footer:**
```
<footer class="footer">
  <div class="container">
    <p class="pull-left">&copy;<?= date('Y') ?> J. Lavelle</p>

    <p class="pull-right"><?= Yii::powered() ?></p>
  </div>
</footer>
```
**to:**
```
<footer class="footer">
  <div class="container">
    <p class="float-left">&copy;<?= date('Y') ?> J. Lavelle</p>

    <p class="float-right"><?= Yii::powered() ?></p>
  </div>
</footer>
```
8. In _assets/AppAsset.php_ make the following changes:

    a). In the $css add the CDN for Bootstrap Icons:
```
    public $css = [
        'css/site.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', // ← add this line
    ];
```


    b). In the $depend" change \bootstrap\ to \bootstrap4\ if it hasn't already been changed in step 5 above:
```
    'yii\bootstrap\BootstrapAsset',
```
**to:**
```
    'yii\bootstrap4\BootstrapAsset',
```
9. **If you are using an older version of Yii2 which _doesn't_ show the icons in _country/index.php_**  then in the root of the bootstrap4 folder create the folder: `components\grid` and inside create the following file **ActionColumn.php**. Note: newer versions of Yii2 have the icons hardcoded into the ActionColumn file so no change is needed:
```
<?php

namespace app\components\grid;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

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
      $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
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
```
In _views/country/index.php_ change the ActionColumn class to:
```
['class' => 'app\components\grid\ActionColumn4'],
```

10. In <i>views/country/&#95;form.php</i> replace the two instances of **widgets** with **bootstrap4**
11. In _views/country/index.php_ and _views/country/list.php_ after `'dataProvider' => $dataProvider,` add: `'pager'=>['class' => \yii\bootstrap4\LinkPager::class],` This fixes the pager widget.
12. Open http://localhost/bootstrap4 in your browser and check everything works.


All done. If you use GII to create CRUD or forms etc. you will need to edit the created files to use bootstrap4.
