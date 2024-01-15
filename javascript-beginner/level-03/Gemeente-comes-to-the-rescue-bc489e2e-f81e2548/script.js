const totaleKosten = process.argv[2];
const totaleKostenNum = parseFloat(totaleKosten);
let stadBetaling = totaleKostenNum % 3;
const gemeenteBetaling = totaleKostenNum - stadBetaling;

console.log(`Totaal zijn de kosten ${totaleKostenNum} miljoen.`);
console.log(`De stad moet zelf ${stadBetaling} miljoen betalen.`);
console.log(`De gemeente betaalt ${gemeenteBetaling} miljoen.`);
