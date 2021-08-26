<?php $this->layout('layout', ['title' => 'wszn']) ?>

<section class="text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-8 col-md-8 mx-auto">
            <h1 class="fw-light">Общество Web экстрасенсов</h1>
            <p class="lead text-muted">Web экстрасенсы умеют читать ваши мысли. <br>Хотите проверить? <br>Загадайте двузначное число и нажмите кнопку.</p>

            <div class="form">

                <form action="/number" method="post">
                    <button name="user_send_ok" type="submit" class="mybtn_1 btn btn-primary">Ok</button>
                </form>

            </div>

        </div>
    </div>
</section>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <? if ($game->GetCurrentRound() > 0) : ?>
            <div class="col-lg-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Экстрасенс</th>
                            <th scope="col">Уровень Достоверности</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($game->GetPsychics() as $psychic) : ?>

                            <tr>
                                <td><?= $psychic->GetName() ?></td>

                                <td><?= $psychic->GetVeracity() ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-7">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Число пользователя</th>
                            <th scope="col">Ext_1</th>
                            <th scope="col">Ext_2</th>
                            <th scope="col">Ext_3</th>
                            <th scope="col">Ext_4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($game->GetRounds() as $round) : ?>
                            <tr>

                                <td><?= $round->GetCurrentRound() ?></td>
                                <td><?= $round->GetUserNumber() ?></td>

                                <?php foreach ($round->GetPsychics() as $psychicCurrentGuess) : ?>
                                    <td><?= $psychicCurrentGuess ?></td>
                                <?php endforeach; ?>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        <? endif; ?>
    </div>
</section>