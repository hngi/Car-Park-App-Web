const updateAccount = () => {

    const url = "https://hng-car-park-api.herokuapp.com/api/v1/user";

    const fname = document.forms['settings_account']['fname'].value;
    const lname = document.forms['settings_account']['lname'].value;
    const email = document.forms['settings_account']['email'].value;
    const phone = ' 08066668888';
    const data = {
        first_name: fname,
        last_name: lname,
        email: email,
        phone: phone
    };
    makePutRequest(url, data)
};


const makePutRequest = (url, data) => {

    return fetch(url, {
        method: "PUT",
        headers: authHeaders(),
        body: JSON.stringify(data)
    }).then(response => {
        if (response.ok){
            swal.fire('Account Updated");
            return response.json()
        } else {
            swal.fire('Account Update failed")
        }
    }).catch(error => {
        swal.fire("Error occurred");
    })
};


const authHeaders = () => {
    let token = localStorage.getItem('token');

    return {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
    }
};

const changePassword = () => {
    passwordPutRequest();
};


const passwordPutRequest = () => {
    const url = "https://hng-car-park-api.herokuapp.com/api/v1/user";
    Swal.fire({
        title: 'Submit your password',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: (password) => {
            const data = {password: password};
            makePutRequest(url, data)
        },
        allowOutsideClick: () => !Swal.isLoading()
    })
}