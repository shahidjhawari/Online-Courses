<!DOCTYPE html>
<html lang="en">
<head>
    <!--All Meta Tags Here-->
    <meta charset="UTF-8">
    <meta name="keyword" content="nawab, nawab academy, academy, shahid, shahid iqbal, shahid iqbal jhawari, mahar shahid iqbal jhawari, course, 
    courses, nawab courses, nawab academy courses, nawab academy course, 
    shahid iqbal course, nawab html course, nawab css course, 
    nawab javascript course, nawab html, nawab css, nawab java script, 
    jhawarian, jhawarian academy, jhawarian courses, jhawarian web development, 
    web development, web development course, web development nawab, nawab web development, 
    nawab ethical hacking, nawab app development, app development course, android app development course, 
    nawab academy app development, jhawarian no 1 academy, sargodha no 1 academy, pakistan no 1 academy, html, 
    css, java script, php, my sql, python,ethical hacking, html course, css course, java script course, php course, 
    my sql course, python course, ethical hacking course,">
    <meta name="discription" content="NAWAB Web Development acdemy in Sargodha, Jhawarian, HTLM, CSS, JS, PHP, MYSQL, PYTHON online & classes courses">
    <meta name="author" content="MAHAR SHAHID IQBAL JHAWARI">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAWAB ACADEMY</title>
    <!--Bootstrap files Here-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.bundle.js">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <!--Own files Here-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="img/logo_bg_remove.png">
</head>
<body>
    <!--Header Section Start-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container container-css">
                <a href="index.html"><img src="img/logo_bg_remove.png" alt="NAWAB LOGO" title="NAWAB ACADEMY - Jhawarian, Sargodha, Punjab, Pakistan" width="50px"></a>
                <a class="navbar-brand" href="index.html" title="NAWAB ACADEMY - Jhawarian, Sargodha, Punjab, Pakistan"><b>NAWAB ACADEMY</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html"><b>HOME</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>COURSES</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>PROJECTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>SIGN UP</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="progress"></div>
    </header>
<!--Header Section End-->

<?php
if (isset($_POST['submit'])) {
    $ch = curl_init();
    $str = $_POST['str'];

    $postdata = array(
        "model" => "gpt-3.5-turbo",
        "messages" => [
            [
                "role" => "user",
                "content" => "$str"
            ]
        ],
        "temperature" => 1,
        "max_tokens" => 2000,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0
    );
    $postdata = json_encode($postdata);

    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer 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'
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch);
    $result = json_decode($result, true);
    $data = $result['choices'][0]['message']['content'];  
}
?>

<style>
    fieldset {
        border: 2px solid black;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #2d3436;
        color: white;
        font-size: 20px;
    }
    span {
        color: orangered;
        text-align: center;
    }
    #openaibackspan {
        color: greenyellow;
    }
    .btn-group {
        align-items: center;
    }
</style>

<!-- Search Input & Button Section Start -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
            <div class="input-group">
                    <input type="text" class="form-control" placeholder="give me prompt..." name="str" id="openaiinput">
                    <button class="btn btn-outline-secondary" type="submit" name="submit" id="openaibtn">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </form>
            <span id="openaispan"></span>
            <span id="openaibackspan"></span>
        </div>
    </div>
</div>
<!-- Search Input & Button Section End -->

<div class="container">
    <fieldset id="content">
        <?php
        if (!isset($data)) {
            echo "Your content goes here...";
        } else {
            echo "<p>$data</p>";
        }
        ?>
    </fieldset>
    <div class="btn-group">
    <button class="btn btn-outline-secondary" id="clone"><i class="fas fa-clone" title="Copy All Text"></i></button>
    <button class="btn btn-outline-secondary" id="remove"><i class="fas fa-times" title="Remove Text"></i></button>
    </div>
    
</div>



<script>
    var target = document.querySelector("#openaispan");
    var target2 = document.querySelector("#openaibtn");
    var target3 = document.querySelector("#openaiinput");

    window.addEventListener("offline", function(){
        target.innerHTML = "You are Offline";
        target2.setAttribute('disabled','');
        target3.setAttribute('disabled','');
    });
    window.addEventListener("online", function(){
        target.innerHTML = "";
        target2.removeAttribute("disabled");
        target3.removeAttribute('disabled');
    });

    var btn = document.querySelector("#clone");
    btn.addEventListener("click", function(){
        var cont = document.querySelector("#content p");
        cont.select();
        document.execCommand("copy");
    });
</script>

<!--Footer Section Start-->
<footer class="bg-warning text-dark text-center py-3">
      <div class="container">
          &copy; <b>2023 NAWAB ACADEMY. All rights reserved.</b>
      </div>
  </footer>
  <!--Footer Section End-->

    <!--Java Script Files Here Start-->
    <script src="js/script.js"></script>
</body>
</html>