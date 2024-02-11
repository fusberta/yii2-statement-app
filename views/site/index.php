<?php

/** @var yii\web\View $this */

$this->title = 'Портал "Нарушениям.Нет"';
$this->registerCss('
.running-text{
    height: 30px;
    width:100%;
    margin:10px auto;
  }
.running-text p{
    text-align:center;
    color:#000;
    text-transform: uppercase;
    padding-top: 10px;
    animation: text 5s infinite linear;
    padding-left: 100%;
    white-space: nowrap;
}
@keyframes text {
    0%{
      transform: translate(0, 0);
    }
    
    100%{
      transform: translate(-200%, 0);
    }
  }'
)
    ?>

<div class="site-index mt-5">
    <div style="overflow: hidden;">
        <div class='running-text'>
            <p>Делай дороги безопаснее вместе с нами!</p>
        </div>
        <h2>Добро пожаловать на портал "Нарушениям.Нет"!</h2>

        <p class="lead">У нас вы можете сообщить о нарушениях правил дорожного движения.</p>

        <?php if (Yii::$app->user->isGuest): ?>
            <div class="d-flex gap-2 flex-wrap">
                <a class="btn btn-md btn-success" style="background-color: #530FAD; border:none;" href="<?= Yii::$app->urlManager->createUrl(['user/create'])
                    ?>">Зарегистрироваться &raquo;</a>
                <a class="btn btn-md btn-success" style="background-color: #530FAD; border:none;" href="<?= Yii::$app->urlManager->createUrl(['site/login'])
                    ?>">Войти &raquo;</a>
            </div>
        <?php else: ?>
            <a class="btn btn-md btn-success" style="background-color: #530FAD; border:none;" href="<?= Yii::$app->urlManager->createUrl(['statement/report'])
                ?>">Подать заявление &raquo;</a>
        <?php endif; ?>
    </div>

    <div class="body-content mt-3">
        <div class="row">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title">Удобство использования</h2>
                            <p class="card-text">Наш портал предоставляет простой и удобный интерфейс для подачи
                                заявлений о нарушениях.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title">Безопасность</h2>
                            <p class="card-text">Мы гарантируем конфиденциальность ваших данных и надежность нашей
                                системы.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="card-title">Поддержка</h2>
                            <p class="card-text">Наша команда готова помочь вам в любое время суток.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>