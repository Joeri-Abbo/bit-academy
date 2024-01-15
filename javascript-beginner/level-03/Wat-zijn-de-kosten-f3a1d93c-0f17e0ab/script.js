const administratie = parseFloat(process.argv[2]);
const infrastructuur = parseFloat(process.argv[3]);
const evenementen = parseFloat(process.argv[4]);
const totaal = parseFloat(process.argv[5]);

const administratieEnInfrastructuur = administratie + infrastructuur;
const overigeKosten = totaal - (administratie + infrastructuur + evenementen);
const administratiePercentage = (administratie / totaal) * 100;

console.log(`Totaal uitgegeven aan Administratie en Infrastructuur: ${administratieEnInfrastructuur} miljoen`);
console.log(`Overige kosten: ${overigeKosten} miljoen`);
console.log(`Administratiekosten als percentage van het totaal: ${administratiePercentage}%`);

