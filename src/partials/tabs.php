<?php
// Remember the file paths are from the dist directory and not from the src directory. -JMS
require 'assets/php/tabs-action.php';
?>
<div class="row small-12 columns">

    <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Display Inventory</a></li>
        <?php

        if ( $_SESSION['role_id'] >= 2 ) {

            echo '<li class="tabs-title"><a href="#panel2">Create Manufacturer</a></li>';
            echo '<li class="tabs-title"><a href="#panel3">Create Category</a></li>';
            echo '<li class="tabs-title"><a href="#panel4">Create Assets</a></li>';
            echo '<li class="tabs-title"><a href="#panel5">Create Employee</a></li>';
            if ( $_SESSION['role_id'] >= 3 ) {

                echo '<li class="tabs-title"><a href="#panel6">Assign Assets</a></li>';
            }
        }
        ?>
    </ul><!--  END ul.tabs -->

    <div class="tabs-content" data-tabs-content="example-tabs">
        <div class="tabs-panel is-active" id="panel1">
            {{> inventory-display}}
        </div>
        <?php
        if ( $_SESSION['role_id'] >= 2 ) { ?>
            <div class="tabs-panel" id="panel2">
                {{> manufacturer-create}}
            </div>
            <div class="tabs-panel" id="panel3">
                
                {{> category-create}}
            </div>
            <div class="tabs-panel" id="panel4">
                {{> asset-create}}
            </div>
            <div class="tabs-panel " id="panel5">
                {{> employee-create}}
            </div>
            <?php if ( $_SESSION['role_id'] >= 3 ) { ?>

                <div class="tabs-panel " id="panel6">
                    <p>assign assets to employees</p>
                </div>

            <?php
                }
            }
            ?>

    </div><!--  END tabs-content -->

</div><!--  END  row small-12 columns -->