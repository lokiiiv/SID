<header>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagenesc/logo2.jpg" alt="" width="1100" height="500">
                <div class="carousel-caption">
                    <P></P>
                </div>
            </div>
            <?php while ($row = $resultado->fetch_assoc()) { ?>
                <div class="carousel-item">
                    <img src="imagenesc/<?php echo $row['genero']; ?>.jpg" alt="" width="1100" height="500">
                    <div class="carousel-caption">
                    </div>
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</header>