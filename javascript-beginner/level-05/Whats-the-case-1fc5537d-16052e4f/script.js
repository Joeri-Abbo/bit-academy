const totaalbedrag = parseFloat(process.argv[2]);
const dag = parseInt(process.argv[3]);

let korting = 0;

switch (dag) {
    case 0: // Maandag
        korting = 0;
        break;
    case 1: // Dinsdag
        korting = 0.02;
        break;
    case 2: // Woensdag
        korting = 0.03;
        break;
    case 3: // Donderdag
        korting = 0.04;
        break;
    case 4: // Vrijdag
        korting = 0.005;
        break;
    case 5: // Zaterdag
        korting = 0.015;
        break;
    case 6: // Zondag
        korting = 0.05;
        break;
    default:
        console.log("Ongeldige dag");
        process.exit(1);
}

console.log("Totaalbedrag is " + totaalbedrag * (1 - korting));
