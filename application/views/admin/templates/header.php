<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en"/>
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="<?= assets_uri("images/lead_gen.png", "admin") ?>" type="image/x-icon"/>

    <title>Lead Gen</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= assets_uri("images/lead_gen.png", "admin") ?>"
    <link rel="icon" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?= assets_uri("js/require.min.js", "admin") ?>"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="<?= assets_uri("css/dashboard.css", "admin") ?>" rel="stylesheet"/>
    <script src="<?= assets_uri("js/dashboard.js", "admin") ?>"></script>
    <script src="<?= assets_uri("js/jscolor.js", "admin") ?>"></script>
</head>
<body class="">
<div class="page">
    <div class="page-main">
        <div class="header">
            <div class="container">
                <div class="d-flex">
                    <a class="navbar-brand" href="<?= admin_url("dashboard") ?>">
                        <img src="<?= assets_uri("images/lead_gen.png", "admin") ?>"
                             class="navbar-brand-img" alt="tabler.io">
                    </a>
                    <div>
                        <h3 class="card-title">Lead Gen</h3>
                    </div>
                    <div class="ml-auto d-flex order-lg-2">
                        <div class="dropdown d-none d-md-flex">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-message-square"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow px-4">
                                <?php // TODO:  ?>
                            </div>
                        </div>
                        <div class="dropdown d-none d-md-flex">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-bell"></i>
                                <span class="nav-unread"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow px-4">
                                <?php // TODO:  ?>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link pr-0" data-toggle="dropdown">
                                <span class="avatar"
                                      style="background-image: url(<?= assets_uri('images/profile.png', 'admin') ?>)">
                                </span>
                                <span class="ml-2 d-none d-lg-block">
                                    <span class="text-default"><?= $this->session->userdata("full_name") ?></span>
                                    <small class="text-muted d-block mt-1"><?= $this->session->userdata("role_name") ?></small>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">
                                    <span>Profile</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <span>Settings</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <span class="float-right"><span class="badge badge-primary">6</span></span>
                                    <span>Inbox</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <span>Message</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Need help? </a>
                                <a class="dropdown-item" href="<?= admin_url("userauth/logout") ?>">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav d-none d-lg-flex">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="<?= admin_url("dashboard") ?>"
                                   class="nav-link <?= ($this->uri->segment(2) === 'dashboard') ? 'active' : '' ?>">
                                    <i class="fa fa-tachometer"></i>
                                    <?php echo $this->lang->line('home'); ?>
                                </a>
                            </li>
                            <?php if (isset($header_modules)) { ?>
                                <?php foreach ($header_modules as $m): ?>
                                    <li class="nav-item">
                                        <a href="<?= admin_url($m->module_name) ?>" class="nav-link
                                            <?= ($this->uri->segment(2) === $m->module_name) ? 'active' : '' ?>">
                                            <i class="fa <?= $m->icon ?>"></i>
                                            <?php echo $m->display_name; ?>
                                        </a>
                                        <?php if (isset($header_sub_modules)) { ?>
                                            <div class="nav-submenu nav">
                                                <?php foreach ($header_sub_modules as $sm):
                                                    if ($sm->parent_module == $m->module_id) { ?>
                                                        <a href="<?= admin_url($m->module_name . '/' . $sm->module_name) ?>"
                                                           class="nav-item ">
                                                            <?php echo $sm->display_name; ?>
                                                        </a>
                                                    <?php } endforeach; ?>
                                            </div>
                                        <?php } ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-3 ml-auto">
                        <form method='post' action="">
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        <input class="form-control" type='text'
                                               placeholder="<?php echo $this->lang->line('search'); ?>&hellip;"
                                               name='search' value=''>
                                    </th>
                                    <th>
                                        <input style='margin-left:10px;' class="btn btn-primary" type='submit'
                                               name='submit' value='<?php echo $this->lang->line('search'); ?>'>
                                    </th>
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
