<?php $this->layout('layout', ['title' => 'wszn']) ?>

            <section class="text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-8 col-md-8 mx-auto">
                        <h1 class="fw-light">Общество Web экстрасенсов</h1>
                        <p class="lead text-muted">Web экстрасенсы умеют читать ваши мысли. <br>Хотите проверить? <br>Загадайте двузначное число и нажмите кнопку.</p>

                        
                        <div class="form">
                        
                            <form action="/" method="post">

                            <? if ( !isset($_POST['user_send_ok']) && !isset($Error) ): ?>
                                <button name="user_send_ok" type="submit" class="mybtn_1 btn btn-primary">Ok</button>
                            <? else: ?>
                                <div class="row g-2 justify-content-center">
                                    <div class="col-auto">
                                        <label for="inputnum" class="col-form-label">Введите ваше число:</label>
                                    </div>
                                    <div class="col-2">
                                        <input name="user_number" type="text" id="inputnum" class="form-control">
                                    </div>
                                    <div class="col-auto">
                                        <button name="user_send_number" type="submit" class="btn btn-primary">Отправить</button>
                                    </div>
                                </div>
                            <? endif;?>

                            </form>   
                                
                            <? if ( isset($kwest) ): ?>
                                <div class="row">
                                <div class="col-lg-4 mx-auto">
                                <? if ( isset($Error) ): ?>
                                    <div class="answer_extrasens alert alert-danger alert-dismissible fade show" role="alert">
                                        <p><b><?= $Error; ?></b></p> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <? else: ?> 
                                    <div class="answer_extrasens alert alert-success alert-dismissible fade show" role="alert">
                                        <?php foreach($kwest as $extrasensName => $extrasensNumber): ?>

                                            <? if ( $extrasensName !== 'id' && $extrasensName !== 'userNumber' ): ?>
                                                <p><b><?= $extrasensName; ?> : <?= $extrasensNumber; ?></b></p>   
                                            <? endif;?>
                                        
                                        <?php endforeach;?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <? endif;?>
                                
                                </div>
                                </div>
                            <? endif;?>
                                       
                        </div>

                        
                    </div>
                </div>
            </section>

            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                <? if ( isset($veracity) ): ?>
                    <div class="col-lg-5">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Экстрасенс</th>
                                    <th scope="col">Уровень Достоверности</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($veracity as $extrasensName => $extrasensVeracity ):?>
                                    
                                <tr>
                                    <td><?= $extrasensName;?></td>
                                
                                    <td><?= $extrasensVeracity;?></td>
                                </tr>
                                <?php endforeach;?>

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
                                <th scope="col">Ext_5</th>
                                <th scope="col">Ext_6</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($history_kwests as $kwest):?>
                                <tr>
                                
                                <td><?= $kwest['id'];?></td>
                                <td><?= $kwest['userNumber'];?></td>

                                <td><?= $kwest['Extrasens_1'];?></td>
                                <td><?= $kwest['Extrasens_2'];?></td>
                                <td><?= $kwest['Extrasens_3'];?></td>
                                <? if ( $kwest['Extrasens_4'] ): ?>
                                <td><?= $kwest['Extrasens_4'];?></td>
                                <? endif; ?>
                                <? if ( $kwest['Extrasens_5'] ): ?>
                                <td><?= $kwest['Extrasens_5'];?></td>
                                <? endif; ?>
                                <? if ( $kwest['Extrasens_6'] ): ?>
                                <td><?= $kwest['Extrasens_6'];?></td>
                                <? endif; ?>


                                </tr>
                                <?php endforeach;?>

                            </tbody>
                        </table>
                    </div>
                    <? endif;?>
                </div>
            </section>
