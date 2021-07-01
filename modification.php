<!DOCTYPE html>
<html lang="en" dir="ltr">



<head>
    <script type="text/javascript"></script>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
    <link rel="stylesheet" href="modification.css">


    <title>Devoir </title>
</head>
<?php







?>

<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <form id="regForm" method="POST" action="traitement.php?idM=<?php echo $_GET['idM']; ?>">
                    <h1 id="register">modification </h1>
                    <div class="all-steps" id="all-steps"> <span class="step"><i class="fa fa-user"></i></span> <span class="step"><i class="fa fa-map-marker"></i></span> <span class="step"><i class="fa fa-shopping-bag"></i></span> <span class="step"><i class="fa fa-car"></i></span> <span class="step"><i class="fa fa-spotify"></i></span> <span class="step"><i class="fa fa-mobile-phone"></i></span> </div>
                    <div class="tab">
                        <h6> le prenom stp</h6>
                        <p> <input placeholder="prénom" oninput="this.className = ''" name="prenom"></p>
                    </div>
                    <div class="tab">
                        <h6> le nom </h6>
                        <p><input placeholder="nom de famile" oninput="this.className = ''" name="nom"></p>
                    </div>
                    <div class="tab">
                        <h6>ton mail?</h6>
                        <p><input placeholder="ton mail stp " oninput="this.className = ''" name="mail"></p>
                    </div>
                    <div class="tab">
                        <h6>Ton mot de passe </h6>
                        <p><input placeholder="mot de passe " oninput="this.className = ''" name="password"></p>
                    </div>
                    <div class="tab">
                        <h6>date d'anniversaire</h6>
                        <p><input placeholder="your birthdate" oninput="this.className = ''" name="bday"></p>
                    </div>
                    <div class="tab">
                        <h6>ton adresse</h6>
                        <p><input placeholder="your adresse" oninput="this.className = ''" name="adress"></p>
                    </div>
                    <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                        <h3>modification reussit !</h3> <span> Merci pour la confiance a la prochaine !</span>
                        <input type="submit" name="modifier" id="inscription" class="button" value="enregistrer">

                    </div>
                    <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;">
                            <di> <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button> <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function(event) {


            showTab(currentTab);

        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            } else {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {

                document.getElementById("nextprevious").style.display = "none";
                document.getElementById("all-steps").style.display = "none";
                document.getElementById("register").style.display = "none";
                document.getElementById("text-message").style.display = "block";




            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
    </script>

</body>

</html>