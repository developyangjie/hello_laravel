<?php if(count($errors)){?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors->all() as $error){?>
                <li><?= $error?></li>
            <?php }?>
        </ul>
    </div>
<?php }?>
