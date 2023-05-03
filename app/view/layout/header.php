<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/font/icons/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome.css">
    <title> <?= $data['judul']; ?> </title>
    <link rel="icon" href="<?= BASEURL; ?>/img/logo/logo.png" type="image/x-icon">
</head>

<body>
    <div class="d-flex justify-content-between align-items-center border-blac-bottom">
        <div class="d-flex flex-column p-3">
            <a href="<?= BASEURL; ?>/index"><img class="img-fluid" src="<?= BASEURL; ?>/img/logo/logo.png" style="width: 200px;"></a>
        </div>
        <div class="form-group p-3" style="width: 700px;">
            <form action="<?= BASEURL; ?>/Home/searchStory" method="post">
                <input type="search" placeholder="Search" aria-describedby="button-addon" class="form-control border" id="Keyword" name="Keyword" autocomplete="off">
            </form>
        </div>
    </div>

   