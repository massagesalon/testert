<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/feedback.css">

    <?php
    $title ="Зворотній зв'язок";
    require_once "assets/blocks/head.php";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready (function (){
            $("#done").click (function(){
                $('#messageShow').hide ();
                var name = $("#name").val ();
                var email = $("#email").val ();
                var message = $("#message").val ();
                var fail = "";
                if (name.length < 2) fail = "ім'я не менше 2 символів!!!";
                else if (email.split ('@').length - 1 == 0 || email.split ('.').length - 1 == 0)
                    fail = "Не правильна пошта!!!";
                else if (message.length < 5)
                    fail = "Поле тексту не повинно бути порожнім!!!";
                if (fail != ""){
                    $('#messageShow').html (fail + "<div class='clear'><br></div>");
                    $('#messageShow').show ();
                    return false;
                }
                $.ajax ({
                    url: 'ajax/userdata.php',
                    type: 'POST',
                    cache: false,
                    data: {'name': name, 'email': email, 'message': message},
                    dataType: 'html',
                    success: function (data){
                        alert(data);
                    }
                });
            });
        });
    </script>

</head>
<body>

    <?php require_once "assets/blocks/header.php" ?>

    <div class="intro">
        <div class="container">
            <div class="intro__inner">
                <h2 class="intro__suptitle">Зв'яжіться з нами</span></h2>

                <section class="contact_from">
                    <div class="contact_wraper">
                        <form action="#" name="newform" method="post">
                            <div class="form_inputs">
                                <p>Name <span class="red">*</span><input type="text" placeholder="Your full name" id="name" name="name"></p>
                                <p>Email adress <span class="red">*</span><input type="email" name="email" placeholder="example@mail.com" id="email"></p>
                            </div>
                            <p>Message <span class="red">*</span></p>
                            <textarea name="message" id="message" placeholder="Your problems"></textarea>
                            
                            <div class="messageshow">

                                    <div id="messageShow"></div>
                            </div>


                            <div class="button__block">
                                <input type="submit" name="done" id="done" value="SEND">
                            </div>
                        </form>
                    </div>
                </section>

                
            </div>
        </div>

        <?php require_once "assets/blocks/footer.php" ?>

    </div>
</body>
</html>