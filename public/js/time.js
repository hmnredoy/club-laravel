
    window.onload(timeDifference());

//     function timeSince() {


//     var date = "{{ Session::get('userInfo')->loggedin }}";
//     var seconds = Math.floor((new Date() - date) / 1000);

//     var interval = Math.floor(seconds / 31536000);

//     if (interval > 1) {

//       //  document.getElementById('time').innerHTML= interval + " years";
//         return interval + " years";

//     }
//         interval = Math.floor(seconds / 2592000);
//     if (interval > 1) {

//         return interval + " months";
//     }
//         interval = Math.floor(seconds / 86400);
//     if (interval > 1) {
//         return interval + " days";
//     }
//         interval = Math.floor(seconds / 3600);
//     if (interval > 1) {
//         return interval + " hours";
//     }
//         interval = Math.floor(seconds / 60);
//     if (interval > 1) {
//         return interval + " minutes";
//     }
// //        return Math.floor(seconds) + " seconds";
//         alert(Math.floor(seconds) + " seconds");
//     }
//     var aDay = 24*60*60*1000;

//     alert(timeSince(new Date(Date.now()-aDay)));
//     alert(timeSince(new Date(Date.now()-aDay*2)));



    function timeDifference(previous) {

    var current = Date();

    var msPerMinute = 60 * 1000;
    var msPerHour = msPerMinute * 60;
    var msPerDay = msPerHour * 24;
    var msPerMonth = msPerDay * 30;
    var msPerYear = msPerDay * 365;

    var elapsed = current - previous;


    if (elapsed < msPerMinute) {
         document.getElementById('time').innerHTML = Math.round(elapsed/1000) + ' seconds ago';   
    }

    else if (elapsed < msPerHour) {
         document.getElementById('time').innerHTML = Math.round(elapsed/msPerMinute) + ' minutes ago';   
    }

    else if (elapsed < msPerDay ) {
         document.getElementById('time').innerHTML = Math.round(elapsed/msPerHour ) + ' hours ago';   
    }

    else if (elapsed < msPerMonth) {
        document.getElementById('time').innerHTML = 'approximately ' + Math.round(elapsed/msPerDay) + ' days ago';   
    }

    else if (elapsed < msPerYear) {
        document.getElementById('time').innerHTML = 'approximately ' + Math.round(elapsed/msPerMonth) + ' months ago';   
    }

    else {
        document.getElementById('time').innerHTML = 'approximately ' + Math.round(elapsed/msPerYear ) + ' years ago';   
    }
}

  //  document.getElementById("time").innerHTML = timeDifference();
