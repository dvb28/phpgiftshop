<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../../accest/Css/animate.css">
    <link rel="stylesheet" href="../../../accest/Css/bootstrap.css">
    <link rel="stylesheet" href="../../../accest/Css/styles.css">
    <script defer src="../../../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="module" src="../../index.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- Include -->
    <?php
        //Import Component
        include('../../Component.php');
        // Component Need To Use
        Component('Header', 'Slider', 'Product', 'Content', 'ProductList', 'Footer', 'Collapse', 'Submit', 'Loged');
    ?>
    <!-- Root -->
    <div id="root" class="p-0">
        <?php
            session_start();
            // Header
            if(isset($_SESSION['isLogin'])) {
                echo Headerr('login');
            } else {
                echo Headerr('no-login');
            }
            // Content
            echo Content(
                Slider($sliderList),
                // ProductList('feature', $ProductList['product-list__feature']),
                ProductList('all', $productListAll),
            );            
            echo Footer($companyContact);
            ?>
    </div>
</body>
</html>