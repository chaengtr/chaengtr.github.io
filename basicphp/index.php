<!DOCTYPE html>
<html>
<head>
    <title>Basic PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        background-image: url("wood-1759566_1920.jpg");
    </style>
</head>
<body class="container">
<section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-center">BMI Calculator</h1>
        </div>
    </div>
</section>
<div class="data-field">
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
                <label for="name">Name:</label>
            </div>
            <div class="col-75"> 
                <input type="text" name="name" placehoder="Your name">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="birthday">Birthday:</label>
            </div>
            <div class="col-75">
                <input type="date" name="birthday">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="csv">File CSV:</label>
            </div>
            <div class="col-75">
                <input type="file" name="fileToUpload"> 
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="download">File Download:</label>
            </div>
            <div class="col-75">
                <a href="form.csv">Download</a> 
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="image">Your Image:</label>
            </div>
            <div class="col-75">
                <input type="file" name="image">
            </div>
        </div>
        <input class="button is-dark" type="submit" value="Submit" name="submit">
    </form>
<div>
</body>
</html>
