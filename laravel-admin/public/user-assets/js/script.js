let wrapper = document.querySelector(".wrapper");
let signUpLink = document.querySelector(".link .signup-link");
let signInLink = document.querySelector(".link .signin-link");
let btnLogin = document.getElementById("loginss");
let btnSignup = document.getElementById("signup");
let flag = 1;
//swapping
signUpLink.addEventListener("click", () => {
    flag = 0;
    console.log(flag);
    wrapper.classList.add("animated-signin");
    wrapper.classList.remove("animated-signup");
});

signInLink.addEventListener("click", () => {
    wrapper.classList.add("animated-signup");
    wrapper.classList.remove("animated-signin");
    flag = 1;
    console.log(flag);
});

function logup(event, us, em, pass, passMatch, userRole, activation = "1") {
    let username = us;
    let email = em;
    let password = pass;
    let passwordMatch = passMatch;
    let role = userRole;
    let is_activation = activation;

    let signupErrorMessage = document.querySelectorAll(".up-error")[0];
    //check username+email

    if (username.length < 3 || username.length > 30) {
        signupErrorMessage.textContent =
            "Username must be between 3 and 20 characters long";
        event.preventDefault();
        return;
    }

    if (email.length === 0 || !/\S+@\S+\.\S+/.test(email)) {
        signupErrorMessage.textContent = "Please enter a valid email address";
        event.preventDefault();
        return;
    }

    //check password
    if (password.length < 8) {
        signupErrorMessage.textContent =
            "Password must be at least 8 characters long";
        event.preventDefault();
        return;
    }

    if (password !== passwordMatch) {
        signupErrorMessage.textContent = "Passwords do not match";
        event.preventDefault();
        return;
    }

    if (!/[A-Z]/.test(password)) {
        signupErrorMessage.textContent =
            "Password must contain at least one uppercase letter";
        event.preventDefault();
        return;
    }

    if (!/[a-z]/.test(password)) {
        signupErrorMessage.textContent =
            "Password must contain at least one lowercase letter";
        event.preventDefault();
        return;
    }

    if (!/[0-9]/.test(password)) {
        signupErrorMessage.textContent =
            "Password must contain at least one number";
        event.preventDefault();
        return;
    }

    if (!/[!@#$%^&*]/.test(password)) {
        signupErrorMessage.textContent =
            "Password must contain at least one special character";
        event.preventDefault();
        return;
    }

    if (password.includes(" ")) {
        signupErrorMessage.textContent = "Password cannot contain spaces";
        event.preventDefault();
        return;
    }

    if (password.length > 20) {
        signupErrorMessage.textContent =
            "Password cannot be more than 20 characters long";
        event.preventDefault();
        return;
    }

    if (/[^a-zA-Z0-9!@#$%^&*]/.test(password)) {
        signupErrorMessage.textContent = "Password contains invalid characters";
        event.preventDefault();
        return;
    }

    if (role !== "customer" && role !== "driver") {
        signupErrorMessage.textContent = "Role must be 'customer' or 'driver'";
        event.preventDefault();
        return;
    }

    if (is_activation !== "0" && is_activation !== "1") {
        signupErrorMessage.textContent =
            "Invalid activation status. Please try again.";
        event.preventDefault();
        return;
    }

    let newUser = {
        name: username,
        email: email,
        password: password,
        passwordMatch: passwordMatch,
        role: role,
        is_deleted: is_activation,
    };

    event.preventDefault();

    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    fetch("/user/sign-in/create", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken, // Add the CSRF token here
        },
        body: JSON.stringify(newUser),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            eval(data.result);
        })
        .catch((error) => {
            console.error("Error sending data:", error);
        });

    //
}

function login(event, em, pw) {
    event.preventDefault();

    let email = em;
    let password = pw;
    let loginErrorMessage = document.querySelectorAll(".lg-error")[0];

    // Email validation
    if (email.length === 0 || !/\S+@\S+\.\S+/.test(email)) {
        loginErrorMessage.textContent = "Please enter a valid email address";
        return;
    }

    // Password validation
    if (password.length < 8) {
        loginErrorMessage.textContent =
            "Password must be at least 8 characters long";
        return;
    }

    if (password.includes(" ")) {
        loginErrorMessage.textContent = "Password cannot contain spaces";
        return;
    }

    if (password.length > 20) {
        loginErrorMessage.textContent =
            "Password cannot be more than 20 characters long";
        return;
    }

    if (/[^a-zA-Z0-9!@#$%^&*]/.test(password)) {
        loginErrorMessage.textContent = "Password contains invalid characters";
        return;
    }

    let loginData = {
        email: email,
        password: password,
    };

    let csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    fetch("/user/sign-in/check", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(loginData),
    })
        .then((response) => response.json())
        .then((data) => {
            eval(data.result);
            console.log(data);
        })
        .catch((error) => {
            console.error("Error:", error);
            loginErrorMessage.textContent =
                "An error occurred. Please try again later.";
        });
}

const form_lg = document.querySelector(".form-lg");

form_lg.addEventListener("submit", function (event) {
    let login_email = document.getElementById("login_em").value;
    let login_password = document.getElementById("login_pw").value;
    login(event, login_email, login_password);
});

const form = document.querySelector(".form-up");

form.addEventListener("submit", function (event) {
    let username = document.getElementById("signup-us").value;
    let email = document.getElementById("signup-em").value;
    let password = document.getElementById("signup-pw").value;
    let passwordMatch = document.getElementById("signup-pwm").value;
    let userType = document.querySelector(
        'input[name="userType"]:checked'
    ).value;
    logup(event, username, email, password, passwordMatch, userType, "1");
});

function logout(g) {
    google.accounts.id.revoke(g, () => {
        console.log("Logout success");
    });
}

function auth_info(a) {
    if (flag == 1) {
        auth_info_lg(a);
        return;
    }
    console.log(a, "1");
    console.log(a.credential, "2");
    const decodedToken = jwt_decode(a.credential);
    console.log(decodedToken, "3");
    console.log(decodedToken.name, decodedToken.email, "4");
    let defaultPass = "Google@2024";

    let userType = document.querySelector(
        'input[name="userType"]:checked'
    ).value;

    logup(
        event,
        decodedToken.name,
        decodedToken.email,
        defaultPass,
        defaultPass,
        userType,
        "0"
    );
    logout(decodedToken.email);
}

function auth_info_lg(a) {
    // console.log(a, "1");
    //console.log(a.credential, "2");
    const decodedToken = jwt_decode(a.credential);
    //console.log(decodedToken, "3");
    //console.log(decodedToken.name, decodedToken.email, "4");
    login(event, decodedToken.email, "Google@2024");
    logout(decodedToken.email);
}
