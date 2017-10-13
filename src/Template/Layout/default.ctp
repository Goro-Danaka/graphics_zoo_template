<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            if (isset($page_title)):
                echo $page_title;
            else:
                echo $this->fetch('title');
            endif;
            ?>            
        </title>
        <?= $this->fetch('meta') ?>
        <?= $this->Html->meta('icon'); ?>

        <?= $this->element('default_css'); ?>
        <?= $this->fetch('css') ?>
        <?php // echo $this->element('layout_css'); ?>
    </head>
    <body>
        <div class="app">
            <div class="layout">
                <?= $this->element('side_bar'); ?>
            </div>
            <div class="page-container">
                <?= $this->element('header'); ?>    
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content'); ?>
                <?= $this->element('footer'); ?>
            </div>            
        </div>
        <?= $this->element('default_js'); ?>
        <?= $this->fetch('script') ?>
    </body>
</html>


