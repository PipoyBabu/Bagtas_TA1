<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">

    <title><?= lang('Errors.whoops') ?></title>

    <style>
        <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
    </style>
</head>
<body>

    <div class="container text-center">

        <h1 class="headline"><?= lang('Errors.whoops') ?></h1>

        <p class="lead"><?= lang('Errors.weHitASnag') ?></p>

        <?php if (isset($exception)): ?>
            <div style="background:#fff3cd;color:#664d03;border:1px solid #ffe69c;padding:20px;margin:25px auto;max-width:850px;border-radius:8px;font-family:monospace;text-align:left;font-size:14px;line-height:1.6;box-shadow:0 4px 6px rgba(0,0,0,0.1);">
                <div style="font-weight:bold;font-size:16px;margin-bottom:10px;color:#842029;">⚠️ Debug Details:</div>
                <div><strong>Exception:</strong> <?= esc(get_class($exception)) ?></div>
                <div style="margin-top:6px;"><strong>Message:</strong> <?= esc($exception->getMessage()) ?></div>
                <div style="margin-top:6px;"><strong>File:</strong> <?= esc($exception->getFile()) ?> (line <?= esc($exception->getLine()) ?>)</div>
            </div>
        <?php endif ?>

    </div>

</body>

</html>
