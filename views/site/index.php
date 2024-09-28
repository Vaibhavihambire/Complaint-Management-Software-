<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


/** @var yii\web\View $this */

$this->title = 'CMS';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">CMS  
        </h1>
        
        <!-- <img src="/site/logo.png" alt="logo"> -->

        <p class="lead">Complaint Management Software </p>
            
        <!-- <?php 
            //echo (Yii::$app->user->isGuest) ? '<p><a class="btn btn-lg btn-success" href="web/index.php?r=site%2Flogin">Login</a></p>' : '<p><a class="btn btn-lg btn-success" href="">Already Logged in</a></p>';
        ?> -->

        <?php 
            if (Yii::$app->user->isGuest) {
                echo '<p><a class="btn btn-lg btn-success" href="web/index.php?r=site%2Flogin">Login</a></p>';
            } else {
                $username = Yii::$app->user->identity->username;
                echo '<p><a class="btn btn-lg btn-success">Welcome, ' . $username . '</a></p>';
            }
        ?>


    </div>
</div>
