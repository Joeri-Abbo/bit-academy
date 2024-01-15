let gemiddeldeTemperatuur = parseFloat(process.argv[2]);
let totaleNeerslag = parseFloat(process.argv[3]);
let laagsteTemperatuur = parseFloat(process.argv[4]);

console.log("gemiddelde temperatuur: " + gemiddeldeTemperatuur + "°C, neerslag:", totaleNeerslag +
    " ml, laagste temperatuur " + laagsteTemperatuur + "°C");

let isWarmLand = false;

if (gemiddeldeTemperatuur > 20 && totaleNeerslag < 750) {
    isWarmLand = true;
} else if (laagsteTemperatuur > 10 || gemiddeldeTemperatuur >= 25) {
    isWarmLand = true;
}

console.log("Het land is een warm land: " + isWarmLand);
