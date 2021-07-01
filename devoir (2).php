<!DOCTYPE html>
<html lang="en" dir="ltr">



<head>
        <script type="text/javascript"></script>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">

        <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
        <link rel="stylesheet" href="devoir.css">


        <title>Devoir </title>
</head>

<body>
        <form action="traitement" method="post">
                <div class="row">
                        <div class="col-md-6 mx-auto p-2">
                                <div class="card">
                                        <div class="login-box">
                                                <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign
                                                                Up</label>
                                                        <div class="login-space">
                                                                <div class="login">
                                                                        <div class="group"> <label for="user" class="label">Email
                                                                                        Address</label>
                                                                                <input id="user" type="email" name="username" class="input" placeholder="Enter your mail">
                                                                        </div>
                                                                        <div class="group"> <label for="pass" class="label">Password</label>
                                                                                <input id="pass" type="password" name="password1" class="input" data-type="password" placeholder="Enter your password">
                                                                        </div>
                                                                        <div class="group"> <input id="check" type="checkbox" class="check" checked> <label for="check"><span class="icon"></span>
                                                                                        Keep me Signed in</label> </div>
                                                                        <div class="group"> <input type="submit" name="connexion" class="button" value="Sign In">
                                                                        </div>
                                                                        <div class="hr"></div>
                                                                        <div class="foot"> <a href="#">Forgot
                                                                                        Password?</a>
                                                                        </div>
                                                                </div>
                                                                <div class="sign-up-form">
                                                                        <div class="group"> <label for="user" class="label">prenom</label>
                                                                                <input id="prenom" name="prenom" type="text" class="input" placeholder="Enter your name">
                                                                        </div>

                                                                        <div class="group"> <label for="user" class="label">nom</label> <input id="nom" name="nom" name="nom" type="text" class="input" placeholder="Enter your first name">
                                                                        </div>

                                                                        <div class="group"> <label for="pass" class="label">Password</label>
                                                                                <input id="password" name="password" type="password" class="input" data-type="password" placeholder="Create your password">
                                                                                <span id="firstspan"></span>
                                                                        </div>

                                                                        <div class="group"> <label for="pass" class="label">Repeat
                                                                                        Password</label>
                                                                                <input id="confirm_password" name="confirm_password" type="password" class="input" data-type="password" placeholder="Repeat your password">
                                                                                <span id="secondspan"></span>
                                                                        </div>

                                                                        <div class="group"> <label for="pass" class="label">Email
                                                                                        Address</label>
                                                                                <input id="mail" name="mail" type="email" class="input" placeholder="Enter your email address ">
                                                                        </div>

                                                                        <div class="group"> <label for="pass" class="label">Date
                                                                                        de naissance </label> <input id="bday" name="bday" type="date" class="input" placeholder="Enter your bithday">
                                                                        </div>

                                                                        <div class="group"> <label for="pass" class="label">
                                                                                        Address</label> <input id="adresse" name="adress" type="text" class="input" placeholder="Enter your address">
                                                                        </div>

                                                                        <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                                        Masculin
                                                                                </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                                        Feminin
                                                                                </label>
                                                                        </div>





                                                                        <div class="group"> <input type="submit" name="inscription" id="inscription" class="button" value="Sign Up">
                                                                        </div>
                                                                        <div class="hr"></div>
                                                                        <div class="foot"> <label for="tab-1">Already
                                                                                        Member?</label> </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </form>


        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <!--<script src="scriptexo2.js"></script> -->

        <script type="text/javascript">
                $(document).ready(function() {


                        $("#confirm_password").attr('disabled', true)
                        $("#inscription").attr('disabled', true)
                        $("#password").on('keyup', motdepassword)

                        function motdepassword() {

                                var tailleMotDePass = $("#password").val().length



                                var upperCase = new RegExp('[A-Z]');
                                var lowerCase = new RegExp('[a-z]');
                                var numbers = new RegExp('[0-9]');

                                if ($(this).val().match(upperCase) && $(this).val().match(lowerCase) && $(this).val().match(numbers) && tailleMotDePass < 9) {
                                        $("#confirm_password").attr('disabled', false);
                                        $("#firstspan").html("Trés Sécurisé ")


                                } else {
                                        $("#firstspan").html("Majuscule,miniscule,chiffre, le tout inférieur à 8");
                                        $("#firstspan").css("color", "green");

                                }

                                $("#confirm_password").on('keyup', password_confirm)

                                function password_confirm() {

                                        if ($("#confirm_password").val() == $("#password").val()) {
                                                $(secondspan).html("mot de passe Conforme")
                                                $(secondspan).css("color", "green")


                                                $("#inscription").attr("disabled", false)

                                        } else {

                                                $(secondspan).html("mot de passe non conforme")
                                                $(secondspan).css("color", "red")


                                        }
                                }



                        }
                })
        </script>

</body>

</html>