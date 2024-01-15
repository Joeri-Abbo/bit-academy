const openingHour = 8;
const closingHour = 20;
let totalHours = closingHour - openingHour;
let occupiedHours = 0;

const tasks = ['versheid van groenten en fruit checken', 'nieuw brood bakken', 'vloer schoonmaken'];
const taskIntervals = process.argv.slice(2).map(Number); // Convert arguments to numbers

let schedule = Array(closingHour - openingHour).fill().map(() => []);

for (let i = 0; i < taskIntervals.length; i++) {
    let interval = taskIntervals[i];
    for (let hour = openingHour; hour < closingHour; hour += interval) {
        schedule[hour - openingHour].push(tasks[i]);
    }
}

console.log('Rooster:');
console.log("==================================================");

for (let hour = openingHour; hour < closingHour; hour++) {
    let tasksThisHour = schedule[hour - openingHour];
    console.log(`${hour}:00 - ${tasksThisHour.length ? tasksThisHour.join(', ') : 'vrij'}`);
    if (tasksThisHour.length) {
        occupiedHours += 1;
    }
}

let freeHours = totalHours - occupiedHours;
console.log("==================================================");
console.log(`Vrije uren: ${freeHours}`);
