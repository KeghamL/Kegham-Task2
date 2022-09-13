 //Display Errors in Form Validation
        const guests = document.getElementById('guests');
        const date = document.getElementById('date');
        const message = document.getElementById('message');
        const form = document.getElementById('form');


        form.addEventListener('submit', e => {
            e.preventDefault();

            checkInputs();
        });

function checkInputs() {
    // trim to remove the whitespaces
    const guestsValue = guests.value.trim();
    const date1Value = date1.value.trim();
    const messageValue = message.value.trim();

    if (guestsValue === '') {
        setErrorFor(guests, 'Guests Number Cant Be Empty!');
    } else if (guestsValue > 300) {
        setErrorFor(guests, 'Guests Number Must Be Under 300!');
    } else {
        setSuccessFor(guests);
    }


    // if (date1Value === '') {
    // setErrorFor(date1, 'Date Cant Be Empty!');
    // } else {
    // setSuccessFor(date1);
    // }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        formControl.className = 'input-control error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = 'input-control success';
    }
}
