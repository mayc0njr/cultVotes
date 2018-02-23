var getIdSuffix = (id) => {
    var start = id.lastIndexOf("-") + 1
    return id.substring(start, id.length)
}

HTMLElement.prototype.getCustomId = function(){
    return getIdSuffix(this.id)
}

HTMLElement.prototype.print_clicou = function(){
    console.log("this = " + this + ", " + this.id);
}
Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax
    while (L && this.length) {
        what = a[--L]
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1)
        }
    }
    return this
};

musicPlay = function(id, hbutton){
    var audio = $("#"+id)[0]
    if(audio.paused){
        console.log("id = " + id)
        var suffix = getIdSuffix(id)
        console.log("this = " + hbutton)
        console.log("hbutton classlist = " + hbutton.classList)
        hbutton.classList.remove("fa-play")
        hbutton.classList.add("fa-pause")
        console.log("hbutton classlist = " + hbutton.classList)
        audio.play()
    }
    else{
        console.log("id = " + id)
        console.log("suffix = " + suffix)
        var suffix = getIdSuffix(id)
        console.log("this = " + hbutton)
        console.log("hbutton classlist = " + hbutton.classList)
        hbutton.classList.add("fa-play")
        hbutton.classList.remove("fa-pause")
        console.log("hbutton classlist = " + hbutton.classList)
        audio.pause()
    }
}

getProgressTime = function(seconds){
    var sec = Math.floor(seconds);
    var min = Math.floor(sec / 60);
    sec %= 60;
    return min + ':' + (sec < 10 ? '0' : '') +  sec;
}
refreshProgress = function(time, maxTime){
    console.log('');
    $('.anda').addClass('anda-2').removeClass('anda');
    $('.espera-pra-correr').addClass('corre').removeClass('espera-pra-correr');
    return time/maxTime;
}
$(document).ready(function(){
    $('.music-player').on('ended', function(){
        // $(this).children('checked').css('hidden','false')
        //ajax here...
        var id = this.getCustomId()
        console.log("CABO " + id)
        console.log("#acabou-" + id)
        $("#acabou-" + id)[0].hidden = false;
    })
    $('.music-player').on('timeupdate', function(){
        console.log(getProgressTime($(this)[0].currentTime));
        $('.cap-time').text(getProgressTime($(this)[0].currentTime) + '/' + getProgressTime($(this)[0].duration))
    })
    $('.music-player').on('play', function(){
        for (var x=0 ; x < $('.music-player').length ; x++) {
            if($('.music-player')[x] == this){
                continue
            }
            $('.music-player')[x].pause()
        }
    })
})