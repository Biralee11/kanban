<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Dashboard - Kanban</title>
    <link rel="shortcut icon" href="../../images/favicon.png">
    <link rel="stylesheet" href="../../assets/css/style926d.css?v1.1.1">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap">
                @include('layout.nav_bar');
                <div class="nk-content">
                    <div class="container">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-page-head">
                                    <div class="nk-block-head-content">
                                        <h1 class="nk-block-title">Kanban Board</h1>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title">Colored Example</h3>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="kanbanColored" class="js-kanban kanban-colored"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layout.footer')
            </div>
        </div>
    </div>
</body>
<script src="../../assets/js/bundle.js"></script>
<script src="../../assets/js/scripts.js"></script>
<script src="../../assets/js/kanban/kanban.js"></script>

</html>
