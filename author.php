<?php
/**
 * Created by PhpStorm.
 * User: m0pfin
 * Date: 26.07.2020
 * Time: 02:48
 */


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'includes/db.php';
include 'includes/connect.php';
include 'function/func.php';
?>
<!doctype html>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e5befccb76.js" crossorigin="anonymous"></script>

    <script language="JavaScript">
        $(document).ready(function(){
            $("#token").click(function()
            {
                $("#adAccId").fadeIn(5000);
                $.ajax(
                    {
                        type: "POST",
                        url: "func/getAdAccount.php", // Адрес обработчика
                        data: $("#callbacks").serialize(),
                        error:function()
                        {
                            $("#adAccId").html("Произошла ошибка!");
                        },
                        beforeSend: function()
                        {
                            $("#adAccId").html("<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading... </button>");
                        },
                        success: function(result)
                        {
                            $("#adAccId").html(result);
                            checkThis();
                        }
                    });
                return false;
            });
        });
    </script>
    <script language="JavaScript">
        $(document).ready(function(){
            $("#token").click(function()
            {
                $("#page_id").fadeIn(5000);
                $.ajax(
                    {
                        type: "POST",
                        url: "func/getPages.php", // Адрес обработчика
                        data: $("#callbacks").serialize(),
                        error:function()
                        {
                            $("#page_id").html("Произошла ошибка!");
                        },
                        beforeSend: function()
                        {
                            $("#page_id").html("<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading... </button>");
                        },
                        success: function(result)
                        {
                            $("#page_id").html(result);
                            checkThis();
                        }
                    });
                return false;
            });
        });
    </script>
    <script language="JavaScript">
        $(document).ready(function(){
            $(document).on('change', '#adAccId', function() {
                $("#pixel_id").fadeIn(5000);
                $.ajax(
                    {
                        type: "POST",
                        url: "func/getPixel.php", // Адрес обработчика
                        data: $("#callbacks").serialize(),
                        error:function()
                        {
                            $("#pixel_id").html("Произошла ошибка!");
                        },
                        beforeSend: function()
                        {
                            $("#pixel_id").html("<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading... </button>");
                        },
                        success: function(result)
                        {
                            $("#pixel_id").html(result);
                            checkThis();
                        }
                    });
                return false;
            });
        });
    </script>


    <style>
        .container-fluid {
            background-color: #C5CAE9
        }

        .heading {
            font-size: 40px;
            margin-top: 35px;
            margin-bottom: 30px;
            padding-left: 20px
        }

        .card {
            border-radius: 10px !important;
            margin-top: 60px;
            margin-bottom: 60px
        }

        .form-card {
            margin-left: 20px;
            margin-right: 20px
        }

        .form-card input,
        .form-card textarea {
            padding: 10px 15px 5px 15px;
            border: none;
            border: 1px solid lightgrey;
            border-radius: 6px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: arial;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px
        }

        .form-card input:focus,
        .form-card textarea:focus {
            -moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;
            -webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;
            box-shadow: 0px 0px 0px 1.5px skyblue !important;
            font-weight: bold;
            border: 1px solid #304FFE;
            outline-width: 0
        }

        .input-group {
            position: relative;
            width: 100%;
            overflow: hidden
        }

        .input-group input {
            position: relative;
            height: 80px;
            margin-left: 1px;
            margin-right: 1px;
            border-radius: 6px;
            padding-top: 30px;
            padding-left: 25px
        }

        .input-group label {
            position: absolute;
            height: 24px;
            background: none;
            border-radius: 6px;
            line-height: 48px;
            font-size: 15px;
            color: gray;
            width: 100%;
            font-weight: 100;
            padding-left: 25px
        }

        input:focus+label {
            color: #304FFE
        }

        .btn-pay {
            background-color: #304FFE;
            height: 60px;
            color: #ffffff !important;
            font-weight: bold
        }

        .btn-pay:hover {
            background-color: #3F51B5
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        img {
            border-radius: 5px
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            border-radius: 6px;
            box-sizing: border-box;
            border: 2px solid lightgrey;
            cursor: pointer;
            margin: 12px 25px 12px 0px
        }

        .radio:hover {
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2)
        }

        .radio.selected {
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 155, 0.4);
            border: 2px solid blue
        }

        .label-radio {
            font-weight: bold;
            color: #000000
        }
    </style>
</head>

<body>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class=" col-lg-6 col-md-8">
            <div class="card p-3">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="index.php" role="button" aria-pressed="true" class="btn btn-info" >Комментатор</a>
                    <button type="button" class="btn btn-success" disabled>Авторы</button>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="heading text-center"><img src="assets/author.png" width="155" height="80">Авторы</h2>
                    </div>
                </div>
                <form class="form-card" name="MyForm" id="callbacks" action="save.php" method="POST">
                    <input name="cat" type="hidden" value="author">
                    <input name="id" type="hidden" value="">
                    <input name="act" type="hidden" value="add">

                    <div class="row justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="input-group col-md-6"> <input type="text" id="proxy" name="proxy" placeholder="192.168.0.1:8017:login:pass" value=""> <label>Прокси</label> </div>
                                <div class="input-group col-md-6"> <input type="text" id="token" name="token" placeholder="Токен автора комментариев" value=""> <label>Автор комментариев</label> </div>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12"> <input type="submit" id="submit" value="Добавить" class="btn btn-pay placeicon"></div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="alert alert-success" role="alert" id="erconts" style = "display: none">
                </div>

                <?php
                if(isset($_GET['status'])){
                    if($_GET['status'] == 'delete'){
                        echo '<div class="alert alert-danger" role="alert">Автор: <span class="badge badge-primary">'.$_GET['name'].'</span>  - Удалён!</div>';
                    }
                    if($_GET['status'] == 'success'){
                        echo '<div class="alert alert-success" role="alert">Автор: <span class="badge badge-primary">'.$_GET['name'].'</span>  - Добавлен!</div>';
                    }
                    if($_GET['status'] == 'update'){
                        echo '<div class="alert alert-info" role="alert">Статусы обновлены!</div>';
                    }
                }
                ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-1">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='function/getStatusToken.php?reload_author'">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        </div>
                        <div class="col-md-5">Обновить статусы авторов</div>
                    </div>
                </div>
                <br>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php
                        $author =  $db->query("SELECT * FROM `author`");
                        if($author) foreach ($author as $authors):
                            ?>
                        <tr>
                        <td><?php echo $authors['id']; ?></td>
                        <td><?php echo $authors['name']; ?></td>
                        <td><?php echo status($authors['status']); ?></td>
                        <td><a href="save.php?act=delete&id=<?php echo $authors['id']?>&cat=author"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                </svg></a></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
</html>
