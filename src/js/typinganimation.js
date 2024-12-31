
const heroLine1Text = "Do";
const heroLine2Text = "Digital";
const heroLine3Text = "Better!";
const heroSpeed = 150;
const heroLoopInterval = 3000;

const heroLine1Element = document.getElementById("line1Hero");
const heroLine2Element = document.getElementById("line2Hero");
const heroLine3Element = document.getElementById("line3Hero");

let heroTypingTimeout;
let heroTypingInterval;

function startHeroTyping() {
    clearTimeout(heroTypingTimeout);
    heroLine1Element.innerHTML = '';
    heroLine2Element.innerHTML = '';
    heroLine3Element.innerHTML = '';
    heroLine1Element.classList.add("typing");
    heroLine2Element.classList.remove("typing");
    heroLine3Element.classList.remove("typing");
    heroLine2Element.style.visibility = 'hidden';
    heroLine3Element.style.visibility = 'hidden';

    typeHeroWriter(heroLine1Element, heroLine1Text, () => {
        heroLine1Element.classList.remove("typing");
        heroLine2Element.style.visibility = 'visible';
        heroLine2Element.classList.add("typing");
        typeHeroWriter(heroLine2Element, heroLine2Text, () => {
            heroLine2Element.classList.remove("typing");
            heroLine3Element.style.visibility = 'visible';
            heroLine3Element.classList.add("typing");
            typeHeroWriter(heroLine3Element, heroLine3Text, () => {
                heroLine3Element.classList.remove("typing");
            });
        });
    });
}

function typeHeroWriter(element, text, callback) {
    let i = 0;
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            heroTypingTimeout = setTimeout(type, heroSpeed);
        } else if (callback) {
            callback();
        }
    }
    type();
}

function handleHeroVisibilityChange() {
    if (document.hidden) {
        clearInterval(heroTypingInterval);
        clearTimeout(heroTypingTimeout);
    } else {
        setTimeout(() => {
            startHeroTyping();
            heroTypingInterval = setInterval(startHeroTyping, heroLoopInterval);
        }, 300);
    }
}

startHeroTyping();
heroTypingInterval = setInterval(startHeroTyping, heroLoopInterval);

document.addEventListener("visibilitychange", handleHeroVisibilityChange);