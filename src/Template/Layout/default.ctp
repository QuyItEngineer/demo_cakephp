<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('styles.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    
        <!-- Header -->
   <!--  <a name="about"></a> -->
    <div class="intro-header">
        <div class="container">
            <nav class="navbar weight-site" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="" >MY LOGO</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="<?=$this->Url->build('/pages/index', true);?>">Home</a></li>
                            <li><a href="<?=$this->Url->build('/posts/index', true);?>">Post</a></li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">Property </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                </ul>
                            </li>
                            <li><a href="#">News</a></li>
                            <?php if ($logged):?>
                                <li><?= $this->Html->link('LOGOUT', ['controller' => 'users', 'action' => 'logout'])?></li>
                            <?php else: ?>
                                <li><?= $this->Html->link('REGISTER', ['controller' => 'users', 'action' => 'register'])?></li>
                            <?php endif; ?>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                              <a class="fa fa-gears" type="button" data-toggle="dropdown" aria-haspopup="true">
                              </a>
                              <div class="dropdown-menu" >
                                <a class="dropdown-item" href="http://localhost/mylogin/admin/users">Admin</a>
                                <a class="dropdown-item" href="http://localhost/mylogin/admin/users/add">Add Admin</a>
                              </div>
                            </li>

                                  

                        </ul>

                    </div>
                </div>
            </nav>  <!-- the end nav weight-site -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Cakephp Page Demo</h1>
                        <h3>USING BOOTSTRAP</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- //////////======//////////============ -->


        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->



<!--     <?#= $this->Flash->render() ?> -->
<!--     <div class="container clearfix"> -->
        <?= $this->fetch('content') ?> 
<!--     </div> -->



    <!-- Footer -->
    <footer>

      	<div class="row">
      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      			<img src="../webroot/img/index2/icon_footer1.png">
      		</div>
      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      			<img src="../webroot/img/index2/icon_footer2.png">
      		</div>
      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      			<img src="../webroot/img/index2/icon_footer3.png">
      		</div>
      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      			<img src="../webroot/img/index2/icon_footer4.png">
      		</div>
      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      			<img src="../webroot/img/index2/icon_footer5.png">
      		</div>
      		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      			<img src="../webroot/img/index2/icon_footer6.png">
      		</div>
      	</div>
      	<p class="copyright text-muted small" >Copyright &copy; QuyItEngineer Company 2014. All Rights Reserved</p>



    </footer>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/jquery-ui-git.js"></script>
<script>
    $('#calendar').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        dayNamesMin: ['日', '月', '火', '水', '木', '金', '土']
    });
</script>
</body>
</html>
