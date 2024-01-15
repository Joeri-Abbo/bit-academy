const test = require("ava");
const assert = require("assert");

test('Deze test slaagt altijd!', t => {
    t.pass();
});

const vijfMeerDanDrie = test.macro((t, input, expected) => {
    t.is(eval(input), expected);
});

const drieMeerDanVijf = test.macro((t, input, expected) => {
    t.is(eval(input), expected);
});

test('Vijf is groter dan drie!', vijfMeerDanDrie, '5 > 3', true);
// test('Drie is groter dan vijf!', drieMeerDanVijf, '3 > 5', true);