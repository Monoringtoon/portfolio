function setDate() {
    const now = new Date();
    const seconds = Math.floor(now.getSeconds())+1;
    document.getElementById("seconde").style.transform = `rotate(${seconds*6}deg)`;

    const minutes = Math.floor(now.getMinutes());
    document.getElementById("minuut").style.transform = `rotate(${minutes*6}deg)`;

    const hours = Math.floor(now.getUTCHours())+1;
    document.getElementById("uur").style.transform = `rotate(${hours*30}deg)`;
    console.log(hours, minutes, seconds)

}

setInterval(setDate, 1000);


