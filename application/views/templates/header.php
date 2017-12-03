<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Tasty Recipes</title>
        <meta name="Nicklas Ockelberg" content="Seminar 3">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/stylesheet.css">
    </head>
    <body>
        <?php $this->session->set_userdata('last_page', current_url()); ?>
        <h1 id="header"><a href="<?php echo base_url(); ?>home">Tasty Recipes</a></h1>
        <div class="navbar">
            <a href="<?php echo base_url(); ?>home">Home</a>
            <a href="<?php echo base_url(); ?>calendar">Calendar</a>
            <div class="dropdown">
                <button class="dropbtn">Recipes
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="<?php echo base_url(); ?>meatballs">Meatballs</a>
                    <a href="<?php echo base_url(); ?>pancakes">Pancakes</a>
                </div>
            </div>
            <?php if(!$this->session->userdata('logged_in')) : ?>
            <a href="<?php echo base_url(); ?>users/register">Register</a>
            <button id="loginbtn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log in</button>
            <?php endif ?>

            <?php if($this->session->userdata('logged_in')) : ?>
            <a href="<?php echo base_url(); ?>users/logout" style="float:right;" id="logoutbtn">Log out</a>
            <?php endif ?>
        </div>
        <div id="container">
            <div id="id01" class="modal">
                <form class="modal-content animate" action="<?php echo base_url(); ?>users/login" method="post">
                    <div class="form-group">
                        <label>Username:<sup>*</sup></label>
                        <input type="text" name="username"class="form-control" value="" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Password:<sup>*</sup></label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p>Don't have an account? <a href="<?php echo base_url(); ?>users/register">Sign up now</a>.</p>
                    <div class="container">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>
            <?php if($this->session->flashdata('login_failed')):?>
            <?php echo '<p class="fail">'.$this->session->flashdata('login_failed').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('comment_created_fail')):?>
            <?php echo '<p class="fail">'.$this->session->flashdata('comment_created_fail').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('user_registered')):?>
            <?php echo '<p class="success">'.$this->session->flashdata('user_registered').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('comment_created')):?>
            <?php echo '<p class="success">'.$this->session->flashdata('comment_created').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('comment_deleted')):?>
            <?php echo '<p class="success">'.$this->session->flashdata('comment_deleted').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('user_loggedout')):?>
            <?php echo '<p class="success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('user_loggedin')):?>
            <?php echo '<p class="success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
            <?php endif; ?>
