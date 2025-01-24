const music = new Audio('audio/1.mp3');

const songs = [
    {
        id: 1,
        songName: `In the End <br> 
        <div class="subtitle">Linkin Park</div>`,
        poster: "img/1.jpg"
    },
    {
        id: 2,
        songName: `What I've Done <br> 
        <div class="subtitle">Linkin Park</div>`,
        poster: "img/2.jpg"
    },
    {
        id: 3,
        songName: `Protikkha <br> 
        <div class="subtitle">Warfaze</div>`,
        poster: "img/3.jpg"
    },
    {
        id: 4,
        songName: `Purnota <br> 
        <div class="subtitle">Warfaze</div>`,
        poster: "img/4.jpg"
    },
    {
        id: 5,
        songName: `Beat It <br> 
        <div class="subtitle">Michael Jackson</div>`,
        poster: "img/5.jpg"
    },
    {
        id: 6,
        songName: `High Hopes <br> 
        <div class="subtitle">Pink Floyd</div>`,
        poster: "img/6.jpg"
    },
    {
        id: 7,
        songName: `Comfortably Numb <br> 
        <div class="subtitle">Pink Floyd</div>`,
        poster: "img/7.jpg"
    },
    {
        id: 8,
        songName: `Another Brick in the Wall <br> 
        <div class="subtitle">Pink Floyd</div>`,
        poster: "img/8.jpg"
    },
    {
        id: 9,
        songName: `GhorGari <br> 
        <div class="subtitle">HIGHWAY</div>`,
        poster: "img/9.jpg"
    },
    {
        id: 10,
        songName: `Chaya <br> 
        <div class="subtitle">HIGHWAY</div>`,
        poster: "img/10.jpg"
    },
    {
        id: 11,
        songName: `Shada Kalo <br> 
        <div class="subtitle">HIGHWAY</div>`,
        poster: "img/11.jpg"
    },
    {
        id: 12,
        songName: `Lose Yourself <br> 
        <div class="subtitle">Eminem</div>`,
        poster: "img/12.jpg"
    },
    {
        id: 13,
        songName: `Rap God <br> 
        <div class="subtitle">Eminem</div>`,
        poster: "img/13.jpg"
    },
    {
        id: 14,
        songName: `The Real Slim Shady <br> 
        <div class="subtitle">Eminem</div>`,
        poster: "img/14.jpg"
    },
    {
        id: 15,
        songName: `Control Room <br> 
        <div class="subtitle">Karnival</div>`,
        poster: "img/15.jpg"
    },
    {
        id: 16,
        songName: `Bhrom <br> 
        <div class="subtitle">Karnival</div>`,
        poster: "img/16.jpg"
    },
    {
        id: 17,
        songName: `Nothing Else Matters <br> 
        <div class="subtitle">Metallica</div>`,
        poster: "img/17.jpg"
    },
    {
        id: 18,
        songName: `60's Love <br> 
        <div class="subtitle">Level Five</div>`,
        poster: "img/18.jpg"
    },
    {
        id: 19,
        songName: `Gholate Megh <br> 
        <div class="subtitle">Level Five</div>`,
        poster: "img/19.jpg"
    },
    {
        id: 20,
        songName: `Oparthib <br> 
        <div class="subtitle">Popeye Bangladesh</div>`,
        poster: "img/20.jpg"
    }
];


Array.from(document.getElementsByClassName('songItem')).forEach((e, i) => {
    if (songs[i]) { 
        e.getElementsByTagName('img')[0].src = songs[i].poster;
        e.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
    }
});


// search data start
let search_results = document.getElementsByClassName('search_results')[0];

songs.forEach(element => {
    const {id, songName, poster} = element;
    let card = document.createElement('a');
    card.classList.add('card');
    card.href = "#" + id;

    card.innerHTML = `
    <img src="${poster}" alt="">
                            <div class="content">
                                ${songName}
                            </div>
                        </a>
    `;
    search_results.appendChild(card);
});

let input = document.getElementsByTagName('input')[0];

input.addEventListener('keyup', ()=>{
    let input_value = input.value.toUpperCase();
    let items = search_results.getElementsByTagName('a');

    for (let index = 0; index < items.length; index++) {
        let as = items[index].getElementsByClassName('content')[0];
        let text_value = as.textContent || as.innerHTML;

        if (text_value.toUpperCase().indexOf(input_value) > -1) {
            items[index].style.display = "flex";
        } else {
            items[index].style.display = "none";
        }

        if (input.value == 0) {
            search_results.style.display = "none";
        } else {
            search_results.style.display = "";
        }
        
    }
})
// search data end


let masterPlay = document.getElementById('masterPlay');
let wave = document.getElementById('wave');

masterPlay.addEventListener('click', () => {
    if (music.paused || music.currentTime <= 0) {
        music.play();
        if (wave) wave.classList.add('active1'); 
        masterPlay.classList.replace('bi-play', 'bi-pause'); 
    } else {
        music.pause();
        if (wave) wave.classList.remove('active1'); 
        masterPlay.classList.replace('bi-pause', 'bi-play'); 
    }
});

const makeAllplays = () => {
    Array.from(document.getElementsByClassName('playListPlay')).forEach((el)=>{
        el.classList.replace('bi-pause-circle', 'bi-play-circle');
    })
}

const makeAllBackground = ()=>{
    Array.from(document.getElementsByClassName('songItem')).forEach((el)=>{
        el.style.background = 'rgb(105, 105, 105, .0)';
    })
}

let index = 0;
let poster_master_play = document.getElementById('poster_master_play');
let download_music = document.getElementById('download_music');
let title = document.getElementById('title');

Array.from(document.getElementsByClassName('playListPlay')).forEach((e)=>{
    e.addEventListener('click', (el)=>{
        index = el.target.id;
        //console.log(index);
        music.src = `audio/${index}.mp3`;
        poster_master_play.src = `img/${index}.jpg`;
        music.play();
        
        masterPlay.classList.replace('bi-play', 'bi-pause');

        download_music.href = `audio/${index}.mp3`;

        let songTitles = songs.filter((els) => {
            return els.id == index;
        });

        songTitles.forEach(elss => {
            let {songName} = elss;
            title.innerHTML = songName;
            download_music.setAttribute('download', songName);
        });

        makeAllBackground();
        Array.from(document.getElementsByClassName('songItem'))[index-1].style.background = "rgb(105, 105, 105, .1)";

        makeAllplays();
        el.target.classList.replace('bi-play-circle', 'bi-pause-circle');

        wave.classList.add('active1');
    });
});



let currentStart = document.getElementById('currentStart');
let currentEnd = document.getElementById('currentEnd');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementsByClassName('dot')[0];

music.addEventListener('timeupdate', ()=>{
    let music_curr = music.currentTime;
    let music_dur = music.duration;

    let min1 = Math.floor(music_dur / 60);
    let sec1 = Math.floor(music_dur % 60);

    if(sec1<10){
        sec1 = `0${sec1}`;
    }

    currentEnd.innerText = `${min1}:${sec1}`;

    let min2 = Math.floor(music_curr / 60);
    let sec2 = Math.floor(music_curr % 60);

    if(sec2<10){
        sec2 = `0${sec2}`;
    }

    currentStart.innerText = `${min2}:${sec2}`;

    let progressBar = parseInt((music_curr / music_dur) *100);
    seek.value = progressBar;

    let seekbar = seek.value;
    bar2.style.width = `${seekbar}%`;
    dot.style.left = `${seekbar}%`;

});

seek.addEventListener('change', ()=>{
    music.currentTime = seek.value * music.duration / 100;
})

let vol_icon = document.getElementById('vol_icon');
let vol = document.getElementById('vol');
let vol_bar = document.getElementsByClassName('vol_bar')[0];
let vol_dot = document.getElementById('vol_dot');

vol.addEventListener('change', ()=>{
    if(vol.value==0)
    {
        vol_icon.classList.remove('bi-volume-up');
        vol_icon.classList.remove('bi-volume-down');
        vol_icon.classList.add('bi-volume-mute');
    }
    if(vol.value>0)
    {
        vol_icon.classList.remove('bi-volume-up');
        vol_icon.classList.add('bi-volume-down');
        vol_icon.classList.remove('bi-volume-mute');
    }
    if(vol.value>50)
    {
        vol_icon.classList.add('bi-volume-up');
        vol_icon.classList.remove('bi-volume-down');
        vol_icon.classList.remove('bi-volume-mute');
    }

    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;
    music.volume = vol_a / 100;
});

let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', ()=>{
    index -= 1;

    if(index<1)
    {
        index = Array.from(document.getElementsByClassName('songItem')).length;
    }

    music.src = `audio/${index}.mp3`;
    poster_master_play.src = `img/${index}.jpg`;
    music.play();

    if (wave) wave.classList.add('active1'); 
    masterPlay.classList.replace('bi-play', 'bi-pause');

    let songTitles = songs.filter((els)=>{
            return els.id == index;
    });

    songTitles.forEach(elss =>{
        let {songName} = elss;
        title.innerHTML = songName;
    });

    makeAllBackground();
    Array.from(document.getElementsByClassName('songItem'))[index-1].style.background ="rgb(105, 105, 105, .1)";

    makeAllplays();
    el.target.classList.replace('bi-play-circle', 'bi-pause-circle');
    
})

next.addEventListener('click', ()=>{
    index++;

    if(index > Array.from(document.getElementsByClassName('songItem')).length)
    {
        index = 1;
    }

    music.src = `audio/${index}.mp3`;
    poster_master_play.src = `img/${index}.jpg`;
    music.play();

    if (wave) wave.classList.add('active1'); 
    masterPlay.classList.replace('bi-play', 'bi-pause');

    let songTitles = songs.filter((els)=>{
            return els.id == index;
    });

    songTitles.forEach(elss =>{
        let {songName} = elss;
        title.innerHTML = songName;
    });

    makeAllBackground();
    Array.from(document.getElementsByClassName('songItem'))[index-1].style.background ="rgb(105, 105, 105, .1)";

    makeAllplays();
    el.target.classList.replace('bi-play-circle', 'bi-pause-circle');
    
})

let pop_song_left = document.getElementById('pop_song_left');
let pop_song_right = document.getElementById('pop_song_right');
let pop_song = document.getElementsByClassName('pop_song')[0];

if (pop_song) { 
    pop_song_right.addEventListener('click', () => {
        pop_song.scrollLeft += 330;
    });

    pop_song_left.addEventListener('click', () => {
        pop_song.scrollLeft -= 330;
    });
}


let pop_art_left = document.getElementById('pop_art_left');
let pop_art_right = document.getElementById('pop_art_right');
let Artists_bx = document.getElementsByClassName('Artists_bx')[0];

if (Artists_bx) { 
    pop_art_right.addEventListener('click', () => {
        Artists_bx.scrollLeft += 330;
    });

    pop_art_left.addEventListener('click', () => {
        Artists_bx.scrollLeft -= 330;
    });
}


let shuffle = document.getElementsByClassName('shuffle')[0];

shuffle.addEventListener('click', () => {
    let currentState = shuffle.innerHTML.trim(); // Trim to avoid issues with spaces

    switch (currentState) {
        case "next":
            shuffle.classList.add('bi-repeat');
            shuffle.classList.remove('bi-music-note', 'bi-shuffle');
            shuffle.innerHTML = 'repeat';
            break;

        case "repeat":
            shuffle.classList.add('bi-shuffle');
            shuffle.classList.remove('bi-repeat', 'bi-music-note');
            shuffle.innerHTML = 'random';
            break;

        case "random":
            shuffle.classList.add('bi-music-note');
            shuffle.classList.remove('bi-repeat', 'bi-shuffle');
            shuffle.innerHTML = 'next';
            break;

        default:
            console.error("Unexpected state: ", currentState);
    }
});


const next_music =  () => {
        
    if(index == songs.length){
        index = 1;
    }
    else{
        index++;
    }
    
    music.src = `audio/${index}.mp3`;
    poster_master_play.src = `img/${index}.jpg`;
    music.play();
    
    masterPlay.classList.replace('bi-play', 'bi-pause');

    download_music.href = `audio/${index}.mp3`;

    let songTitles = songs.filter((els) => {
        return els.id == index;
    });

    songTitles.forEach(elss => {
        let {songName} = elss;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    });

    makeAllBackground();
    Array.from(document.getElementsByClassName('songItem'))[index-1].style.background = "rgb(105, 105, 105, .1)";

    makeAllplays();
    el.target.classList.replace('bi-play-circle', 'bi-pause-circle');

    wave.classList.add('active1');
}

const repeat_music =  () => {
        
    index;
    
    music.src = `audio/${index}.mp3`;
    poster_master_play.src = `img/${index}.jpg`;
    music.play();
    
    masterPlay.classList.replace('bi-play', 'bi-pause');

    download_music.href = `audio/${index}.mp3`;

    let songTitles = songs.filter((els) => {
        return els.id == index;
    });

    songTitles.forEach(elss => {
        let {songName} = elss;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    });

    makeAllBackground();
    Array.from(document.getElementsByClassName('songItem'))[index-1].style.background = "rgb(105, 105, 105, .1)";

    makeAllplays();
    el.target.classList.replace('bi-play-circle', 'bi-pause-circle');

    wave.classList.add('active1');
}

const random_music =  () => {
        
    if(index == songs.length){
        index = 1;
    }
    else{
        index = Math.floor((Math.random() * songs.length)+1);
    }
    
    music.src = `audio/${index}.mp3`;
    poster_master_play.src = `img/${index}.jpg`;
    music.play();
    
    masterPlay.classList.replace('bi-play', 'bi-pause');

    download_music.href = `audio/${index}.mp3`;

    let songTitles = songs.filter((els) => {
        return els.id == index;
    });

    songTitles.forEach(elss => {
        let {songName} = elss;
        title.innerHTML = songName;
        download_music.setAttribute('download', songName);
    });

    makeAllBackground();
    Array.from(document.getElementsByClassName('songItem'))[index-1].style.background = "rgb(105, 105, 105, .1)";

    makeAllplays();
    el.target.classList.replace('bi-play-circle', 'bi-pause-circle');

    wave.classList.add('active1');
}

music.addEventListener('ended', ()=>{
        let b = shuffle.innerHTML;

        switch(b){
            case 'repeat':
                repeat_music();
                break;
        }
        switch(b){
            case 'next':
                next_music();
                break;
        }
        switch(b){
            case 'random':
                random_music();
                break;
        }
})