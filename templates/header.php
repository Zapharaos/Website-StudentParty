<header>
    <div>
        <h1 onclick="test_nav(); home()" data-mlr-text>Student Party</h1>
        <span onclick="nav()"> <i class="fas fa-bars"></i> </span>
    </div>    
    <nav>
        <div id="barre">
            <?php include('nav.php'); ?>
        </div>
    </nav>
</header>

<div id="side">
    <div id="hide">
        <span onclick="nav()"> <i class="side_child fas fa-window-close fa-3x"></i> </span>
        <?php include('nav.php'); ?>
        <h1 class="side_child" >Student</br>Party</h1>
    </div>
</div>

