<?php
session_start();
//session_destroy();
//exit();

/**
 * Created by PhpStorm.
 * User: Kooz
 * Date: 01.02.2018
 * Time: 18:31
 */


//var_dump($_SESSION);
?>
<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<style>
    #my_td {
        text-align: right;
        padding-right: 2%;
    }
    .my_div{
        padding-left: 5%;
        margin-left: 10%;
    }



</style>
<h1 align="center">VALIDATION</h1>
<br>
<div class="my_div">
    <form class="form-horizontal" action="/form.php" method="post">

        <div class="control-group">

            <label class="control-label" for="name">NAME</label>

            <div class="controls">

                <input class="" id="name" type="text" name="name" placeholder="Name" required
                       value="<?= !empty($_SESSION['name']) ? $_SESSION['name'] : ''; ?>"/>
            </div>
            <div class="controls">
            <span class="help-inline">
            <?php
            if (!empty($_SESSION['error']['name'])) {
                echo '<span style="color:red;">' . $_SESSION['error']['name'] . '</span>';
            }
            ?>
                </span>
            </div>
        </div>

        <div class="control-group">

            <label class="control-label" for="email">EMAIL</label>
            <div class="controls">

                <input class="" id="email" type="text" name="email" placeholder="email" required
                       value="<?= !empty($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"/>
            </div>
            <?php
            if (!empty($_SESSION['error']['email'])) {
                echo '<span style="color:red;">' . $_SESSION['error']['email'] . '</span>';
            }
            ?>
        </div>
        <div class="control-group">
            <label class="control-label" for="rating">RATING</label>
            <div class="controls">
                <?php
                for($i=1;$i<6;$i++){
                    echo '<input type="radio" value="'.$i.'" name="rating" '.(!empty($_SESSION['rating'])&&$i==$_SESSION['rating']? 'checked':"").'/><label class="control-label" for="rating">'.$i.'</label>';
                }
                ?>
            </div>
            <?php
            if (!empty($_SESSION['error']['rating'])) {
                echo '<span style="color:red;">' . $_SESSION['error']['rating'] . '</span>';
            }
            ?>
        </div>
        <div class="control-group">
            <label class="control-label" for="password"> Message</label>
            <div class="controls">

                <textarea class="" id="message"  name="message"><?=
                    !empty($_SESSION['message']) ? $_SESSION['message'] : '';
                    ?></textarea>
            </div>
            <?php
            if (!empty($_SESSION['error']['message'])) {
                echo '<span style="color:red;">' . $_SESSION['error']['message'] . '</span>';
            }
            ?>
        </div>
        <input id="my_s" class="btn  btn-success " type="submit" value="SEND"/><br/>
    </form>
</div>
