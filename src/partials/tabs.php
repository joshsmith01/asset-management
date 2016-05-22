<?php
// Remember the file paths are from the dist directory and not from the src directory. -JMS
require 'assets/php/tabs-action.php';
?>
<div class="row small-12 columns">

    <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Users</a></li>
        <?php

        if ( $_SESSION['role_id'] >= 2 ) {

            echo '<li class="tabs-title"><a href="#panel2">Companies</a></li>';

            if ( $_SESSION['role_id'] >= 3 ) {

                echo '<li class="tabs-title"><a href="#panel3">Assets</a></li>';
                echo '<li class="tabs-title"><a href="#panel4">Inventory</a></li>';
            }
        }
        ?>
    </ul><!--  END ul.tabs -->

    <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1">
            <p>Users</p>
            <p>Add New users and update existing users</p>
            <p>hi from the p tag</p>
        </div>


        <?php
        if ( $_SESSION['role_id'] >= 2 ) { ?>
            <div class="tabs-panel" id="panel2">
                <p>Companies</p>
                <p>Add New companies and update existing companies</p>
            </div>
            <?php if ( $_SESSION['role_id'] >= 3 ) { ?>
                <div class="tabs-panel" id="panel3">
                    <p>Assets</p>
                    <p>Add New assets and update existing assets</p>
                </div>
                <div class="tabs-panel" id="panel4">
                    <p>Inventory</p>
                    <p>Assign Inventory to Users</p>
                </div>
            <?php
                }
            }
            ?>

    </div><!--  END tabs-content -->

</div><!--  END  row small-12 columns -->