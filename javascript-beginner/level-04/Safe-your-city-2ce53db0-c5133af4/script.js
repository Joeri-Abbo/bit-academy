const vaultPincode = '123752';
const allowedRoles = ['bestuur', 'administratief medewerker'];

function openVault(pincode, role, dayOfWeek) {
    const isWeekday = dayOfWeek >= 0 && dayOfWeek <= 4;
    const isPincodeCorrect = pincode === vaultPincode;
    const isAllowedRole = allowedRoles.includes(role);

    if (isPincodeCorrect && isAllowedRole && isWeekday) {
        console.log('Toegang verleend');
    } else if ((!isPincodeCorrect || !isAllowedRole) && isWeekday) {
        console.log('Verkeerde pincode of je hebt niet de juiste rechten');
    } else {
        console.log('Veiligheidsdiensten worden ingeschakeld');
    }
}

const pincode = process.argv[2];
const role = process.argv[3];
const dayOfWeek = parseInt(process.argv[4]);

openVault(pincode, role, dayOfWeek);
