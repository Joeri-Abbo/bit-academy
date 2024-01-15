const voorraad = ["pesto", "spaghetti", "olijfolie"];
const groenten = ["courgette", "knoflook", "ui"];

console.log(voorraad);

console.log(`het eerste product bij groenten is: ${groenten[0]}`);
console.log(`het laatste product bij groenten is: ${groenten[groenten.length - 1]}`);

voorraad[1] = "macaroni";
console.log(voorraad);
