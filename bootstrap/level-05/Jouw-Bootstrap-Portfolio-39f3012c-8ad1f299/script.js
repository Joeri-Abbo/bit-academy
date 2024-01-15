function collatz(number) {
    let steps = 0;
    for (let i = 0; i < 100; i++) {
        if (number === 1) {
            break;
        } else if (number % 2 === 0) {
            number /= 2;
            // console.log(number);
            steps++;
        } else if (number % 2 !== 0) {
            number = (number * 3) + 1;
            // console.log(number);
            steps++;
        }
    }
    return (steps);
}

console.log(collatz(parseInt(process.argv[2], 10)));

function collatz2(number) {
    let steps = 0;
    while (true) {
        if (number === 1) {
            return (steps);
        }

        let isEven = number % 2 === 0;
        if (isEven) {
            console.log("EVEN" + number)
            number /= 2;
            steps++;
            continue;
        }
        if (!isEven) {
            console.log("NOTEVEN" + number)

            number = (number * 3) + 1;
            steps++;
            continue;
        }
    }
}

console.log(collatz2(parseInt(process.argv[2], 10)));

function berekenCollatz(startGetal) {
    let stappen = 0;

    while (startGetal !== 1) {
        if (startGetal % 2 === 0) {
            startGetal /= 2;
        } else {
            startGetal = startGetal * 3 + 1;
        }

        stappen++;
    }

    return stappen;
}

const number = parseInt(process.argv[2], 10);
console.log(`Aantal stappen voor ${number}: ${berekenCollatz(number)}`);
