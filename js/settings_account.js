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
            alert("Account Updated");
            return response.json()
        } else {
            alert('Account Update Failed');
        }
    }).catch(error => {
        alert("Error occurred");
    })
};


const authHeaders = () => {
    const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9obmctY2FyLXBhcmstYXBpLmhlcm9rdWFwcC5jb21cL2FwaVwvdjFcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNTczMDUwODA2LCJleHAiOjE1NzMxNTg4MDYsIm5iZiI6MTU3MzA1MDgwNiwianRpIjoiZWtSSk9IWnhvOThXYkZ2eCIsInN1YiI6NCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.eCrAQDNY9OHtY7nEScv1vq5iqhoAeNuALCAwed5nh_w";
    return {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
    }
};