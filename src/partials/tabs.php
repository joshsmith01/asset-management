<?php
// Remember the file paths are from the dist directory and not from the src directory. -JMS
require 'assets/php/tabs-action.php';
?>
<div class="row small-12 columns">

    <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Employees</a></li>
        <?php

        if ( $_SESSION['role_id'] >= 2 ) {

            echo '<li class="tabs-title"><a href="#panel2">Companies</a></li>';

            if ( $_SESSION['role_id'] >= 3 ) {

                echo '<li class="tabs-title"><a href="#panel3">Assets</a></li>';
                echo '<li class="tabs-title"><a href="#panel4">Inventory</a></li>';
                echo '<li class="tabs-title"><a href="#panel5">Category</a></li>';
            }
        }
        ?>
    </ul><!--  END ul.tabs -->

    <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1">
            {{> employee-create}}
        </div>


        <?php
        if ( $_SESSION['role_id'] >= 2 ) { ?>
            <div class="tabs-panel" id="panel2">
                {{> company-create}}
            </div>
            <?php if ( $_SESSION['role_id'] >= 3 ) { ?>
                <div class="tabs-panel" id="panel3">
                    {{> asset-create}}
                </div>
                <div class="tabs-panel" id="panel4">
                    <p>Inventory</p>
                    <p>Assign Inventory to Users</p>
                </div>
                <div class="tabs-panel" id="panel5">
                    {{> category-create}}
                </div>
            <?php
                }
            }
            ?>

    </div><!--  END tabs-content -->

</div><!--  END  row small-12 columns -->