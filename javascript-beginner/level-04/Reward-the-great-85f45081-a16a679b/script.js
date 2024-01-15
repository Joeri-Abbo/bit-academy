let rating = parseInt(process.argv[2]);
let natureReserve = parseInt(process.argv[3]);
let roadSurface = parseInt(process.argv[4]);
console.log(`rating: ${rating}, natuurgebied: ${natureReserve}, autowegdek: ${roadSurface}`);

if (rating >= 3) {
    if (natureReserve > 25) {
        console.log("Belastingkorting voor de inwoners");
    } else {
        console.log("subsidie voor aanleg van meer natuur");
    }
} else if (roadSurface > 200) {
    console.log("Subsidie voor ombouwen autoweg naar fietsstraat");
} else {
    console.log("subsidie voor afvalinzameling");
}