var current = null;

const btn = document.getElementById('submit');

// btn.addEventListener('click', function() {
//     let email = document.getElementById('email').value;
//     let password = document.getElementById('password').value;
//     setTimeout(function() {
//         alert(`${email} and ${password}`);
//     }, 800);
// });

document.querySelector("#email").addEventListener("focus", function(e) {
    if (current) current.pause();
    current = anime({
        targets: "path",
        strokeDashoffset: {
            value: 0,
            duration: 500,
            easing: "easeOutQuart"
        },
        strokeDasharray: {
            value: "240 1386",
            duration: 500,
            easing: "easeOutQuart"
        }
    });
});
document.querySelector("#password").addEventListener("focus", function(e) {
    if (current) current.pause();
    current = anime({
        targets: "path",
        strokeDashoffset: {
            value: -336,
            duration: 500,
            easing: "easeOutQuart"
        },
        strokeDasharray: {
            value: "240 1386",
            duration: 500,
            easing: "easeOutQuart"
        }
    });
});
document.querySelector("#submit").addEventListener("focus", function(e) {
    if (current) current.pause();
    current = anime({
        targets: "path",
        strokeDashoffset: {
            value: -730,
            duration: 500,
            easing: "easeOutQuart"
        },
        strokeDasharray: {
            value: "530 1386",
            duration: 500,
            easing: "easeOutQuart"
        }
    });
});