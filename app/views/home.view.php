<!--                        HTML
******************************************************************************************
******************************************************************************************
******************************************************************************************
******************************************************************************************
 -->
 <!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>wszn</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      h1 {
          margin-bottom: 10px;
      }
      .mybtn_1 {
        padding: 10px 70px;
      }
      .answer_extrasens {
        margin: 10px 0;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
        padding-top: 5rem;
      }
      .starter-template {
        padding: 3rem 1.5rem;
        text-align: center;
      }
    </style>
  </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <div class="container">
                    <div class="row col-12">
                    <a class="navbar-brand" href="#">
                        <img src="https://bootstrap-4.ru/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Bootstrap
                    </a>

                    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            
                        </ul>
                    </div>
                    <form action="/" method="post" class="form-inline my-2 my-lg-0 mr-auto">
                        
                        <button name="ses_detroy" class="btn btn-secondary my-2 my-sm-0" type="submit">Clean session</button>
                    </form>
                    </div>
                </div>
            </nav>
        </header>

        <main role="main" class="container">
            <section class="text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-8 col-md-8 mx-auto">
                        <h1 class="fw-light">Общество Web экстрасенсов</h1>
                        <p class="lead text-muted">Web экстрасенсы умеют читать ваши мысли. <br>Хотите проверить? <br>Загадайте двузначное число и нажмите кнопку.</p>

                        
                        <div class="form">
                        
                            <form action="/" method="post">
                                
                            
                            <? if ( !isset($_POST['user_send_ok']) ): ?>
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
                        
                            
                                
                            <? if ( isset($_SESSION['kwest']) ): ?>
                                <div class="row">
                                <div class="col-lg-4 mx-auto">
                                <div class="answer_extrasens alert alert-success alert-dismissible fade show" role="alert">
                                    <?php foreach($_SESSION['kwest'] as $key => $val): ?>
                                        <? if ( $key !== 'id' && $key !== 'userNumber' ): ?>
                                            <p><b><?= $key; ?> : <?= $val; ?></b></p>   
                                        <? endif;?>
                                    
                                        
                                    <?php endforeach;?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                </div>
                                </div>
                            <? endif;?>
                                       
                        </div>

                        
                    </div>
                </div>
            </section>

            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                <? if ( isset($_SESSION['veracity']) ): ?>
                    <div class="col-lg-5">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Экстрасенс</th>
                                    <th scope="col">Уровень Достоверности</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($_SESSION['veracity'] as $key => $val ):?>
                                    
                                <tr>
                                
                                    <td><?= $key;?></td>
                                
                                    <td><?= $val;?></td>
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
                                <?php foreach($_SESSION['history_kwests'] as $kwest):?>
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


        </main><!-- /.container -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
