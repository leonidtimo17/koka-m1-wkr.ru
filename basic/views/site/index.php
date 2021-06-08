<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Главная';
?>
<div class="site-index">

    <div class="jumbotron">
        <p id="counter">Список заявок обновится через 5 секунд</p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
            foreach($requests as $request){
                                echo '
                                <div class="col-lg-6">
                                    <p>'.$request->timestamp.'</p>
            
                                    <p>'.$request->address.'</p>
            
                                    <p>'.$request->description.'</p>
            
                                    <img class="img-responsive" src="/uploads/'.$request->photoAfter.'" alt="koka"
                                    data-before="/uploads/'.$request->photoBefore.'" data-after="/uploads/'.$request->photoAfter.'"
                                    onmouseover="hover(this)" onmouseout="back(this)">
            
                                </div>
                                ';
                            }
                        ?>
        </div>

    </div>
</div>
<script>
    var i = 0;
    function hover(el){
        el.src = el.dataset.before;
    }
    function back(el){
        el.src = el.dataset.after;
    }

    function updateCounter(){
        $.ajax({
            type: 'GET',
            url: '<?= Url::toRoute('/site/counter') ?>',

            dataType: 'text',
            success: function (response){
                $('#counter').html('Решено заявок: ' + response);
            }
        });
    }
    setInterval(updateCounter, 5000);
</script>