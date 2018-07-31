let seconds = 60,
    isBreak = false;
var minutes = document.getElementById("time").value-1;
const timerLoop = () => {
    const wav = 'http://www.oringz.com/oringz-uploads/sounds-917-communication-channel.mp3';
    const audio = new Audio(wav);

        $('#minutes').text(minutes);
        if (seconds > 0) {
            seconds -= 1;

            if (seconds < 10) {
                $('#seconds').text('0' + seconds);

            } else {
                $('#seconds').text(seconds);
            }

            setTimeout(timerLoop, 1000);

        } else if (minutes + seconds > 0) {
            minutes -= 1;
            $('#minutes').text(minutes);
            seconds = 60;
            timerLoop();

        } else {
            document.getElementById("submit").submit();
        }

}

timerLoop();
