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
?>
<!doctype html>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script language="JavaScript">
        $(document).ready(function(){
            $("#submit").click(function()
            {
                $("#erconts").fadeIn(5000);
                $.ajax(
                    {
                        type: "POST",
                        url: "comments.php", // Адрес обработчика
                        data: $("#callbacks").serialize(),
                        error:function()
                        {
                            $("#erconts").html("Произошла ошибка!");
                        },
                        beforeSend: function()
                        {
                            $("#erconts").html("<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading... </button>");
                        },
                        success: function(result)
                        {
                            $("#erconts").html(result);
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
                    <button type="button" class="btn btn-success" disabled>Комментатор</button>
                    <a href="author.php" role="button" aria-pressed="true" class="btn btn-info" >Авторы</a>
                    </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="heading text-center"><img src="assets/boroda.png" width="80" height="80">Бородатый комментатор 0.1</h2>
                    </div>
                </div>
                <form class="form-card" name="MyForm" id="callbacks" action="comments.php" method="POST" enctype="multipart/form-data">

                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="proxy" name="proxy" placeholder="192.168.0.1:8017:login:pass" value=""> <label>Proxy</label> </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="fp_id" name="fp_id" placeholder="1030005938588" value=""> <label>Страница ID</label> </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="ad_id" name="ad_id" placeholder="8234992304992300" value="" required> <label>Объявление ID</label> </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="input-group">
                                <label>Текст комментария</label>
                                <textarea id="message" name="message" placeholder="" value="" required></textarea>

                            </div>

                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-md-12"> <input type="submit" id="submit" value="Закомментить" class="btn btn-pay placeicon"></div>
                    </div>
                </form>

                <div class="alert alert-success" role="alert" id="erconts" style = "display: none">
                </div>

            </div>
        </div>
    </div>


</body>
</html>
