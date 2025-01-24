<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Freq</title>
    <style>
        header .song_side::before{
        content: '';
        position: absolute;
        width: 100%;
        height: 300px;
        background: url('img/LinkinPark/cover.jpg');
        z-index: -1;
        display: flex;
        align-items: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="menu_side">
            <h1 style="color: #FF5733;"><i class="bi bi-activity" style="color: #3498db;">&nbsp;</i>Freq</h1>
            <h1>Playlist</h1>
            <div class="playlist">
                <h4 class="active"><span></span><i class="bi bi-music-note"></i>Playlist</h4>
                
                <h4><span></span><i class="bi bi-music-note"></i>Recommended</h4>
            </div>
            <div class="menu_song">
                <li class="songItem">
                    <span>01</span>
                    <img src="img/1.jpg" alt="">
                    <h5>In the End <br> 
                        <div class="subtitle">Linkin Park</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="1"></i>
                </li>
                <li class="songItem">
                    <span>02</span>
                    <img src="img/2.jpg" alt="">
                    <h5>What I've Done <br> 
                        <div class="subtitle">Linkin Park</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="2"></i>
                </li>
                <li class="songItem">
                    <span>03</span>
                    <img src="img/3.jpg" alt="">
                    <h5>Protikkha <br> 
                        <div class="subtitle">Warfaze</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="3"></i>
                </li>
                <li class="songItem">
                    <span>04</span>
                    <img src="img/4.jpg" alt="">
                    <h5>Purnota <br> 
                        <div class="subtitle">Warfaze</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="4"></i>
                </li>
                <li class="songItem">
                    <span>05</span>
                    <img src="img/5.jpg" alt="">
                    <h5>Beat It <br> 
                        <div class="subtitle">Michael Jackson</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="5"></i>
                </li>    
            </div>
        </div>



        <div class="song_side">
            <nav>
                <ul>
                    <a href="main.php"><li>DISCOVER</li></a>
                    <li>MY LIBRARY</li>
                    <li>RADIO</li>
                </ul>
                <div class="search">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search Music...">
                </div>
                <div class="user">
                    <img src="img/user.jpg" alt="">
                </div>
                <div class="logout">
                    <a href="login.php"><i class="bi bi-box-arrow-left"></i></a>
                </div>
            </nav>
            <div class="content">
                <h1>Linkin Park</h1>
                <div class="buttons">
                  
                </div>
            </div>

            <div class="popular_song">
                <div class="h4">
                    <h4>Popular Song</h4>
                    <div class="btn_s">
                        <i class="bi bi-arrow-left-short" id="pop_song_left"></i>
                        <i class="bi bi-arrow-right-short" id="pop_song_right"></i>
                    </div>
                </div>
                <div class="pop_song">
                    <!-- <li class="songItem">
                        <div class="img_play">
                            <img src="img/11.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="11"></i>
                        </div>
                        <h5>Shada Kalo <br> 
                            <div class="subtitle">HIGHWAY</div>
                        </h5>
                    </li> -->
                                                            
                </div>
            </div>

            <div class="popular_artists">
                <div class="h4">
                    <h4>Popular Artists</h4>
                    <div class="btn_s">
                        <i class="bi bi-arrow-left-short" id="pop_art_left"></i>
                        <i class="bi bi-arrow-right-short" id="pop_art_right"></i>
                    </div>
                </div>
                <div class="item Artists_bx">
                    <li>
                        <a href="LinkinPark.php"><img src="img/Artists/1.jpg" alt=""></a>
                    </li>
                    <li>
                        <img src="img/Artists/2.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/3.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/4.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/5.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/6.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/7.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/8.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/9.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Artists/10.jpg" alt="">
                    </li>

                </div>
            </div>
        </div>




        <div class="master_play">
            <div class="wave" id="wave">
                <div class="wave1"></div>
                <div class="wave1"></div>
                <div class="wave1"></div>
            </div>
            <img src="img/1.jpg" alt="" id="poster_master_play">
            <h5 id="title">
                In the End
                <div class="subtitle">Linkin Park</div>
            </h5>
            <div class="icon">
                <i class="bi shuffle bi-music-note">next</i>
                <i class="bi bi-skip-start" id="back"></i>
                <i class="bi bi-play" id="masterPlay"></i>
                <i class="bi bi-skip-end" id="next"></i>
                <a href="" download id="download_music"><i class="bi bi-download"></i></a>
            </div>
            <span id="currentStart">0:00</span>
            <div class="bar">
                <input type="range" id="seek" min="0" max="100">
                <div class="bar2" id="bar2"></div>
                <div class="dot"></div>
            </div>
            <span id="currentEnd">0:30</span>
            <div class="vol">
                <i class="bi bi-volume-up" id="vol_icon"></i>
                <input type="range" min="0" max="100" id="vol">
                <div class="vol_bar"></div>
                <div class="dot" id="vol_dot"></div>
            </div>
        </div>
        <script src="LinkinPark.js"></script>
    </header>
</body>
</html>