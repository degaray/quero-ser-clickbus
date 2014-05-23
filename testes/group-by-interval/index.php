<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <form id="get_money" action="webService.php" method="post">
        <input type="text" name="list"> Input all the values to group. Separate them with a comma.<br>
        <input type="text" name="range"> Input the range.<br>
        <button type="submit">Group 'em all!!!</button>
    </form>
    <script type="text/javascript">
        document.getElementById('get_money').onsubmit(function(){
            alert('yes');
        });
    </script>
</body>
</html>