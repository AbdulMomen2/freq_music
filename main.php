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
    header .song_side::before {
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
            <a href="main.php" style="text-decoration: none;">
                <h1 style="color: #FF5733;">
                    <i class="bi bi-activity" style="color: #3498db;">&nbsp;</i>Freq
                </h1>
            </a>
            <h1>Playlist</h1>
            <div class="playlist">
                <h4 class="active"><span></span><i class="bi bi-music-note"></i>Playlist</h4>
            
                <a id="lastListeningLink" href="last.html" style="text-decoration: none; color: inherit;">
                    <h4><span></span><i class="bi bi-music-note"></i>Recommended</h4>
                </a>
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
                <li class="songItem">
                    <span>06</span>
                    <img src="img/6.jpg" alt="">
                    <h5>High Hopes <br>
                        <div class="subtitle">Pink Floyd</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="6"></i>
                </li>
                <li class="songItem">
                    <span>07</span>
                    <img src="img/7.jpg" alt="">
                    <h5>Comfortably Numb <br>
                        <div class="subtitle">Pink Floyd</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="7"></i>
                </li>
                <li class="songItem">
                    <span>08</span>
                    <img src="img/8.jpg" alt="">
                    <h5>Another Brick in the Wall <br>
                        <div class="subtitle">Pink Floyd</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="8"></i>
                </li>
                <li class="songItem">
                    <span>09</span>
                    <img src="img/9.jpg" alt="">
                    <h5>GhorGari <br>
                        <div class="subtitle">HIGHWAY</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="9"></i>
                </li>
                <li class="songItem">
                    <span>10</span>
                    <img src="img/10.jpg" alt="">
                    <h5>Chaya <br>
                        <div class="subtitle">HIGHWAY</div>
                    </h5>
                    <i class="bi playListPlay bi-play-circle" id="10"></i>
                </li>
            </div>
        </div>



        <div class="song_side">
            <nav>
                <ul>
                    <li>DISCOVER<span></span></li>
                    <li><a href="subscription.html" style="color: white;">Subscription</a></li>
                    
                </ul>
                <div class="search">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search Music...">
                    <div class="search_results">
                        <!-- <a href="" class="card">
                            <img src="img/1.jpg" alt="">
                            <div class="content">
                                In the End
                                <div class="subtitle">Linkin Park</div>
                            </div>
                        </a> -->

                    </div>
                </div>

                <!-- User Info Modal -->
                <div class="user" onclick="viewUserDetails(1)">
                    <img src="img/user.jpg" alt="User Profile">
                </div>

                <script>
                function viewUserDetails(userId) {
                    window.location.href = `user.php?id=${userId}`;
                }
                </script>
                <div class="logout">
                    <a href="logout.php"><i class="bi bi-box-arrow-left" style="color: white;"></i></a>

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
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/11.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="11"></i>
                        </div>
                        <h5>Shada Kalo <br>
                            <div class="subtitle">HIGHWAY</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/12.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="12"></i>
                        </div>
                        <h5>Lose Yourself <br>
                            <div class="subtitle">Eminem</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/13.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="13"></i>
                        </div>
                        <h5>Rap God <br>
                            <div class="subtitle">Eminem</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/14.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="14"></i>
                        </div>
                        <h5>The Real Slim Shady <br>
                            <div class="subtitle">Eminem</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/15.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="15"></i>
                        </div>
                        <h5>Control Room <br>
                            <div class="subtitle">Karnival</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/16.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="16"></i>
                        </div>
                        <h5>Bhrom <br>
                            <div class="subtitle">Karnival</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/17.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="17"></i>
                        </div>
                        <h5>Nothing Else Matters <br>
                            <div class="subtitle">Metallica</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/18.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="18"></i>
                        </div>
                        <h5>60's Love <br>
                            <div class="subtitle">Level Five</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/19.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="19"></i>
                        </div>
                        <h5>Gholate Megh <br>
                            <div class="subtitle">Level Five</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img_play">
                            <img src="img/20.jpg" alt="">
                            <i class="bi playListPlay bi-play-circle" id="20"></i>
                        </div>
                        <h5>Oparthib <br>
                            <div class="subtitle">Popeye Bangladesh</div>
                        </h5>
                    </li>
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
        <script src="app.js"></script>
    </header>
</body>

</html>