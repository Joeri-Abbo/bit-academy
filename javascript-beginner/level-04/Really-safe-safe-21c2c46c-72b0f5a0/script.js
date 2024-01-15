function openVault(failedAttempts, pincode, role, dayOfWeek, timeOfDay) {
    console.log(`#fouten: ${failedAttempts}, pin: ${pincode}, functie: ${role}, day: ${dayOfWeek}, tijd: ${timeOfDay}`);

    let alarm = false;
    if (failedAttempts >= 5) {
        console.log("Kluis is geblokkeerd");
        return;
    }


    if ((role === "bestuur" || role === "administratief medewerker") && (!dayOfWeek === 5 || !dayOfWeek === 6 || timeOfDay < 9 || timeOfDay >= 17)) {
        if (pincode === 123752) {
            console.log("Kluis opent");
            if (role !== "bestuur") {
                console.log("Sms naar bestuur");
            }
        } else {
            console.log("Verkeerde pincode");
        }
    }

    if (alarm && (timeOfDay < 9 || timeOfDay >= 17)) {
        console.log("Stil alarm gaat af");
    } else if (alarm) {
        console.log("alarm gaat af");
    }
}


const failedAttempts = parseInt(process.argv[2]);
const pincode = parseInt(process.argv[3]);
const role = process.argv[4];
const dayOfWeek = parseInt(process.argv[5]);
const timeOfDay = parseInt(process.argv[6]);

openVault(failedAttempts, pincode, role, dayOfWeek, timeOfDay);
