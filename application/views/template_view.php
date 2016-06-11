<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $data['title'] ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/css/swipebox.min.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <?php include 'application/views/' . $content_view; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="/js/ios-orientationchange-fix.js" type="text/javascript"></script>
    <script src="/js/jquery.swipebox.min.js" type="text/javascript"></script>
    <script src="/js/script.js" type="text/javascript"></script>
</body>
</html>