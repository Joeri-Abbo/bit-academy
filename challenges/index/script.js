const currentLetter = document.querySelector(".currentLetter");
const error = document.getElementsByClassName("error");
const letterInput = document.getElementById("letter");

const letterArray = {
    A: { 1: 1, 2: 0, 3: 0, 4: 0, 5: 0 },
    B: { 1: 1, 2: 0, 3: 0, 4: 1, 5: 0 },
    C: { 1: 1, 2: 0, 3: 1, 4: 1, 5: 1 },
    D: { 1: 0, 2: 0, 3: 1, 4: 1, 5: 1 },
    E: { 1: 0, 2: 0, 3: 0, 4: 1, 5: 0 },
    F: { 1: 1, 2: 0, 3: 1, 4: 1, 5: 0 },
    G: { 1: 1, 2: 0, 3: 1, 4: 0, 5: 0 },
    H: { 1: 1, 2: 1, 3: 0, 4: 0, 5: 1 },
    I: { 1: 0, 2: 0, 3: 0, 4: 0, 5: 1 },
    J: { 1: 0, 2: 0, 3: 1, 4: 0, 5: 1 },
    K: { 1: 1, 2: 1, 3: 0, 4: 1, 5: 0 },
    L: { 1: 0, 2: 1, 3: 1, 4: 1, 5: 0 },
    M: { 1: 0, 2: 1, 3: 0, 4: 1, 5: 0 },
    N: { 1: 0, 2: 1, 3: 0, 4: 0, 5: 0 },
    O: { 1: 0, 2: 0, 3: 1, 4: 0, 5: 0 },
    P: { 1: 1, 2: 0, 3: 0, 4: 1, 5: 1 },
    Q: { 1: 1, 2: 1, 3: 1, 4: 0, 5: 0 },
    R: { 1: 0, 2: 1, 3: 1, 4: 0, 5: 1 },
    S: { 1: 0, 2: 1, 3: 0, 4: 0, 5: 1 },
    T: { 1: 0, 2: 0, 3: 1, 4: 1, 5: 0 },
    U: { 1: 1, 2: 0, 3: 1, 4: 0, 5: 1 },
    V: { 1: 0, 2: 0, 3: 0, 4: 1, 5: 1 },
    W: { 1: 0, 2: 1, 3: 0, 4: 1, 5: 1 },
    X: { 1: 1, 2: 1, 3: 0, 4: 1, 5: 1 },
    Y: { 1: 1, 2: 1, 3: 1, 4: 1, 5: 0 },
    Z: { 1: 0, 2: 1, 3: 1, 4: 1, 5: 1 },
    " ": { 1: 0, 2: 0, 3: 0, 4: 0, 5: 0 },
    ".": { 1: 0, 2: 1, 3: 1, 4: 0, 5: 0 },
    ",": { 1: 1, 2: 0, 3: 0, 4: 0, 5: 1 },
    ":": { 1: 1, 2: 1, 3: 0, 4: 0, 5: 0 },
    "?": { 1: 1, 2: 1, 3: 1, 4: 0, 5: 1 },
    "!": { 1: 1, 2: 1, 3: 1, 4: 1, 5: 1 },
};

function search() {
    letter = letterInput.value.charAt(0);
    letterInput.value = letter;
    letter = searchLetter(letter.toUpperCase());
}

function add() {
    letter = checkLetter();
    letterInput.value = letterInput.value + letter;
}

function back() {
    letterInput.value = letterInput.value.slice(0, -1);
}

function clearInput() {
    letterInput.value = null;
}

function changeState(event) {
    event.classList.toggle("active");
    checkLetter();
}

function searchLetter(letter) {
    array = letterArray[letter];

    if (array == null) {
        error.innerHTML = "Letter of teken niet gevonden!";
        return;
    }
    error.innerHTML = '';

    for (var key in array) {
        if (array.hasOwnProperty(key)) {
            var value = array[key];

            element = document.querySelector('[data-id="' + key + '"]');

            if (value === 1) {
                element.classList.add("active");
            } else {
                element.classList.remove("active");
            }
        }
    }

    currentLetter.innerHTML = letter != " " ? letter : "Space";
}

var data = {};

function checkLetter() {
    document.querySelectorAll(".tile").forEach(function (element) {
        let active = 0;
        let id = element.getAttribute("data-id");

        if (element.classList.contains("active")) {
            active = 1;
        }

        data[id] = active;
    });

    for (const letter in letterArray) {
        if (JSON.stringify(letterArray[letter]) === JSON.stringify(data)) {
            foundLetter = letter;
            break;
        }
    }

    currentLetter.innerHTML = foundLetter != " " ? foundLetter : "Space";
    return foundLetter;
}