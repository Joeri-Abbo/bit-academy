const population = parseInt(process.argv[2]);

if (population >= 10000) {
    console.log("Megastad");
} else if (population >= 25) {
    console.log("Stad");
} else {
    console.log("Dorp");
}
