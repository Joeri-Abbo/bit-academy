let nederland = process.argv[2];
let duitsland = process.argv[3];
let frankrijk = process.argv[4];

console.log("Is Nederland bekend om hetzelfde als Duitsland? " + (nederland === duitsland));
console.log("Is Nederland bekend om hetzelfde als Frankrijk? " + (nederland === frankrijk));
console.log("Zijn Duitsland en Frankrijk niet bekend om hetzelfde? " + (duitsland !== frankrijk));
