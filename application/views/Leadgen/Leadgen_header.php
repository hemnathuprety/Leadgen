<!DOCTYPE html>
<html lang="en">
<head>
    <title>LeadGen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= assets_uri("jquery.range.css", "jrange-master") ?>">
    <script src="<?= assets_uri("jquery.range.js", "jrange-master") ?>"></script>

    <link rel="stylesheet" href="<?= assets_uri("main.css", "main") ?>">
</head>
<body id="myPage">
<div class="container header">
    <div class="row header-nav">
        <div class="col-sm-4 row align_center_start btn-option">
            <a href="<?= base_url("leadgen") ?>">
                <?php if (isset($leadgen)) { ?>
                    <img class="logo-img" src="<?= images_uri($leadgen->logo) ?>">
                <?php } ?>
            </a>
            <h5><?php if (isset($leadgen)) echo $leadgen->organization_name; ?></h5>
        </div>
        <div class="col-sm-8 row header-info">
            <p class="col-md-4"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;
                <?php if (isset($leadgen)) echo $leadgen->address; ?>
            </p>
            <p class="col-md-3"><span class="glyphicon glyphicon-phone"></span>&nbsp;
                <?php if (isset($leadgen)) echo $leadgen->contact_no; ?>
            </p>
            <p class="col-md-5"><span class="glyphicon glyphicon-envelope"></span>&nbsp;
                <?php if (isset($leadgen)) echo $leadgen->email; ?>
            </p>
        </div>
    </div>
</div>