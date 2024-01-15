const assert = require('assert');

const getallen = [1, 2, 3];

function telop(array) {
    let som = 0;
    array.forEach(getal => {
        som += getal;
    });
    return som;
}

function testSum(lijstMetGetallen) {
    assert(telop(lijstMetGetallen) == 6, "Som van 1, 2 en 3 moet 6 zijn.");
}

testSum(getallen);
console.log("Test Geslaagd!");
