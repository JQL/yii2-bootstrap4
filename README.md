# How to upgrade YII2 to Twitter Bootstrap 4

© 2021 J. Lavelle (http://jlavelle.uk) all rights reserved

## Licence
Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

 * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
 * Neither the name of J Lavelle nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

## How to:
These are step-by-step instructions but they assume you have some knowledge of web programming, PHP, HTML, CSS and dtabase setup.
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
    'username' => 'root', // enter your username
    'password' => '',     // enter your password
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
```

8. Check that everything is working in your browser: http://localhost/bootstrap4/web/index.php You should see the Yii2 Home Page. Open all the pages on the menu to check they are working correctly.
9. Create some dummy data for the database. Either download the SQL file or create a migration. **Either** run the sql in your database manager: https://github.com/JQL/yii2-bootstrap4/blob/main/bootstrap4.sql **Or** copy the _migrations_ folder: https://github.com/JQL/yii2-bootstrap4/tree/main/migrations and place it in the root of the _bootstrap4_ folder and run ```./yii migrate```. **_Do Not Do Both_**
