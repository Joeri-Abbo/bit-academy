function countStars(dieselAuto, afvalscheiding, natuurgebied) {
    let stars = 0;

    if (dieselAuto === 'ja') {
        stars += 1;
    }

    if (afvalscheiding === 'ja') {
        stars += 1;
    }

    if (parseInt(natuurgebied) > 25) {
        stars += 1;
    }

    return stars;
}

function logMessage(stars) {
    if (stars === 3) {
        console.log("Het is een milieuvriendelijke stad");
    } else if (stars === 0) {
        console.log("De stad moet omgevormd worden");
    } else {
        const remainingStars = 3 - stars;
        console.log(`De stad heeft nog ${remainingStars} ster(ren) nodig om milieuvriendelijk te zijn`);
    }
}

// Commandline argumenten: dieselauto, afvalscheiding, natuurgebied
const args = process.argv.slice(2);

if (args.length !== 3) {
    console.log("Geef de juiste commandline argumenten op.");
} else {
    const dieselAuto = args[0];
    const afvalscheiding = args[1];
    const natuurgebied = args[2];

    const stars = countStars(dieselAuto, afvalscheiding, natuurgebied);
    logMessage(stars);
}
