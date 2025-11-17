<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php if (isset($timer)) {
        if (!waktuAktif()) {
            unset($timer);
        }
    } ?>

    <?php if (isset($timer)) : ?>
        <link rel="stylesheet" href="<?= base_url('/css/timer.css') ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?= base_url() . '/css/' . $css; ?>.css">

    <title><?= $title; ?></title>
</head>

<body>
    <?php if (!isset($nav)) {
        $nav = true;
    } ?>

    <?php if (needNav($nav)) : ?>
        <?= $this->include('templates/navbar'); ?>
    <?php endif; ?>

    <?= $this->renderSection('content'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/019f83a571.js" crossorigin="anonymous"></script>
    <?php if (isset($js)) : ?>
        <script src="<?= base_url() . '/js/' . $js; ?>.js"></script>
    <?php endif; ?>
    <?php if (isset($timer)) : ?>
        <script src="<?= base_url('/js/countdown.js') ?>"></script>
        <script type="text/javascript">
            let waktu = $('.timer').attr('data-waktu');
            $('.timer').countdown({
                date: `${waktu} 23:59:59`
            });
        </script>
    <?php endif; ?>
</body>

</html>