const args = process.argv.slice(2);
let count = 0;

for (let i = 0; i < args.length; i++) {
    if (args[i] === "havermelk") {
        count++;
    }
}

console.log("Aantal havermelk: " + count);
