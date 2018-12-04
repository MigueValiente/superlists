<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
?>
<div class="container">
    <div id="my_lists" class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item <?=($section=="name"?"list-group-item-dark":"")?>"><a href="<?=BASE_URL?>profile/?section=name">Nombre <i class="fas fa-angle-right float-right"></i></a></li>
                <li class="list-group-item <?=($section=="email"?"list-group-item-dark":"")?>"><a href="<?=BASE_URL?>profile/?section=email">Email<i class="fas fa-angle-right float-right"></i></a></li>
                <li class="list-group-item <?=($section=="password"?"list-group-item-dark":"")?>"><a href="<?=BASE_URL?>profile/?section=password">Password<i class="fas fa-angle-right float-right"></i></a></li>
            </ul>
        </div>
        <div class="col-9">
            <?php require_once $section.'.view.php'; ?>
        </div>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>